<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Notification;
use App\Models\HistoryActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Exports\DashboardExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalProducts = Product::count();
        $lowStockProducts = Product::where('stock', '<', 10)->where('stock', '>', 0)->count();
        $outOfStockProducts = Product::where('stock', 0)->count();

        $recentProducts = Product::latest()->take(5)->get();
        $recentActivities = HistoryActivity::latest()->take(5)->get();
        $notifications = Notification::latest()->take(3)->get();

        // Data untuk charts
        $chartData = $this->getChartData($request);

        return view('dashboard.index', compact(
            'totalProducts',
            'lowStockProducts',
            'outOfStockProducts',
            'recentProducts',
            'recentActivities',
            'notifications',
            'chartData'
        ));
    }

    public function exportExcel(Request $request)
    {
        $chartData = $this->getChartData($request);
        $exportData = $this->prepareExportData($chartData);

        $fileName = 'dashboard-export-' . date('Y-m-d-H-i-s') . '.xlsx';

        return Excel::download(new DashboardExport($exportData), $fileName);
    }

    public function exportPDF(Request $request)
    {
        $chartData = $this->getChartData($request);
        $exportData = $this->prepareExportData($chartData);

        $pdf = PDF::loadView('dashboard.export-pdf', $exportData);
        $pdf->setPaper('A4', 'landscape');

        $fileName = 'dashboard-export-' . date('Y-m-d-H-i-s') . '.pdf';

        return $pdf->download($fileName);
    }

    private function prepareExportData($chartData)
    {
        return [
            'dailyData' => $chartData['dailyData'],
            'orderStatusData' => $chartData['orderStatusData'],
            'paymentMethodData' => $chartData['paymentMethodData'],
            'topProductsData' => $chartData['topProductsData'],
            'weeklyRevenueData' => $chartData['weeklyRevenueData'],
            'weeklyStats' => $chartData['weeklyStats'],
            'todayStats' => $chartData['todayStats'],
            'startDate' => $chartData['startDate'],
            'endDate' => $chartData['endDate'],
            'exportDate' => now()->format('d F Y H:i:s')
        ];
    }

    private function getChartData(Request $request)
    {
        // Default date range (last 7 days)
        $startDate = $request->input('start_date', now()->subDays(7)->format('Y-m-d'));
        $endDate = $request->input('end_date', now()->format('Y-m-d'));

        // Chart 1: Daily Orders & Revenue
        $dailyData = Order::whereBetween(DB::raw('DATE(created_at)'), [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date,
                        COUNT(*) as order_count,
                        COALESCE(SUM(total_amount), 0) as revenue')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->get();

        // Jika tidak ada data, buat data dummy untuk chart
        if ($dailyData->isEmpty()) {
            $dailyData = collect();
            for ($i = 6; $i >= 0; $i--) {
                $date = now()->subDays($i)->format('Y-m-d');
                $dailyData->push((object)[
                    'date' => $date,
                    'order_count' => rand(1, 10),
                    'revenue' => rand(100000, 500000)
                ]);
            }
        }

        // Chart 2: Order Status Distribution
        $orderStatusData = Order::whereBetween(DB::raw('DATE(created_at)'), [$startDate, $endDate])
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->get();

        // Jika tidak ada data status, buat default
        if ($orderStatusData->isEmpty()) {
            $orderStatusData = collect([
                (object)['status' => 'pending', 'count' => 5],
                (object)['status' => 'completed', 'count' => 8],
                (object)['status' => 'cancelled', 'count' => 2]
            ]);
        }

        // Chart 3: Payment Methods
        $paymentMethodData = Order::whereBetween(DB::raw('DATE(created_at)'), [$startDate, $endDate])
            ->selectRaw('payment_method, COUNT(*) as count')
            ->groupBy('payment_method')
            ->get();

        // Jika tidak ada data payment method, buat default
        if ($paymentMethodData->isEmpty()) {
            $paymentMethodData = collect([
                (object)['payment_method' => 'cash', 'count' => 7],
                (object)['payment_method' => 'transfer', 'count' => 6],
                (object)['payment_method' => 'card', 'count' => 2]
            ]);
        }

        // Chart 4: Top Selling Products
        $topProductsData = OrderItem::join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereBetween(DB::raw('DATE(orders.created_at)'), [$startDate, $endDate])
            ->selectRaw('order_items.product_name,
                        SUM(order_items.quantity) as total_sold,
                        COALESCE(SUM(order_items.quantity * order_items.price), 0) as revenue')
            ->groupBy('order_items.product_name')
            ->orderByDesc('total_sold')
            ->take(10)
            ->get();

        // Jika tidak ada data produk terlaris, ambil dari produk yang ada
        if ($topProductsData->isEmpty()) {
            $topProductsData = Product::selectRaw('name as product_name, 0 as total_sold, 0 as revenue')
                ->orderBy('name')
                ->take(10)
                ->get();
        }

        // NEW CHART: Weekly Revenue Trend (7 days)
        $weeklyRevenueData = Order::whereBetween(DB::raw('DATE(created_at)'), [now()->subDays(6)->format('Y-m-d'), now()->format('Y-m-d')])
            ->selectRaw('DATE(created_at) as date,
                        COALESCE(SUM(total_amount), 0) as revenue,
                        COUNT(*) as order_count')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->get();

        // Ensure we have data for all 7 days
        $completeWeeklyData = collect();
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $dayData = $weeklyRevenueData->firstWhere('date', $date);

            if ($dayData) {
                $completeWeeklyData->push($dayData);
            } else {
                $completeWeeklyData->push((object)[
                    'date' => $date,
                    'revenue' => 0,
                    'order_count' => 0
                ]);
            }
        }

        // Calculate weekly stats
        $weeklyStats = [
            'total_revenue' => $completeWeeklyData->sum('revenue'),
            'total_orders' => $completeWeeklyData->sum('order_count'),
            'average_daily_revenue' => $completeWeeklyData->avg('revenue'),
            'best_day' => $completeWeeklyData->sortByDesc('revenue')->first()
        ];

        // Today's statistics
        $todayStats = [
            'orders' => Order::whereDate('created_at', today())->count(),
            'revenue' => Order::whereDate('created_at', today())->sum('total_amount') ?? 0,
            'completed' => Order::whereDate('created_at', today())->where('status', 'completed')->count(),
            'average_order' => Order::whereDate('created_at', today())->avg('total_amount') ?? 0
        ];

        return [
            'dailyData' => $dailyData,
            'orderStatusData' => $orderStatusData,
            'paymentMethodData' => $paymentMethodData,
            'topProductsData' => $topProductsData,
            'weeklyRevenueData' => $completeWeeklyData,
            'weeklyStats' => $weeklyStats,
            'todayStats' => $todayStats,
            'startDate' => $startDate,
            'endDate' => $endDate
        ];
    }
}

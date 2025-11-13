<?php

namespace App\Http\Controllers;

use App\Models\HistoryActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryActivityController extends Controller
{
    public function index()
    {
        // Menggunakan pagination untuk performa yang lebih baik
        $historyActivities = HistoryActivity::latest()->paginate(20);

        // Stats untuk cards
        $stats = [
            'total' => HistoryActivity::count(),
            'today' => HistoryActivity::whereDate('created_at', today())->count(),
            'stock_in' => HistoryActivity::where('activity_type', 'stock_in')->count(),
            'stock_out' => HistoryActivity::where('activity_type', 'stock_out')->count(),
        ];

        return view('history.index', compact('historyActivities', 'stats'));
    }

    public function destroy($id)
    {
        try {
            $historyActivity = HistoryActivity::findOrFail($id);
            $historyActivity->delete();

            return redirect()->route('history.index')
                ->with('success', 'Riwayat aktivitas berhasil dihapus.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('history.index')
                ->with('error', 'Riwayat aktivitas tidak ditemukan.');
        }
    }

    public function destroyAll()
    {
        try {
            // Gunakan transaction untuk keamanan data
            DB::transaction(function () {
                HistoryActivity::truncate();
            });

            return redirect()->route('history.index')
                ->with('success', 'Semua riwayat aktivitas berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('history.index')
                ->with('error', 'Terjadi kesalahan saat menghapus riwayat aktivitas.');
        }
    }

    // Method tambahan untuk filter dan search
    public function filter(Request $request)
    {
        $query = HistoryActivity::query();

        // Filter by activity type
        if ($request->has('activity_type') && $request->activity_type) {
            $query->where('activity_type', $request->activity_type);
        }

        // Filter by date range
        if ($request->has('start_date') && $request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->has('end_date') && $request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // Search by product name or actor
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name_product', 'like', "%{$search}%")
                    ->orWhere('actor', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $historyActivities = $query->latest()->paginate(20);
        $stats = $this->getStats();

        return view('history.index', compact('historyActivities', 'stats'));
    }

    // Method untuk mendapatkan stats
    private function getStats()
    {
        return [
            'total' => HistoryActivity::count(),
            'today' => HistoryActivity::whereDate('created_at', today())->count(),
            'stock_in' => HistoryActivity::where('activity_type', 'stock_in')->count(),
            'stock_out' => HistoryActivity::where('activity_type', 'stock_out')->count(),
            'created' => HistoryActivity::where('activity_type', 'created')->count(),
            'updated' => HistoryActivity::where('activity_type', 'updated')->count(),
            'deleted' => HistoryActivity::where('activity_type', 'deleted')->count(),
        ];
    }

    // Method untuk export data (optional)
    public function export(Request $request)
    {
        $historyActivities = HistoryActivity::latest()->get();

        // Return CSV or other format
        // Implementation depends on your requirements
    }
}

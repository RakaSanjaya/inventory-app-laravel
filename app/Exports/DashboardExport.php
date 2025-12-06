<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DashboardExport implements WithMultipleSheets
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new DailyOrdersSheet($this->data['dailyData']);
        $sheets[] = new OrderStatusSheet($this->data['orderStatusData']);
        $sheets[] = new PaymentMethodSheet($this->data['paymentMethodData']);
        $sheets[] = new TopProductsSheet($this->data['topProductsData']);
        $sheets[] = new WeeklyRevenueSheet($this->data['weeklyRevenueData']);
        $sheets[] = new SummarySheet($this->data);

        return $sheets;
    }
}

class DailyOrdersSheet implements FromArray, WithHeadings, WithTitle
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        $result = [];
        foreach ($this->data as $item) {
            $result[] = [
                'Tanggal' => $item->date,
                'Jumlah Order' => $item->order_count,
                'Pendapatan' => $item->revenue,
            ];
        }
        return $result;
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Jumlah Order',
            'Pendapatan (Rp)',
        ];
    }

    public function title(): string
    {
        return 'Order Harian';
    }
}

class OrderStatusSheet implements FromArray, WithHeadings, WithTitle
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        $result = [];
        foreach ($this->data as $item) {
            $result[] = [
                'Status' => $item->status,
                'Jumlah' => $item->count,
            ];
        }
        return $result;
    }

    public function headings(): array
    {
        return [
            'Status Order',
            'Jumlah',
        ];
    }

    public function title(): string
    {
        return 'Status Order';
    }
}

class PaymentMethodSheet implements FromArray, WithHeadings, WithTitle
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        $result = [];
        foreach ($this->data as $item) {
            $result[] = [
                'Metode Pembayaran' => $item->payment_method,
                'Jumlah' => $item->count,
            ];
        }
        return $result;
    }

    public function headings(): array
    {
        return [
            'Metode Pembayaran',
            'Jumlah',
        ];
    }

    public function title(): string
    {
        return 'Metode Pembayaran';
    }
}

class TopProductsSheet implements FromArray, WithHeadings, WithTitle
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        $result = [];
        foreach ($this->data as $item) {
            $result[] = [
                'Nama Produk' => $item->product_name,
                'Terjual' => $item->total_sold,
                'Pendapatan' => $item->revenue,
            ];
        }
        return $result;
    }

    public function headings(): array
    {
        return [
            'Nama Produk',
            'Jumlah Terjual',
            'Pendapatan (Rp)',
        ];
    }

    public function title(): string
    {
        return 'Produk Terlaris';
    }
}

class WeeklyRevenueSheet implements FromArray, WithHeadings, WithTitle
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        $result = [];
        foreach ($this->data as $item) {
            $result[] = [
                'Tanggal' => $item->date,
                'Pendapatan' => $item->revenue,
                'Jumlah Order' => $item->order_count,
            ];
        }
        return $result;
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Pendapatan (Rp)',
            'Jumlah Order',
        ];
    }

    public function title(): string
    {
        return 'Revenue Mingguan';
    }
}

class SummarySheet implements FromArray, WithHeadings, WithTitle
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return [
            ['STATISTIK HARI INI', ''],
            ['Total Order', $this->data['todayStats']['orders']],
            ['Pendapatan', 'Rp ' . number_format($this->data['todayStats']['revenue'], 0, ',', '.')],
            ['Order Selesai', $this->data['todayStats']['completed']],
            ['Rata-rata Order', 'Rp ' . number_format($this->data['todayStats']['average_order'], 0, ',', '.')],
            [''],
            ['STATISTIK MINGGU INI', ''],
            ['Total Pendapatan', 'Rp ' . number_format($this->data['weeklyStats']['total_revenue'], 0, ',', '.')],
            ['Total Order', $this->data['weeklyStats']['total_orders']],
            ['Rata-rata Harian', 'Rp ' . number_format($this->data['weeklyStats']['average_daily_revenue'], 0, ',', '.')],
            ['Hari Terbaik', $this->data['weeklyStats']['best_day'] ? \Carbon\Carbon::parse($this->data['weeklyStats']['best_day']->date)->isoFormat('dddd') : 'N/A'],
            ['Pendapatan Hari Terbaik', 'Rp ' . number_format($this->data['weeklyStats']['best_day']->revenue ?? 0, 0, ',', '.')],
            [''],
            ['PERIODE LAPORAN', ''],
            ['Tanggal Mulai', $this->data['startDate']],
            ['Tanggal Selesai', $this->data['endDate']],
            ['Diekspor Pada', $this->data['exportDate']],
        ];
    }

    public function headings(): array
    {
        return [
            'KETERANGAN',
            'NILAI',
        ];
    }

    public function title(): string
    {
        return 'Ringkasan';
    }
}

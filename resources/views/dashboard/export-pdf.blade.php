<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard Export</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            background-color: #f0f0f0;
            padding: 8px;
            font-weight: bold;
            border-left: 4px solid #10B981;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        table th {
            background-color: #10B981;
            color: white;
            padding: 8px;
            text-align: left;
        }

        table td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 15px;
        }

        .stat-card {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 4px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>LAPORAN DASHBOARD</h1>
        <p>Periode: {{ $startDate }} hingga {{ $endDate }}</p>
        <p>Diekspor pada: {{ $exportDate }}</p>
    </div>

    <!-- Statistik Hari Ini -->
    <div class="section">
        <div class="section-title">STATISTIK HARI INI</div>
        <div class="stats-grid">
            <div class="stat-card">
                <strong>Total Order:</strong> {{ $todayStats['orders'] }}
            </div>
            <div class="stat-card">
                <strong>Pendapatan:</strong> Rp {{ number_format($todayStats['revenue'], 0, ',', '.') }}
            </div>
            <div class="stat-card">
                <strong>Order Selesai:</strong> {{ $todayStats['completed'] }}
            </div>
            <div class="stat-card">
                <strong>Rata-rata Order:</strong> Rp {{ number_format($todayStats['average_order'], 0, ',', '.') }}
            </div>
        </div>
    </div>

    <!-- Statistik Minggu Ini -->
    <div class="section">
        <div class="section-title">STATISTIK MINGGU INI</div>
        <div class="stats-grid">
            <div class="stat-card">
                <strong>Total Pendapatan:</strong> Rp {{ number_format($weeklyStats['total_revenue'], 0, ',', '.') }}
            </div>
            <div class="stat-card">
                <strong>Total Order:</strong> {{ $weeklyStats['total_orders'] }}
            </div>
            <div class="stat-card">
                <strong>Rata-rata Harian:</strong> Rp
                {{ number_format($weeklyStats['average_daily_revenue'], 0, ',', '.') }}
            </div>
            <div class="stat-card">
                <strong>Hari Terbaik:</strong>
                {{ $weeklyStats['best_day'] ? \Carbon\Carbon::parse($weeklyStats['best_day']->date)->isoFormat('dddd') : 'N/A' }}
            </div>
        </div>
    </div>

    <!-- Order Harian -->
    <div class="section">
        <div class="section-title">ORDER HARIAN</div>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jumlah Order</th>
                    <th class="text-right">Pendapatan (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dailyData as $item)
                    <tr>
                        <td>{{ $item->date }}</td>
                        <td class="text-center">{{ $item->order_count }}</td>
                        <td class="text-right">{{ number_format($item->revenue, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Status Order -->
    <div class="section">
        <div class="section-title">DISTRIBUSI STATUS ORDER</div>
        <table>
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderStatusData as $item)
                    <tr>
                        <td>{{ $item->status }}</td>
                        <td class="text-center">{{ $item->count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Metode Pembayaran -->
    <div class="section">
        <div class="section-title">METODE PEMBAYARAN</div>
        <table>
            <thead>
                <tr>
                    <th>Metode</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paymentMethodData as $item)
                    <tr>
                        <td>{{ $item->payment_method }}</td>
                        <td class="text-center">{{ $item->count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Produk Terlaris -->
    <div class="section">
        <div class="section-title">PRODUK TERLARIS</div>
        <table>
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Terjual</th>
                    <th class="text-right">Pendapatan (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topProductsData as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td class="text-center">{{ $item->total_sold }}</td>
                        <td class="text-right">{{ number_format($item->revenue, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Revenue Mingguan -->
    <div class="section">
        <div class="section-title">REVENUE MINGGUAN (7 HARI TERAKHIR)</div>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th class="text-right">Pendapatan (Rp)</th>
                    <th>Jumlah Order</th>
                </tr>
            </thead>
            <tbody>
                @foreach($weeklyRevenueData as $item)
                    <tr>
                        <td>{{ $item->date }}</td>
                        <td class="text-right">{{ number_format($item->revenue, 0, ',', '.') }}</td>
                        <td class="text-center">{{ $item->order_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>Laporan ini dihasilkan secara otomatis dari sistem</p>
    </div>
</body>

</html>

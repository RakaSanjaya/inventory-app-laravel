<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk #{{ $order->order_number }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
                background: white !important;
            }

            .no-print {
                display: none !important;
            }

            .receipt-container {
                box-shadow: none !important;
                border: none !important;
            }

            @page {
                size: 80mm auto;
                margin: 0;
                padding: 0;
            }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .receipt-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            max-width: 400px;
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        .receipt-header {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            padding: 24px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .receipt-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 10px 10px;
            animation: float 20s linear infinite;
        }

        @keyframes float {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }

            100% {
                transform: translate(-10px, -10px) rotate(360deg);
            }
        }

        .store-name {
            font-size: 24px;
            font-weight: 800;
            color: white;
            margin-bottom: 8px;
            position: relative;
            z-index: 2;
        }

        .store-tagline {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.9);
            position: relative;
            z-index: 2;
        }

        .receipt-content {
            padding: 24px;
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 2px dashed #e5e7eb;
        }

        .order-number {
            font-size: 18px;
            font-weight: 700;
            color: #1f2937;
        }

        .order-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-completed {
            background: #dcfce7;
            color: #166534;
        }

        .status-cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 24px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .info-label {
            font-size: 12px;
            color: #6b7280;
            font-weight: 500;
        }

        .info-value {
            font-size: 14px;
            color: #1f2937;
            font-weight: 600;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, #e5e7eb, transparent);
            margin-left: 8px;
        }

        .items-list {
            margin-bottom: 24px;
        }

        .item-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 12px 0;
            border-bottom: 1px solid #f3f4f6;
        }

        .item-row:last-child {
            border-bottom: none;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            font-size: 14px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 4px;
        }

        .item-sku {
            font-size: 11px;
            color: #9ca3af;
            margin-bottom: 4px;
        }

        .item-quantity {
            font-size: 12px;
            color: #6b7280;
        }

        .item-price {
            text-align: right;
        }

        .item-total {
            font-size: 14px;
            font-weight: 700;
            color: #059669;
        }

        .item-unit {
            font-size: 12px;
            color: #6b7280;
        }

        .summary-section {
            background: #f8fafc;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .summary-row:last-child {
            margin-bottom: 0;
        }

        .summary-label {
            font-size: 14px;
            color: #6b7280;
        }

        .summary-value {
            font-size: 14px;
            font-weight: 600;
            color: #1f2937;
        }

        .summary-total {
            border-top: 2px solid #e5e7eb;
            padding-top: 12px;
            margin-top: 12px;
        }

        .total-label {
            font-size: 18px;
            font-weight: 800;
            color: #1f2937;
        }

        .total-value {
            font-size: 18px;
            font-weight: 800;
            color: #059669;
        }

        .payment-section {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .payment-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .payment-row:last-child {
            margin-bottom: 0;
        }

        .payment-label {
            font-size: 14px;
            color: #92400e;
            font-weight: 600;
        }

        .payment-value {
            font-size: 14px;
            font-weight: 700;
            color: #92400e;
        }

        .payment-change {
            border-top: 2px solid #f59e0b;
            padding-top: 12px;
            margin-top: 12px;
        }

        .change-value {
            font-size: 16px;
            font-weight: 800;
            color: #059669;
        }

        .notes-section {
            background: #fef3c7;
            border: 1px dashed #d97706;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 24px;
        }

        .notes-label {
            font-size: 12px;
            font-weight: 700;
            color: #92400e;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .notes-content {
            font-size: 13px;
            color: #92400e;
            line-height: 1.4;
        }

        .receipt-footer {
            text-align: center;
            padding: 20px 24px;
            background: #f8fafc;
            border-top: 2px dashed #e5e7eb;
        }

        .thank-you {
            font-size: 16px;
            font-weight: 700;
            color: #059669;
            margin-bottom: 8px;
        }

        .footer-text {
            font-size: 12px;
            color: #6b7280;
            line-height: 1.4;
        }

        .print-time {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 12px;
        }

        .barcode {
            text-align: center;
            margin: 16px 0;
            padding: 12px;
            background: white;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }

        .barcode-line {
            height: 2px;
            background: #1f2937;
            margin: 2px 0;
            border-radius: 1px;
        }

        .barcode-number {
            font-family: 'Courier New', monospace;
            font-size: 12px;
            letter-spacing: 2px;
            margin-top: 8px;
            font-weight: 600;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .btn {
            flex: 1;
            padding: 12px 20px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
        }

        .btn-secondary {
            background: #6b7280;
            color: white;
        }

        .store-contact {
            display: flex;
            justify-content: center;
            gap: 16px;
            margin-top: 12px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 11px;
            color: #6b7280;
        }
    </style>
</head>

<body>
    <!-- Action Buttons -->
    <div class="no-print" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1000;">
        <div class="action-buttons">
            <button onclick="window.print()" class="btn btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                Cetak Struk
            </button>
            <button onclick="window.close()" class="btn btn-secondary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Tutup
            </button>
        </div>
    </div>

    <div class="receipt-container">
        <!-- Header -->
        <div class="receipt-header">
            <div class="store-name">🏪 TOKO ABC</div>
            <div class="store-tagline">Solusi Kebutuhan Harian Anda</div>
        </div>

        <!-- Content -->
        <div class="receipt-content">
            <!-- Order Header -->
            <div class="order-header">
                <div class="order-number">#{{ $order->order_number }}</div>
                @if($order->status === 'completed')
                    <div class="order-status status-completed">✓ LUNAS</div>
                @elseif($order->status === 'cancelled')
                    <div class="order-status status-cancelled">✗ DIBATALKAN</div>
                @endif
            </div>

            <!-- Order Information -->
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Tanggal</span>
                    <span class="info-value">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Kasir</span>
                    <span class="info-value">{{ $order->cashier_name }}</span>
                </div>
                @if($order->customer_name)
                    <div class="info-item">
                        <span class="info-label">Customer</span>
                        <span class="info-value">{{ $order->customer_name }}</span>
                    </div>
                @endif
                <div class="info-item">
                    <span class="info-label">Metode Bayar</span>
                    <span class="info-value uppercase">{{ $order->payment_method }}</span>
                </div>
            </div>

            <!-- Barcode -->
            <div class="barcode">
                @for($i = 0; $i < 20; $i++)
                    <div class="barcode-line" style="width: {{ rand(20, 95) }}%; margin-left: {{ rand(0, 10) }}%;"></div>
                @endfor
                <div class="barcode-number">{{ $order->order_number }}</div>
            </div>

            <!-- Items -->
            <div class="section-title">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                ITEM PEMBELIAN
            </div>
            <div class="items-list">
                @foreach($order->items as $item)
                    <div class="item-row">
                        <div class="item-info">
                            <div class="item-name">{{ $item->product_name }}</div>
                            <div class="item-sku">SKU: {{ $item->product_sku }}</div>
                            <div class="item-quantity">Qty: {{ $item->quantity }}</div>
                        </div>
                        <div class="item-price">
                            <div class="item-total">Rp {{ number_format($item->total, 0, ',', '.') }}</div>
                            <div class="item-unit">@ Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Summary -->
            <div class="summary-section">
                <div class="summary-row">
                    <span class="summary-label">Subtotal ({{ $order->total_items }} items)</span>
                    <span class="summary-value">Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Pajak (10%)</span>
                    <span class="summary-value">Rp {{ number_format($order->tax, 0, ',', '.') }}</span>
                </div>
                @if($order->shipping > 0)
                    <div class="summary-row">
                        <span class="summary-label">Ongkos Kirim</span>
                        <span class="summary-value">Rp {{ number_format($order->shipping, 0, ',', '.') }}</span>
                    </div>
                @endif
                @if($order->discount > 0)
                    <div class="summary-row">
                        <span class="summary-label">Diskon</span>
                        <span class="summary-value" style="color: #ef4444;">- Rp
                            {{ number_format($order->discount, 0, ',', '.') }}</span>
                    </div>
                @endif
                <div class="summary-row summary-total">
                    <span class="total-label">TOTAL</span>
                    <span class="total-value">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Payment Info -->
            <div class="payment-section">
                <div class="payment-row">
                    <span class="payment-label">Uang Dibayar</span>
                    <span class="payment-value">Rp {{ number_format($order->cash_paid, 0, ',', '.') }}</span>
                </div>
                <div class="payment-row payment-change">
                    <span class="payment-label">Kembalian</span>
                    <span class="change-value">Rp {{ number_format($order->change_amount, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Notes -->
            @if($order->notes)
                <div class="notes-section">
                    <div class="notes-label">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        CATATAN
                    </div>
                    <div class="notes-content">{{ $order->notes }}</div>
                </div>
            @endif
        </div>

        <!-- Footer -->
        <div class="receipt-footer">
            <div class="thank-you">Terima Kasih!</div>
            <div class="footer-text">
                Barang yang sudah dibeli<br>
                tidak dapat ditukar/dikembalikan
            </div>
            <div class="store-contact">
                <div class="contact-item">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    021-1234-5678
                </div>
                <div class="contact-item">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    info@tokoabc.com
                </div>
            </div>
            <div class="print-time">
                Dicetak: {{ now()->format('d/m/Y H:i:s') }}
            </div>
        </div>
    </div>

    <script>
        // Auto print on load (optional)
        // window.onload = function() {
        //     setTimeout(() => {
        //         window.print();
        //     }, 1000);
        // }
    </script>
</body>

</html>

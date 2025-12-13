<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pembayaran Midtrans - MeTime</title>
    @if(config('services.midtrans.isProduction'))
        <script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
    @else
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
    @endif
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .payment-container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        .payment-icon {
            width: 80px;
            height: 80px;
            background: #ff6633;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 40px;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
            font-size: 24px;
        }

        .order-info {
            background: #f8f8f8;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
        }

        .order-info p {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            color: #666;
        }

        .order-info p strong {
            color: #333;
        }

        .total {
            font-size: 20px;
            color: #ff6633;
            font-weight: bold;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid #ddd;
        }

        .btn-pay {
            background: #ff6633;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 15px 40px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 20px;
            transition: 0.3s;
        }

        .btn-pay:hover {
            background: #ff3300;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(255, 102, 51, 0.4);
        }

        .loading {
            display: none;
            margin-top: 20px;
        }

        .loading.active {
            display: block;
        }

        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #ff6633;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #666;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover {
            color: #ff6633;
        }
    </style>
</head>

<body>
    <div class="payment-container">
        <h2>Pembayaran Midtrans</h2>
        <p style="color: #666; margin-bottom: 20px;">Order #{{ $order->id }}</p>

        <div class="order-info">
            <p>
                <span>Customer:</span>
                <strong>{{ $order->customer_name }}</strong>
            </p>
            <p>
                <span>Tanggal:</span>
                <strong>{{ \Carbon\Carbon::parse($order->order_date)->format('d M Y') }}</strong>
            </p>
            @if($order->booking)
            <p>
                <span>Meja:</span>
                <strong>{{ $order->booking->table->table_number }}</strong>
            </p>
            @else
            <p>
                <span>Tipe:</span>
                <strong>Take Away</strong>
            </p>
            @endif
            <p class="total">
                <span>Total:</span>
                <span>Rp{{ number_format($order->total_amount, 0, ',', '.') }}</span>
            </p>
        </div>

        <button id="pay-button" class="btn-pay">Bayar Sekarang</button>

        <div class="loading">
            <div class="spinner"></div>
            <p style="margin-top: 10px; color: #666;">Memproses pembayaran...</p>
        </div>

    </div>

    <script>
        document.getElementById('pay-button').addEventListener('click', function() {

            document.querySelector('.loading').classList.add('active');
            document.getElementById('pay-button').disabled = true;


            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    console.log('success', result);

                    window.location.href = "{{ route('orders.show', $order->id) }}?payment=success";
                },
                onPending: function(result) {
                    console.log('pending', result);

                    window.location.href = "{{ route('orders.show', $order->id) }}?payment=pending";
                },
                onError: function(result) {
                    console.log('error', result);
                    alert('Pembayaran gagal! Silakan coba lagi.');
                    document.querySelector('.loading').classList.remove('active');
                    document.getElementById('pay-button').disabled = false;
                },
                onClose: function() {
                    console.log('customer closed the popup without finishing the payment');
                    alert('Anda menutup popup pembayaran. Silakan coba lagi jika ingin melanjutkan pembayaran.');
                    document.querySelector('.loading').classList.remove('active');
                    document.getElementById('pay-button').disabled = false;
                }
            });
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Kasir - MeTime')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f2f2f2;
            color: #333;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .main-content {
            flex: 1;
            background-color: #fff;
            border-radius: 20px 0 0 20px;
            padding: 30px;
            overflow-y: auto;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .alert-error {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .alert-warning {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
        }

        .alert-info {
            background-color: #d1ecf1;
            border: 1px solid #bee5eb;
            color: #0c5460;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header h2 {
            font-size: 28px;
            color: #222;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .main-content {
                border-radius: 20px 20px 0 0;
                padding: 20px;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    <div class="container">
        @include('components.sidebar')

        <main class="main-content">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ $message }}
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-error">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    {{ $message }}
                </div>
            @endif

            @if ($message = Session::get('warning'))
                <div class="alert alert-warning">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    {{ $message }}
                </div>
            @endif

            @if ($message = Session::get('info'))
                <div class="alert alert-info">
                    <i class="fa-solid fa-circle-info"></i>
                    {{ $message }}
                </div>
            @endif

            @yield('content')
        </main>

        @yield('right-sidebar')
    </div>

    @stack('scripts')
</body>
</html>

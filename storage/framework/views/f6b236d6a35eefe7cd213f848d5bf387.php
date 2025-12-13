<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #000 0%, #333 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .error-container {
            text-align: center;
            padding: 40px;
        }

        .error-icon {
            font-size: 120px;
            color: #ff6633;
            margin-bottom: 20px;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }

        h1 {
            font-size: 72px;
            margin-bottom: 10px;
            color: #ff6633;
        }

        h2 {
            font-size: 32px;
            margin-bottom: 20px;
            font-weight: 400;
        }

        p {
            font-size: 18px;
            color: #ccc;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .btn-back {
            display: inline-block;
            padding: 15px 40px;
            background-color: #ff6633;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 102, 51, 0.3);
        }

        .btn-back:hover {
            background-color: #e45522;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 102, 51, 0.4);
        }

        .btn-back i {
            margin-right: 8px;
        }

        .info-box {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin: 30px auto;
            max-width: 500px;
            border: 1px solid rgba(255, 102, 51, 0.3);
        }

        .info-box p {
            margin: 0;
            font-size: 14px;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="error-container">
       
        <h1>403</h1>
        <h2>Akses Ditolak</h2>
      
    </div>
</body>
</html>
<?php /**PATH C:\Users\VICTUS\Downloads\metimev2\resources\views/errors/403.blade.php ENDPATH**/ ?>
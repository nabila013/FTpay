<!DOCTYPE html>
<html>
<head>
    <title>Selamat Datang di Aplikasi FTpay</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('assets/img/backgrounds/bg.png');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .welcome-container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 5px;
            z-index: 1;
        }

        .button-container {
            margin-top: 20px;
        }

        .button {
            background-color: #39a388;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 20px;
            margin-right: 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Aplikasi FTpay</h1>
        <div class="button-container">
            <a href="{{ route('login') }}" class="button">Login Operator</a>
            <a href="{{ route('login.wali') }}" class="button">Login Mahasiswa</a>
        </div>
    </div>
</body>
</html>

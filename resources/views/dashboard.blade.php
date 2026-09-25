<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Smart Locker System</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            background: #eef1f6;
            font-family: 'Poppins', sans-serif;
        }

        .screen {
            width: 100%;
            max-width: 420px;
            min-height: 100vh;
            background: #f7f8fa;
            padding: 64px 32px 32px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .logo { width: 190px; height: auto; margin-bottom: 8px; }
        .title { margin: 16px 0 0; font-size: 22px; font-weight: 600; color: #0f172a; }
        .subtitle { margin: 8px 0 32px; font-size: 13px; color: #1e293b; }

        .card {
            width: 100%;
            background: #fff;
            border: 1px solid #dbe1ea;
            border-radius: 10px;
            padding: 16px;
            text-align: left;
            margin-bottom: 24px;
        }

        .card p { margin: 0 0 8px; font-size: 13px; color: #1e293b; }
        .card p:last-child { margin-bottom: 0; }
        .card strong { color: #0f172a; font-weight: 500; }

        .btn {
            width: 100%;
            height: 44px;
            border: none;
            border-radius: 10px;
            background: #1e3a8a;
            color: #fff;
            font-family: inherit;
            font-size: 15px;
            cursor: pointer;
            transition: background .2s;
        }

        .btn:hover { background: #172f6e; }
    </style>
</head>
<body>
    <main class="screen">
        <img class="logo" src="{{ asset('images/smart-locker-logo.png') }}" alt="Smart Locker System">

        <h1 class="title">Hello, {{ auth()->user()->name }} 👋</h1>
        <p class="subtitle">You are logged in to Smart Locker System</p>

        <div class="card">
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Phone:</strong> {{ auth()->user()->phone ?? '-' }}</p>
        </div>

        <form style="width:100%" method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn" type="submit">Log out</button>
        </form>
    </main>
</body>
</html>
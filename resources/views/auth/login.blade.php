<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autentificare | Modern Auth</title>
    <style>
        :root {
            --cafeniu-inchis: #4e342e;
            --cafeniu-mediu: #795548;
            --bej-deschis: #f5f5f5;
            --bej-fundal: #efebe9;
            --alb: #ffffff;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bej-fundal);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background: var(--alb);
            padding: 40px;
            border-radius: 25px; /* Colțuri rotunjite cerute */
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 380px;
        }

        h2 {
            color: var(--cafeniu-inchis);
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: var(--cafeniu-mediu);
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid var(--bej-deschis);
            border-radius: 15px; /* Colțuri rotunjite la input */
            box-sizing: border-box;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            border-color: var(--cafeniu-mediu);
        }

        .btn {
            width: 100%;
            padding: 14px;
            background-color: var(--cafeniu-inchis);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: var(--cafeniu-mediu);
            transform: translateY(-2px);
        }

        .error-msg {
            background-color: #ffebee;
            color: #c62828;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
        }

        .footer-link {
            text-align: center;
            margin-top: 25px;
            color: var(--cafeniu-mediu);
        }

        .footer-link a {
            color: var(--cafeniu-inchis);
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Autentificare</h2>

    {{-- Mesaj de succes de la Register --}}
    @if(session('success'))
        <div style="background: #e8f5e9; color: #2e7d32; padding: 10px; border-radius: 10px; margin-bottom: 20px; text-align: center;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Erori de logare --}}
    @if($errors->any())
        <div class="error-msg">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="adresa@email.com" required>
        </div>

        <div class="form-group">
            <label>Parolă</label>
            <input type="password" name="password" placeholder="********" required>
        </div>

        <button type="submit" class="btn">Intră în cont</button>
    </form>

    <div class="footer-link">
        Nu ai cont? <a href="{{ route('register') }}">Înregistrează-te</a>
    </div>
</div>

</body>
</html>
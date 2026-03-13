<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Înregistrare | Modern Auth</title>
    <style>
        :root {
            --cafeniu-inchis: #4e342e;
            --cafeniu-mediu: #795548;
            --bej-deschis: #f5f5f5;
            --bej-fundal: #efebe9;
            --accent-verde: #556b2f;
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
            border-radius: 20px; /* Colțuri foarte rotunjite */
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            color: var(--cafeniu-inchis);
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
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
            border-radius: 12px; /* Input-uri rotunjite */
            box-sizing: border-box;
            transition: border-color 0.3s ease;
            outline: none;
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
            border-radius: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: var(--cafeniu-mediu);
            transform: translateY(-2px);
        }

        .error-msg {
            color: #d32f2f;
            font-size: 13px;
            margin-top: 5px;
        }

        .footer-link {
            text-align: center;
            margin-top: 20px;
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
    <h2>Creează Cont</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label>Nume Complet</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Ex: Ion Popescu" required>
            @error('name') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Adresa Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="nume@exemplu.com" required>
            @error('email') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Parolă</label>
            <input type="password" name="password" placeholder="Minim 6 caractere" required>
            @error('password') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Confirmă Parola</label>
            <input type="password" name="password_confirmation" placeholder="Repetă parola" required>
        </div>

        <button type="submit" class="btn">Înregistrare</button>
    </form>

    <div class="footer-link">
        Ai deja un cont? <a href="{{ route('login') }}">Loghează-te</a>
    </div>
</div>

</body>
</html>
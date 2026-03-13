<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Modern Auth</title>
    <style>
        :root {
            --cafeniu-inchis: #4e342e;
            --cafeniu-mediu: #795548;
            --bej-fundal: #efebe9;
            --alb: #ffffff;
            --accent-verde: #6d824d;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--bej-fundal);
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        /* Navigație superioară */
        nav {
            width: 100%;
            background: var(--cafeniu-inchis);
            padding: 15px 0;
            display: flex;
            justify-content: space-around;
            align-items: center;
            color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .nav-logo { font-weight: bold; font-size: 1.2rem; }

        /* Container Principal */
        .dashboard-container {
            width: 90%;
            max-width: 800px;
            margin-top: 50px;
        }

        .welcome-card {
            background: var(--alb);
            padding: 40px;
            border-radius: 25px; /* Colțuri foarte rotunde */
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            text-align: center;
        }

        .profile-icon {
            width: 80px;
            height: 80px;
            background: var(--bej-fundal);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
            font-size: 30px;
            color: var(--cafeniu-mediu);
        }

        h1 { color: var(--cafeniu-inchis); margin-bottom: 10px; }
        p { color: var(--cafeniu-mediu); font-size: 1.1rem; }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .stat-item {
            background: var(--bej-fundal);
            padding: 20px;
            border-radius: 15px;
            border: 1px solid rgba(121, 85, 72, 0.1);
        }

        .stat-item span { display: block; color: var(--cafeniu-mediu); font-size: 0.9rem; }
        .stat-item strong { color: var(--cafeniu-inchis); font-size: 1.1rem; }

        /* Buton Logout */
        .btn-logout {
            margin-top: 30px;
            background-color: transparent;
            color: #d32f2f;
            border: 2px solid #d32f2f;
            padding: 10px 25px;
            border-radius: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background-color: #d32f2f;
            color: white;
        }
    </style>
</head>
<body>

    <nav>
        <div class="nav-logo">Sistem Autentificare</div>
        <div>Sesiune activă: <strong>{{ Auth::user()->name }}</strong></div>
    </nav>

    <div class="dashboard-container">
        <div class="welcome-card">
            <div class="profile-icon">👤</div>
            <h1>Bine ai revenit!</h1>
            <p>Ești conectat în siguranță la profilul tău.</p>

            <div class="stats-grid">
                <div class="stat-item">
                    <span>Nume Utilizator</span>
                    <strong>{{ Auth::user()->name }}</strong>
                </div>
                <div class="stat-item">
                    <span>Email</span>
                    <strong>{{ Auth::user()->email }}</strong>
                </div>
                <div class="stat-item">
                    <span>Membru din</span>
                    <strong>{{ Auth::user()->created_at->format('d.m.Y') }}</strong>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Închide Sesiunea</button>
            </form>
        </div>
    </div>

</body>
</html>
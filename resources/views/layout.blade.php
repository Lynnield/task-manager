<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Portfolio')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #050a14;
            --card-bg: #0f1623;
            --text-main: #e0f7fa;
            --text-muted: #8b9bb4;
            --accent-cyan: #00f3ff;
            --accent-purple: #bc13fe;
            --border-color: #1f2937;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            line-height: 1.6;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Tech Background Grid */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(rgba(0, 243, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 243, 255, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            pointer-events: none;
            z-index: -1;
        }

        nav {
            background: rgba(5, 10, 20, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        nav a {
            color: var(--text-main);
            text-decoration: none;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.9rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: color 0.3s ease, text-shadow 0.3s ease;
            position: relative;
        }

        nav a:hover, nav a.active {
            color: var(--accent-cyan);
            text-shadow: 0 0 8px rgba(0, 243, 255, 0.5);
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent-cyan);
            transition: width 0.3s ease;
        }

        nav a:hover::after {
            width: 100%;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 2rem;
            flex: 1;
            width: 100%;
        }

        h1, h2, h3 {
            font-family: 'Orbitron', sans-serif;
            color: var(--accent-cyan);
        }

        footer {
            text-align: center;
            padding: 2rem;
            background: var(--card-bg);
            border-top: 1px solid var(--border-color);
            color: var(--text-muted);
            margin-top: auto;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            nav ul {
                gap: 1.5rem;
                font-size: 0.8rem;
            }
            .container {
                padding: 2rem 1rem;
            }
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('projects') }}">Projects</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        <p>&copy; {{ date('Y') }} My Portfolio. System Online.</p>
    </footer>
</body>
</html>
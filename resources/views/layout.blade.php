<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Tasks for Today')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #f5f3ff;
            --card: #ffffff;
            --ink: #1e1b4b;
            --muted: #6b7280;
            --line: #e5e7eb;
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --accent: #ec4899;
            --green: #10b981;
            --amber: #f59e0b;
            --slate: #64748b;
            --radius: 18px;
            --shadow: 0 10px 30px -12px rgba(79, 70, 229, .25);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            color: var(--ink);
            background:
                radial-gradient(900px 400px at 10% -10%, #e0e7ff 0%, transparent 60%),
                radial-gradient(700px 400px at 100% 0%, #fce7f3 0%, transparent 55%),
                var(--bg);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* NAV */
        .nav {
            position: sticky; top: 0; z-index: 10;
            background: rgba(255,255,255,.75);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(99,102,241,.12);
        }
        .nav-inner {
            max-width: 1000px; margin: 0 auto;
            padding: 14px 24px;
            display: flex; align-items: center; justify-content: space-between;
            gap: 16px; flex-wrap: wrap;
        }
        .brand {
            font-family: 'Fraunces', serif; font-weight: 700; font-size: 1.35rem;
            color: var(--ink); text-decoration: none;
            display: flex; align-items: center; gap: 10px;
        }
        .brand-logo {
            width: 34px; height: 34px; border-radius: 10px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: grid; place-items: center; color: #fff; font-size: 1rem;
        }
        .links { display: flex; gap: 6px; }
        .links a {
            text-decoration: none; color: var(--muted);
            font-weight: 500; font-size: .92rem;
            padding: 8px 16px; border-radius: 999px;
            transition: all .2s;
        }
        .links a:hover { color: var(--primary-dark); background: #eef2ff; }
        .links a.active {
            color: #fff;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            box-shadow: 0 6px 16px -6px rgba(79,70,229,.6);
        }

        /* PAGE */
        main { flex: 1; max-width: 1000px; width: 100%; margin: 0 auto; padding: 40px 24px 60px; }

        .hero { margin-bottom: 28px; }
        .eyebrow {
            display: inline-block; font-size: .78rem; font-weight: 600;
            letter-spacing: .08em; text-transform: uppercase;
            color: var(--primary-dark); background: #e0e7ff;
            padding: 6px 12px; border-radius: 999px; margin-bottom: 14px;
        }
        h1 {
            font-family: 'Fraunces', serif; font-size: clamp(2rem, 5vw, 2.9rem);
            line-height: 1.1; margin-bottom: 10px;
        }
        .lead { color: var(--muted); font-size: 1.05rem; max-width: 560px; line-height: 1.6; }

        .card {
            background: var(--card); border-radius: var(--radius);
            box-shadow: var(--shadow); border: 1px solid rgba(99,102,241,.08);
        }

        /* STATS */
        .stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 24px; }
        .stat { padding: 20px 22px; }
        .stat .num { font-family: 'Fraunces', serif; font-size: 2rem; font-weight: 700; }
        .stat .lbl { color: var(--muted); font-size: .85rem; margin-top: 2px; }

        /* TASK LIST */
        .task-list { list-style: none; }
        .task {
            display: flex; align-items: center; gap: 16px;
            padding: 18px 22px; border-bottom: 1px solid var(--line);
            transition: background .15s;
        }
        .task:last-child { border-bottom: none; }
        .task:hover { background: #faf9ff; }
        .dot { width: 12px; height: 12px; border-radius: 50%; flex-shrink: 0; }
        .dot.pending { background: var(--amber); box-shadow: 0 0 0 4px #fef3c7; }
        .dot.completed { background: var(--green); box-shadow: 0 0 0 4px #d1fae5; }
        .dot.other { background: var(--primary); box-shadow: 0 0 0 4px #e0e7ff; }
        .task-title { flex: 1; font-weight: 500; }
        .task.done .task-title { color: var(--muted); text-decoration: line-through; }

        .badge {
            font-size: .75rem; font-weight: 600; text-transform: capitalize;
            padding: 5px 12px; border-radius: 999px; white-space: nowrap;
        }
        .badge.pending { background: #fef3c7; color: #b45309; }
        .badge.completed { background: #d1fae5; color: #047857; }
        .badge.other { background: #e0e7ff; color: var(--primary-dark); }

        .empty { text-align: center; padding: 60px 20px; color: var(--muted); }
        .empty .big { font-size: 2.4rem; margin-bottom: 8px; }

        /* TABLE */
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th {
            text-align: left; font-size: .75rem; letter-spacing: .08em;
            text-transform: uppercase; color: var(--muted);
            padding: 16px 22px; background: #faf9ff; border-bottom: 1px solid var(--line);
        }
        td { padding: 16px 22px; border-bottom: 1px solid var(--line); }
        tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: #faf9ff; }
        .date-cell { white-space: nowrap; color: var(--muted); font-size: .9rem; }
        .today-pill {
            font-size: .68rem; font-weight: 700; color: #fff;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            padding: 3px 9px; border-radius: 999px; margin-left: 8px; vertical-align: middle;
        }

        /* PROFILE */
        .profile { overflow: hidden; max-width: 560px; }
        .profile-cover { height: 110px; background: linear-gradient(135deg, var(--primary), var(--accent)); }
        .profile-body { padding: 0 32px 32px; }
        .avatar {
            width: 96px; height: 96px; border-radius: 50%;
            background: #fff; border: 5px solid #fff; margin-top: -48px;
            display: grid; place-items: center;
            font-family: 'Fraunces', serif; font-size: 2.4rem; font-weight: 700;
            color: var(--primary-dark);
            background: linear-gradient(135deg, #e0e7ff, #fce7f3);
            box-shadow: 0 8px 20px -8px rgba(0,0,0,.3);
        }
        .profile h2 { font-family: 'Fraunces', serif; font-size: 1.7rem; margin-top: 14px; }
        .handle { color: var(--primary-dark); font-weight: 500; }
        .info { margin-top: 24px; display: grid; gap: 12px; }
        .info-row {
            display: flex; justify-content: space-between; gap: 16px;
            padding: 14px 18px; background: #faf9ff; border-radius: 12px;
        }
        .info-row .k { color: var(--muted); font-size: .88rem; }
        .info-row .v { font-weight: 600; text-align: right; word-break: break-word; }

        /* ABOUT */
        .about { padding: 36px; display: grid; gap: 28px; }
        .about h3 { font-family: 'Fraunces', serif; font-size: 1.25rem; margin-bottom: 8px; }
        .about p { color: #4b5563; line-height: 1.7; }
        .dev-box {
            display: flex; align-items: center; gap: 18px;
            padding: 20px; border-radius: 14px;
            background: linear-gradient(135deg, #eef2ff, #fdf2f8);
        }
        .dev-box .avatar { margin: 0; width: 70px; height: 70px; font-size: 1.7rem; border: 3px solid #fff; }
        .dev-box strong { font-size: 1.15rem; display: block; }
        .dev-box span { color: var(--muted); font-size: .9rem; }
        .chips { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 4px; }
        .chip {
            font-size: .82rem; font-weight: 500; padding: 7px 14px;
            border-radius: 999px; background: #e0e7ff; color: var(--primary-dark);
        }

        footer { text-align: center; color: var(--muted); font-size: .85rem; padding: 24px; }

        @media (max-width: 640px) {
            .stats { grid-template-columns: 1fr; }
            .task { flex-wrap: wrap; }
            .about { padding: 24px; }
        }
    </style>
</head>
<body>

    <nav class="nav">
        <div class="nav-inner">
            <a href="{{ route('welcome') }}" class="brand">
                <span class="brand-logo">✓</span> Tasks for Today
            </a>
            <div class="links">
                <a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'active' : '' }}">Home</a>
                <a href="{{ route('tasks') }}" class="{{ request()->routeIs('tasks') ? 'active' : '' }}">Task List</a>
                <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profile</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>© {{ date('Y') }} Tasks for Today Management System · Built with Laravel</footer>

</body>
</html>
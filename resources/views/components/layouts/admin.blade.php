<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Kaneez Masooma Portfolio</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body { background: var(--bg-base); color: var(--text-primary); }
        .admin-sidebar { background: var(--bg-elevated); min-height: 100vh; border-right: 1px solid var(--border-subtle); }
        .admin-sidebar a { color: var(--text-secondary); text-decoration: none; display: block; padding: 10px 16px; border-radius: 10px; }
        .admin-sidebar a:hover, .admin-sidebar a.active { background: var(--accent-soft); color: var(--accent); }
        .admin-card { background: var(--bg-card); border: 1px solid var(--border-subtle); border-radius: 14px; }
        table { color: var(--text-primary); }
        .form-control, .form-select { background: var(--bg-elevated); color: var(--text-primary); border-color: var(--border-subtle); }
        .form-control:focus, .form-select:focus { background: var(--bg-elevated); color: var(--text-primary); border-color: var(--accent); box-shadow: none; }
    </style>
</head>
<body>
    <div class="d-flex">
        <aside class="admin-sidebar p-3" style="width: 240px;">
            <h5 class="mb-4 px-2">Admin Panel</h5>
            <nav class="d-flex flex-column gap-1">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
                <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}"><i class="bi bi-kanban me-2"></i>Projects</a>
                <a href="{{ route('admin.skills.index') }}" class="{{ request()->routeIs('admin.skills.*') ? 'active' : '' }}"><i class="bi bi-stars me-2"></i>Skills</a>
                <a href="{{ route('admin.experiences.index') }}" class="{{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}"><i class="bi bi-briefcase me-2"></i>Experience</a>
                <a href="{{ route('admin.certifications.index') }}" class="{{ request()->routeIs('admin.certifications.*') ? 'active' : '' }}"><i class="bi bi-patch-check me-2"></i>Certifications</a>
                <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}"><i class="bi bi-envelope me-2"></i>Messages</a>
                <hr style="border-color: var(--border-subtle);">
                <a href="{{ route('home') }}" target="_blank"><i class="bi bi-box-arrow-up-right me-2"></i>View Site</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-2" style="color: var(--text-secondary); text-decoration: none;"><i class="bi bi-box-arrow-left me-2"></i>Logout</button>
                </form>
            </nav>
        </aside>

        <main class="flex-grow-1 p-4">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{ $slot }}
        </main>
    </div>
</body>
</html>

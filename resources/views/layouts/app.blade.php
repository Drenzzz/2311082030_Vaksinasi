<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Pendaftaran Vaksinasi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .actions-column {
            width: 150px;
        }
        .table-responsive {
            margin-bottom: 1rem;
        }
        .pagination {
            justify-content: flex-end;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="mb-4">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('pendaftar.index') }}">
                        <i class="fas fa-syringe me-2"></i>
                        Manajemen Vaksinasi
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('pendaftar.index') ? 'active' : '' }}" href="{{ route('pendaftar.index') }}">
                                    <i class="fas fa-list me-1"></i> Daftar Pendaftar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('pendaftar.create') ? 'active' : '' }}" href="{{ route('pendaftar.create') }}">
                                    <i class="fas fa-plus me-1"></i> Tambah Pendaftar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('pendaftar.trash') ? 'active' : '' }}" href="{{ route('pendaftar.trash') }}">
                                    <i class="fas fa-trash me-1"></i> Data Dihapus
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="mt-5 text-center text-muted">
            <p>&copy; {{ date('Y') }} Aplikasi Manajemen Pendaftaran Vaksinasi by Drenzzz</p>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript tambahan -->
    @stack('scripts')
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Ticketing</title>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- AdminLTE -->
    <link rel="stylesheet"
          href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </li>

        </ul>

    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <!-- Logo -->
        <a href="#" class="brand-link">

            <span class="brand-text font-weight-light">
                IT Ticketing
            </span>

        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Menu -->
            <nav class="mt-2">

                <ul class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu">

                    <li class="nav-item">

                        <a href="{{ route('ticket.index') }}"
                           class="nav-link">

                            <i class="nav-icon fas fa-ticket-alt"></i>

                            <p>Tickets</p>

                        </a>

                    </li>

                    <li class="nav-item">

                        <a href="{{ route('asset.index') }}"
                           class="nav-link">

                            <i class="nav-icon fas fa-laptop"></i>

                            <p>Assets</p>

                        </a>

                    </li>

                </ul>

            </nav>

        </div>

    </aside>

    <!-- Content -->
    <div class="content-wrapper">

        <section class="content pt-3">

            <div class="container-fluid">

                @yield('content')

            </div>

        </section>

    </div>

</div>

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
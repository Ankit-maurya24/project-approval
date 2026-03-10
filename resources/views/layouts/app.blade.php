<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel App</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboardStyle.css') }}" rel="stylesheet">

</head>

<body>

    <!-- Navbar -->

    <nav class="navbar px-3">

        <button class="btn btn-outline-light d-md-none" data-bs-toggle="collapse" data-bs-target="#sidebar">
            ☰
        </button>

        <a class="navbar-brand ms-2">Project-Approval</a>

        <div class="ms-auto">

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>

        </div>

    </nav>


    <div class="container-fluid">

        <div class="row">

            <!-- Sidebar -->

            <div class="col-md-2 sidebar collapse d-md-block p-0" id="sidebar">
                <a href="#">Dashboard</a>
                <a href="#">Users</a>
                <a href="#">Profile</a>
                <a href="#">Settings</a>
            </div>


            <!-- Main Content -->

            <div class="col-md-10 main-content">

                @yield('content')

            </div>

        </div>

    </div>


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>

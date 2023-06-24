<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>

    <!-- style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
</head>

<body>
    <header>

        <nav class="navbar">
            <div class="navbar-brand">
                <a class="navbar-logo" href="#">Logo</a>
            </div>
            <ul class="navbar-menu">
                <li class="navbar-item">
                    <a class="navbar-link" href="#">Home</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link" href="#">Pertanyaan</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link" href="{{ route('categories.index')}}">Kategori</a>
                </li>
            </ul>
            <ul>
                @if (Auth::user())
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a>
                        <a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Change Password</a>
                        <div class="dropdown-divider"></div>
                        <form action="#" method="post">
                            @csrf
                            <button style="margin-left: 45px;" type="submit" class="btn btn-dark">Logout</button>
                        </form>
                    </div>
                </div>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                @endif
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>

    </footer>


    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')
</body>

</html>
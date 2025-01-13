<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Research Grant Management System</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        @stack("headscript")
        <style>
            /* Custom CSS */
            body {
                font-family: 'Poppins', sans-serif;
            }
            .navbar {
                background-color: #004085;
            }
            .navbar-brand {
                font-weight: 600;
                font-size: 1.5rem;
                color: #fff;
            }
            .navbar-nav .nav-link {
                color: #f8f9fa;
                font-size: 1rem;
                margin-right: 15px;
            }
            .navbar-nav .nav-link:hover {
                color: #e0e0e0;
            }
            .header {
                background-color: #007bff;
                color: white;
                padding: 50px 20px;
                text-align: center;
            }
            .header h1 {
                font-size: 2.5rem;
                font-weight: bold;
            }
            .header p {
                font-size: 1.2rem;
            }
            footer {
                background-color: #343a40;
                color: #f8f9fa;
                padding: 20px 0;
                text-align: center;
            }
            footer a {
                color: #6c757d;
                text-decoration: none;
            }
            footer a:hover {
                color: #adb5bd;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">ResGrant Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{url('/homepage')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('grant.index')}}">Grants</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('academician.index')}}">Academician</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @guest
                        <!-- Show Register and Login if user is not logged in -->
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @else
                        <!-- Show Logout if user is logged in -->
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link" style="text-decoration: none;">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


        <div class="container-fluid">
            @yield("content")
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        @stack("bodyscript")
    </body>
</html>

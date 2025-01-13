<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>School Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        @stack("headscript")
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand justify-content-start" href="{{url('/dashboard')}}">School Management System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/dashboard')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('student.index')}}">Student</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('lecturer.index')}}">Lecturer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('subject.index')}}">Subject</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                User Profile
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if (Route::has('login'))
                                    @auth
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a
                                                href="{{ url('/dashboard') }}"
                                                class="nav-link"
                                            >
                                                Dashboard
                                            </a>
                                        </li>

                                    @else
                                        <li>
                                            <a
                                                href="{{ route('login') }}"
                                                class="nav-link"
                                                >
                                                Log in
                                            </a>
                                        </li>


                                        @if (Route::has('register'))
                                            <li>
                                                <a
                                                    href="{{ route('register') }}"
                                                    class="nav-link"
                                                >
                                                    Register
                                                </a>
                                            </li>

                                        @endif
                                    @endauth
                                @endif                                
                            </ul>
                        </li>

                    </ul>
                </div>

            </div>
        </nav>
        <div>
            @yield("content")
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        @stack("bodyscript")
    </body>
</html>
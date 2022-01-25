<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>M School - Selamat Datang di M School</title>
    <link rel="shorcut icon" href="{{ url('images/themes/icon.png') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('bs/css/bootstrap.min.css') }}" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('bs/css/font-awesome.min.css') }}" />
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="{{ url('bs/css/simple-line-icons.css') }} " />
    <!-- Slider / Carousel -->
    <link rel="stylesheet" href="{{ url('bs/css/slick.css') }} " />
    <link rel="stylesheet" href="{{ url('bs/css/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ url('bs/css/owl.carousel.min.css') }}" />
    <!-- Main CSS -->
    <link href="{{ url('bs/css/style.css') }}" rel="stylesheet" />
</head>

<body>

    <div class="header-topbar">
        <div class="container-fluid">
            <div class="row">
                <div class="text-white d-inline">Artikel Terbaru:</div>
                <div class="col">
                    <span class="text-white w-75">
                        <marquee>
                            <a href="#" class="text-white">OK</a>
                        </marquee>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div data-toggle="affix">
        <div class="container nav-menu2">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar2 navbar-toggleable-md navbar-light bg-faded">
                        <button class="navbar-toggler navbar-toggler2 navbar-toggler-right" type="button"
                            data-toggle="collapse" data-target="#navbarNavDropdown">
                            <span class="icon-menu"></span>
                        </button>
                        <a href="#" class="navbar-brand nav-brand2"><img class="img img-responsive" width="200px;"
                                src="{{ url('images/themes/logo-dark.png') }}" /></a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">Home</a>
                                </li>
                                {{-- <li class="nav-item">
                    <a class="nav-link" href="#"
                      >About</a
                    >
                  </li> --}}
                                {{-- <li class="nav-item">
                    <a class="nav-link" href="#"
                      >Guru</a
                    >
                  </li> --}}
                                {{-- <li class="nav-item">
                    <a class="nav-link" href="#"
                      >Siswa</a
                    >
                  </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="/artikel">Artikel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/pengumuman">Pengumuman</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/agenda">Agenda</a>
                                </li>
                                {{-- <li class="nav-item">
                    <a
                      class="nav-link"
                      href="#"
                      >Download</a
                    >
                  </li> --}}
                                {{-- <li class="nav-item">
                    <a class="nav-link" href="#"
                      >Gallery</a
                    >
                  </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                                @if (Auth::guest())
                                    <li class="nav-item">
                                        <a class="nav-link" href="/login">Login</a>
                                    </li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Welcome Back, {{ auth()->user()->username }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="{{ url('admin/dashboard') }}">
                                                    <i class="fa fa-tachometer"> </i> <span>Dashboard</span> </a>
                                            </li>

                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                            <li>
                                                <form action="/logout" method="post">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item"><i
                                                            class="fa fa-sign-out"></i> Log Out</button>
                                                </form>
                                            </li>

                                        </ul>

                                    </li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    </div>
</body>

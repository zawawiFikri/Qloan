<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Qlos-laundry</title>
    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icons/flags/flags.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/simple-calendar/simple-calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <!-- Add these lines to the head section -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.7/css/dataTables.bootstrap4.min.css">

    <!-- Add these lines just before the closing </body> tag -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.7/js/dataTables.bootstrap4.min.js"></script>

    {{-- message toastr --}}
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    <script src="{{ asset('assets/js/toastr_jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
</head>
<body>
    <header class="header" id="header">
        <nav class="nav container">
        <a href="#" class="nav__logo">
        <img src="{{ asset('images/logo_qlos.png') }}" alt="Logo" width="80" height="80"> 
        <i>QLOS LAUNDRY</i>
                </a>

                <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">About</a>
                    </li>
                    <li class="nav__item">
                        <a href="#steps" class="nav__link">Promo</a>
                    </li>
                    <li class="nav__item">
                        <a href="#products" class="nav__link">Layanan</a>
                    </li>
                    <li class="nav__item">
                        <a href="#faqs" class="nav__link">FAQs</a>
                    </li>
                    <li class="nav__item">
                        <a href="#contact" class="nav__link">Contact Us</a>
                    </li>
                    @if (auth()->user())
                        <li class="nav__item dropdown">
                            <a href="#" class="nav__link" data-bs-toggle="dropdown">
                                <h6>{{ auth()->user()->name }}</h6>
                            </a>
                            <div class="dropdown-menu">
                                <div class="user-header">
                                    <div class="avatar avatar-sm">
                                        @if(auth()->user()->avatar)
                                            <img src="{{ asset(auth()->user()->avatar) }}"
                                                alt="{{ auth()->user()->name }}" class="avatar-img rounded-circle" style="object-position: center top;">
                                        @else
                                            <img src="{{ asset('assets/img/avatar-01.png') }}" alt="{{ auth()->user()->name }}"
                                                class="avatar-img rounded-circle">
                                        @endif
                                    </div>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profil</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>

                    <div class="nav__close" id="nav-close">
                        <i class="ri-close-line"></i>
                    </div>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                @if (auth()->user())
                <a href="{{ route('profile.edit') }}" class="nav__link" style="margin-right: 20px; font-size: 16px;">Profile</a>
                <a href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                    class="nav__link" style="margin-right: 20px; font-size: 16px;">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endif
                        <i class="ri-menu-line"></i>
                </div>
        </nav>
    </header>

    <!-- Body Content -->
    @yield('content')

        <!--=============== SCROLL UP ===============-->
        <a href="#" class="scrollup" id="scroll-up"> 
            <i class="ri-arrow-up-fill scrollup__icon"></i>
        </a>

        <!--=============== SCROLL REVEAL ===============-->
        <script src="assets/js/scrollreveal.min.js"></script>
        
        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
</body>
</html>


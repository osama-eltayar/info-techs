<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Infotechs</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@yield('header')
    <!-- Bootstrap -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    @if(LaravelLocalization::getCurrentLocale() == 'ar')
        <link href="{{asset('css/rtl.css')}}" rel="stylesheet">
    @endif
    <link rel="icon" href="{{asset('media/element/fav.png')}}" type="image/x-icon">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="page-wrapper">
    <!-- Start Header-->
    <!-- aside dropdown start-->
    <div class="aside-dropdown">
        <div class="aside-dropdown__inner"><span class="aside-dropdown__close">
					<i class="far fa-times"></i></span>
            <div class="aside-dropdown__item d-lg-none d-block">
                <ul class="aside-menu">
                    <li class="aside-menu__item"><a class="aside-menu__link" href="index.html"><span>Home</span></a></li>
                    <li class="aside-menu__item"><a class="aside-menu__link" href="#"><span>Get to know us</span></a></li>
                    <li class="aside-menu__item"><a class="aside-menu__link" href="#"><span>Services</span></a></li>
                    <li class="aside-menu__item"><a class="aside-menu__link" href="#"><span> Our events</span></a></li>
                    <li class="aside-menu__item"><a class="aside-menu__link" href="#"><span>Join our team</span></a></li>
                    <li class="aside-menu__item"><a class="aside-menu__link" href="#"><span>Get in touch</span></a></li>
                </ul>
                @guest()
                    <div class="header-aus">
                        <a href="{{route('register')}}">Create new account  </a>
                        <span>|</span>
                        <a href="{{route('login')}}">Login</a>
                    </div>
                @endguest
            </div>


        </div>
    </div>
    <!-- aside dropdown end-->
    <!-- header start-->
    <header class="header header--front">
        <div class="container-fluid">
            <div class="row no-gutters justify-content-between">
                <div class="col-auto d-flex align-items-center left-header">
                    <div class="dropdown-trigger d-none">
                        <div class="dropdown-trigger__item"></div>
                    </div>
                    <div class="header-logo">
                        <a class="header-logo__link" href="{{route('courses.index')}}">
                            <img class="header-logo__img" src="{{asset('media/images/logomain.png')}}" alt="logo"/>
                        </a>
                    </div>
                </div>
                <div class="col-auto d-flex align-items-center">
                    <!-- main menu start-->
                    <nav>
                        <ul class="main-menu">
                            <li class="main-menu__item"><a class="main-menu__link active" href="#"><span>Home</span></a></li>
                            <li class="main-menu__item"><a class="main-menu__link" href="#"><span> Get to know us </span></a></li>
                            <li class="main-menu__item"><a class="main-menu__link" href="#"><span>Services</span></a></li>
                            <li class="main-menu__item"><a class="main-menu__link" href="{{route('courses.index',['my_events'=> 1])}}"><span>  Our events </span></a></li>
                            <li class="main-menu__item"><a class="main-menu__link" href="#"><span>Join our team</span></a></li>
                            <li class="main-menu__item"><a class="main-menu__link" href="#"><span>Get in touch</span></a></li>
                        </ul>
                    </nav>
                    <!-- main menu end-->
                </div>
                <div class="col-auto  right-header">
                    @auth()
                        <div class="user-dropdown">
                            <div class="dropdown">
                                <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span>Welcome, {{auth()->user()->name}} </span>
                                    <img src="{{asset('')}}media/images/user1.png" alt="user">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('profile.edit')}}"><i class="fa-solid fa-circle-user"></i> Update my profile <span class="status">Not updated</span></a>
                                    <a class="dropdown-item" href="{{route('password.reset')}}"><i class="fa-solid fa-lock-keyhole"></i> Change my password</a>
                                    <a class="dropdown-item" href="{{route('certificates.index')}}"><i class="fa-solid fa-file-certificate"></i> My certificates</a>
                                    <a class="dropdown-item" href="{{route('invoices.index')}}"><i class="fa-solid fa-file-invoice-dollar"></i> Invoices</a>
                                    <a class="dropdown-item" href="#"><i class="fa-solid fa-calendar-days"></i> My events</a>
                                    <a class="dropdown-item" href="#" onclick="$('#logout-form').submit()"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                                </div>
                            </div>
                        </div>
                        <form action="{{route('logout')}}" id="logout-form" method="post">
                            @csrf
                        </form>
                        <div class="nav-action">
                            <a href="{{route('shopping-cart.index')}}" class="cart-link">
                                <i class="fa-solid fa-cart-flatbed"></i> <span>My Cart</span> 0
                            </a>

                            <a href="" class="cart-link">
                                <i class="fa-solid fa-circle-heart"></i> <span>My Favorites</span> 0
                            </a>
                        </div>
                    @endauth
                    @guest()
                            <div class="header-aus">
                                <a href="{{route('register')}}">Create new account  </a>
                                <span>|</span>
                                <a href="{{route('login')}}">Login</a>
                            </div>
                    @endguest


                </div>
            </div>
        </div>
    </header>
    <!-- header end-->
    <!-- header end-->
    <main class="main">
        @yield('content')
    </main>

    <!-- Start Footer -->
    <footer>
        <div class="container-fluid">
            <div class="row no-gutters justify-content-between">
                <div class="col-auto d-flex align-items-center">
                    <img src="{{asset('media/images/logomain.png')}}" alt="logo">
                </div>
                <div class="col-auto text-center hidden-small">
                    <p>This platform is copy rights @2021 by infotechs.org</p>
                    <div class="social">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-auto d-flex align-items-center form-col-footer">
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Subscribe to our newsletter">
                            <button type="button" class="btn btn-default">Apply</button>
                        </div>
                    </form>
                </div>

                <div class="col-auto text-center hidden-large">
                    <p>This platform is copy rights @2021 by infotechs.org</p>
                    <div class="social">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

@yield('modals')
<script src="{{asset('js/common.min.js')}}"></script>
<script src="{{asset('js/layouts.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

@yield('script')
<script>

</script>
</body>

</html>



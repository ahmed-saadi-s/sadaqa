<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="sadaqa ">
    <meta name="keywords" content="sadaqa, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','صدقة')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>
<style>
    .nav-list {
    display: flex;
    justify-content: space-between; /* يضمن توزيع العناصر بالتساوي */
    gap: 20px; /* يحدد المسافة بين كل عنصر */
}

.nav-list li {
    list-style: none; /* إزالة النقاط من العناصر */
}

.nav-list a {
    text-decoration: none; /* إزالة الخط السفلي من الروابط */
    color: #000; /* لون النص */
}

.nav-list a:hover {
    color: #007bff; /* لون النص عند التمرير فوق الرابط */
}
</style>
<body dir="rtl">
    <!-- Page Preloader -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
       
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="{{ asset('img/logo.png') }}" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            @if (Auth::check())
                <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل خروج</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">تسجيل دخول</a>
                /
                <a href="{{ route('register') }}">تسجيل</a>
            @endif
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul class="nav-list">
                            <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">الرئيسية</a></li>
                            <li class="{{ Request::is('associations') ? 'active' : '' }}"><a href="{{ url('/associations') }}">الجمعيات</a></li>
                            <li class="{{ Request::is('calculate-zakat') ? 'active' : '' }}"><a href="{{ url('/calculate-zakat') }}">أحسب زكاتك </a></li>
                            <li class="{{ Request::is('about-us') ? 'active' : '' }}"><a href="{{ url('/about-us') }}">حول الموقع</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            @guest
                                <a href="{{ route('login') }}">تسجيل دخول /</a>

                                <a href="{{ route('register') }}">تسجيل </a>
                            @else
                                <div class="header__user">
                                    <span class="header__user__name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                    <a href="#" class="header__user__logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل خروج</a>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endguest
                        </div>
                        
                       
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <main>
        @yield('content')
    </main>
    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="شعار الموقع"></a>
                        </div>
                        <p>موقعنا يقدم خدمات التبرع للجمعيات الخيرية عبر طرق متعددة. نحن ملتزمون بتوفير أفضل التجارب للمستخدمين من خلال طرق التبرع السهلة والموثوقة.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="footer__widget">
                        <h6>روابط هامة</h6>
                        <ul>
                            <li><a href="{{ url('/') }}">الرئيسية</a></li>
                            <li><a href="{{ url('/associations') }}">الجمعيات</a></li>
                            <li><a href="{{ url('/calculate-zakat') }}">أحسب زكاتك</a></li>
                            <li><a href="{{ url('/about-us') }}">حول الموقع</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="footer__newslatter">
                        <h6>النشرة البريدية</h6>
                        <form action="#">
                            <input type="text" placeholder="البريد الإلكتروني" required>
                            <button type="submit" class="site-btn">اشترك</button>
                        </form>
                        <div class="footer__social">
                            <a href="#" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" aria-label="YouTube"><i class="fa fa-youtube-play"></i></a>
                            <a href="#" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" aria-label="Pinterest"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright__text">
                        <p>حقوق النشر &copy; <script>document.write(new Date().getFullYear());</script> جميع الحقوق محفوظة   </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    
    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="ابحث هنا...">
            </form>
        </div>
    </div>
    <!-- Search End -->
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>

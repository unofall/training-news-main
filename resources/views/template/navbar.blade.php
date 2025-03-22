<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="author" content="SemiColonWeb">
    <meta name="description"
        content="Get Canvas to build powerful websites easily with the Highly Customizable &amp; Best Selling Bootstrap Template, today.">

    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet"> --}}

    <!-- Core Style -->
    <link rel="stylesheet" href={{ asset('assets/style.css') }}>

    <!-- Font Icons -->
    <link rel="stylesheet" href={{ asset('assets/css/font-icons.css') }}>

    <!-- Plugins/Components CSS -->
    <link rel="stylesheet" href={{ asset('assets/css/swiper.css') }}>

    <!-- Custom CSS -->
    <link rel="stylesheet" href={{ asset('assets/css/custom.css') }}>
    <title>Document</title>
</head>

<body>
    <header id="header" class="full-header">
        <div id="header-wrap">
            <div class="container">
                <div class="header-row">
                    <div id="logo">
                        <a href="/show">
                            <img class="logo-default" src={{ asset('assets/images/logo@2x.png') }}
                                alt="Canvas Logo">
                            <img class="logo-dark" src={{ asset('assets/images/logo-dark@2x.png') }}
                                alt="Canvas Logo">
                        </a>
                    </div><!-- #logo end -->

                    <div class="header-misc">
                        <div id="top-search" class="header-misc-icon">
                            <a href="#" id="top-search-trigger"><i class="uil uil-search"></i><i
                                    class="bi-x-lg"></i></a>
                        </div><!-- #top-search end -->

                    </div>

                    <div class="primary-menu-trigger">
                        <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                            <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
                        </button>
                    </div>
                    <nav class="primary-menu">
                        <ul class="menu-container one-page-menu" data-easing="easeInOutExpo" data-speed="1500">
                            <li class="menu-item"><a class="menu-link" href="/show">
                                    <div>Home</div>
                                </a></li>
                            <li class="menu-item"><a class="menu-link" href="#" data-href="#popular">
                                    <div>Popular</div>
                                </a></li>
                            <li class="menu-item"><a class="menu-link" href="#"
                                    data-href="#section-travel">
                                    <div>Travel</div>
                                </a></li>
                            <li class="menu-item"><a class="menu-link" href="#" data-href="#section-work">
                                    <div>Topic</div>
                                </a></li>
                            <li class="menu-item"><a class="menu-link" href="#"
                                    data-href="#section-fashion">
                                    <div>Fashion</div>
                                </a></li>
                    
                            <li class="menu-item"><a class="menu-link" href="/logout" {{-- data-href="#section-contact" --}}>
                                    <div>Logout</div>
                                </a></li>
                        </ul>

                    </nav><!-- #primary-menu end -->

                    <form class="top-search-form" action="search.html" method="get">
                        <input type="text" name="q" class="form-control" value=""
                            placeholder="Type &amp; Hit Enter.." autocomplete="off">
                    </form>

                </div>
            </div>
        </div>
        <div class="header-wrap-clone"></div>
    </header>
    <div class="container pb-5" style="font-family: Poppins">
        @yield('content')
    </div>


    <!-- JavaScripts
 ============================================= -->
    <script src={{ asset('assets/js/plugins.min.js') }}></script>
    <script src={{ asset('assets/js/functions.bundle.js') }}></script>
</body>

</html>

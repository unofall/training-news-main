<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="author" content="SemiColonWeb">
    <meta name="description"
        content="Get Canvas to build powerful websites easily with the Highly Customizable &amp; Best Selling Bootstrap Template, today.">

    <!-- Font Icons -->
    <link rel="stylesheet" href="css/font-icons.css">

    <!-- Plugins/Components CSS -->
    <!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
    <link rel="stylesheet" href={{ asset('assets/include/rs-plugin/css/settings.css') }} media="screen">
    <link rel="stylesheet" href={{ asset('assets/include/rs-plugin/css/layers.css') }}>
    <link rel="stylesheet" href={{ asset('assets/include/rs-plugin/css/navigation.css') }}>
    <link rel="stylesheet" href={{ asset('assets/include/rs-plugin/css/addons/revolution.addon.filmstrip.css') }}>
    <link
        rel="stylesheet">



    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        #content h2{
            font-family: Poppins;
        }
        
        .masonry-gallery {
            column-count: 3;
            column-gap: 1rem;
        }

        .masonry-gallery img {
            width: 100%;
            height: 250px;
            display: block;
            margin-bottom: 1rem;
        }

        .view-count {
            position: absolute;
            top: 0;
            left: 0;
            background: transparent;
            color: white;
            padding: 0.5rem;
            border-radius: 0 0 0.5rem 0;
        }

        .heading-block h2 {
            font-family: Lato;
        }

        #rev_slider_21_1 .metis.tparrows:hover {
            background: rgba(255, 255, 255, 0.75)
        }

        #rev_slider_21_1 .metis.tparrows:before {
            color: rgb(0, 0, 0);
            transition: all 0.3s;
            -webkit-transition: all 0.3s;
        }

        #rev_slider_21_1 .metis.tparrows:hover:before {
            transform: scale(1.5);
        }

        .portfolio-image img {
            transition: transform 0.5s ease-in-out;
        }

        .portfolio-image:hover img {
            transform: scale(1.1);
        }

        .bg-overlay-bg {
            background-color: transparent !important;
            transition: none !important;
        }

        .before-heading {
            font-family: Poppins;

        }

        .entry-title h3 {
            font-family: Poppins;
        }

        .entry-content a {
            font-family: Poppins;
        }

        .zoom-hover {
            overflow: hidden;
        }

        .zoom-hover img {
            transition: transform 0.3s ease-in-out;
        }

        .zoom-hover:hover img {
            transform: scale(1.1);
        }

        .darken-image {
            filter: brightness(0.7);
            /* Atur nilai sesuai kebutuhan untuk menggelapkan gambar */
            transition: filter 0.3s ease-in-out;
        }

        .darken-image:hover {
            filter: brightness(1);
        }

        .view-count {
            position: absolute;
            top: 10px;
            left: 10px;
            background: transparent;
            color: white;
            padding: 5px;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }

        .view-count i {
            margin-right: 5px;
        }
    </style>

    @php
        use Carbon\Carbon;
    @endphp

    <!-- Document Title -->
    <title>Home - One Page Layout | Canvas</title>

</head>

<body class="stretched dark" style="font-family: Poppins;">

    <!-- Document Wrapper
 ============================================= -->
    <div id="wrapper">
        <div id="home" class="page-section"
            style="position:absolute;top:0;left:0;width:100%;height:200px;z-index:-2;"></div>
        <section id="slider" class="slider-element revslider-wrap h-auto">
            <div class="rev_slider_wrapper"
                style="margin:0px auto;background:#f3f3f3;padding:0px;margin-top:0px;margin-bottom:0px;">
                <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
                <div id="rev_slider_21_1" class="rev_slider fullscreenabanner" style="display:none;"
                    data-version="5.4.1">
                    <ul>
                        <!-- SLIDE  -->
                        <li data-index="rs-57" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                            data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                            data-masterspeed="300" data-thumb="" data-rotate="0" data-saveperformance="off"
                            data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4=""
                            data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10=""
                            data-description=""
                            data-filmstrip='{"direction":"right-to-left","filter":"none","times":"50,50,50,50","imgs":[{"url":"assets/img/Raja_Ampat.jpg","alt":""},{"url":"assets/img/Swiss.jpg","alt":""},{"url":"assets/img/2.jpg","alt":""},{"url":"assets/img/3.jpg","alt":""},{"url":"assets/img/5.jpg","alt":""}]}'>
                            <!-- MAIN IMAGE -->
                            <img src="assets/img/rent.png" data-bgcolor='#f5f5f5' style='background:#b2b2b2'
                                alt="Image" data-bgposition="center center" data-bgfit="cover"
                                data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-57-layer-2"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape"
                                data-basealign="slide" data-responsive_offset="on"
                                data-frames='[{"delay":10,"speed":600,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":600,"frame":"999","to":"opacity:0;","ease":"Power4.easeOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]" data-lasttriggerstate="reset"
                                style="z-index: 5;background-color:rgba(0, 0, 0, 0.35);"> </div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption   tp-resizeme" id="slide-57-layer-1"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                data-fontsize="['200','200','150','100']" data-lineheight="['200','200','150','100']"
                                data-width="full" data-height="full" data-whitespace="nowrap" data-type="text"
                                data-basealign="slide" data-responsive_offset="on"
                                data-frames='[{"delay":10,"speed":1000,"frame":"0","from":"opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"opacity:0;fb:20px;","ease":"Power4.easeOut"}]'
                                data-textAlign="['center','center','center','center']"
                                data-paddingtop="[137,197,297,327]" data-paddingright="[50,50,50,50]"
                                data-paddingbottom="[125,125,175,225]" data-paddingleft="[50,50,50,50]"
                                data-blendmode="screen" data-lasttriggerstate="reset"
                                style="z-index: 6; min-width: 100%; max-width: 100%; white-space: nowrap; font-size: 200px; line-height: 200px; font-weight: 300; color: rgba(0,0,0,1);font-family:Anton;background-color:rgb(171, 171, 171);">
                                MY<br>BLOGS </div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption rev-btn " id="slide-57-layer-4"
                                data-x="['right','right','right','right']" data-hoffset="['0','0','0','0']"
                                data-y="['top','top','top','top']" data-voffset="['0','0','0','0']" data-width="60"
                                data-height="60" data-whitespace="nowrap" data-type="button"
                                data-actions='[{"event":"click","action":"togglelayer","layerstatus":"visible","layer":"slide-57-layer-1","delay":""},{"event":"click","action":"togglelayer","layerstatus":"visible","layer":"slide-57-layer-2","delay":""},{"event":"click","action":"togglelayer","layerstatus":"visible","layer":"slide-57-layer-6","delay":""}]'
                                data-basealign="slide" data-responsive_offset="on" data-responsive="off"
                                data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"150","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1);bg:rgba(0, 0, 0, 1);bs:solid;bw:0 0 0 0;"}]'
                                data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                style="z-index: 7; min-width: 60px; max-width: 60px; max-width: 60px; max-width: 60px; white-space: nowrap; font-size: 17px; line-height: 60px; font-weight: 500; color: rgba(0,0,0,1);font-family:Roboto;background-color:rgba(255, 255, 255, 1);border-color:rgba(0, 0, 0, 1);outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                                <div class="rs-toggled-content"><i class="bi-box-arrow-up-right"></i> </div>
                                <div class="rs-untoggled-content"><i class="bi-fullscreen-exit"></i></div>
                            </div>
                        </li>
                    </ul>
                    <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                </div>
            </div>
            <!-- END REVOLUTION SLIDER -->

        </section>

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
                                <li class="menu-item"><a class="menu-link" href="#" data-href="#home">
                                        <div>Home</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="#" data-href="#popular">
                                        <div>Popular</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="#"
                                        data-href="#section-travel">
                                        <div>Travel</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="#"
                                        data-href="#section-topic">
                                        <div>Topic</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="#"
                                        data-href="#section-fashion">
                                        <div>Fashion</div>
                                    </a></li>

                                <li class="menu-item"><a class="menu-link" href="#"
                                        data-href="#section-team">
                                        <div>Team</div>
                                    </a></li>
                                <p></p>

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

        <section id="content" >
            <div class="content-wrap">
                <div class="section-popular">
                    <div class="container">
                        <div class="heading-block text-center" id="popular">
                            <h2><span>Popular</span></h2>
                            <span>Explore the Buzz: Popular Picks This Week</span>
                        </div>

                        @if ($popularBlogs->isEmpty())
                            <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                                <p class="text-muted font-weight-bold text-center">No Popular</p>
                            </div>
                        @else
                            <div
                                class="masonry-thumbs grid-container row row-cols-1 row-cols-md-2 row-cols-lg-3 block-gallery-9 masonry-gap-lg">
                                @foreach ($popularBlogs as $key => $blog)
                                    <div class="grid-item">
                                        <div class="grid-inner"
                                            style="background: linear-gradient(to bottom, transparent, rgba(0,0,0,.5) 65%, rgba(0,0,0,0.9) 100%), url({{ asset('storage/foto/' . $blog->foto) }}) no-repeat center center / cover; height: {{ $key == 0 ? '250px' : ($key == 1 ? '400px' : ($key == 2 ? '250px' : ($key == 3 ? '510px' : ($key == 4 ? '510px' : ($key == 5 ? '360px' : 'auto'))))) }}"
                                            data-aos="zoom-in-down" data-aos-delay="{{ 300 + $key * 400 }}">
                                            <div class="bg-overlay position-relative">
                                                <div
                                                    class="bg-overlay-content flex-column justify-content-end align-items-start px-5 py-4 dark">
                                                    <div class="entry-meta mb-3">
                                                        <ul style="font-size: 13px">
                                                            <li> {{ Carbon::parse($blog->created_at)->diffForHumans() }}
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);"
                                                                    class="like-btn text-danger"
                                                                    data-id="{{ $blog->id }}"
                                                                    style="background: transparent; text-decoration: none;">
                                                                    @if (Auth::check() && $blog->likes->contains(Auth::user()->id))
                                                                        <i class="fas fa-heart text-danger"></i>
                                                                        <span
                                                                            class="likes-count fw-bold">{{ $blog->likes_count }}
                                                                        </span>
                                                                    @else
                                                                        <i class="far fa-heart text-danger"></i><span
                                                                            class="likes-count fw-bold">{{ $blog->likes_count }}
                                                                        </span>
                                                                    @endif
                                                                </a>
                                                            </li>
                                                            <li><a href="blog-single.html#comments"><i
                                                                        class="uil uil-comments-alt"></i>
                                                                    {{ $blog->formatComments != null ? (int) $blog->formatComments : 0 }}
                                                                </a></li>

                                                        </ul>
                                                    </div>
                                                    <div class="entry-title title-sm">
                                                        <h3 class="mb-3"><a
                                                                href="/detail/{{ $blog->id }}">{{ $blog->title }}</a>
                                                        </h3>
                                                    </div>
                                                    {{-- <a href="#"><i class="bi-arrow-right btn-more"></i></a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                        @endif
                    </div>
                </div>
            </div>


            <section class="page-section mt-5" id="section-travel">
                <div class="container">
                    <div class="heading-block text-center">
                        <h2>News <span>Travel</span></h2>
                        <span>Explore the world, one destination at a time.</span>
                    </div>

                    @if ($blogs->isEmpty())
                        <div class="col-12 d-flex justify-content-center align-items-center" style="height: 200px;">
                            <p class="text-muted fs-4 font-weight-bold">Belum ada Blog yang diposting</p>
                        </div>
                    @else
                        <div id="portfolio" class="portfolio row portfolio-overlay-open g-0 text-center">
                            @foreach ($blogs as $key => $item)
                                <article class="portfolio-item col-12 col-sm-6 col-md-4 col-lg-4 pf-media pf-icons"
                                    data-aos="fade-up" data-aos-delay="{{ 600 + $key * 500 }}">
                                    <div class="grid-inner">
                                        <div class="grid-inner">
                                            <div class="portfolio-image">
                                                <a href="/detail/{{ $item->id }}">
                                                    <img class="darken-image"
                                                        style="width: 100%; height: 250px; object-fit: cover;"
                                                        src="{{ asset('storage/foto/' . $item->foto) }}"
                                                        >

                                                    <div class="bg-overlay">
                                                        <div class="bg-overlay-content dark flex-column">
                                                            <div class="portfolio-desc pt-">
                                                                <h3 style="font-family: Poppins">
                                                                    <a href="/detail/{{ $item->id }}">
                                                                        {{ $item->title }}</a>
                                                                </h3>
                                                            </div>
                                                            {{-- <div class="view-count"
                                                                    style="position: absolute; top: 10px; left: 10px; font-size: 12px;">
                                                                    <p class="mb-0">
                                                                        <i class="fas fa-eye m-2"></i>
                                                                        {{ $item->view_count }}
                                                                    </p>
                                                                </div> --}}
                                                            <div class="entry-meta">
                                                                <ul style="font-size: 12px;">
                                                                    <li><a href="javascript:void(0);"
                                                                            class="like-btn text-danger"
                                                                            data-id="{{ $item->id }}"
                                                                            style="background: transparent; text-decoration: none;">
                                                                            @if (Auth::check() && $item->likes->contains(Auth::user()->id))
                                                                                <i
                                                                                    class="fas fa-heart text-danger"></i>
                                                                                <span
                                                                                    class="likes-count fw-bold">{{ $item->likes_count }}
                                                                                </span>
                                                                            @else
                                                                                <i
                                                                                    class="far fa-heart text-danger"></i><span
                                                                                    class="likes-count fw-bold">{{ $item->likes_count }}
                                                                                </span>
                                                                            @endif
                                                                        </a></li>
                                                                    <li>
                                                                        <i class="uil uil-comments-alt"></i>
                                                                        {{ $item->formatComments != null ? (int) $item->formatComments : 0 }}
                                                                        </ </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);"
                                                                            class="share-btn"
                                                                            data-id="{{ $item->id }}"
                                                                            style="background: transparent; text-decoration: none;">
                                                                            <i class="uil uil-share"></i>
                                                                        </a>
                                                                    </li>


                                                                </ul>
                                                            </div>
                                                            {{-- <div class="view-count">
                                                                    <p class="mb-0">
                                                                        <i class="fas fa-heart m-2"></i> {{ $item->likes_count }}
                                                                    </p>
                                                                </div> --}}
                                                        </div>
                                                        <div class="bg-overlay-bg dark op-ts op-05"
                                                            data-hover-animate="op-1" data-hover-animate-out="op-05">
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                    @endif

                </div>
    </div>
    </section>



    <section id="section-topic" class="page-section mt-6">
        <div class="container">
            <div class="row col-mb-50 justify-content-center">
                <div class="heading-block text-center mt-5">
                    <h2><span>Topic</span></h2>
                    <span>Latest Updates, Straight From My World to Yours.</span>
                </div>
                <div class="clear mb-5"></div>
            </div>
            @if ($blogs->isEmpty())
                <div class="col-12 d-flex justify-content-center align-items-center" style="height: 200px;">
                    <p class="text-muted font-weight-bold">Belum ada Blog yang diposting</p>
                </div>
            @else
                @foreach ($blogs as $key => $item)
                    <div class="row posts-md col-mb-50">
                        <div class="entry col-md-6">
                            <div class="grid-inner row align-items-center" data-aos="zoom-in-down"
                                data-aos-delay="{{ 600 + $key * 600 }}">
                                <div class="col-lg-6">
                                    <div class="entry-image mb-0 zoom-hover" style="position: relative;">
                                        <a href="/detail/{{ $item->id }}"><img
                                                style="width: 100%; height: 200px; object-fit: cover"
                                                src="{{ asset('storage/foto/' . $item->foto) }}" alt=""></a>
                                        {{-- <div class="view-count"
                                                        style="position: absolute; top: 10px; left: 10px; color: white; padding: 5px; border-radius: 5px; font-size: 12px;">
                                                        <i class="fas fa-eye"></i> {{ $item->view_count }}
                                                    </div> --}}
                                    </div>
                                </div>

                                <div class="col-lg-6 mt-3 mt-lg-0 topic">
                                    <div class="d-flex justify-content-between text-muted" style="font-size: 13px">
                                        <span class="before-heading text-light">{{ $item->title }}</span>
                                        <span style="font-size: 12px; margin-top: 3px">
                                            <i class="uil uil-schedule"></i>
                                            {{ strtolower(\Carbon\Carbon::parse($item->created_at)->format('d M Y')) }}</span>
                                    </div>
                                    <div class="entry-title title-xs ">
                                        <p><a class="text-secondary"
                                                href="/detail/{{ $item->id }}">{!! Str::limit($item->description, 70, '...') !!}
                                        </p>
                                        </p>
                                    </div>
                                    <div class="entry-meta">
                                        <ul style="font-size: 12px;">
                                            <li><a href="javascript:void(0);" class="like-btn text-danger"
                                                    data-id="{{ $item->id }}"
                                                    style="background: transparent; text-decoration: none;">
                                                    @if (Auth::check() && $item->likes->contains(Auth::user()->id))
                                                        <i class="fas fa-heart text-danger"></i>
                                                        <span class="likes-count">{{ $item->likes_count }}
                                                        </span>
                                                    @else
                                                        <i class="far fa-heart text-danger"></i><span
                                                            class="likes-count">{{ $item->likes_count }}
                                                        </span>
                                                    @endif
                                                </a></li>
                                            <li>
                                                <a href="#"><i class="uil uil-comments-alt"></i>
                                                    {{ $item->formatComments != null ? (int) $item->formatComments : 0 }}</a>

                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="share-btn"
                                                    data-id="{{ $item->id }}"
                                                    style="background: transparent; text-decoration: none;">
                                                    <i class="uil uil-share"></i>
                                                </a>
                                            </li>


                                        </ul>
                                    </div>
                                    {{-- <div class="entry-content">
                                                    <a href="/detail/{{ $item->id }}" class="more-link">Read
                                                        more</a>
                                                </div> --}}
                                </div>
                            </div>
                        </div>
                @endforeach
            @endif
        </div>
        </div>

    </section>

    <section id="section-fashion">
        <div class="content-wrap">
            <div class="container">
                <div class="heading-block text-center mt-5">
                    <h2>News <span>Fashion</span></h2>
                    <span>Expressing Who I Am Through the Language of Fashion.</span>
                </div>
                @if ($blogs->isEmpty())
                    <div class="col-12 d-flex justify-content-center align-items-center" style="height: 200px;">
                        <p class="text-muted font-weight-bold">Belum ada Blog yang diposting</p>
                    </div>
                @else
                    <div
                        class="masonry-thumbs grid-container row row-cols-1 row-cols-md-2 row-cols-lg-3 block-gallery-9 masonry-gap-lg">
                        @foreach ($blogs as $key => $item)
                            <div class="grid-item">
                                <div class="grid-inner rounded"
                                    style=" background: linear-gradient(to bottom, transparent, rgba(0,0,0,.3) 75%, rgba(0,0,0,0.9) 100%), url({{ asset('storage/foto/' . $item->foto) }}) no-repeat center center / cover; height: 400px;"
                                    data-aos="fade-up" data-aos-delay="{{ 600 + $key * 400 }}">
                                    <div class="bg-overlay position-relative">
                                        {{-- <p class="mb-0 d-flex align-items-center" style="font-size: 13px">
                                                        <i class="fas fa-eye m-2"></i> {{ $item->view_count }}
                                                    </p> --}}
                                        <div
                                            class="bg-overlay-content flex-column justify-content-end align-items-start px-5 py-4 dark">

                                            <div class="entry-title title-sm">
                                                <h3><a href="/detail/{{ $item->id }}">{{ $item->title }}</a>
                                                </h3>
                                            </div>
                                            <div class="entry-meta mb-3">
                                                <ul>
                                                    <li style="font-size: 15px">
                                                        {{ strtolower(\Carbon\Carbon::parse($item->created_at)->format('d M Y')) }}
                                                    </li>
                                                    <li><a href="javascript:void(0);" class="like-btn text-danger"
                                                            data-id="{{ $item->id }}"
                                                            style="background: transparent; text-decoration: none;">
                                                            @if (Auth::check() && $item->likes->contains(Auth::user()->id))
                                                                <i class="fas fa-heart text-danger"></i>
                                                                <span class="likes-count">{{ $item->likes_count }}
                                                                </span>
                                                            @else
                                                                <i class="far fa-heart text-danger"></i><span
                                                                    class="likes-count">{{ $item->likes_count }}
                                                                </span>
                                                            @endif
                                                        </a></li>
                                                    <li>
                                                        <a href="detail/{{ $item->id }}"><i
                                                                class="uil uil-comments-alt"></i>
                                                            {{ (int) $item->formatComments }}</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            {{-- <a href=""><i class="bi-arrow-right btn-more"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                @endif
            </div>

        </div>
        </div>
    </section>

    <section id="section-team" class="page-section mt-6">

        <div class="heading-block text-center">
            <h2>Our <span>Team</span></h2>
            <span>People who have contributed enormously to our Company.</span>
        </div>

        <div class="container">

            <div class="row col-mb-50 mb-0">
                <div class="col-lg-6">

                    <div class="team team-list row align-items-center">
                        <div class="team-image col-sm-6">
                            <img src={{ asset('assets/images/team/3.jpg') }} alt="John Doe" class="rounded-6">
                        </div>
                        <div class="team-desc col-sm-6">
                            <div class="team-title">
                                <h4>John Doe</h4><span>CEO</span>
                            </div>
                            <div class="team-content">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Quaerat assumenda similique unde mollitia.</div>
                            <div class="d-flex justify-content-center mt-4">
                                <a href="#" class="social-icon si-small rounded-circle text-white bg-facebook">
                                    <i class="fa-brands fa-facebook-f"></i>
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-icon si-small rounded-circle text-white bg-x-twitter">
                                    <i class="fa-brands fa-x-twitter"></i>
                                    <i class="fa-brands fa-x-twitter"></i>
                                </a>
                                <a href="#" class="social-icon si-small rounded-circle text-white bg-google">
                                    <i class="fa-brands fa-google"></i>
                                    <i class="fa-brands fa-google"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="team team-list row align-items-center">
                        <div class="team-image col-sm-6">
                            <img src={{ asset('assets/images/team/4.jpg') }} alt="Nix Maxwell" class="rounded-6">
                        </div>
                        <div class="team-desc col-sm-6">
                            <div class="team-title">
                                <h4>Nix Maxwell</h4><span>Co-Founder</span>
                            </div>
                            <div class="team-content">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Quaerat assumenda similique unde mollitia.</div>
                            <div class="d-flex justify-content-center mt-4">
                                <a href="#" class="social-icon si-small rounded-circle text-white bg-forrst">
                                    <i class="fa-solid fa-tree"></i>
                                    <i class="fa-solid fa-tree"></i>
                                </a>
                                <a href="#" class="social-icon si-small rounded-circle text-white bg-skype">
                                    <i class="fa-brands fa-skype"></i>
                                    <i class="fa-brands fa-skype"></i>
                                </a>
                                <a href="#" class="social-icon si-small rounded-circle text-white bg-flickr">
                                    <i class="fa-brands fa-flickr"></i>
                                    <i class="fa-brands fa-flickr"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-100"></div>
            </div>

            <div class="clear"></div>
        </div>

        <div class="section parallax scroll-detect py-6">
            <img src="images/parallax/3.jpg" class="parallax-bg">
            <div class="heading-block text-center border-bottom-0 mb-0">
                <h2>"Everything is designed, but some things are designed well."</h2>
            </div>
        </div>

    </section>

    <section id="section-contact" class="page-section">

        <div class="heading-block text-center">
            <h2>Get in Touch with us</h2>
            <span>Still have Questions? Contact Us using the Form below.</span>
        </div>

        <div class="container">

            <div class="row align-items-stretch col-mb-50 mb-0">
                <!-- Contact Form -->
                <div class="col-lg-6">

                    <div class="fancy-title title-border">
                        <h3>Send us an Email</h3>
                    </div>

                    <div class="form-widget">
                        <div class="form-result"></div>

                        <form class="mb-0" id="template-contactform" name="template-contactform"
                            action="include/form.php" method="post">
                            <div class="form-process">
                                <div class="css3-spinner">
                                    <div class="css3-spinner-scaler"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="template-contactform-name">Name <small>*</small></label>
                                    <input type="text" id="template-contactform-name"
                                        name="template-contactform-name" value=""
                                        class="form-control required">
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="template-contactform-email">Email <small>*</small></label>
                                    <input type="email" id="template-contactform-email"
                                        name="template-contactform-email" value=""
                                        class="required email form-control">
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="template-contactform-phone">Phone</label>
                                    <input type="text" id="template-contactform-phone"
                                        name="template-contactform-phone" value="" class="form-control">
                                </div>

                                <div class="w-100"></div>

                                <div class="col-md-8 form-group">
                                    <label for="template-contactform-subject">Subject
                                        <small>*</small></label>
                                    <input type="text" id="template-contactform-subject" name="subject"
                                        value="" class="required form-control">
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="template-contactform-service">Services</label>
                                    <select id="template-contactform-service" name="template-contactform-service"
                                        class="form-select">
                                        <option value="">-- Select One --</option>
                                        <option value="Wordpress">Wordpress</option>
                                        <option value="PHP / MySQL">PHP / MySQL</option>
                                        <option value="HTML5 / CSS3">HTML5 / CSS3</option>
                                        <option value="Graphic Design">Graphic Design</option>
                                    </select>
                                </div>

                                <div class="w-100"></div>

                                <div class="col-12 form-group">
                                    <label for="template-contactform-message">Message
                                        <small>*</small></label>
                                    <textarea class="required form-control" id="template-contactform-message" name="template-contactform-message"
                                        rows="6" cols="30"></textarea>
                                </div>

                                <div class="col-12 form-group d-none">
                                    <input type="text" id="template-contactform-botcheck"
                                        name="template-contactform-botcheck" value="" class="form-control">
                                </div>

                                <div class="col-12 form-group">
                                    <button class="button button-3d m-0" type="submit"
                                        id="template-contactform-submit" name="template-contactform-submit"
                                        value="submit">Send
                                        Message</button>
                                </div>
                            </div>

                            <input type="hidden" name="prefix" value="template-contactform-">

                        </form>
                    </div>

                </div><!-- Contact Form End -->


                <div class="col-lg-6 min-vh-50 d-flex">
                    <div class="row">
                        <div class="col-6">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="uil uil-map-marker"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3>Our Headquarters<span class="subtitle">Jakarta, Indonesia</span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="bi-telephone"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3>Speak to Us<span class="subtitle">(123) 456 7890</span></h3>
                                </div>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="bi-skype"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3>Make a Video Call<span class="subtitle">CanvasOnSkype</span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3>Follow on Twitter<span class="subtitle">2.3M Followers</span></h3>
                                </div>
                            </div>
                        </div>
                    </div><!-- Google Map End -->
                </div>
            </div>
    </section>
    </div>
    </section>
    <!-- #content end -->

    <!-- Footer -->
    <footer id="footer" class="dark">
        <div id="copyrights">
            <div class="container">

                <div class="row col-mb-30">

                    <div class="col-md-6 text-center text-md-start">
                        Copyrights &copy; 2023 All Rights Reserved by Canvas Inc.<br>
                        <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy
                                Policy</a></div>
                    </div>

                    <div class="col-md-6 text-center text-md-end">
                        <div class="d-flex justify-content-center justify-content-md-end mb-2">
                            <a href="#" class="social-icon border-transparent si-small h-bg-facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>

                            <a href="#" class="social-icon border-transparent si-small h-bg-x-twitter">
                                <i class="fa-brands fa-x-twitter"></i>
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>

                            <a href="#" class="social-icon border-transparent si-small h-bg-google">
                                <i class="fa-brands fa-google"></i>
                                <i class="fa-brands fa-google"></i>
                            </a>

                            <a href="#" class="social-icon border-transparent si-small h-bg-pinterest">
                                <i class="fa-brands fa-pinterest-p"></i>
                                <i class="fa-brands fa-pinterest-p"></i>
                            </a>

                            <a href="#" class="social-icon border-transparent si-small h-bg-vimeo">
                                <i class="fa-brands fa-vimeo-v"></i>
                                <i class="fa-brands fa-vimeo-v"></i>
                            </a>

                            <a href="#" class="social-icon border-transparent si-small h-bg-github">
                                <i class="fa-brands fa-github"></i>
                                <i class="fa-brands fa-github"></i>
                            </a>

                            <a href="#" class="social-icon border-transparent si-small h-bg-yahoo">
                                <i class="fa-brands fa-yahoo"></i>
                                <i class="fa-brands fa-yahoo"></i>
                            </a>

                            <a href="#" class="social-icon border-transparent si-small me-0 h-bg-linkedin">
                                <i class="fa-brands fa-linkedin"></i>
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                        </div>

                        <i class="bi-envelope"></i> info@canvas.com <span class="middot">&middot;</span> <i
                            class="fa-solid fa-phone"></i> +1-11-6541-6369 <span class="middot">&middot;</span> <i
                            class="bi-skype"></i> CanvasOnSkype
                    </div>

                </div>

            </div>
        </div><!-- #copyrights end -->
    </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
 ============================================= -->
    <div id="gotoTop" class="uil uil-angle-up"></div>

    <!-- JavaScripts
 ============================================= -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src={{ asset('assets/js/plugins.min.js') }}></script>
    <script src={{ asset('assets/js/functions.bundle.js') }}></script>

    <!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
    <script src={{ asset('assets/include/rs-plugin/js/jquery.themepunch.tools.min.js') }}></script>
    <script src={{ asset('assets/include/rs-plugin/js/jquery.themepunch.revolution.min.js') }}></script>
    <script src={{ asset('assets/include/rs-plugin/js/addons/revolution.addon.filmstrip.min.js') }}></script>

    <script src={{ asset('assets/include/rs-plugin/js/extensions/revolution.extension.actions.min.js') }}></script>
    <script src={{ asset('assets/include/rs-plugin/js/extensions/revolution.extension.carousel.min.js') }}></script>
    <script src={{ asset('assets/include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js') }}></script>
    <script src={{ asset('assets/include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js') }}></script>
    <script src={{ asset('assets/include/rs-plugin/js/extensions/revolution.extension.migration.min.js') }}></script>
    <script src={{ asset('assets/include/rs-plugin/js/extensions/revolution.extension.navigation.min.js') }}></script>
    <script src={{ asset('assets/include/rs-plugin/js/extensions/revolution.extension.parallax.min.js') }}></script>
    <script src={{ asset('assets/include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js') }}></script>
    <script src={{ asset('assets/include/rs-plugin/js/extensions/revolution.extension.video.min.js') }}></script>

    <!-- ADD-ONS JS FILES -->

    <script>
        var tpj = jQuery;
        var revapi21;

        tpj(document).ready(function() {
            if (tpj("#rev_slider_21_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_21_1");
            } else {
                revapi21 = tpj("#rev_slider_21_1").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "include/rs-plugin/js/",
                    sliderLayout: "fullscreen",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "off",
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [600, 600, 500, 400],
                    lazyType: "none",
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "on",
                    stopAfterLoops: 0,
                    stopAtSlide: 1,
                    shuffle: "off",
                    autoHeight: "off",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }

            RsFilmstripAddOn(tpj, revapi21, "include/rs-plugin/js/", false);
        }); /*ready*/
    </script>

    <script>
        $(document).ready(function() {
            $('.like-btn').click(function() {
                var blogId = $(this).data('id');
                var likeBtn = $(this);

                $.ajax({
                    url: '/like/' + blogId,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        var likesCount = likeBtn.find('.likes-count');
                        likesCount.text(response.likes_count);

                        if (response.liked) {
                            likeBtn.html(
                                '<i class="fas fa-heart text-danger"></i> <span class="likes-count">' +
                                response.likes_count + '</span>  ');
                        } else {
                            likeBtn.html(
                                '<i class="far fa-heart text-danger"></i> <span class="likes-count">' +
                                response.likes_count + '</span> ');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>

    <script>
        document.querySelectorAll('.share-btn').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.getAttribute('data-id');
                const itemUrl = `${window.location.origin}/items/${itemId}`;
                if (navigator.share) {
                    navigator.share({
                        title: 'Check this out!',
                        url: itemUrl
                    }).then(() => {
                        console.log('Thanks for sharing!');
                    }).catch(err => {
                        console.log('Error while sharing:', err);
                    });
                } else {
                    // Fallback for browsers that do not support the Web Share API
                    prompt('Copy this link to share:', itemUrl);
                }
            });
        });
    </script>
</body>

</html>

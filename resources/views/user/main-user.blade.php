@extends('template.navbar-user')
@section('content')
    <style>
        .img-scale {
            width: 100%;
            height: auto;
            object-fit: cover;
            transform: scale(1.1);
            transition: transform 0.3s ease-in-out;
        }

        .img-scale:hover {
            transform: scale(1.2);
        }
    </style>

<section class="section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout">
            @foreach ($activities as $key => $activity)
                @if ($key == 0 || $key == 3)
                    <div class="col-md-4">
                        <a href="" class="h-entry mb-30 v-height gradient">
                            <div class="featured-img" style="background-image: url('{{ asset('storage/foto/' . $activity->blog->foto) }}');"></div>
                            <div class="text">
                                <span class="date">{{ $activity->blog->created_at->format('M. d, Y') }}</span>
                                <h2>{{ $activity->blog->title }}</h2>
                            </div>
                        </a>
                        @if (isset($activities[$key + 1]))
                            <a href="" class="h-entry v-height gradient">
                                <div class="featured-img" style="background-image: url('{{ asset('storage/foto/' . $activities[$key + 1]->blog->foto) }}');"></div>
                                <div class="text">
                                    <span class="date">{{ $activities[$key + 1]->blog->created_at->format('M. d, Y') }}</span>
                                    <h2>{{ $activities[$key + 1]->blog->title }}</h2>
                                </div>
                            </a>
                        @endif
                    </div>
                @elseif ($key == 2)
                    <div class="col-md-4">
                        <a href="" class="h-entry img-5 h-100 gradient">
                            <div class="featured-img" style="background-image: url('{{ asset('storage/foto/' . $activity->blog->foto) }}');"></div>
                            <div class="text">
                                <span class="date">{{ $activity->blog->created_at->format('M. d, Y') }}</span>
                                <h2>{{ $activity->blog->title }}</h2>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

    @foreach ($categories as $category)
        @if ($category->blogs->count() > 0)
            @switch($category->name)
                @case('Fashion')
                    <section class="section">
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h2 class="posts-entry-title">{{ $category->name }}</h2>
                                </div>
                                <div class="col-sm-6 text-sm-end">
                                    <a href="/viewall/{{ $category->id }}" class="read-more">View All</a>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($category->blogs as $blog)
                                    <div class="col-lg-4 mb-4">
                                        <div class="post-entry-alt">
                                            <a href="/detail/{{ $blog->id }}" class="img-link">
                                                <img src="{{ asset('/storage/foto/' . $blog->foto) }}" alt="{{ $blog->title }}"
                                                    class="img-fluid" style="height: 250px; width: 400px; object-fit: cover">
                                            </a>
                                            <div class="excerpt">
                                                <h2><a href="/detail/{{ $blog->id }}">{{ $blog->title }}</a></h2>
                                                <div class="post-meta align-items-center text-left clearfix">
                                                    <span>&nbsp;-&nbsp; {{ $blog->created_at->format('F d, Y') }}</span>
                                                </div>
                                                <p>{!! Str::limit($blog->description, 120) !!}</p>
                                                <p><a href="" class="read-more">Continue Reading</a></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                @break

                @case('Culture')
                    <section class="section posts-entry">
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h2 class="posts-entry-title">{{ $category->name }}</h2>
                                </div>
                                <div class="col-sm-6 text-sm-end">
                                    <a href="/viewall/{{ $category->id }}" class="read-more">View
                                        All</a></div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-9">
                                    <div class="row g-3">
                                        @foreach ($category->blogs->take(2) as $blog)
                                            <div class="col-md-6">
                                                <div class="blog-entry">
                                                    <a href="/detail/{{ $blog->id }}" class="img-link">
                                                        <img src="{{ asset('storage/foto/' . $blog->foto) }}"
                                                            alt="{{ $blog->title }}" style="height: 300px;"
                                                            class="img-fluid img-scale">
                                                    </a>
                                                    <span class="date">{{ $blog->created_at->format('M. d, Y') }}</span>
                                                    <h2><a href="">{{ $blog->title }}</a></h2>
                                                    <p>{{ Str::limit($blog->content, 100) }}</p>
                                                    <p><a href="/detail/{{ $blog->id }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <ul class="list-unstyled blog-entry-sm">
                                        @foreach ($category->blogs->skip(2)->take(3) as $blog)
                                            <li>
                                                <span class="date">{{ $blog->created_at->format('M. d, Y') }}</span>
                                                <h3><a href="/detail/{{ $blog->id }}">{{ $blog->title }}</a></h3>
                                                <p>{{ Str::limit($blog->content, 80) }}</p>
                                                <p><a href="/detail/{{ $blog->id }}" class="read-more">Continue Reading</a></p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                @break

                @case('Travel')
                    <div class="section bg-light">
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h2 class="posts-entry-title">{{ $category->name }}</h2>
                                </div>
                                <div class="col-sm-6 text-sm-end">
                                    <a href="/viewall/{{ $category->id }}" class="read-more">View All</a>
                                </div>
                            </div>
                            <div class="row align-items-stretch retro-layout-alt">
                                @php
                                    $firstBlog = $category->blogs->first();
                                    $otherBlogs = $category->blogs->skip(1)->take(3);
                                @endphp
                                <div class="col-md-5 order-md-2">
                                    <a href="/detail/{{ $blog->id }}" class="hentry img-1 h-100 gradient">
                                        <div class="featured-img"
                                            style="background-image: url('{{ asset('storage/foto/' . $firstBlog->foto) }}');">
                                        </div>
                                        <div class="text">
                                            <span>{{ $firstBlog->created_at->format('M d, Y') }}</span>
                                            <h2>{{ $firstBlog->title }}</h2>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    @if ($otherBlogs->count() > 0)
                                        @php $secondBlog = $otherBlogs->first(); @endphp
                                        <a href="/detail/{{ $blog->id }}" class="hentry img-2 v-height mb30 gradient">
                                            <div class="featured-img"
                                                style="background-image: url('{{ asset('storage/foto/' . $secondBlog->foto) }}');">
                                            </div>
                                            <div class="text text-sm">
                                                <span>{{ $secondBlog->created_at->format('M d, Y') }}</span>
                                                <h2>{{ $secondBlog->title }}</h2>
                                            </div>
                                        </a>
                                        <div class="two-col d-block d-md-flex justify-content-between">
                                            @foreach ($otherBlogs->skip(1)->take(2) as $blog)
                                                <a href="/detail/{{ $blog->id }}" class="hentry v-height img-2 gradient">
                                                    <div class="featured-img"
                                                        style="background-image: url('{{ asset('storage/foto/' . $blog->foto) }}');">
                                                    </div>
                                                    <div class="text text-sm">
                                                        <span>{{ $blog->created_at->format('M d, Y') }}</span>
                                                        <h2>{{ $blog->title }}</h2>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @break
                @default
                <section class="section">
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h2 class="posts-entry-title">{{ $category->name }}</h2>
                            </div>
                            <div class="col-sm-6 text-sm-end">
                                <a href="" class="read-more">View All</a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($category->blogs as $blog)
                                <div class="col-lg-4 mb-4">
                                    <div class="post-entry-alt">
                                        <a href="" class="img-link">
                                            <img src="{{ asset('storage/foto/' . $blog->foto) }}" alt="{{ $blog->title }}" class="img-fluid">
                                        </a>
                                        <div class="excerpt">
                                            <h2><a href="">{{ $blog->title }}</a></h2>
                                            <div class="post-meta align-items-center text-left clearfix">
                                                <span>&nbsp;-&nbsp; {{ $blog->created_at->format('M d, Y') }}</span>
                                            </div>
                                            <p>{!! Str::limit($blog->description, 100) !!}</p>
                                            <p><a href="" class="read-more">Continue Reading</a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endswitch
        @endif
    @endforeach



    {{-- <section class="section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                @foreach ($popularBlogs as $key => $blog)
                    @if ($key == 0 || $key == 3)
                        <div class="col-md-4">
                            <a href="single.html" class="h-entry mb-30 v-height gradient">
                                <div class="featured-img"
                                    style="background-image: url('{{ asset('storage/foto/' . $blog->foto) }}'); background-size: cover; background-position: center;">
                                </div>
                                <div class="text">
                                    <span class="date">{{ $blog->created_at->format('M. d, Y') }}</span>
                                    <h2>{{ $blog->title }}</h2>
                                </div>
                            </a>

                            @if (isset($blogs[$key + 1]))
                                <a href="single.html" class="h-entry v-height gradient">
                                    <div class="featured-img"
                                        style="background-image: url('{{ asset('storage/foto/' . $blogs[$key + 1]->foto) }}'); background-size: cover; background-position: center;">
                                    </div>
                                    <div class="text">
                                        <span class="date">{{ $blogs[$key + 1]->created_at->format('M. d, Y') }}</span>
                                        <h2>{{ $blogs[$key + 1]->title }}</h2>
                                    </div>
                                </a>
                            @endif
                        </div>
                    @elseif ($key == 2)
                        <div class="col-md-4">
                            <a href="single.html" class="h-entry img-5 h-100 gradient">
                                <div class="featured-img"
                                    style="background-image: url('{{ asset('storage/foto/' . $blog->foto) }}'); background-size: cover; background-position: center;">
                                </div>
                                <div class="text">
                                    <span class="date">{{ $blog->created_at->format('M. d, Y') }}</span>
                                    <h2>{{ $blog->title }}</h2>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- End retroy layout blog posts -->

    <!-- Culture -->
    <section class="section posts-entry">
        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Culture</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
            </div>
            <div class="row g-3">
                <div class="col-md-9">
                    <div class="row g-3">
                        @foreach ($culture->blogs->take(2) as $blog)
                            <div class="col-md-6">
                                <div class="blog-entry">
                                    <a href="" class="img-link">
                                        <img src="{{ asset('storage/foto/' . $blog->foto) }}" alt="{{ $blog->title }}"
                                            style="height: 300px;" class="img-fluid img-scale">
                                    </a>
                                    <span class="date">{{ $blog->created_at->format('M. d, Y') }}</span>
                                    <h2><a href="">{{ $blog->title }}</a></h2>
                                    <p>{{ Str::limit($blog->content, 100) }}</p>
                                    <p><a href="" class="btn btn-sm btn-outline-primary">Read More</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="list-unstyled blog-entry-sm">
                        @foreach ($culture->blogs->skip(2)->take(3) as $blog)
                            <li>
                                <span class="date">{{ $blog->created_at->format('M. d, Y') }}</span>
                                <h3><a href="">{{ $blog->title }}</a></h3>
                                <p>{{ Str::limit($blog->content, 80) }}</p>
                                <p><a href="" class="read-more">Continue Reading</a></p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End posts-entry -->

    <!-- Next Culture -->
    @if ($remainingBlogs->count() > 0)
        <section class="section posts-entry posts-entry-sm bg-light">
            <div class="container">
                <div class="row">
                    @foreach ($remainingBlogs as $blogItem)
                        <div class="col-md-6 col-lg-3">
                            <div class="blog-entry">
                                <a href="" class="img-link">
                                    <img src="{{ asset('storage/foto/' . $blogItem->foto) }}"
                                        alt="{{ $blogItem->title }}" class="img-fluid">
                                </a>
                                <span class="date">{{ $blogItem->created_at->format('M. d, Y') }}</span>
                                <h2><a href="">{{ $blogItem->title }}</a></h2>
                                <p>{{ Str::limit($blogItem->content, 80) }}</p>
                                <p><a href="" class="read-more">Continue Reading</a></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- End posts-entry -->

    <!-- Culinary -->
    <section class="section posts-entry">
        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Culinary</h2>
                </div>
                <div class="col-sm-6 text-sm-end">
                    <a href="" class="read-more">View All</a>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-9 order-md-2">
                    <div class="row g-3">
                        @foreach ($culinary->blogs->take(2) as $blog)
                            <div class="col-md-6">
                                <div class="blog-entry">
                                    <a href="" class="img-link">
                                        <img src="{{ asset('storage/foto/' . $blog->foto) }}" alt="{{ $blog->title }}"
                                            class="img-fluid" style="aspect-ratio: 1.1; height: 420px;">
                                    </a>
                                    <span class="date">{{ $blog->created_at->format('M d, Y') }}</span>
                                    <h2><a href="">{{ $blog->title }}</a></h2>
                                    <p>{{ Str::limit($blog->content, 100) }}</p>
                                    <p><a href="" class="btn btn-sm btn-outline-primary">Read More</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="list-unstyled blog-entry-sm">
                        @foreach ($culinary->blogs->skip(2)->take(3) as $blog)
                            <li>
                                <span class="date">{{ $blog->created_at->format('M d, Y') }}</span>
                                <h3><a href="">{{ $blog->title }}</a></h3>
                                <p>{{ Str::limit($blog->content, 80) }}</p>
                                <p><a href="" class="read-more">Continue Reading</a></p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Fashions -->
    <section class="section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Fashions</h2>
                </div>
                <div class="col-sm-6 text-sm-end">
                    <a href="category.html" class="read-more">View All</a>
                </div>
            </div>

            <div class="row">
                @foreach ($fashion->blogs as $blog)
                    <div class="col-lg-4 mb-4">
                        <div class="post-entry-alt">
                            <a href="" class="img-link">
                                <img src="{{ asset('/storage/foto/' . $blog->foto) }}" alt="{{ $blog->title }}"
                                    class="img-fluid" style="height: 250px; width: 400px; object-fit: cover">
                            </a>
                            <div class="excerpt">
                                <h2><a href="">{{ $blog->title }}</a></h2>
                                <div class="post-meta align-items-center text-left clearfix">
                                    <span>&nbsp;-&nbsp; {{ $blog->created_at->format('F d, Y') }}</span>
                                </div>
                                <p>{!! Str::limit($blog->description, 120) !!}</p>
                                <p><a href="" class="read-more">Continue Reading</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Travel -->
    <div class="section bg-light">
        <div class="container">

            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Travel</h2>
                </div>
                <div class="col-sm-6 text-sm-end">
                    <a href="" class="read-more">View All</a>
                </div>
            </div>

            <div class="row align-items-stretch retro-layout-alt">
                @if ($travel && $travel->blogs->count() > 0)
                    @php
                        $firstBlog = $travel->blogs->first();
                        $otherBlogs = $travel->blogs->skip(1)->take(3);
                    @endphp

                    <div class="col-md-5 order-md-2">
                        <a href="" class="hentry img-1 h-100 gradient">
                            <div class="featured-img"
                                style="object-fit:  ;background-image: url('{{ asset('storage/foto/' . $firstBlog->foto) }}');">
                            </div>
                            <div class="text">
                                <span>{{ $firstBlog->created_at->format('M d, Y') }}</span>
                                <h2>{{ $firstBlog->title }}</h2>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-7">
                        @if ($otherBlogs->count() > 0)
                            @php $secondBlog = $otherBlogs->first(); @endphp
                            <a href="" class="hentry img-2 v-height mb30 gradient">
                                <div class="featured-img"
                                    style="background-image: url('{{ asset('storage/foto/' . $secondBlog->foto) }}');">
                                </div>
                                <div class="text text-sm">
                                    <span>{{ $secondBlog->created_at->format('M d, Y') }}</span>
                                    <h2>{{ $secondBlog->title }}</h2>
                                </div>
                            </a>

                            <div class="two-col d-block d-md-flex justify-content-between">
                                @foreach ($otherBlogs->skip(1)->take(2) as $blog)
                                    <a href="" class="hentry v-height img-2 gradient">
                                        <div class="featured-img"
                                            style="background-image: url('{{ asset('storage/foto/' . $blog->foto) }}');">
                                        </div>
                                        <div class="text text-sm">
                                            <span>{{ $blog->created_at->format('M d, Y') }}</span>
                                            <h2>{{ $blog->title }}</h2>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @else
                    <p class="text-center">No travel blogs available.</p>
                @endif
            </div>
        </div>
    </div> --}}




    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>


    <script src={{ asset('template-user/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('template-user/js/tiny-slider.js') }}></script>

    <script src={{ asset('template-user/js/flatpickr.min.js') }}></script>


    <script src={{ asset('template-user/js/aos.js') }}></script>
    <script src={{ asset('template-user/js/glightbox.min.js') }}></script>
    <script src={{ asset('template-user/js/navbar.js') }}></script>
    <script src={{ asset('template-user/js/counter.js') }}></script>
    <script src={{ asset('template-user/js/custom.js') }}></script>
@endsection

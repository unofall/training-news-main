@extends('template.navbar-user')
@section('content')
<div class="section search-result-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">Category: {{ $category->name }}</div>
            </div>
        </div>
        <div class="row posts-entry">
            <div class="col-lg-12">
                @foreach ($blogs as $blog)
                    <div class="blog-entry d-flex flex-column flex-md-row blog-entry-search-item">
                        <a href="/detail/{{ $blog->id }}" class="img-link me-md-4 mb-3 mb-md-0">
                            <img src="{{ asset('storage/foto/' . $blog->foto) }}" alt="{{ $blog->title }}" class="img-fluid rounded">
                        </a>
                        <div>
                            <span class="date">{{ $blog->created_at->format('M d, Y') }} &bullet; <a href="#">{{ $category->name }}</a></span>
                            <h2><a href="">{{ $blog->title }}</a></h2>
                            <p>{!! Str::limit($blog->description, 90) !!}</p>
                            <p><a href="/detail/{{ $blog->id }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                @endforeach

                <div class="row text-start pt-5 border-top">
                    <div class="col-md-12">
                        <div class="custom-pagination">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-4 sidebar d-none d-lg-block">
                <div class="sidebar-box search-form-wrap mb-4">
                    <form action="" class="sidebar-search-form">
                        <span class="bi-search"></span>
                        <input type="text" name="query" class="form-control" placeholder="Type a keyword and hit enter">
                    </form>
                </div>

                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            @foreach ($popularPosts as $post)
                                <li>
                                    <a href="">
                                        <img src="{{ asset('storage/foto/' . $post->foto) }}" alt="{{ $post->title }}" class="me-4 rounded">
                                        <div class="text">
                                            <h4>{{ $post->title }}</h4>
                                            <div class="post-meta">
                                                <span class="mr-2">{{ $post->created_at->format('M d, Y') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        @foreach ($categories as $cat)
                            <li><a href="{{ route('category.show', $cat->id) }}">{{ $cat->name }} <span>({{ $cat->blogs_count }})</span></a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="sidebar-box">
                    <h3 class="heading">Tags</h3>
                    <ul class="tags">
                        @foreach ($tags as $tag)
                            <li><a href="{{ route('tag.show', $tag->id) }}">{{ $tag->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection

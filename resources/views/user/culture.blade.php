@extends('template.navbar-user')
@section('content')
<section class="section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">{{ $category->name }}</h2>
            </div>
           
        </div>
        <div class="row">
            @foreach ($blogs as $blog)
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
                            <p><a href="/detail/{{ $blog->id }}" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

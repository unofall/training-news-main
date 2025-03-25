@extends('template.navbar-user')
@section('content')
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&family=Raleway:wght@300;400;500;600;700;800;900&family=Anton&family=Roboto:wght@500&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRyD5vgiPsD5j6QQK5x3ny34ndd3z2dRho2B5J9c3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    @php
        use Carbon\Carbon;
    @endphp
    <style>
        .banne text-align: center;
        }

        .banner img {
            width: 400px;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
        }

        .text-title {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }

        .publication-info {
            font-size: 0.9rem;
            color: #777;
            text-align: center;
            margin-top: 10px;
        }

        .text-description {
            font-size: 1.1rem;
            line-height: 1.8;
            text-align: justify;
            margin: 2rem 0;
            color: #333;
        }

        .page {
            padding-bottom: 100px;
        }

        /* Fashion Category Specific Styles */
        .fashion-banner {
            display: flex;
            padding-top: 50px;
            text-align: center;
        }

        .fashion-banner img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            object-position: top;
            border-radius: 10px;
        }

        .fashion-title {
            font-size: 3rem;
            font-weight: bold;
            margin-top: 5px;
        }

        .fashion-title h3 {
            font-family: Lato;
        }

        .fashion-description {
            font-size: 14px;
        }

        .detail-banner {
            display: flex;
            text-align: center;

        }

        .detail-banner img {
            width: 100%;
            margin-top: 7px;
            object-fit: cover;
            object-position: top;
            border-radius: 10px;
        }
    </style>

    <body>
        <section class="section">
            <div class="container">
                <div class="d-flex">
                    <div class="row">


                        <div class="fashion-banner">
                            <img src="{{ asset('storage/foto/' . $blog->foto) }}" alt="Fashion Blog Image"
                                style="object-fit: cover; object-position: center;">
                        </div>
                        <div class="fashion-title">
                            <h3 class="center mt-2">{{ $blog->title }}</h3>
                        </div>
                        <div class="fashion-description">
                            {!! $blog->description !!}
                        </div>
                        <div class="option mt-3">
                            <div class="like-count">
                                <!-- Icon View -->
                                <i class="fas fa-eye"></i>
                                <span class="ms-1">{{ $blog->view_count }}</span>

                                <!-- Icon Likes -->
                                {{-- <i class="fas fa-heart text-danger ms-3"></i>
                                <span class="likes-count text-danger ms-1">{{ $blog->likes_count }}</span> --}}

                                <!-- Icon Comment sebagai A href -->
                                <a href="javascript:void(0);" onclick="toggleCommentForm()" class="ms-3 text-muted">
                                    <i class="fas fa-comments"></i>
                                    {{ $blog->formatComments != null ? (int) $blog->formatComments : 0 }}
                                </a>
                            </div>
                        </div>
                        <h5 class="mt-5" style="font-family: Poppins">Comments</h5>
                        <div id="comment-form-container" style="display: none;" class="mt-3">
                            <form id="comment-form" action="/addcomment/{{ $blog->id }}" method="POST"
                                class="comment-form">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <div class="d-flex">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <textarea class="required form-control bg-contrast-200" id="desc_comment" name="desc_comment"
                                                placeholder="Add Comment" rows="1" cols="150"></textarea>
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="bi-send-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if ($comments->isEmpty())
                            <div class="col-12 d-flex justify-content-center align-items-center" style="height: 200px;">
                                <p class="text-muted fs-6 font-weight-bold">Belum ada Komentar</p>
                            </div>
                        @else
                            <div class="card container">
                                @foreach ($comments as $comment)
                                    <div class="topic-post mt-2">
                                        <!-- Komentar Utama -->
                                        <div class="row py-1">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('assets/img/🤨.jpg') }}" alt="Author"
                                                        class="rounded-circle me-2" width="50" height="50">
                                                    <div class="ms-2">
                                                        <h5 class="mb-0 h6 fw-semibold" style="font-family: Poppins">
                                                            <a>{{ $comment->user->name }}</a>
                                                        </h5>
                                                        <small class="text-muted">{{ $comment->desc_comment }}</small>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="d-flex" style="margin-left: 68px">
                                            <small class="text-muted" style="font-size: 12px">
                                                {{ $comment->created_at->diffInDays() > 0
                                                    ? $comment->created_at->diffInDays() . 'd'
                                                    : ($comment->created_at->diffInHours() > 0
                                                        ? $comment->created_at->diffInHours() . 'h'
                                                        : ($comment->created_at->diffInMinutes() > 0
                                                            ? $comment->created_at->diffInMinutes() . 'm'
                                                            : $comment->created_at->diffInSeconds() . 's')) }}
                                            </small>

                                            <!-- Tombol Balas -->
                                            <a href="javascript:void(0);" class="text-muted ms-2 fw-bold"
                                                style="font-size: 12px"
                                                onclick="toggleReplyForm('reply-form-{{ $comment->id }}')">Reply</a>
                                        </div>


                                        <!-- Form Balas (Tersembunyi Awal) -->
                                        <div id="reply-form-{{ $comment->id }}" style="display: none;" class="mt-3">
                                            <form action="/comments" method="POST" style="margin-left: 66px">
                                                @csrf
                                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <textarea name="desc_comment" placeholder="Type Messages" class="form-control" rows="1" required></textarea>
                                                    </div>
                                                    <div class="col-2">
                                                        <button class="btn btn-primary" type="submit">
                                                            <i class="bi-send-fill"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Toggle Balasan -->
                                        @if ($comment->replies->count() > 0)
                                            <div class="replies-toggle mt-3" style="margin-left: 65px">
                                                <p style="font-size: 13px">
                                                    <a href="javascript:void(0);" class="text-muted"
                                                        onclick="toggleReplies('replies-{{ $comment->id }}')">
                                                        <i class="bi bi-dash-lg-"></i> Lihat semua balasan
                                                        ({{ $comment->total_replies_count }})
                                                        <i class="ms-3 bi-caret-down"></i>
                                                    </a>
                                                </p>
                                            </div>
                                        @endif


                                        <!-- Rekursif Menampilkan Balasan -->
                                        <div id="replies-{{ $comment->id }}" style="display: none;" class="ms-5">
                                            @if ($comment->replies->count() > 0)
                                                <div class="replies mt-3">
                                                    @foreach ($comment->replies as $reply)
                                                        @include('main-blog.reply', [
                                                            'reply' => $reply,
                                                            'blog_id' => $blog->id,
                                                        ])
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Garis Pembatas -->
                                        <div class="col-12 py-2 px-0">
                                            <hr>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif



                    </div>

                    <div class="col-3 mx-3 mt-5">
                        @foreach ($otherBlogs as $item)
                            @if ($otherBlogs->categories = 'travel' || 'topic')
                                <div class="detail-banner">
                                    <a href="/detail/{{ $item->id }}" class="">
                                        <img src="{{ asset('storage/foto/' . $item->foto) }}" alt="Fashion Blog Image"
                                            style="object-fit: cover; object-position: center; width: 250px; height: 125px;"
                                            title="{{ $item->title }}">
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>


    </body>
@endsection

<script src={{ asset('assets/js/plugins.min.js') }}></script>
<script src={{ asset('assets/js/functions.bundle.js') }}></script>

{{-- Js Form Comment --}}
<script>
    // Fungsi untuk menampilkan atau menyembunyikan form komentar
    function toggleCommentForm() {
        const commentForm = document.getElementById('comment-form-container');
        commentForm.style.display = (commentForm.style.display === 'none' || commentForm.style.display === '') ?
            'block' : 'none';
    }
</script>


<script>
    function toggleReplies(id, iconId) {
        var repliesDiv = document.getElementById(id);
        var icon = document.getElementById(iconId);

        if (repliesDiv.style.display === "none" || repliesDiv.style.display === "") {
            repliesDiv.style.display = "block";
            icon.classList.remove("bi-caret-down-fill");
            icon.classList.add("bi-caret-up-fill");
        } else {
            repliesDiv.style.display = "none";
            icon.classList.remove("bi-caret-up-fill");
            icon.classList.add("bi-caret-down-fill");
        }
    }
</script>


<script>
    // Fungsi untuk menampilkan atau menyembunyikan form balasan
    function toggleReplyForm(id) {
        const form = document.getElementById(id);
        form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
    }
</script>

{{-- <script>
    document.getElementById('comment-form').addEventListener('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
            })
            .then(response => {
                if (response.redirected) {
                    window.location.href = response.url; // Redirect to the URL returned by the server
                } else {
                    return response.json();
                }
            })
            .then(data => {
                if (data.success) {
                    // Tambahkan logika untuk menampilkan komentar baru tanpa reload
                    let commentSection = document.getElementById('comments-section');
                    let newComment = document.createElement('div');
                    newComment.innerHTML = `
                    <div class="comment">
                        <p>${data.comment.desc_comment}</p>
                        <small>By: ${data.comment.user_name}</small>
                    </div>
                `;
                    commentSection.prepend(newComment);
                    document.getElementById('desc_comment').value = ''; // Kosongkan textarea
                } else {
                    // Tangani error
                    alert('Terjadi kesalahan saat menambahkan komentar.');
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script> --}}


<script></script>

<div class="reply-item">
    <!-- Data Balasan -->
    <div>
        <div class="d-flex align-items-center">
            <img src="{{ asset('assets/img/🤨.jpg') }}" alt="Author" class="rounded-circle me-2" width="35" height="35">
            <div>
                <div class="d-flex">
                    <p class="mb-0 fw-bold ms-2"><a>{{ $reply->user->name }}</a></p>
                    <i class="ms-2 bi-caret-right-fill"></i>
                    <p class="mb-0 ms-2 fw-normal"><a>{{ $reply->parent->user->name ?? 'Komentar' }}</a></p>
                </div>

                <div class="ms-2">
                    <small class="text-muted">{{ $reply->desc_comment }}</small>
                </div>
            </div>
        </div>
            
        <div class="text mt-1" style="margin-left: 53px">
            <small class="text-muted" style="font-size: 12px">
                {{ $reply->created_at->diffInDays() > 0 ? $reply->created_at->diffInDays().'d' : 
                   ($reply->created_at->diffInHours() > 0 ? $reply->created_at->diffInHours().'h' : 
                   ($reply->created_at->diffInMinutes() > 0 ? $reply->created_at->diffInMinutes().'m' : 
                   $reply->created_at->diffInSeconds().'s')) }}
            </small>
                       
            <!-- Tombol Balas -->
            <a href="javascript:void(0);" class="text-muted ms-2 fw-bold" style="font-size: 12px" onclick="toggleReplyForm('reply-form-{{ $reply->id }}')">Reply</a>

            <!-- Form Balas (Tersembunyi Awal) -->
            <div id="reply-form-{{ $reply->id }}" style="display: none;" class="mt-3">
                <form action="/comments" method="POST">
                    @csrf
                    <input type="hidden" name="blog_id" value="{{ $blog_id }}">
                    <input type="hidden" name="parent_id" value="{{ $reply->id }}">
                    <div class="row">
                        <div class="col-10">
                            <textarea name="desc_comment" placeholder="Type Your Messagess" class="form-control" rows="1" required></textarea>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-sm btn-primary" type="submit">
                                <i class="bi-send-fill"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Menampilkan Nested Replies (Rekursif) -->
        @if ($reply->replies->count() > 0)
            <div class="mt-3">
                @foreach ($reply->replies as $subReply)
                    @include('main-blog.reply', ['reply' => $subReply, 'blog_id' => $blog_id])
                @endforeach
            </div>
        @endif

    </div>
</div>

<script>
    // Fungsi untuk toggle (menampilkan atau menyembunyikan) form balasan
    function toggleReplyForm(id) {
        const form = document.getElementById(id);
        form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
    }
</script>

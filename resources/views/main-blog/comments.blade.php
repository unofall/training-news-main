@section('content')
    <div class="container">
        <h1>Create Comment</h1>
        <form action="/addcomment/{{$blog->id}}" method="POST">

            @csrf
            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <div>
                <label for="desc_comment">Komentar:</label>
                <textarea id="desc_comment" name="desc_comment" required></textarea>
            </div>
            <button type="submit">Kirim Komentar</button>
        </form>
    </div>

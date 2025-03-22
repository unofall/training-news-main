@extends('template.navbar-admin')
@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
    <!-- Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <style>
        .body {
            font-family: Poppins, sans-serif;
        }

        .page {
            padding-top: 30px;
            margin-bottom: 100px;
        }

        .form-label {
            font-weight: 800
        }
    </style>

    <body>
        <div class="container-fluid p-0">
            <div class="row">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="fw-bold">Update Blog</h4>
                    </div>
                    <div class="card-body">
                        <form action="/update/{{ $blog->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="foto" class="form-label">Image</label>
                                        <input type="file" class="form-control" name="foto" id="foto">
                                    </div>
        
                                    <div class="col">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            value="{{ $blog->title }}">
                                    </div>
                                </div>
                           

                             <!-- Categories -->
                             <div class="form-input my-3">
                                <label class="form-label">Categories</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $blog->description }}</textarea>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#description').summernote({
                    height: 200,
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link', 'picture']]
                    ]
                });
            });
        </script>



        {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                const categories = document.getElementById('categories');
                const locationFormGroup = document.getElementById('locationFormGroup');

                // Fungsi untuk menyembunyikan atau menampilkan form-location
                function toggleLocationForm() {
                    const selectedCategory = categories.value;

                    if (selectedCategory === 'topic' || selectedCategory === 'fashion') {
                        locationFormGroup.style.display = 'none';
                    } else {
                        locationFormGroup.style.display = 'block';
                    }
                }

                // Jalankan fungsi saat halaman dimuat
                toggleLocationForm();

                // Jalankan fungsi saat kategori diubah
                categories.addEventListener('change', toggleLocationForm);
            });
        </script> --}}
{{-- 
        <script>
            $('#description').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']]
                ]
            });

            $('#categories').change(function() {
                var selectedCategory = $(this).val();
                if (selectedCategory === 'fashion' || selectedCategory === 'topic') {
                    $('#locationFormGroup').hide();
                } else {
                    $('#locationFormGroup').show();
                }
            });
        </script>
 --}}

    </body>
@endsection

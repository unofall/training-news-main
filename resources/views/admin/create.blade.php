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
        

        .form{
            margin-bottom: 30px;
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
                        <h4 class="fw-bold">Create Blog</h4>
                    </div>
                    <div class="card-body">
                        <form id="blogForm" action="/add" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="foto" id="foto">
                                </div>
        
                                <!-- Title -->
                                <div class="col">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>
                            </div>
                            <!-- Image -->
    
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
    
                            <!-- Description -->
                            <div class="form">
                                <label class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
    
                            <!-- Status Hidden Input -->
                            <input type="hidden" name="status" id="status" value="active">
    
                            <!-- Buttons -->
                            <div class="d-flex justify-content-end">
                                <button type="button" id="saveDraft" class="btn btn-secondary me-2">Save as Draft</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>


       
        

        <!-- Summernote -->
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
        
                // Handle tombol Save as Draft
                $('#saveDraft').click(function(event) {
                    $('#status').val('draft'); // Ubah status menjadi draft
        
                    let title = $('#title').val().trim();
                    let category_id = $('#category_id').val();
                    let description = $('#description').val().trim();
                    let foto = $('#foto').val();
        
                    if (!title && !category_id && !description && !foto) {
                        event.preventDefault();
                        alert('At least one field must be filled to save as draft.');
                    } else {
                        $('#blogForm').submit();
                    }
                });
        
                // Handle tombol Submit (Published)
                $('#blogForm').submit(function(event) {
                    if ($('#status').val() === 'active') {
                        let title = $('#title').val().trim();
                        let category_id = $('#category_id').val();
                        let description = $('#description').val().trim();
        
                        // if (title === '' || category_id === '' || description === '' ) {
                        //     event.preventDefault();
                        //     alert('Please fill in all required fields before publishing.');
                        // }
                    }
                });
            });
        </script>
        
        
        

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelector("form").addEventListener("submit", function(event) {
                    let isValid = true;
        
                    // Ambil elemen input
                    let foto = document.getElementById("foto");
                    let title = document.getElementById("title");
                    let category_id = document.getElementById("category_id"); // Ubah dari categories ke category_id
                    let location = document.getElementById("location");
                    let description = document.getElementById("description");
        
                    // Fungsi untuk menampilkan error
                    function showError(input, message) {
                        input.classList.add("is-invalid");
                        let errorDiv = input.nextElementSibling;
                        if (!errorDiv || !errorDiv.classList.contains("invalid-feedback")) {
                            errorDiv = document.createElement("div");
                            errorDiv.className = "invalid-feedback";
                            input.parentNode.appendChild(errorDiv);
                        }
                        errorDiv.innerText = message;
                        isValid = false;
                    }
        
                    // Fungsi untuk menghapus error jika valid
                    function clearError(input) {
                        input.classList.remove("is-invalid");
                        let errorDiv = input.nextElementSibling;
                        if (errorDiv && errorDiv.classList.contains("invalid-feedback")) {
                            errorDiv.remove();
                        }
                    }
        
                    // Validasi File Upload (Harus diisi)
                    if (foto.files.length === 0) {
                        showError(foto, "Image is required.");
                    } else {
                        clearError(foto);
                    }
        
                    // Validasi Title (Harus diisi)
                    if (title.value.trim() === "") {
                        showError(title, "Title is required.");
                    } else {
                        clearError(title);
                    }
        
                    // Validasi Category (Harus dipilih)
                    if (category_id.value === "") {
                        showError(category_id, "Category is required.");
                    } else {
                        clearError(category_id);
                    }
        
                    // Validasi Description (Harus diisi)
                    if (description.value.trim() === "") {
                        showError(description, "Description is required.");
                    } else {
                        clearError(description);
                    }
        
                    // Cegah submit jika ada error
                    if (!isValid) {
                        event.preventDefault();
                    }
                });
            });
        </script>
        

    </body>
@endsection

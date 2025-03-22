@extends('template.navbar-admin')
@section('content')
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
                    <h4 class="fw-bold">Update Category</h4>
                </div>
                <div class="card-body">
                    <form id="blogForm" action="/updateCategory/{{$category->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form mb-3">
                            <div class="col">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
                            </div>
                        </div>
                        <div class="form mb-3">
                            <div class="col">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" name="desc" id="desc" value="{{$category->desc}}">
                            </div>
                        </div>
    
                        <!-- Buttons -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
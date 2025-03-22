@extends('template.navbar-admin')
@section('content')

    <head>
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <style>
            body {
                font-family: Poppins, sans-serif;
            }

            .table th,
            .table td {
                text-align: center;
            }

            .text-truncate {
                max-width: 400px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .btn-group a {
                margin-right: 5px;
            }

            .page-content {
                padding-bottom: 100px;
            }

            .filter-form {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 20px;
            }

            .filter-form label {
                margin-right: 10px;
                font-weight: 500;
            }

            .filter-form select {
                width: 150px;
                padding: 5px;
                border-radius: 5px;
                border: 1px solid #ced4da;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid p-0">
            <div class="row">
                <div class="container page-content">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="h3"><strong>Analytics</strong> Table</h1>
                        <a href="/create" class="btn btn-primary">+ Create Your Blog</a>
                    </div>
                    <div class="filter-form">
                        {{-- <form action="/admin" method="GET" class="d-flex align-items-center">
                            <label for="category">Filter by Category:</label>
                            <select name="category" id="category" onchange="this.form.submit()">
                                <option value="">All</option>
                                <option value="travel" {{ request('category') == 'travel' ? 'selected' : '' }}>
                                    Travel</option>
                                <option value="topic" {{ request('category') == 'topic' ? 'selected' : '' }}>
                                    Topic</option>
                                <option value="fashion" {{ request('category') == 'fashion' ? 'selected' : '' }}>Fashion
                                </option>
                            </select>
                        </form> --}}
                    </div>
                    <table id="blogTable" class="table table-hover table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Title</th>
                                <th>Categories</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ asset('storage/foto/' . $item->foto) }}" class="rounded" width="50"
                                            height="50" style="object-fit: cover; object-position: top" alt="Blog Image">
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->category->name}}</td>
                                    <td>{!! Str::limit($item->description, 40) !!}</td>
                                    <td>
                                        <button class="btn btn-sm status-btn" data-id="{{ $item->id }}">
                                            @if ($item->status == 'active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </button>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="/update/{{ $item->id }}" class="btn btn-info btn-sm">Update</a>
                                            <a href="/delete/{{ $item->id }}" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </body>



    <script>
        $(function() {
            // DataTables
            $('#blogTable').DataTable({
                responsive: true,
                paging: true,
                lengthMenu: [5, 10, 25, 50],
                pageLength: 5,
                ordering: true,

                language: {
                    search: "Cari :",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    paginate: {
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    }
                }
            });


            // AJAX Delete
            $('.delete-btn').on('click', function(e) {
                e.preventDefault();
                let btn = $(this);
                let id = btn.data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/delete/' + id;
                    }
                });
            });

            // Messages
            @if (session('success'))
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000,
                    toast: true
                });
            @endif

            @if (session('update'))
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('update') }}',
                    showConfirmButton: false,
                    timer: 2000,
                    toast: true
                });
            @endif

            @if (session('delete'))
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('delete') }}',
                    showConfirmButton: false,
                    timer: 2000,
                    toast: true
                });
            @endif
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#blogTable').DataTable();

            $('.status-btn').on('click', function() {
                var btn = $(this);
                var id = btn.data('id');
                var currentStatus = btn.find('span').hasClass('bg-success') ? 'active' : 'inactive';
                var newStatus = currentStatus === 'active' ? 'inactive' : 'active';

                $.ajax({
                    url: '/updateStatus/' + id,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: newStatus
                    },
                    success: function(response) {
                        if (response.status === 'active') {
                            btn.html('<span class="badge bg-success">Active</span>');
                        } else {
                            btn.html('<span class="badge bg-secondary">Inactive</span>');
                        }
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Status Updated Successfully',
                            showConfirmButton: false,
                            timer: 2000,
                            toast: true,
                            width: '300px',
                            heightAuto: false,
                            padding: '0.5em'
                        });

                        // Update the button's class
                        if (newStatus === 'active') {
                            btn.find('span').html('<span class=" bg-success">Active</span>')
                                .removeClass('bg-secondary').addClass('bg-success');
                        } else {
                            btn.find('span').removeClass('bg-success').addClass('bg-secondary');
                        }
                    },
                    error: function(xhr) {
                        alert('An error occurred: ' + xhr.status + ' ' + xhr.statusText);
                    }
                });
            });
        });
    </script>
@endsection

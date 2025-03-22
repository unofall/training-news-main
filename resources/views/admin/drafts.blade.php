@extends('template.navbar-admin')

@section('content')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <head>
        <style>
            body {
                font-family: Poppins, sans-serif;
            }

            table.dataTable thead th,
            table.dataTable tbody td {
                text-align: center;
                vertical-align: middle;
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
        </style>
    </head>

    <div class="container-fluid p-0">
        <h2>Drafts</h2>
        <br>
        <table id="draftTable" class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Title</th>
                    <th>Categories</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <img src="{{ asset('storage/foto/' . $item->foto) }}" class="rounded" width="50" height="50"
                                style="object-fit: cover; object-position: top" alt="Blog Image">
                        </td>
                        <td>{{ $item->title }}</td>
                        @if ($item->category)
                            <td>{{ $item->category->name }}</td>
                        @else
                            <td>No Category</td>
                        @endif
                        <td>{!! Str::limit($item->description, 40) !!}</td>
                        <td>{{ $item->location ?? 'No location' }}</td>
                        <td>
                            <a href="/edit/{{ $item->id }}" class="btn btn-warning">Edit</a>

                            <form action="/publish/{{ $item->id }}" method="post" style="display: inline">
                                @csrf
                                <button type="submit" class="btn btn-success">Publish</button>
                            </form>

                            <a href="/deleteDraft/{{ $item->id }}" class="btn btn-danger">Delete</a>

                            {{-- <form action="/deleteDraft/{{ $item->id }}" method="post" style="display: inline">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- jQuery & DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($errors->any())
        <script>
            let errorMessage = "<p>";
            @foreach ($errors->all() as $error)
                errorMessage += "<p>{{ $error }}</p>";
            @endforeach
            errorMessage += "</p>";

            Swal.fire({
                title: "Oops! Ada kesalahan",
                html: errorMessage,
                icon: "error",
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Sukses!",
                text: "{{ session('success') }}",
                icon: "success",
            });
        </script>
    @endif

    <script>
        $('#draftTable').DataTable({
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
            },
            columnDefs: [{
                targets: "_all",
                className: "text-center align-middle"
            }]
        });
    </script>
@endsection

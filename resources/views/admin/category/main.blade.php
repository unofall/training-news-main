@extends('template.navbar-admin')
@section('content')

    <head>
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <!-- jQuery & DataTables JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <style>
            body {
                font-family: Poppins, sans-serif;
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
                        <h1 class="h3"><strong>Category</strong> Table</h1>
                        <a href="/createCategory" class="btn btn-primary">+ Create Category</a>
                    </div>
                    <div class="filter-form">
                    </div>
                    <div class="table-responsive">

                    </div>
                    <table id="blogTable" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $key => $item)
                                <tr>
                                    <td >{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->desc }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="/updateCategory/{{ $item->id }}"
                                                class="btn btn-info btn-sm">Update</a>
                                            <a href="/delete/category/{{ $item->id }}"
                                                class="btn btn-danger btn-sm">Delete</a>
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
        $(document).ready(function() {
            $('#blogTable').DataTable({
                responsive: true, 
                paging: true, // Aktifkan pagination
                lengthMenu: [
                    [5, 10, 25, -1],
                    [5, 10, 25, "Semua"]
                ], // Opsi jumlah data
                pageLength: 5, // Default: 5 data per halaman
                ordering: true, // Aktifkan fitur sorting
                autoWidth: false,
                searchHighlight: true, // Highlight pencarian

                language: {
                    search: "🔍 Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    paginate: {
                        next: "➡ Berikutnya",
                        previous: "⬅ Sebelumnya"
                    },
                    zeroRecords: "Tidak ada data ditemukan",
                    infoEmpty: "Tidak ada data tersedia",
                    infoFiltered: "(Disaring dari _MAX_ total data)"
                }
            });
        });
    </script>
@endsection

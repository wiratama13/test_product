@extends('layouts.app')

@section('content')
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('includes.home.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('includes.home.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <div class="row mb-4">
                        <div class="col">
                            <div class="float-start">
                                <a class="btn btn-info" href="{{ route('product-create') }}">Tambahkan Produk</a>
                            </div>
                        </div>
                    </div>


                    <!-- Content Row -->
                   <div class="row d-flex">
                   <div class="col">
                     <table id="table_id" class="display table table-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $product->nama_produk }}</td>
                            <td>{{ number_format($product->harga) }}</td>
                            <td>{{ $product->kategori }}</td>
                            <td>{{ $product->status }}</td>

                            <td>
                                {{-- <a href="{{ route('product-show', $product->nama) }}" class="btn btn-primary">
                                     <i class="fa fa-eye"></i>
                                </a> --}}
                                <a href="{{ route('product-edit', $product->id_produk) }}" class="btn btn-primary btn-warning">
                                     <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('product-delete', $product->id_produk) }}" method="POST" class="d-inline">

                                @csrf
                                @method('delete')
                                <button class="btn btn-danger border-0" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')">
                                <i class="fa fa-trash"></i>
                                </button>

                                </form>
                            </td>
                        </tr>
                        @empty

                        @endforelse

                    </tbody>
                    </table>
                   </div>
                   </div>
                </div>
            </div>


            <!-- Footer -->
            @include('includes.home.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->


    <!-- Bootstrap core JavaScript-->


</body>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endpush

@push('prepend-script')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
       $(document).ready( function () {
            $('#table_id').DataTable({
                "columnDefs": [
                { "width": "25%", "targets": 0 },
                { "width": "50%", "targets": 1 },
                { "width": "50%", "targets": 2 },
                { "width": "25%", "targets": 3 }
            ]
            });
        });
    </script>
@endpush


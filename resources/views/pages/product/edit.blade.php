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

                        @if ($errors->any())
                        <div class="alert alert-danger mt-2 col-6">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                        @endif
                    <!-- Content Row -->
                   <div class="row">
                        <div class="col">
                            <div class="card-shadow">
                                <div class="card-body">
                                    <form action="{{ route('product-update', $product->id_produk) }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                         <div class="form-group">
                                            <label for="nama_produk">Nama produk</label>
                                            <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="masukkan nama_produk" value="{{ old('nama_produk', $product->nama_produk) }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="number" name="harga" id="harga" class="form-control" placeholder="masukkan harga" value="{{ old('harga', $product->harga) }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <input type="text" name="kategori" id="kategori" class="form-control" placeholder="masukkan kategori" value="{{ old('kategori', $product->kategori) }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control" id="">
                                                <option value="{{ old('status', $product->status) }}">{{ old('status', $product->status) }}</option>
                                                <option value="bisa dijual">bisa dijual</option>
                                                <option value="tidak bisa dijual">tidak bisa dijual</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-block btn-primary">
                                            Simpan
                                        </button>

                                    </form>
                                </div>
                            </div>
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
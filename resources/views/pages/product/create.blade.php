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
                                    <form action="{{ route('product-store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="nama_produk">Nama produk</label>
                                            <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="masukkan nama_produk" value="{{ old('nama_produk') }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="number" name="harga" id="harga" class="form-control" placeholder="masukkan harga" value="{{ old('harga') }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <input type="text" name="kategori" id="kategori" class="form-control" placeholder="masukkan kategori" value="{{ old('kategori') }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control" id="">
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

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/mc/mc-calendar.min.css') }}">
@endpush

@push('prepend-script')

    <script>

        function previewImage() {
        const gambar = document.querySelector('#gambar')
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display ='block';

        const OfReader = new FileReader();
        OfReader.readAsDataURL(gambar.files[0]);

        OfReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    </script>

    <script src="{{ url('frontend/libraries/mc/mc-calendar.min.js') }}"></script>
    <script>

    let Datepicker = MCDatepicker.create({
      el: '#datepicker',
      dateFormat: 'YYYY-mm-dd',
        bodyType: 'inline',
    })

    </script>
   <script src="{{ url('ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.addCss('.cke_editable p { margin: 0 !important; }');
        CKEDITOR.replace('deskripsi',{
            removeButtons :'Image'
        });

    </script>

@endpush


@extends('layouts.app')

@section('content')
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('includes.admin.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('includes.admin.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <div class="row mb-4">
                        <div class="col">
                            <div class="float-start">
                                <a class="btn btn-info" href="{{ route('admin-book-create') }}">Buat buku</a>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <div class="float-start">
                                <a class="btn btn-outline-secondary" href="{{ route('admin-book') }}">Kembali</a>
                            </div>
                        </div>
                    </div>

                   <div class="row">
                    <table id="table_id" class="display table table-bordered">
                        <tr>
                            <th>Judul Majalah</th>
                            <td>{{ $items->nama  }}</td>
                        </tr>

                        <tr>
                            <th>Tanggal Buat</th>
                            <td>{{ $items->tanggal_buat  }}</td>
                        </tr>

                        <tr>
                            <th>Deskripsi</th>
                            <td class="deskripsi">{!! $items->deskripsi  !!}</td>
                        </tr>

                        <tr>
                            <th>Gambar</th>
                            <td>
                                <img src= "{{ Storage::url($items->gambar) }}" style="width:150px" alt="">
                            </td>
                        </tr>

                        <tr>
                            <th>File Buku</th>

                            <td>
                                <a class="btn btn-warning" href="{{ route('admin-book-view',$items->slug)}}">View</a>
                            </td>

                        </tr>
                    </table>
                   </div>
                </div>
            </div>


            <!-- Footer -->
            @include('includes.admin.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</body>
@endsection

@push('prepend-script')
    <script>
        CKEDITOR.addCss('.cke_editable p { margin: 0 !important; }');
        CKEDITOR.replace('body');
    </script>
@endpush

@push('prepend-style')
    <style>
        p {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }
    </style>
@endpush

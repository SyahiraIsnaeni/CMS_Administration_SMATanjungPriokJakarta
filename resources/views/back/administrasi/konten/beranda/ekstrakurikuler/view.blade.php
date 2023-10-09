<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ekstrakurikuler</title>

    <link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="./assets/compiled/css/app.css">
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
</head>

<body>
<script src="assets/static/js/initTheme.js"></script>
<div id="app">
    @include('back.administrasi.sidebar.ekstrakurikuler')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Data Ekstrakurikuler</h3>
                    </div>
                </div>
            </div>

            <!-- Bordered table start -->
            <section class="section"  style="margin-top: 30px">
                <div class="row" id="table-bordered">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="card-header">
                                        <div class="card-head-row" style="margin-left: -20px">
                                            <a href="{{route('ekstrakurikuler.create')}}" class="btn btn-info btn=sm ml-auto"> <i class="bi bi-plus-circle" style="margin-right: 4px"></i>Tambah Data</a>
                                        </div>
                                    </div>
                                    <section class="section">
                                        <div class="card" >
                                            <div class="card-body" >
                                                <div class="table-responsive" style="margin-left: -20px;margin-top: -20px;">
                                                    <table class="table table-bordered mb-3" id="table1">
                                                        <thead>
                                                        <tr>
                                                            <th>Nama Ekstrakurikuler</th>
                                                            <th>Logo</th>
                                                            <th>Foto Kegiatan</th>
                                                            <th>Deskripsi Ekstrakurikuler</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse ($ekstrakurikuler as $row)
                                                            <tr>
                                                                <td class="text-bold-500">{{ $row->nama}}</td>
                                                                <td><img src="{{asset('uploads/'.$row->logo) }}" width="100" height="100" ></td>
                                                                <td>
                                                                    @foreach($row->image as $images)
                                                                        <img src="{{ asset('uploads/' . $images->image) }}" width="150" height="100">
                                                                    @endforeach
                                                                </td>
                                                                <td class="text-bold-500">{!! substr($row->deskripsi, 0, 300)!!}...</td>
                                                                <td class="text-bold-500"><a href="{{route('ekstrakurikuler.edit', $row->id) }}" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>
                                                                    <br>
                                                                    <form action="{{route('ekstrakurikuler.destroy', $row->id)}}" method="post"
                                                                          class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn icon btn-danger" style="margin-top: 10px">
                                                                            <i class="bi bi-trash" ></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="7" class="text-center">Data Masih Kosong</td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                    {{$ekstrakurikuler->links()}}
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Basic Tables start -->
            <section class="section" style="margin-top: 30px">
                <div class="row" id="basic-table">
                    <div class="col-lg-12 col-md-6">
                        <div class="card">
                            <div class="card-content">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic Tables end -->
        </div>


    </div>
</div>
<script src="assets/static/js/components/dark.js"></script>
<script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

@include('sweetalert::alert', ['cdn'=>"https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<script src="assets/compiled/js/app.js"></script>

@include('back.administrasi.footer.footer')
</body>

</html>

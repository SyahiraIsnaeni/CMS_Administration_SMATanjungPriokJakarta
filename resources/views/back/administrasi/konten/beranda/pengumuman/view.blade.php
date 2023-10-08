<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengumuman</title>

    <link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="./assets/compiled/css/app.css">
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
</head>

<body>
<script src="assets/static/js/initTheme.js"></script>
<div id="app">
    @include('back.administrasi.sidebar.Pengumuman')
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
                        <h3>Data Pengumuman</h3>
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
                                            <a href="{{route('pengumuman.create')}}" class="btn btn-info btn=sm ml-auto"> <i class="bi bi-plus-circle" style="margin-right: 4px"></i>Tambah Data</a>
                                        </div>
                                    </div>
                                    <section class="section">
                                        <div class="card" >
                                            <div class="card-body" >
                                                <div class="table-responsive" style="margin-left: -20px;margin-top: -20px;">
                                                    <table class="table table-bordered mb-3" id="table1">
                                                        <thead>
                                                        <tr>
                                                            <th>Judul Pengumuman</th>
                                                            <th>Penulis</th>
                                                            <th>Kategori Pengumuman</th>
                                                            <th>Status</th>
                                                            <th>Tanggal</th>
                                                            <th>Isi Pengumuman</th>
                                                            <th>Gambar</th>
                                                            <th>Dokumen</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse ($pengumuman as $row)
                                                            @if ($row->delete == 'N')
                                                                <tr>
                                                                    <td>{{ $row->judul}}</td>
                                                                    <td>{{ $row->penulis}}</td>
                                                                    <td>{{ $row->kategori_pengumuman->nama_kategori ?? ''}}</td>
                                                                    <td>
                                                                        @if ($row->is_active == '1')
                                                                            Diterbitkan
                                                                        @else
                                                                            Draf
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $row->updated_at->format('d M Y')}}</td>
                                                                    <td>{!! substr($row->body, 0, 200)!!}...</td>
                                                                    <td><img src="{{asset('uploads/'.$row->gambar) }}" width="100"></td>
                                                                    <td>
                                                                        @if ($row->dokumen != null)
                                                                            <a href="{{asset('uploads/'.$row->dokumen) }}" class="btn icon btn-success">Lihat dokumen</a>
                                                                        @else
                                                                            Tidak ada
                                                                        @endif
                                                                    </td>

                                                                    <td class="text-bold-500"><a href="{{route('pengumuman.edit', $row->id) }}" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>
                                                                        <br>
                                                                        <form action="{{route('pengumuman.destroy', $row->id)}}" method="post"
                                                                              class="d-inline">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="btn icon btn-danger" style="margin-top: 10px">
                                                                                <i class="bi bi-trash" ></i>
                                                                            </button>
                                                                        </form>
                                                                    </td>

                                                                </tr>
                                                            @else
                                                            @endif
                                                        @empty
                                                            <tr>
                                                                <td colspan="8" class="text-center">Data Masih Kosong</td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                    {{$pengumuman->links()}}
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

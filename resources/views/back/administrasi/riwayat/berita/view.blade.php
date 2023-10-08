<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Data Berita</title>

    <link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="./assets/compiled/css/app.css">
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
</head>

<body>
<script src="assets/static/js/initTheme.js"></script>
<div id="app">
    @include('back.administrasi.sidebar.riwayat-berita')
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
                        <h3>Riwayat Data Berita</h3>
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
                                    <section class="section">
                                        <div class="card" >
                                            <div class="card-body" >
                                                <div class="table-responsive" style="margin-left: -20px;margin-top: -20px;">
                                                    <table class="table table-bordered mb-3" id="table1">
                                                        <thead>
                                                        <tr>
                                                            <th>Judul Berita</th>
                                                            <th>Penulis</th>
                                                            <th>Kategori Berita</th>
                                                            <th>Status</th>
                                                            <th>Tanggal</th>
                                                            <th>Isi Berita</th>
                                                            <th>Gambar</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse ($berita as $row)
                                                            @if ($row->delete == 'Y')
                                                                <tr>
                                                                    <td>{{ $row->judul}}</td>
                                                                    <td>{{ $row->penulis}}</td>
                                                                    <td>{{ $row->kategori_berita->nama_kategori ?? ''}}</td>
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
                                                                        <a href="{{route('riwayat-berita.edit', $row->id) }}"
                                                                           class="btn btn-warning btn-sm" style="">Restore</a>

                                                                        <form action="{{route('riwayat-berita.destroy', $row->id)}}" method="post"
                                                                              class="d-inline">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="btn btn-danger btn-sm" style="margin-top: 10px">
                                                                                Hapus
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
                                                    {{$berita->links()}}
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

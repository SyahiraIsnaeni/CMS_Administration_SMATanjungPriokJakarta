<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SMA Tanjung Priok</title>

    <link rel="shortcut icon" href="assets/image/logo.png" type="image/x-icon">
    <link rel="icon" href="assets/image/logo.png" type="image/x-icon" />

    <link rel="stylesheet" href="./assets/compiled/css/app.css">
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="./assets/compiled/css/iconly.css">
</head>

<body>
<script src="assets/static/js/initTheme.js"></script>
<div id="app">
    @include('back.administrasi.sidebar.dashboard')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Dashboard Admin SMA Tanjung Priok Jakarta</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold"><p><b>Berita</b></p></h6>
                                    <h6 class="font-extrabold mb-0">{{$berita->COUNT('id')}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold"><p><b>Pengumuman</b></p></h6>
                                    <h6 class="font-extrabold mb-0">{{$pengumuman->COUNT('id')}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold"><p><b>Blog</b></p></h6>
                                    <h6 class="font-extrabold mb-0">{{$blog->COUNT('id')}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold"><p><b>Prestasi</b></p></h6>
                                    <h6 class="font-extrabold mb-0">{{$prestasi->COUNT('id')}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="row">
                <div class="col-4">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title"><p><b>Draf Pengumuman</b></p></div>
                            </div>
                        </div>
                        <div class="card-body">
                            @forelse ($drafPengumuman as $row)
                                <div class="row fs-5">
                                    <div class="col-2 col-md-2 col-lg-2 ml-3 mt-2 mb-2">
                                        <img src="{{asset('uploads/'.$row->gambar) }}"  class="img-fluid" alt="bg" width="90">
                                    </div>
                                    <div class="col-8 col-md-8 col-lg-8 mt-3 mb-3">
                                        <a class="text-black" style="text-decoration: none; font-size: small; ">
                                            <p>{{$row->judul}}</p>
                                        </a>

                                    </div>
                                    <div class="col-1 col-md-1 col-lg-1 mt-3 mb-3">
                                        <a href="{{route('pengumuman.edit', $row->id) }}"
                                           class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title"><p><b>Draf Berita</b></p></div>
                            </div>
                        </div>
                        <div class="card-body">
                            @forelse ($drafBerita as $row)
                                <div class="row fs-5">
                                    <div class="col-2 col-md-2 col-lg-2 ml-3 mt-2 mb-2">
                                        <img src="{{asset('uploads/'.$row->gambar) }}"  class="img-fluid" alt="bg" width="90">
                                    </div>
                                    <div class="col-8 col-md-8 col-lg-8 mt-3 mb-3">
                                        <a class="text-black" style="text-decoration: none; font-size: small; ">
                                            <p>{{$row->judul}}</p>
                                        </a>

                                    </div>
                                    <div class="col-1 col-md-1 col-lg-1 mt-3 mb-3">
                                        <a href="{{route('berita.edit', $row->id) }}"
                                           class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title"><p><b>Draf Blog</b></p></div>
                            </div>

                        </div>
                        <div class="card-body">
                            @forelse ($drafBlog as $row)
                                <div class="row fs-5">
                                    <div class="col-2 col-md-2 col-lg-2 ml-3 mt-2 mb-2">
                                        <img src="{{asset('uploads/'.$row->gambar) }}"  class="img-fluid" alt="bg" width="90">
                                    </div>
                                    <div class="col-8 col-md-8 col-lg-8 mt-3 mb-3">
                                        <a class="text-black" style="text-decoration: none; font-size: small; ">
                                            <p>{{$row->judul}}</p>
                                        </a>

                                    </div>
                                    <div class="col-1 col-md-1 col-lg-1 mt-3 mb-3">
                                        <a href="{{route('blog.edit', $row->id) }}"
                                           class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="assets/static/js/components/dark.js"></script>
<script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/compiled/js/app.js"></script>

@include('sweetalert::alert', ['cdn'=>"https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@include('back.administrasi.footer.footer')
<!-- Need: Apexcharts -->
<script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="assets/static/js/pages/dashboard.js"></script>

</body>

</html>

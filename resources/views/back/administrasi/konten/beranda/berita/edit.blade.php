<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Berita</title>
    <link rel="stylesheet" href="../assets/extensions/quill/quill.snow.css">
    <link rel="stylesheet" href="../assets/extensions/quill/quill.bubble.css">

    <link rel="shortcut icon" href="../../assets/image/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../../assets/compiled/css/app.css">
    <link rel="stylesheet" href="../../assets/compiled/css/app-dark.css">
</head>

<body>
<script src="../../assets/static/js/initTheme.js"></script>
<div id="app">
    <div id="sidebar">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header position-relative">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo" style="display: flex; align-items: center;">
                        <img src="../../assets/image/logo.png" style="width: 50px; height: 50px">
                        <a href="#"><p style="font-size: 21px;margin-top: 25px">Admin</p></a>
                    </div>
                    <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                             role="img" class="iconify iconify--system-uicons" width="20" height="20"
                             preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                            <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                               stroke-linejoin="round">
                                <path
                                    d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                    opacity=".3"></path>
                                <g transform="translate(-210 -1)">
                                    <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                    <circle cx="220.5" cy="11.5" r="4"></circle>
                                    <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                </g>
                            </g>
                        </svg>
                        <div class="form-check form-switch fs-6">
                            <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                            <label class="form-check-label"></label>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                             role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet"
                             viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                            </path>
                        </svg>
                    </div>
                    <div class="sidebar-toggler  x">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu" style="margin-top: -10px">
                <ul class="menu">

                    <li
                        class="sidebar-item">
                        <a href="/dashboard" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Konten</li>

                    <li
                        class="sidebar-item  has-sub  active">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Beranda</span>
                        </a>

                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{ route('hari.index') }}" class="submenu-link">Hari Nasional</a>
                            </li>

                            <li class="submenu-item">
                                <a href="{{ route('ekstrakurikuler.index') }}" class="submenu-link">Ekstrakurikuler</a>

                            </li>

                            <li class="submenu-item  ">
                                <a href="{{ route('prestasi.index') }}" class="submenu-link">Prestasi</a>

                            </li>

                            <li class="submenu-item  ">
                                <a href="{{ route('pengumuman.index') }}" class="submenu-link">Pengumuman</a>

                            </li>

                            <li class="submenu-item  active  ">
                                <a href="{{ route('berita.index') }}" class="submenu-link">Berita</a>

                            </li>

                            <li class="submenu-item  ">
                                <a href="{{ route('blog.index') }}" class="submenu-link">Blog</a>

                            </li>

                        </ul>
                    </li>

                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-collection-fill"></i>
                            <span>Profil</span>
                        </a>

                        <ul class="submenu ">

                            <li class="submenu-item  ">
                                <a href="{{ route('sambutan.index') }}" class="submenu-link">Sambutan Kepala Sekolah</a>
                            </li>

                            <li class="submenu-item  ">
                                <a href="{{ route('sejarah.index') }}" class="submenu-link">Sejarah</a>

                            </li>

                            <li class="submenu-item  ">
                                <a href="{{ route('fasilitas.index') }}" class="submenu-link">Fasilitas</a>

                            </li>

                            <li class="submenu-item  ">
                                <a href="{{ route('struktural.index') }}" class="submenu-link">Struktur Organisasi</a>

                            </li>

                        </ul>


                    </li>

                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-collection-fill"></i>
                            <span>Kategori</span>
                        </a>

                        <ul class="submenu ">

                            <li class="submenu-item  ">
                                <a href="{{ route('kategori-berita.index') }}" class="submenu-link">Kategori Berita</a>
                            </li>

                            <li class="submenu-item  ">
                                <a href="{{ route('kategori-pengumuman.index') }}" class="submenu-link">Kategori Pengumuman</a>

                            </li>

                            <li class="submenu-item ">
                                <a href="{{ route('kategori-blog.index') }}" class="submenu-link">Kategori Blog</a>

                            </li>

                        </ul>


                    </li>

                    <li
                        class="sidebar-item">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-grid-1x2-fill"></i>
                            <span>Galeri</span>
                        </a>
                    </li>

                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-collection-fill"></i>
                            <span>Riwayat Konten</span>
                        </a>

                        <ul class="submenu ">

                            <li class="submenu-item  ">
                                <a href="{{ route('riwayat-berita.index') }}" class="submenu-link">Riwayat Berita</a>
                            </li>

                            <li class="submenu-item  ">
                                <a href="{{ route('riwayat-pengumuman.index') }}" class="submenu-link">Riwayat Pengumuman</a>

                            </li>

                            <li class="submenu-item ">
                                <a href="{{ route('riwayat-blog.index') }}" class="submenu-link">Riwayat Blog</a>

                            </li>

                        </ul>

                    </li>

                    <li class="sidebar-title">Data Sekolah</li>

                    <li
                        class="sidebar-item">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Data Siswa</span>
                        </a>
                    </li>

                    <li
                        class="sidebar-item">
                        <a href="form-layout.html" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Data Guru</span>
                        </a>
                    </li>

                    <li
                        class="sidebar-item">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-journal-check"></i>
                            <span>Data Staf</span>
                        </a>
                    </li>

                    <li class="sidebar-title">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-undo"></i>
                            <p> {{ __('Logout') }}</p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </div>

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
                        <h3>Edit Data Berita</h3>
                    </div>
                </div>
            </div>

            <section id="input-style" style="margin-top: 30px">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <a href="{{route('berita.index')}}" class="btn btn-warning btn-sm ml-auto"> <i class="bi bi-arrow-left-circle"></i></i> Kembali </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form method="post" action="{{ route('berita.update', $berita->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="berita">Nama Penulis</label>
                                                <input type="text" name="penulis" class="form-control" id="text" value="{{$berita->penulis}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="berita">Judul</label>
                                                <input type="text" name="judul" class="form-control" id="text" value="{{$berita->judul}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="berita">Deskripsi Berita</label>
                                                <textarea type="text" class="form-control square"
                                                          placeholder="Enter Deskripsi" name="body" style="height: 200px">{{ $berita->body}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="berita">Kategori</label>
                                                <select name="kategori_berita_id" class="form-control">
                                                    @foreach ($kategori_berita as $row)
                                                        @if ($row->id == $berita->kategori_berita_id)
                                                            <option value={{$row->id}} selected='selected'> {{ $row->nama_kategori}} </option>
                                                        @else
                                                            <option value="{{$row->id}}">
                                                                {{ $row->nama_kategori}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="berita">Status</label>
                                                <select name="is_active" class="form-control">
                                                    <option value="1" {{$berita->is_active == '1' ? 'selected' : '' }}>
                                                        Terbitkan
                                                    </option>
                                                    <option value="0" {{$berita->is_active == '0' ? 'selected' : '' }}>
                                                        Draf
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="gambar">Gambar Berita</label>
                                                <input class="form-control" type="file" id="formFile" name="gambar">
                                                <br>
                                                <label for="gambar">Gambar Saat Ini</label><br>
                                                <img src="{{asset('uploads/'.$berita->gambar) }}" width="100">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-info btn-sm" type="submit"> Simpan </button>
                                                <button class="btn btn-danger btn-sm" type="reset"> Reset </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Input Style end -->
        </div>

    </div>
</div>
<script src="../../assets/static/js/components/dark.js"></script>
<script src="../../assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

@include('sweetalert::alert', ['cdn'=>"https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script src="../assets/extensions/quill/quill.min.js"></script>
<script src="../assets/static/js/pages/quill.js"></script>

@include('back.administrasi.footer.footer')
<script src="../../assets/compiled/js/app.js"></script>


</body>

</html>
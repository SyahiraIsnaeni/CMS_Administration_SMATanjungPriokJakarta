<!DOCTYPE html>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/a59b9b09ab.js" crossorigin="anonymous"></script>
  <title>SMA Tanjung Priok Jakarta</title>
  <!-- add icon link -->
  <link rel="icon" href="{{asset('front/logo.png')}}" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}" />
  <link rel="icon" href="2.jpeg" />
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="css/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

<!-- NAVBAR -->

<section id="navigationbar">
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #136a71">
    <div class="container">
      <a class="navbar-brand" style="font-size: 15px; text-align: center; float: center" href="{{ 'beranda' }}">
        <img src="{{asset('front/logo.png')}}" alt="logo" height="50" style="float: left" /><strong> SMA TANJUNG PRIOK<br />JAKARTA UTARA</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
        <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ '/' }}">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ 'profil' }}">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ 'guru-staf' }}">Guru & Staf</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ 'galeri-sekolah' }}">Galeri</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">E-Learning</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('#kontak-kami') }}">Kontak</a>
            </li>
          <li class="nav-item">
            <a class="cta" href="#" style="color: #136a71"><button style="border-radius: 6px; color: #136a71">Login</button></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</section>

<!-- Carousel -->
<section id="carousel" >
  <div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        @forelse($jumbotronActive as $row)
          <div class="carousel-item active">
            <img src="{{asset('uploads/'. $row->gambar)}}" class="d-block w-100 carousel-image" data-bs-interval="1000">
          </div>
        @empty
        @endforelse
        @forelse($jumbotron as $row)
          <div class="carousel-item">
            <img src="{{asset('uploads/'. $row->gambar)}}"class="d-block w-100 carousel-image" data-bs-interval="1000">
          </div>
        @empty
        @endforelse
    </div>
    <a class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </a>
  </div>
</section>

<!-- Pengenalan -->
<section id="pengenalan" style="margin-top: 80px">
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-5 col-md-12 col-sm-12 d-flex justify-content-center">
        <img src="{{asset('front/sma.jpg')}}" class="rounded d-flex" alt="logo" height="370" width="600" />
      </div>
      <div class="col-lg-6 offset-lg-1 col-md-12 col-sm-12 " style="font-family: Poppins; padding-left: 40px">
        <h2 class=" d-flex justify-content-start"><b>SMA Tanjung Priok Jakarta</b></h2>
        <p align="justify" class="d-flex justify-content-center">
          SMA Tanjung Priok Jakarta adalah sebuah lembaga pendidikan menengah atas berakreditasi A yang berkomitmen untuk menjadi yang terdepan dalam mencapai mutu pendidikan sambil tetap mengakar pada nilai-nilai dan budaya bangsa.
          SMA Tanjung Priok Jakarta mengedepankan pembentukan karakter siswa, termasuk nilai-nilai moral, etika, kepemimpinan, dan keterampilan sosial.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Floating -->
<section id="floating" style="background-color: #bce7eb;margin-top: 100px;height: 550px">
  <div class="container" style="width: 100%; display: grid;">
    <div ><img class="gambarF1" src="{{asset('front/bintangF.png')}}"/></div>
    <div>
      <img class="gambarF2" src="{{asset('front/bintangF.png')}}"/>
    </div>
      @forelse ($hariNasional as $row)
    <div>
      <img class="gambarPostingan" src="{{asset('uploads/'.$row->gambar) }}" />
      <div id="tulisan">
        <p>
          {{$row->deskripsi}}
        </p>
      </div>
    </div>
      @empty
      @endforelse
    <div ><img class="gambarF3" src="{{asset('front/bintangF.png')}}"/></div>
    <div >
      <img class="gambarF4" src="{{asset('front/bintangF.png')}}"/>
    </div>
  </div>
</section>

<!-- Button Postingan -->
<section id="button-postingan" style="background-color: transparent; margin-top: 150px">
  <div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
        <div class="card-button rounded" style="background-color: white;
        box-shadow: 1px 2px 3px 3px rgba(0.3, 0.3, 0.3, 0.3);"
             onmouseover="this.style.backgroundColor='#bce7eb';"
             onmouseout="this.style.backgroundColor= '#ffffff';">
          <a href="{{ 'prestasi-sekolah' }}" class="text-decoration-none">
            <img src="{{asset('front/piala.png')}}"width="240px" height="160px" style="text-align: center;margin-left: 5px">
            <p style="color: black; font-size: 22px; font-weight: bold; margin-top: -10px; text-align: center;">
              Prestasi
            </p>
          </a>
        </div>
      </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
        <div class="card-button rounded" style="background-color: white; box-shadow: 1px 2px 3px 3px rgba(0.3, 0.3, 0.3, 0.3);"
             onmouseover="this.style.backgroundColor='#bce7eb';"
             onmouseout="this.style.backgroundColor= '#ffffff';">
          <a href="{{ 'daftar-pengumuman' }}" class="text-decoration-none">
            <img src="{{asset('front/pengumuman.png')}}" width="240px" height="160px" style="margin-left: 10px">
            <p style="color: black; font-size: 22px; font-weight: bold; margin-top: -10px; text-align: center;">
              Pengumuman
            </p>
          </a>
        </div>
      </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
        <div class="card-button rounded" style="background-color: white; box-shadow: 1px 2px 3px 3px rgba(0.3, 0.3, 0.3, 0.3);"
             onmouseover="this.style.backgroundColor='#bce7eb';"
             onmouseout="this.style.backgroundColor= '#ffffff';">
          <a href="{{ 'daftar-berita' }}" class="text-decoration-none">
            <img src="{{asset('front/news.png')}}" width="310px" height="160px" style="margin-left: 5px">
            <p style="color: black; font-size: 22px; font-weight: bold; margin-top: -10px; text-align: center;">
              Berita
            </p>
          </a>
        </div>
      </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">

        <div class="card-button rounded" style="background-color: white; box-shadow: 1px 2px 3px 3px rgba(0.3, 0.3, 0.3, 0.3);"
             onmouseover="this.style.backgroundColor='#bce7eb';"
             onmouseout="this.style.backgroundColor= '#ffffff';">
          <a href="{{ 'daftar-blog' }}" class="text-decoration-none">
            <img src="{{asset('front/blog.png')}}" width="250px" height="160px" style="margin-left: -15px">
            <p style="color: black; font-size: 22px; font-weight: bold; margin-top: -10px; text-align: center;">
              Blog Pendidik
            </p>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Ekstrakurikuler -->
<section id="ekstrakurikuler" >
    <div class="container">
        <div class="row">
            <h2 ><b>Ekstrakurikuler</b></h2>
            <div class="col-1 d-flex justify-content-start" style="margin-top: 95px;margin-left: 50px">
                <button id="arrow-left-ekskul" onclick="prevEkskul()"
                        onmouseover="this.style.boxShadow='1px 2px 2px 2px rgba(0, 0, 0, 0.3)';
                      this.style.backgroundColor='#ffffff'"
                        onmouseout="this.style.backgroundColor= '#bce7eb';this.style.boxShadow='0px 0px 0px 0px rgba(0, 0, 0, 0)'">
                    <img id="gambar_kiri" src="{{asset('front/panah-kiri.png')}}">
                </button>
            </div>
            <div class="main-card col-lg-4 col-md-8 col-sm-10 d-flex justify-content-start" id="main-card-ekskul"
                 style="overflow-x: hidden;margin-top: 40px">
                @forelse ($ekstrakurikuler as $row)
                <div class="card-ekskul me-3">
                    <a href="#" class="text-decoration-none">
                        <img src="{{asset('uploads/'.$row->logo) }}" class="gambar_ekskul rounded">
                        <p class="judul">
                            {{$row->nama}}
                        </p>
                        <p class="ekskul_sekolah">
                            {{$row->nama}} SMA Tanjung Priok
                        </p>
                        <div>
                            <button class="button_selengkapnya">
                                <a style="text-decoration: none; color: black;justify-content: center;
                                font-size: 18px" href="{{route('detail-ekstrakurikuler', $row->id)}}">Selengkapnya</a>
                            </button>
                        </div>
                    </a>
                </div>
                @empty
                @endforelse
            </div>
            <div class="col-1 d-flex justify-content-start" style="margin-top: 95px">
                <div>
                    <button id="arrow-right-ekskul" onclick="nextEkskul()"
                            onmouseover="this.style.boxShadow='1px 2px 2px 2px rgba(0, 0, 0, 0.3)';
                      this.style.backgroundColor='#ffffff'"
                            onmouseout="this.style.backgroundColor= '#bce7eb';this.style.boxShadow='0px 0px 0px 0px rgba(0, 0, 0, 0)'">
                        <img id="gambar_kanan" src="{{asset('front/panah-kanan.png')}}">
                    </button>
                </div>
            </div>
            <div class="col d-flex justify-content-start" style="margin-left: 60px;margin-top: 40px">
                <img id="image-ekskul" src="{{asset('front/ekstrakurikuler.png')}}" alt="logo" />
            </div>
        </div>
    </div>
    <script>
        var sliderMainEkskul = document.getElementById("main-card-ekskul");
        var itemEkskul = sliderMainEkskul.getElementsByClassName("card-ekskul");

        function nextEkskul(){
            sliderMainEkskul.append(itemEkskul[0]);
        }

        function prevEkskul(){
            sliderMainEkskul.prepend(itemEkskul[itemEkskul.length - 1]);
        }
    </script>
</section>

<!-- Prestasi -->
<section id="prestasi">
    <div class="container">
        <div class="row">
            <h2><b>Prestasi</b></h2>
            <div class="col-4">
                <img id="image-prestasi" src="{{asset('front/prestasi.png')}}" alt="logo-prestasi" />
            </div>
            <div class="col-1 d-flex justify-content-start" style="margin-top: 120px; margin-left: 250px">
                <button
                    id="arrow-left-prestasi"
                    onclick="prevPrestasi()"
                    onmouseover="this.style.boxShadow='1px 2px 2px 2px rgba(0, 0, 0, 0.3)';
                    this.style.backgroundColor='#000000';this.style.color= '#ffffff'"
                    onmouseout="this.style.boxShadow='0px 0px 0px 0px rgba(0, 0, 0, 0)';
                this.style.backgroundColor= '#ffffff';this.style.color= 'black'"
                >
                    <i id="icon-left" class="fa-solid fa-chevron-left fa-2xl"></i>
                </button>
            </div>
            <div class="main-card col-lg-4 col-md-8 col-sm-10 d-flex justify-content-start" id="main-card-prestasi"
                 style="overflow-x: hidden;margin-top: 40px">
                @forelse ($prestasi as $row)
                <div class="card-prestasi me-3">
                    <a href="{{ 'prestasi-sekolah' }}" class="text-decoration-none">
                        <img src="{{asset('uploads/'.$row->foto) }}" class="gambar_prestasi rounded">

                        <div class="card">
                            <p class="nama_siswa">
                                {{$row->nama}}
                            </p>
                            <p class="nama_prestasi">{{$row->nama_prestasi}}</p>
                        </div>

                    </a>
                </div>
                @empty
                @endforelse
            </div>
            <div class="col d-flex justify-content-start" style="margin-top: 120px; margin-left: 250px">
                <button
                    id="arrow-right-prestasi"
                    onclick="nextPrestasi()"
                    onmouseover="this.style.boxShadow='1px 2px 2px 2px rgba(0, 0, 0, 0.3)';
                  this.style.backgroundColor='#000000';this.style.color= '#ffffff'"
                    onmouseout="this.style.backgroundColor= '#ffffff';this.style.color= 'black';
                  this.style.boxShadow='0px 0px 0px 0px rgba(0, 0, 0, 0)';"
                >
                    <i id="icon-right" class="fa-solid fa-chevron-right fa-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    <script>
        var sliderMainPrestasi = document.getElementById("main-card-prestasi");
        var itemPrestasi = sliderMainPrestasi.getElementsByClassName("card-prestasi");

        function nextPrestasi(){
            sliderMainPrestasi.append(itemPrestasi[0]);
        }

        function prevPrestasi(){
            sliderMainPrestasi.prepend(itemPrestasi[itemPrestasi.length - 1]);
        }
    </script>
</section>

<!--Berita dan Pengumuman-->
<section id="pengumuman">
  <div class="background-1">
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-5 offset-lg-1 col-md-12 col-sm-12">
          <!-- Menambahkan opening <div> yang hilang di atas elemen <h3> -->
          <h2 class="judul1" style="margin-bottom: 30px;margin-left: -60px;margin-top: 50px">Pengumuman</h2>
            @forelse ($pengumuman as $row)
                <ul class="list-group list-group-flush" style="margin-left: -50px">
                    <div class="row mb-3">
                        <div class="col-3 text-center text-white" style="background-color: black; font-family: Poppins; border-radius: 10px 10px 10px 10px; width: 75px; height: 68px; padding: 5px;padding-top: 10px">
                            @if (substr($row['created_at'], 5, 2) == '01')
                                <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>JAN</b></span>
                            @elseif(substr($row['created_at'], 5, 2) == '02')
                                <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>FEB</b></span>
                            @elseif(substr($row['created_at'], 5, 2) == '03')
                                <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>MAR</b></span>
                            @elseif(substr($row['created_at'], 5, 2) == '04')
                                <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>APR</b></span>
                            @elseif(substr($row['created_at'], 5, 2) == '05')
                                <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>MEI</b></span>
                            @elseif(substr($row['created_at'], 5, 2) == '06')
                                <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>JUN</b></span>
                            @elseif(substr($row['created_at'], 5, 2) == '07')
                                <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>JUL</b></span>
                            @elseif(substr($row['created_at'], 5, 2) == '08')
                                <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>AGU</b></span>
                            @elseif(substr($row['created_at'], 5, 2) == '09')
                                <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>SEP</b></span>
                            @elseif(substr($row['created_at'], 5, 2) == '10')
                                <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>OKT</b></span>
                            @elseif(substr($row['created_at'], 5, 2) == '11')
                                <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>NOV</b></span>
                            @elseif(substr($row['created_at'], 5, 2) == '12')
                                <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>DES</b></span>
                            @endif
                        </div>
                        <div class="col">
                            <a  href="{{route('detail-pengumuman', $row->slug)}}" style="color: black" >
                                <h6 style="margin-top: 10px;text-align:justify;font-size: 17px " class="card-title text-black" >{{$row['judul']}}</h6>
                            </a>
                        </div>
                    </div>
                </ul>
            @empty
            @endforelse
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center">
            @forelse ($pengumumanPrioritas as $row)
            <!-- <img id="image-prestasi" src="{{asset('uploads/'.$row->gambar)}}" alt="logo-prestasi" /> -->
          <img src="{{asset('uploads/'.$row->gambar) }}" class="rounded d-flex" alt="logo" height="370" width="600" />
            @empty
            @endforelse
        </div>
      </div>
    </div>
  </div>
</section>

<section id="berita">
  <div class="background-2">
  <div class="container mt-5">
      <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center">
              @forelse ($beritaPrioritas as $row)
                  <img src="{{asset('uploads/'.$row->gambar) }}" style="margin-top: 60px" class="rounded d-flex" alt="logo" height="400" width="630" />
              @empty
              @endforelse
          </div>
          <div class="col-lg-5 offset-lg-1 col-md-12 col-sm-12">
              <!-- Menambahkan opening <div> yang hilang di atas elemen <h3> -->
              <h2 class="judul1" style="margin-bottom: 30px;margin-left: -60px;margin-top: 50px">Berita Terkini</h2>
              @forelse ($berita as $row)
                  <ul class="list-group list-group-flush" style="margin-left: -50px">
                      <div class="row mb-3">
                          <div class="col-3 text-center text-white" style="background-color: black; font-family: Poppins; border-radius: 10px 10px 10px 10px; width: 75px; height: 68px; padding: 5px;padding-top: 10px">
                              @if (substr($row['created_at'], 5, 2) == '01')
                                  <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>JAN</b></span>
                              @elseif(substr($row['created_at'], 5, 2) == '02')
                                  <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>FEB</b></span>
                              @elseif(substr($row['created_at'], 5, 2) == '03')
                                  <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>MAR</b></span>
                              @elseif(substr($row['created_at'], 5, 2) == '04')
                                  <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>APR</b></span>
                              @elseif(substr($row['created_at'], 5, 2) == '05')
                                  <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>MEI</b></span>
                              @elseif(substr($row['created_at'], 5, 2) == '06')
                                  <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>JUN</b></span>
                              @elseif(substr($row['created_at'], 5, 2) == '07')
                                  <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>JUL</b></span>
                              @elseif(substr($row['created_at'], 5, 2) == '08')
                                  <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>AGU</b></span>
                              @elseif(substr($row['created_at'], 5, 2) == '09')
                                  <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>SEP</b></span>
                              @elseif(substr($row['created_at'], 5, 2) == '10')
                                  <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>OKT</b></span>
                              @elseif(substr($row['created_at'], 5, 2) == '11')
                                  <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>NOV</b></span>
                              @elseif(substr($row['created_at'], 5, 2) == '12')
                                  <span class='date'>{{substr($row['created_at'], 8, 2)}}</span><br><span class='month'><b>DES</b></span>
                              @endif
                          </div>
                          <div class="col">
                              <a  href="{{route('detail-berita', $row->slug)}}" style="color: black" >
                                  <h6 style="margin-top: 10px;text-align:justify;font-size: 17px " class="card-title text-black" >{{$row['judul']}}</h6>
                              </a>
                          </div>
                      </div>
                  </ul>
              @empty
              @endforelse
          </div>
      </div>
  </div>
</div>
</section>

<!-- Blog Pendidik -->
<section id="blog">
    <div class="container">
        <div class="row">
        <h2>Blog Pendidik</h2>
            <div class="col-1 d-flex justify-content-start">
                <button id="arrow-left" onclick="prev()" onmouseover="this.style.backgroundColor='#136A71';
            this.style.color= '#ffffff'" onmouseout="this.style.backgroundColor= '#ffffff';this.style.color= 'black'">
                    <i class="panah fa-solid fa-chevron-left fa-lg-2xl fa-md-xxl fa-sm-xl"></i>
                </button>
            </div>
            <div class="main-card col-10 d-flex justify-content-start" id="main-card" style="overflow-x: hidden;">
                @forelse ($blog as $row)
                <div class="card-blog me-3">
                    <a href="{{route('detail-blog', $row->slug)}}" class="text-decoration-none">
                        <img src="{{asset('uploads/'.$row->gambar) }}" class="rounded" >
                        <div class="card-title rounded text-center">
                            <p>
                                {{$row['judul']}}
                            </p>
                        </div>
                    </a>
                </div>
                @empty
                @endforelse
        </div>
            <div class="col-1 d-flex justify-content-start">
                <div>
                    <button id="arrow-right" onclick="next()"
                            onmouseover="this.style.backgroundColor='#136A71';this.style.color= '#ffffff'"
                            onmouseout="this.style.backgroundColor= '#ffffff';this.style.color= 'black'">
                        <i class="fa-solid fa-chevron-right fa-lg-2xl"></i>
                    </button>
                </div>
            </div>
    </div>
    <script>
        var sliderMain = document.getElementById("main-card");
        var item = sliderMain.getElementsByClassName("card-blog");

        function next(){
            sliderMain.append(item[0]);
        }

        function prev(){
            sliderMain.prepend(item[item.length - 1]);
        }
    </script>
    <div>
        <button id="selengkapnya">
            <a style="text-decoration: none; color: black;justify-content: center;
            font-size: 18px" href="{{ 'daftar-blog' }}">Selengkapnya</a>
        </button>
    </div>
    </div>
</section>

<!-- Kontak Kami -->
<section id="kontak-kami" style="margin-top: 100px; margin-bottom: 100px" >
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-4">
            <h3 style="font-weight: bold">Kontak Kami</h3>
            <ul class="list-unstyled">
              <li style="margin-bottom: 15px; font-size: 20px; margin-top: 30px"><i class="fas fa-map-marker-alt"></i> Jl. Mangga No. 40 14270, Jakarta Utara, DKI Jakarta</li>
              <li style="margin-bottom: 15px; font-size: 20px"><i class="far fa-clock"></i> Senin - Sabtu (07.00 - 15.00)</li>
              <li style="margin-bottom: 15px; font-size: 20px"><i class="fas fa-phone"></i> - </li>
              <li style="margin-bottom: 15px; font-size: 20px"><i class="far fa-envelope"></i> Smatanjungpriok2@gmail.com</li>
            </ul>
          </div>
          <div class="col-md-6">
            <div class="embed-responsive embed-responsive-16by9">
              <div class="embed-responsive-item">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.118510695867!2d106.90850987484097!3d-6.114744293871835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a201f9790436b%3A0xe7648e8e720cd1e!2sSenior%20High%20School%20of%20Tanjung%20Priok!5e0!3m2!1sen!2sid!4v1695373061574!5m2!1sen!2sid"
                  width="100%"
                  height="300"
                  style="border: 0"
                  allowfullscreen=""
                  loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- Footer -->
@include('front.footer')
</body>
</html>

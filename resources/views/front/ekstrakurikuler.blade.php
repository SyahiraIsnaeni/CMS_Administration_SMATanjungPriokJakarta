<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/a59b9b09ab.js" crossorigin="anonymous"></script>
    <title>SMA Tanjung Priok Jakarta</title>
    <!-- add icon link -->
    <link rel="icon" href="assets/logo.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/ekstrakurikuler.css')}}" />
    <link rel="icon" href="2.jpeg" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
  </head>

  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

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
              <a class="nav-link" href="{{ 'beranda' }}">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ 'front-profil' }}">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ 'front-guru-staf' }}">Guru & Staf</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ 'front-galeri' }}">Galeri</a>
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

    <!-- ekstrakurikuler -->
    <section id="ekskul" style="margin-top: 40px">
      <div class="container">
        <div class="row">
          <h2 class="d-flex justify-content-center mt-3 mb-4" style="font-weight: bold;" >{{$ekstrakurikuler->nama}} SMA Tanjung Priok</h2>
          <div class="col d-flex justify-content-center">
            <img src="{{asset('uploads/'. $ekstrakurikuler->logo)}}"class="rounded d-flex" alt="logo" height="370" width="600" />
          </div>
        </div>

        <div class="row">
          <div class="col" style="font-family: Poppins; padding-left: 40px; margin-top: 50px">
            <p align="justify" class="d-flex justify-content-center">
                {{$ekstrakurikuler->deskripsi}}
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Foto Kegiatan -->
    <section id="kegiatanlain" class="mt-5">
      <div class="container mb-5">
        <div class="row">
          <h4 style="padding-left: 40px; font-weight: bold; font-size: 26px">Foto Kegiatan</h4>
        </div>
        <div class="row d-flex justify-content-center" style="padding-left: 25px; margin-top: 10px">
            @foreach($ekstrakurikuler->image as $images)
                <div class="foto col-4-lg-3 col-md-4 col-sm-12 d-flex justify-content-center">
                    <img src="{{ asset('uploads/' . $images->image) }}" class="rounded" width="270" height="350" />
                </div>
            @endforeach
        </div>
      </div>
    </section>

    <!-- Footer -->
    @include('front.footer')
    
  </body>
</html>

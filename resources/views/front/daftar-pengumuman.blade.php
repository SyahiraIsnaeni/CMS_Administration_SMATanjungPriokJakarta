<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/a59b9b09ab.js" crossorigin="anonymous"></script>
    <title>SMA Tanjung Priok Jakarta | Daftar Pengumuman</title>
    <!-- add icon link -->
    <link rel="icon" href="assets/logo.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/daftarppb.css')}}"  />
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}" />
    <link rel="icon" href="{{asset('front/logo.png')}}" />
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
      <a class="navbar-brand" style="font-size: 15px; text-align: center; float: center" href="{{ '/' }}">
        <img src="{{asset('front/logo.png')}}" alt="logo" height="50" style="float: left" /><strong> SMA TANJUNG PRIOK<br />JAKARTA UTARA</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
        <li class="nav-item">
              <a class="nav-link" href="{{ '/' }}">Beranda</a>
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

<!-- Daftar PPB -->
<section id="pengenalan" style="margin-top: 80px">
    <div class="container mt-5">
        <div class="row">
            <h1 class="header" style="font-size: 38px;margin-bottom: 60px;margin-left: 75px">Daftar Pengumuman</h1>
            @forelse ($pengumuman as $row)
                <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center">
                    <img src="{{asset('uploads/'. $row->gambar)}}" class="rounded d-flex" alt="logo" height="280" width="480" style="margin-bottom: 70px" />
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12" style="font-family: Poppins; padding-left: 40px">
                    <h4 class="tulisan d-flex justify-content-start"><a class="judulppb" href="{{route('detail-pengumuman', $row->slug)}}">{{$row->judul}}</a></h4>
                    <a align="justify" class="isippb d-flex justify-content-center"  href="{{route('detail-pengumuman', $row->slug)}}">
                        {!! substr($row->body, 0, 300)!!} ...
                    </a>
                </div>
            @empty
            @endforelse
        </div>
    </div>
</section>

<!-- Footer -->
@include('front.footer')

</body>
</html>

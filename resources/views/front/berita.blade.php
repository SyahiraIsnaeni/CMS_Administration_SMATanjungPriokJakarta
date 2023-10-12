<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/a59b9b09ab.js" crossorigin="anonymous"></script>
    <title>SMA Tanjung Priok Jakarta</title>
    <!-- add icon link -->
    <link rel="icon" href="assets/logo.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/detailppb.css')}}"  />
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
      <a class="navbar-brand" style="font-size: 15px; text-align: center; float: center" href="{{ 'beranda'}}">
        <img src="{{asset('front/logo.png')}}" alt="logo" height="50" style="float: left" /><strong> SMA TANJUNG PRIOK<br />JAKARTA UTARA</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
        <li class="nav-item">
              <a class="nav-link"  href="{{ 'beranda'}}">Beranda</a>
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

    <!--Detail PPB-->
    <div class="container">
      <div align="center" class="detailppb"><img src="{{asset('uploads/' . $berita->gambar)}}" class="rounded"/></div>
      <div class="content">
        <h2 class="judulppb" style="font-size: 34px">{{$berita->judul}}</h2>
        <p class="penulis" style="font-size: 15px">By {{$berita->penulis}}</p>
        <p class="penulis" style="margin-top: -15px">{{$berita->created_at->format('d M Y')}} | {{$berita->kategori_berita->nama_kategori}}</p>
        <p align="justify" class="isikonten d-flex justify-content-center">
            {!! $berita->body !!}
        </p>
      </div>
    </div>

    <!-- Foto Kegiatan -->
    <section id="artikellainnya">
        <div class="container mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <h3 class="tulsel" style="font-weight: bold">What to Read Next</h3>
                </div>
                <div class="row g-3">
                    @forelse ($nextBerita as $row)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="foto card">
                                <img src="{{asset('uploads/'.$row->gambar) }}" class="card-img-top" alt="events" height="250">
                                <div class="card-body">
                                    <h5 class="card-title" align="justify" style="font-weight: bold">{{$row->judul}}</h5>
                                    <p class="card-text" align="justify" style="font-size: 15px">{!! substr($row->body, 0, 100)!!} ...</p>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-outline-secondary">
                                        <a class="text-black" href="{{route('detail-berita', $row->slug)}}" style="text-decoration: none;">
                                            Selengkapnya
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    @include('front.footer')

  </body>
</html>

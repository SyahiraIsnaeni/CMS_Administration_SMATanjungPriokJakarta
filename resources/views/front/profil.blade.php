<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/a59b9b09ab.js" crossorigin="anonymous"></script>
    <title>Profil Sekolah</title>
    <!-- add icon link -->
    <link rel="icon" href="assets/logo.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/profil.css')}}"  />
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}" />
    <link rel="icon" href="{{asset('front/logo.png')}}"  />
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
              <a class="nav-link " href="{{ '/' }}">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ 'profil' }}">Profil</a>
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

    <!-- Sambutan Kepala Sekolah -->
    <section id="sambutan" style="margin-top: 80px">
      <div class="container mt-5">
        @forelse ($sambutan as $row)
        <div class="row">
          <div class="col-lg-5 col-md-12 col-sm-12 d-flex justify-content-center">
            <img src="{{asset('uploads/'. $row->foto)}}"class="rounded d-flex" alt="logo" height="700" width="600" />
          </div>
          <div class="col-lg-6 offset-lg-1 col-md-12 col-sm-12" style="font-family: Poppins; padding-left: 40px">
            <h2 class="d-flex justify-content-start"><b>Sambutan Kepala Sekolah</b></h2>
            <p align="justify" class="d-flex justify-content-center">
              {{$row->sambutan}}
            </p>
          </div>
        </div>
          @empty
          @endforelse
      </div>
    </section>

    <!-- Sejarah SMA -->
    @forelse ($sejarah as $row)
    <section id="sejarah">
      <div class="container">
        <h2 class="mt-5"><b>Sejarah SMA Tanjung Priok Jakarta</b></h2>
        <div class="row">
          <div class="col-12">
            <p>
              {{$row->sejarah}}
            </p>
          </div>
        </div>
      </div>
    </section>
    @empty
    @endforelse

    <!-- Visi dan Misi -->
    <section id="visimisi" style="margin-top: 100px">
      <div class="container mt-5">
        <div class="row">
          <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center">
            <img src="{{asset('front/visi.jpg')}}" class="rounded d-flex" alt="logo" height="400" width="400" />
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12" style="font-family: Poppins; padding-left: 40px">
            <h2 class="d-flex justify-content-start"><b>Visi</b></h2>
            <p align="justify" class="d-flex justify-content-center">Unggul Dalam Mutu Berpijak pada Budaya Bangsa</p>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12" style="font-family: Poppins; padding-left: 40px">
            <h2 class="d-flex justify-content-start"><b>Misi</b></h2>
            <ol class="list-group list-group-numbered">
              <li class="list-group-item d-flex justify-content-between align-items-start" style="text-align: justify;border: none">Melaksanakan pembelajaran dan bimbingan secara efektif, sehingga setiap siswa berkembang secara optimal, sesuai dengan potensi yang dimiliki</li>
              <li class="list-group-item d-flex justify-content-between align-items-start" style="text-align: justify;border: none">Menumbuhkan semangat keunggulan secara intensif kepada seluruh warga sekolah</li>
              <li class="list-group-item d-flex justify-content-between align-items-start" style="text-align: justify;border: none">Mendorong dan membantu untuk mengenali potensi dirinya, sehingga dapat dikembangkan secara optimal</li>
              <li class="list-group-item d-flex justify-content-between align-items-start" style="text-align: justify;border: none">Menumbuhkan penghayatan terhadap ajaran agama yang dianut dan juga budaya bangsa sehingga menjadi sumber kearifan dalam bertindak</li>
              <li class="list-group-item d-flex justify-content-between align-items-start" style="text-align: justify;border: none">Menerapkan manajemen partisipatif dengan melibatkan seluruh warga sekolah dan penentu kebijakan sekolah</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Fasilitas Sekolah -->
    <section id="fasilitas" class="overflow-hidden">
      <h2><b>Fasilitas Sekolah</b></h2>
      <div class="container">
        <div class="row">
          <div class="col-1 d-flex justify-content-start">
            <button id="arrow-left" onclick="prev()" onmouseover="this.style.backgroundColor='#136A71';this.style.color= '#ffffff'" onmouseout="this.style.backgroundColor= '#ffffff';this.style.color= 'black'">
              <i class="panah fa-solid fa-chevron-left fa-lg-2xl fa-md-xxl fa-sm-xl"></i>
            </button>
          </div>
          <div class="main-card col-10 d-flex justify-content-start" id="main-card" style="overflow-x: hidden">
              @forelse ($fasilitas as $row)
            <div class="card-fasilitas me-3">
              <img src="{{asset('uploads/'. $row->foto)}}"class="fasilitas rounded" width="350" height="240" />
            </div>
              @empty
              @endforelse
          </div>
          <div class="col-1 d-flex justify-content-start">
            <div>
              <button id="arrow-right" onclick="next()" onmouseover="this.style.backgroundColor='#136A71';this.style.color= '#ffffff'" onmouseout="this.style.backgroundColor= '#ffffff';this.style.color= 'black'">
                <i class="fa-solid fa-chevron-right fa-lg-2xl"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <script>
        var sliderMain = document.getElementById("main-card");
        var item = sliderMain.getElementsByClassName("card-fasilitas");

        function next() {
          sliderMain.append(item[0]);
        }

        function prev() {
          sliderMain.prepend(item[item.length - 1]);
        }
      </script>
    </section>

    <!-- Struktural Sekolah -->
    @forelse ($struktur as $row)
    <section id="struktur" style="margin-top: 100px">
      <div class="container mt-5">
        <h2><b>Struktural Sekolah</b></h2>
        <div class="row">
          <div class="col-12 d-flex justify-content-center align-items-center">
            <img src="{{asset('uploads/'. $row->gambar)}}" class="rounded d-flex" alt="logo" height="600" width="1000" />
          </div>
        </div>
      </div>
    </section>
    @empty
    @endforelse


    <!-- Footer -->
    @include('front.footer')
  </body>
</html>

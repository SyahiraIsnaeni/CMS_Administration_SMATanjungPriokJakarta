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

    <!-- Carousel -->
    <section id="carousel" >
  <div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('front/smp.png')}}" class="d-block w-100 carousel-image" data-bs-interval="1000">
      </div>
      <div class="carousel-item">
        <img src="{{asset('front/profilsekolah.png')}}"class="d-block w-100 carousel-image" data-bs-interval="1000">
      </div>
      <div class="carousel-item">
        <img src="{{asset('front/sma.jpg')}}" class="d-block w-100 carousel-image" data-bs-interval="1000">
      </div>
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
        <div class="row">
          <div class="col-lg-5 col-md-12 col-sm-12 d-flex justify-content-center">
            <img src="{{asset('front/sambutan.png')}}"class="rounded d-flex" alt="logo" height="700" width="600" />
          </div>
          <div class="col-lg-6 offset-lg-1 col-md-12 col-sm-12" style="font-family: Poppins; padding-left: 40px">
            <h2 class="d-flex justify-content-start"><b>Sambutan Kepala Sekolah</b></h2>
            <p align="justify" class="d-flex justify-content-center">
              Puji syukur kami panjatkan kehadirat Allah SWT atas segala limpahan nikmat sehat, rahmat dan karunia-Nya, sehingga SMA Tanjung Priok Jakarta berhasil membangun website sekolah. Kehadiran Website SMA Negeri 92 Jakarta,
              diharapkan dapat mempermudah penyampaian informasi secara terbuka kepada seluruh warga sekolah khususnya, alumni, instansi terkait, dan masyarakat pada umumnya. Semoga dengan kehadiran Website SMA Tanjung Priok Jakarta akan
              terjalin komunikasi antar warga sekolah, alumni, dan anggota masyarakat pada umumnya. Sehubungan dengan perkembangan ilmu pengetahuan, teknologi, dan informasi saat ini, semua warga sekolah harus mau untuk belajar menggunakan
              komputer dan internet baik dalam proses pembelajaran maupun kegiatan-kegiatan lainnya. Tujuannya untuk meningkatkan kemampuan dalam menguasai teknologi dan memperoleh informasi secara cepat dan akurat. Terima kasih kami
              ucapkan kepada Tim Website SMA Negeri 92 Jakarta, Bapak/Ibu guru maupun karyawan serta pengurus Komite atas dukungan dan bantuannya dalam membangun website sekolah ini. Semoga Allah SWT membalas dengan rejeki yang cukup dan
              berkah serta pahala yang berlipat ganda. Aamiin YRA. Selamat bekerja. Sekian, terima kasih.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Sejarah SMA -->
    <section id="sejarah">
      <div class="container">
        <h2 class="mt-5"><b>Sejarah SMA Tanjung Priok Jakarta</b></h2>
        <div class="row">
          <div class="col-12">
            <p>
              There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use
              a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first
              true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always
              free from repetition, injected humour, or non-characteristic words etc. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised
              words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the
              Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate
              Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. There are many variations of passages of Lorem Ipsum available. If you
              are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary,
              making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem
              Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Visi dan Misi -->
    <section id="visimisi" style="margin-top: 100px">
      <div class="container mt-5">
        <div class="row">
          <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center">
            <img src="{{asset('front/visi.jpg')}}"class="rounded d-flex" alt="logo" height="400" width="400" />
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12" style="font-family: Poppins; padding-left: 40px">
            <h2 class="d-flex justify-content-start"><b>Visi</b></h2>
            <p align="justify" class="d-flex justify-content-center">Unggul Dalam Mutu Berpijak pada Budaya Bangsa</p>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12" style="font-family: Poppins; padding-left: 40px">
            <h2 class="d-flex justify-content-start"><b>Misi</b></h2>
            <ol>
              <li style="text-align: justify">Melaksanakan pembelajaran dan bimbingan secara efektif, sehingga setiap siswa berkembang secara optimal, sesuai dengan potensi yang dimiliki</li>
              <li style="text-align: justify">Menumbuhkan semangat keunggulan secara intensif kepada seluruh warga sekolah</li>
              <li style="text-align: justify">Mendorong dan membantu untuk mengenali potensi dirinya, sehingga dapat dikembangkan secara optimal</li>
              <li style="text-align: justify">Menumbuhkan penghayatan terhadap ajaran agama yang dianut dan juga budaya bangsa sehingga menjadi sumber kearifan dalam bertindak</li>
              <li style="text-align: justify">Menerapkan manajemen partisipatif dengan melibatkan seluruh warga sekolah dan penentu kebijakan sekolah</li>
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
            <div class="card-fasilitas me-3">
              <img src="{{asset('front/blog1.jpg')}}"class="fasilitas rounded" width="350" height="240" />
            </div>
            <div class="card-fasilitas me-3">
              <img src="{{asset('front/blog2.jpg')}}" class="fasilitas rounded" width="350" height="240" />
            </div>
            <div class="card-fasilitas me-3">
              <img src="{{asset('front/blog3.jpg')}}" class="fasilitas rounded" width="350" height="240" />
            </div>
            <div class="card-fasilitas me-3">
              <img src="{{asset('front/sma.jpg')}}"class="fasilitas rounded" width="350" height="240" />
            </div>
            <div class="card-fasilitas me-3">
              <img src="{{asset('front/smp.jpg')}}"class="fasilitas rounded" width="350" height="240" />
            </div>
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
    <section id="struktur" style="margin-top: 100px">
      <div class="container mt-5">
        <h2><b>Struktural Sekolah</b></h2>
        <div class="row">
          <div class="col-12 d-flex justify-content-center align-items-center">
            <img src="{{asset('front/struktur1.jpg')}}" class="rounded d-flex" alt="logo" height="600" width="1000" />
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="" style="width: 100%">
  <div class="content">
    <div class="top">
      <div class="logo-details">
        <h4><img src="{{asset('front/logo.png')}}" alt="logo" height="50" /> SMA Tanjung Priok Jakarta</h4>
      </div>
      <div class="line">
      </div>
      <div class="media-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
    <div class="link-boxes">
      <ul class="box">
        <li class="link_name">Content</li>
        <li><a href="{{ 'front-berita' }}">Berita Sekolah</a></li>
        <li><a href="{{ 'front-pengumuman' }}" >Pengumuman</a></li>
        <li><a href="{{ 'front-blog' }}">Blog Pendidik</a></li>
      </ul>
      <ul class="box">
        <li class="link_name">Information</li>
        <li><a href="{{ 'front-profil' }}">Profil Sekolah</a></li>
        <li><a href="{{ 'front-guru-staf' }}">Guru dan Staf</a></li>
        <li><a href="{{ 'front-galeri' }}">Galeri Sekolah</a></li>
      </ul>
      <ul class="box">
        <li class="link_name">Quick Link</li>
        <li><a href="{{ 'beranda' }}">Home</a></li>
        <li><a href="{{ url('#kontak-kami') }}">Sitemap</a></li>
      </ul>
      <ul class="box">
        <li class="{{ url('#kontak-kami') }}">Contact Us</li>
        <li><i class="fas fa-envelope mr-3" style="color: white"></i> smatanjngpriokjkt@gmail.com</li>
        <li><i class="fas fa-phone mr-3" style="color: white"></i> 0984084093580</li>
      </ul>
    </div>
  </div>


      <div class="bottom" style="width: 100%; background: black"></div>
      <div class="bottom-details" style="font-size: 15px; text-align: center; float: center" style="color: white">
        <span style="color: white"><i class="fa fa-copyright"></i> <a style="color: white">SMA Tanjung Priok, 2023. All rights reserved </a></span> <br />
        <span style="color: white"
          ><a style="color: white"> Hand-crafted and made with </a><a title="cinta"><i class="fa fa-heart" style="color: #ee1b1b"></i> </a
        ></span>
        <a style="color: white">By Tim Capstone UNDIP</a>
      </div>
    </footer>
  </body>
</html>

@extends('user.layout.template')

@section('title', 'Home')
@section('title_page', 'Home')
@section('desc_page', '')
@section('content')
@section('styles')
  <style>
        /* Container for responsive iframe */
    .responsive-iframe-container {
        position: relative;
        padding-bottom: 56.25%; /* This maintains a 16:9 aspect ratio */
        height: 0;
        overflow: hidden;
        max-width: 100%;
        background: #000;
    }

    /* Style for iframe */
    .responsive-iframe-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0; /* Optional: remove iframe border */
    }
  </style>
@endsection

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <img src="{{asset('user/assets/img/hero-bg-2.jpg')}}" alt="" class="hero-bg">

      <div class="container">
        <div class="row gy-4 justify-content-between">
          <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
            <img src="{{asset('user/assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
          </div>

          <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
            <h1>Empower your system with all-in-one<span> Knowledge Hub</span></h1>
            <p>Selamat Datang di Knowledge Management System Kementerian Perhubungan bernama<br/> <b>Transportation Knowledge-Hub System (Trak-Hubs)</b></p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Get Started</a>
              <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>

        </div>
      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>

    </section><!-- /Hero Section -->

 <!-- Slogan Section -->
    <section id="testimonials" class="testimonials" style="height: 390px; --background-color: #ffffff70;" >

      <img src="{{asset('user/assets/img/slider-pimpinan.png')}}" class="testimonials-bg" alt="" >

      


          
         <div>
              <div class="testimonial-item">
                           
               
                <p>
                  <h3><i class="bi bi-quote quote-icon-left"></i>
                  Knowledge Driven Policies for Sustainable Transportation
                  <i class="bi bi-quote quote-icon-right"></i></h3>
                </p>
              </div>
            </div><!-- End testimonial item -->
                
  

    </section><!-- /Testimonials Section -->          
          
          
    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-xl-center gy-5">

          <div class="col-xl-5 content">
            <h3>About Us</h3>
            <h2>Trak-Hubs</h2>
            <p>Trak-Hubs adalah KMS Kementerian Perhubuangan yang dikembangkan pada tahun 2024 hasil kerjasama Kementerian Perhubungan dengan BRIN.</p>
            <a href="{{ url('user-home.html#details') }}" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>

          <div class="col-xl-7">
            <div class="row gy-4 icon-boxes">

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                  <a href="{{ url('auth-login.html') }}" class="read-more"><i class="bi bi-buildings"></i>
                  <h3>Fitur Knowledge Base dan Best Practices Database</h3></a>
                  <p>Fitur ini adalah wadah pengetahuan dan pengalaman yang dikelola di Kementerian Perhubungan</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <a href="{{ url('user-layananTransportasi.html') }}" class="read-more"><i class="bi bi-clipboard-pulse"></i>
                  <h3>Fitur Prediksi sarana transportasi</h3></a>
                  <p>Fitur ini untuk memprediksi traffic kendaraan dan pergerakan penumpang di sarana transportasi untuk menunjang kebijakan</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <a href="{{ url('user-knowledgeBasedChat.html') }}" class="read-more"><i class="bi bi-command"></i>
                  <h3>Fitur Knowledge-based Chat berbasis LLM</h3></a>
                  <p>Fitur ini untuk mempermudah sivitas Kemenhub dalam menelusur informasi dan pengetahuan berbasis chat dengan pengetahuan spesifik</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <a href="{{ url('user-analisisSentimen.html') }}" class="read-more"><i class="bi bi-graph-up-arrow"></i>
                  <h3>Fitur Analisis Sentimen</h3></a>
                  <p>Fitur ini digunakan untuk mengetahui sentimen masyarakat terkait sarana transportasi berdasarkan titik simpul sarana sebagai pendukung rekomendasi kebijakan</p>
                </div>
              </div> <!-- End Icon Box -->

            </div>
          </div>

        </div>
      </div>

    </section><!-- /About Section -->

    <!-- Details Section -->
    <section id="details" class="details section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Details</h2>
        <div><span>Rincian Fitur</span> <span class="description-title">Cerdas</span></div>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4 align-items-center features-item">
		
          <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
            <img src="{{asset('user/assets/img/details-1.png')}}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            <h3>Rincian Fitur Knowledge Base dan Best Practices Database</h3>

            <ul>
              <li><i class="bi bi-check"></i><span>Gamifikasi untuk mendukung praktik Knowledge Management berbasis partisipatif</span></li>
              <li><i class="bi bi-check"></i> <span>Dashboard Monitoring kinerja untuk pimpinan</span></li>
              <li><i class="bi bi-check"></i> <span>Statistik pemanfaatan konten pengetahuan</span></li>
            </ul>
          </div>
        </div><!-- Features Item -->

        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{asset('user/assets/img/details-2.png')}}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="200">
            <h3>Rincian Fitur Prediksi sarana transportasi</h3>
            <ul>
              <li><i class="bi bi-check"></i><span>Prediksi jumlah penumpang dan jumlah kendaraan di sarana transportasi </span></li>
              <li><i class="bi bi-check"></i> <span>Rekomendasi lokasi dan waktu untuk peningkatan layanan transportasi</span></li>
              <li><i class="bi bi-check"></i> <span>Indeks kesenjangan sarana </span></li>
            </ul>
          </div>
        </div><!-- Features Item -->

        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
            <img src="{{asset('user/assets/img/details-3.png')}}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7" data-aos="fade-up">
            <h3>Rincian Fitur Knowledge-based Chat berbasis LLM</h3>
            
            <ul>
              <li><i class="bi bi-check"></i> <span>Penelusuran informasi dan pengetahuan spesifik berbasis chat/ conversational</span></li>
              <li><i class="bi bi-check"></i><span>Text Generative terkait Dokumen Kementerian Perhubungan</span></li>
              <li><i class="bi bi-check"></i> <span>Mempermudah pemahaman Dokumen Peraturan Kementerian Perhubungan</span>.</li>
            </ul>
          </div>
        </div><!-- Features Item -->

        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out">
            <img src="{{asset('user/assets/img/details-4.png')}}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 order-2 order-md-1" data-aos="fade-up">
            <h3>Rincian Fitur Analisis Sentimenn</h3>
            
            <ul>
              <li><i class="bi bi-check"></i> <span>Informasi persentase sentimen dari setiap titik lokasi infrastruktur sarana transportasi</span></li>
              <li><i class="bi bi-check"></i><span>Monitoring penilaian publik berdasarkan sentimennya dalam satu dashboard terkait sarana transportasi</span></li>
              <li><i class="bi bi-check"></i> <span>Dashboard peta sebaran infrastruktur dengan nilai sentimen dan dapat dilihat detil informasinya</span>.</li>
            </ul>
          </div>
        </div><!-- Features Item -->

      </div>

    </section><!-- /Details Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <div class="container">
        <h2 class="text-left mb-4">Kategori Konten Pengetahuan beragam</h2>

        <div class="row gy-4" id="kategori-container">

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="features-item">
              <i class="bi bi-eye" style="color: #ffbb2c;"></i>
              <h3><a href="" class="stretched-link">Data 1</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="features-item">
              <i class="bi bi-infinity" style="color: #5578ff;"></i>
              <h3><a href="" class="stretched-link">Data 2</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="features-item">
              <i class="bi bi-mortarboard" style="color: #e80368;"></i>
              <h3><a href="" class="stretched-link">Data 3</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
            <div class="features-item">
              <i class="bi bi-nut" style="color: #e361ff;"></i>
              <h3><a href="" class="stretched-link">Data 4</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
            <div class="features-item">
              <i class="bi bi-shuffle" style="color: #47aeff;"></i>
              <h3><a href="" class="stretched-link">Data 5</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
            <div class="features-item">
              <i class="bi bi-star" style="color: #ffa76e;"></i>
              <h3><a href="" class="stretched-link">Data 6</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
            <div class="features-item">
              <i class="bi bi-x-diamond" style="color: #11dbcf;"></i>
              <h3><a href="" class="stretched-link">Data 7</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
            <div class="features-item">
              <i class="bi bi-camera-video" style="color: #4233ff;"></i>
              <h3><a href="" class="stretched-link">Data 8</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="900">
            <div class="features-item">
              <i class="bi bi-command" style="color: #b2904f;"></i>
              <h3><a href="" class="stretched-link">Data 9</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1000">
            <div class="features-item">
              <i class="bi bi-dribbble" style="color: #b20969;"></i>
              <h3><a href="" class="stretched-link">Data 10</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1100">
            <div class="features-item">
              <i class="bi bi-activity" style="color: #ff5828;"></i>
              <h3><a href="" class="stretched-link">Data 11</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1200">
            <div class="features-item">
              <i class="bi bi-brightness-high" style="color: #29cc61;"></i>
              <h3><a href="" class="stretched-link">Data 12</a></h3>
            </div>
          </div><!-- End Feature Item -->

        </div>

      </div>
      
    </section><!-- /Features Section -->

    <!-- Stats Section -->
    <section id="statistik" class="stats section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        
        <h2 class="text-left mb-4">Statistik Konten Pengetahuan</h2>

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-share-fill"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Jumlah konten pengetahuan yang dipublish</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-stars"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p>Jumlah konten pengetahuan dengan rating tinggi</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-share-fill"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
              <p>Jumlah konten pengetahuan yang di share di media sosial</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-person-add"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
              <p>Jumlah konten pengetahuan hasil kolaborasi</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->


    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Multimedia</h2>
        <div><span>Konten Pengetahuan</span> <span class="description-title">Multimedia</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0" id="multimedia-kontainer">

        </div>

      </div>

    </section>
    <!-- /Gallery Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section dark-background">
                  
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <div><span>Apa Kata</span> <span class="description-title">Mereka tentang KMS?</span></div>
      </div><!-- End Section Title -->
                  
      <img src="{{asset('user/assets/img/testimonials-bg.jpg')}}" class="testimonials-bg" alt="">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                {{-- <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt=""> --}}
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                {{-- <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt=""> --}}
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                {{-- <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt=""> --}}
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                {{-- <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt=""> --}}
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                {{-- <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt=""> --}}
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Team Section -->
    {{-- <section id="team" class="team section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Team</h2>
        <div><span>Check Our</span> <span class="description-title">Team</span></div>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-5">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section> --}}
    <!-- /Team Section -->

    {{-- <section id="team" class="team section">
        <!-- Carousel wrapper -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Konten Pengetahuan</h2>
            <div><span>Cek Konten</span> <span class="description-title">Pengetahuan</span></div>
        </div><!-- End Section Title -->
        
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center">
                
              </div>
              <div class="col-md-12">
                <div class="featured-carousel owl-carousel" id="konten-pengetahuan">
                  
    
                  
                </div>
              </div>
            </div>
          </div>
        
    </section> --}}

    
    


    <!-- Pricing Section -->
    <section id="search" class="search section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Search</h2>
        <div><span>Penelusuran</span> <span class="description-title">Konten Pengetahuan</span></div>
		
      </div><!-- End Section Title -->
	  
      <div class="container mt-4">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <form id="search-pengetahuan" class="input-group">
              <input type="text" name="nama_kategori" class="form-control" placeholder="Search for...">
              <button type="submit" class="btn btn-primary btn-search">
                <i class="fa fa-search"></i> Search
              </button>
            </form>
          </div>
        </div>
      </div><br/>


		
      <div class="container">


        <div class="row gy-4" id="search-konten-pengetahuan">

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="pricing-item">
              <h3>Kategori 1</h3>
              <p class="description">Deskripsi Kategori...</p>
              
              <h5>Jumlah konten pengetahuan yang dipublish</p>
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span></h5><br/>
			  
		          <ul>
                <li><span>Sub Kategori 1.1</span>
                <li><span>Sub Kategori 1.2</span>
                <li><span>Sub Kategori 1.3</span>
                <li><span>Sub Kategori 1.4</span>
                <li><span>Sub Kategori 1.5</span>
                <li><span>Sub Kategori 1.6</span>
                <li><span>Sub Kategori 1.7</span>
                <li><span>Sub Kategori 1.8</span>				
              </ul>

            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="pricing-item">
              <h3>Kategori 2</h3>
              <p class="description">Deskripsi Kategori...</p>
              
              <h5>Jumlah konten pengetahuan yang dipublish</p>
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span></h5><br/>
			  
		      <ul>
                <li><span>Sub Kategori 2.1</span>
                <li><span>Sub Kategori 2.2</span>
                <li><span>Sub Kategori 2.3</span>
                <li><span>Sub Kategori 2.4</span>
                <li><span>Sub Kategori 2.5</span>
                <li><span>Sub Kategori 2.6</span>
                <li><span>Sub Kategori 2.7</span>
                <li><span>Sub Kategori 2.8</span>				
              </ul>

            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="pricing-item">
              <h3>Kategori 3</h3>
              <p class="description">Deskripsi Kategori...</p>
              
              <h5>Jumlah konten pengetahuan yang dipublish</p>
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span></h5><br/>
			  
		      <ul>
                <li><span>Sub Kategori 3.1</span>
                <li><span>Sub Kategori 3.2</span>
                <li><span>Sub Kategori 3.3</span>
                <li><span>Sub Kategori 3.4</span>
                <li><span>Sub Kategori 3.5</span>
                <li><span>Sub Kategori 3.6</span>
                <li><span>Sub Kategori 3.7</span>
                <li><span>Sub Kategori 3.8</span>				
              </ul>

            </div>
          </div><!-- End Pricing Item -->

        </div>

      </div>

    </section>
    <!-- /Pricing Section -->

<!-- Faq Section -->
    <section id="faq" class="faq section light-background">

      <div class="container-fluid">


        <div class="row gy-4">
          <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

            <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
              <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>

            <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

              <div class="faq-item faq-active">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                <div class="faq-content">
                  <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                <div class="faq-content">
                  <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>

          <div class="col-lg-5 order-1 order-lg-2">
            <img src="user/assets/img/faq.jpg" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>
        </div>

      </div>

    </section><!-- /Faq Section -->
        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  @endsection
  @section('scripts')
  <script>
    $(document).ready(function() {
      let dataKategori = $("#kategori-container").empty();
      let multimedia = $("#multimedia-kontainer").empty();
      let kontenPengetahuan = $("#konten-pengetahuan");
      let searchKonten = $("#search-konten-pengetahuan").empty();
      let test ="tes";
      ajaxData(`${baseUrl}/api/v1/getKategori`, 'GET', [] , function(resp) {
          $.each(resp.data, function(index, data) {
            let featureItem = `
              <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="${(index + 1) * 100}">
                <div class="features-item">
                  <img src="${data.icon[0].url}" alt="${data.title}" style="width: 35px; height: 35px; padding-right:10px;">
                  <h3><a href="${baseUrl}/user-kategori.html/?category=${data.nama_kategori}" class="stretched-link">${data.nama_kategori}</a></h3>
                </div>
              </div>
            `;

            dataKategori.append(featureItem);
          });
        },
        function() {
            
        });

        ajaxData(`${baseUrl}/api/v1/getMultimedia`, 'GET', [] , function(resp) {
          $.each(resp.data, function(index, data) {
            
            var description = data.dekskripsi;
            var parser = new DOMParser();
            var doc = parser.parseFromString(description, 'text/html');

            var iframe = doc.querySelector('iframe');
            
            var textContent = doc.body.innerText || doc.body.textContent;
            let iframeHtml = iframe ? iframe.outerHTML : '';

            let multimediaItem = 
            `<div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                  <div class="responsive-iframe-container">
                    ${iframeHtml}
                  </div>
                </div>
              </div>
            `;
            
            multimedia.append(multimediaItem);

              let kontenItem = `
                 <div class="item">
                    <div class="blog-entry">
                      <a href="#" class="block-20 d-flex align-items-start" style="background-image: url('${data.image_thumbnail[0].url}');">
                      </a>
                      <div class="text border border-top-0 p-4">
                        <h3 class="heading"><a href="">${data.judul}</a></h3>
                        <p>${textContent}</p>
                        <div class="d-flex align-items-center mt-4">
                          <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                          <p class="ml-auto meta2 mb-0">
                            <a href="#" class="mr-2">Admin</a>
                            <a href="#" class="meta-chat"><span class="ion-ios-chatboxes"></span> 3</a>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>`;

            
            // multimedia.append(multimediaItem);
            kontenPengetahuan.trigger('add.owl.carousel', [$(kontenItem)]).trigger('refresh.owl.carousel');
          });
        },
        function() {
            
        });
        
    });

    $("#search-pengetahuan").on('submit', function(e) {
        e.preventDefault();
      
        const data = new FormData(this);
        const queryString = new URLSearchParams(data).toString();
        const url = `${baseUrl}/api/v1/search/?${queryString}`;
        let searchKonten = $("#search-konten-pengetahuan").empty();

        ajaxData(url, 'GET', [], function(resp) {
          if(resp.message) {
            let searchItem = `
              <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="pricing-item">
                  <h3>${resp.message}</h3>
                
                </div>
              </div>
            `;
            searchKonten.append(searchItem);
          } else {
            $.each(resp, function(index, data) {
            let subKategori = data.sub_kategoris;
            let subKategoriList = "";

            $.each(subKategori, function(subIndex, subData) {
              subKategoriList += `<li><span>${subData.nama_sub_kategori}</span></li>`;
            });

            let searchItem = `
              <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="pricing-item">
                  <h3><a href="${baseUrl}/user-kategori.html/?category=${data.nama_kategori}" >${data.nama_kategori ?? null}</a></h3>
                  <p class="description">${data.dekskripsi ?? null}</p>
                  <h5>Jumlah konten pengetahuan yang dipublish</p>
                  <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter">${data.contributor_count}</span></h5><br/>
                  <ul>
                    ${subKategoriList}				
                  </ul>
                </div>
              </div>
            `;
            searchKonten.append(searchItem);
          });
          }
          
            
        }, function(data) {
            
        });
    });
  </script>
  @endsection
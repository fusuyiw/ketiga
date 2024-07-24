@extends('utama.layouts.main')
@section('container')
    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                    <div data-aos="zoom-out">
                        <h1>Jelajahi Kota Malang dengan Peta Interaktif <span>Maloka</span></h1>
                        <h2>peta canggih dan data terperinci untuk menjelajahi informasi dengan lebih baik
                        </h2>
                        <div class="text-center text-lg-start">
                            <a href="/peta" class="btn-get-started scrollto">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                    <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch"
                        data-aos="fade-right">
                    </div>

                    <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5"
                        data-aos="fade-left">
                        <h3>Selamat datang di halaman utama Sistem Informasi Geografis (SIG) Kota Malang!</h3>
                        <p>Kota Malang, sebuah kota yang terletak di Provinsi Jawa Timur, tidak hanya dikenal
                            karena keindahan
                            alamnya yang memukau, tetapi juga sebagai pusat budaya dan pendidikan yang berkembang pesat.
                            Melalui platform SIG ini, kami mengundang Anda untuk menjelajahi kekayaan kota ini melalui
                            peta interaktif yang
                            mencakup berbagai fasilitas umum seperti sarana transportasi, rumah sakit, taman, mall, dan
                            kantor
                            pemerintahan, dan perguruan tinggi. Dengan integrasi teknologi Leaflet.js, kami menyajikan
                            informasi terperinci mengenai setiap
                            kecamatan di Kota Malang, termasuk data geografis yang meliputi batas administratif, luas
                            wilayah, dan statistik
                            populasi.
                        </p>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon"><i class="bi bi-geo-alt"></i></div>
                            <h4 class="title"><a href="/peta">Jelajahi Peta</a></h4>
                            <p class="description">Jelajahi peta dengan beberapa informasi yang tersedia seperti
                                persebaran fasum, informasi cuaca dan lainya!</p>
                        </div>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon"><i class="bi bi-info-circle"></i></div>
                            <h4 class="title"><a href="">Cari Data</a></h4>
                            <p class="description">Temukan data untuk mengetahui informasi layanan!</p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Features</h2>
                    <p>Check The Features</p>
                </div>

                <div class="row" data-aos="fade-left">
                    <div class="col-lg-3 col-md-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                            <i class="bi bi-hospital" style="color: #fa0202;"></i>
                            <h3><a href="/Rumah-Sakit">Rumah Sakit</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <i class="bi bi-bus-front" style="color: #5578ff;"></i>
                            <h3><a href="/fasum?search=terminal">Terminal</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
                            <i class="bi bi-train-front" style="color: #e80368;"></i>
                            <h3><a href="/fasum?search=stasiun">Stasiun</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                            <i class="bi bi-flower2" style="color: #02fa0a;"></i>
                            <h3><a href="/Taman-Kota">Taman</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="250">
                            <i class="fa-solid fa-building-columns" style="color: #47aeff;"></i>
                            <h3><a href="/Perguruan-Tinggi">Perguruan Tinggi</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <i class="fa-solid fa-file-signature" style="color: #ffa76e;"></i>
                            <h3><a href="/fasum?search=kantor+kelurahan">Kantor Kelurahan</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="350">
                            <i class="fa-solid fa-file-signature" style="color: #11dbcf;"></i>
                            <h3><a href="/fasum?search=kantor+kecamatan">Kantor Kecamatan</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                            <i class="fa-solid fa-user-tie" style="color: #000;"></i>
                            <h3><a href="/fasum?search=kantor+walikota">Kantor Walikota</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="450">
                            <i class="fa-solid fa-handcuffs" style="color: #b2904f;"></i>
                            <h3><a href="/Polsek">Kantor Polsek</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="500">
                            <i class="bi bi-shop" style="color: #b20969;"></i>
                            <h3><a href="/Mall">Mall</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="600">
                            <i class="ri-base-station-line" style="color: #29cc61;"></i>
                            <h3><a href="/peta">Radar Hujan</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="550">
                            <i class="bi bi-cloud-moon" style="color: #ff5828;"></i>
                            <h3><a href="/peta">Cuaca Real Time</a></h3>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Features Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row justify-content-center" data-aos="fade-up">
                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $totalCount }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Data Tersedia</p>
                        </div>
                    </div>
                </div><br>

                <div class="row" data-aos="fade-up">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-hospital"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $rsCount }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Rumah Sakit</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="bi bi-flower2"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $tkCount }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Taman</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="fa-solid fa-building-columns"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $ptCount }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Perguruan Tinggi</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-shop"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $mallCount }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Mall</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Details Section ======= -->
        <section id="details" class="details">
            <div class="container">


                <div class="row content">
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="assets/img/details-1.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-8 pt-4" data-aos="fade-up">
                        <h3>Pencarian Fasilitas Umum</h3>
                        <p class="fst-italic">
                            Cari dan temukan berbagai fasilitas umum di Kota Malang dengan mudah.
                        </p>
                        <ul>
                            <li><i class="bi bi-check"></i> Temukan lokasi rumah sakit, mall, taman, dan lainnya.</li>
                            <li><i class="bi bi-check"></i> Informasi akurat dan terkini.</li>
                            <li><i class="bi bi-check"></i> Rencanakan perjalanan Anda dengan lebih efisien.</li>
                            <li><i class="bi bi-check"></i> Optimalkan pengelolaan fasilitas umum.</li>
                        </ul>
                        <p>
                            Nikmati akses cepat dan mudah ke informasi terkini tentang fasilitas umum di Kota Malang.
                        </p>
                    </div>
                </div>

                <div class="row content">
                    <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
                        <img src="assets/img/details-2.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
                        <h3>Informasi Cuaca Real-Time</h3>
                        <p class="fst-italic">
                            Arahkan petanya untuk mengetahui cuaca di lokasi tersebut
                        </p>
                        <p>
                            Aplikasi ini menghadirkan pengalaman mengakses informasi cuaca global secara real-time dengan
                            akurasi dan detail yang baik. Selain itu, fitur radar aplikasi memungkinkan anda untuk
                            melihat pola hujan yang tersebar di seluruh dunia langsung dari peta interaktif. Dengan
                            kombinasi data terkini dan visualisasi yang jelas, pengguna dapat dengan mudah merencanakan
                            aktivitas mereka berdasarkan informasi cuaca yang paling up-to-date.
                        </p>

                    </div>
                </div>
                <div class="row content">
                    <div class="col-md-4" data-aos="fade-left">
                        <img src="assets/img/details-3.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-8 pt-5" data-aos="fade-up">
                        <h3>Geografis Kota Malang</h3>
                        <p>Tambah pengetahuanmu tentang geografis di wilayah Kota Malang dengan peta interaktif</p>
                        <ul>
                            <li><i class="bi bi-check"></i> Batas administrasi per-kecamatan
                            </li>
                            <li><i class="bi bi-check"></i> Persebaran lokasi fasilitas umum
                            </li>
                            <li><i class="bi bi-check"></i> Citra satelit ber-resolusi tinggi
                            </li>
                        </ul>
                        <p>
                            Tersedia juga informasi terkait demografi, luas wilayah, jumlah lokasi dan masih banyak lagi.
                            <br>
                            Kami berkomitmen untuk menyediakan sumber informasi digital dengan pemanfaatan GIS untuk
                            mendongkrak wawasan kita dan pastinya
                            informasi yang kami hadirkan merupakan data yang bersumber dari instansi yang
                            terpecaya
                        </p>

                    </div>
                </div>


            </div>
        </section><!-- End Details Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2><a href="https://www.instagram.com/aangaliii/" class="instagram" target="_blank"><i
                                class="bx bxl-instagram"></i> aangaliii</a></h2>
                    <p>Malang dari langit</p>
                </div>

                <div class="row g-0" data-aos="fade-left">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                            <a href="assets/img/gallery/1.jpeg" class="gallery-lightbox">
                                <img src="assets/img/gallery/1.jpeg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="150">
                            <a href="assets/img/gallery/7.jpeg" class="gallery-lightbox">
                                <img src="assets/img/gallery/7.jpeg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
                            <a href="assets/img/gallery/3.jpeg" class="gallery-lightbox">
                                <img src="assets/img/gallery/3.jpeg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>



                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
                            <a href="assets/img/gallery/10.jpeg" class="gallery-lightbox">
                                <img src="assets/img/gallery/10.jpeg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>


                </div>

            </div>

        </section><!-- End Gallery Section -->




    </main><!-- End #main -->
@endsection

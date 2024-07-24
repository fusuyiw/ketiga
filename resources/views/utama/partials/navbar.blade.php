    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="/">MALOKA</a></h1>
                {{-- <a href="index.html"><img src="assets/img/logo.ico" alt="" class="img-fluid"></a> --}}
            </div>
            <div class="search-container">
                <form class="d-flex float-end collapse mt-1 mb-1" role="search" action="/fasum">
                    <div class="input-group">
                        <input type="text" class="form-control me-1" placeholder="Pencarian Tempat" name="search">
                        <button class="btn btn-light" type="submit">
                            <i class="bi bi-search"></i> <!-- Menggunakan ikon dari Bootstrap Icons -->
                        </button>
                    </div>
                </form>
            </div>


            <nav id="navbar" class="navbar">

                <ul>
                    <li><a class="nav-link scrollto {{ $title === 'MALOKA' ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li><a class="nav-link scrollto" href="/#about">About</a></li>
                    <li><a class="nav-link scrollto" href="/#features">Features</a></li>
                    <li><a class="nav-link scrollto {{ $nyala === 'peta' ? 'active' : '' }}" href="/peta">Peta</a>
                    </li>
                    <li class="dropdown"><a href="/fasum"
                            class="text-decoration-none {{ $nyala === 'Fasum' ? 'active' : '' }}"><span>Fasilitas
                                Umum</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="dropdown-item {{ $title === 'Rumah Sakit' ? 'active' : '' }}"
                                    href="{{ url('/Rumah-Sakit') }}">Rumah Sakit</a></li>
                            <li><a class="dropdown-item {{ $title === 'Sarana Transportasi' ? 'active' : '' }}"
                                    href="{{ url('/Sarana-Transportasi') }}">Sarana Transportasi</a></li>
                            <li><a class="dropdown-item {{ $title === 'Pusat Perbelanjaan' ? 'active' : '' }}"
                                    href="{{ url('/Mall') }}">Mall</a></li>
                            <li><a class="dropdown-item {{ $title === 'Taman Kota' ? 'active' : '' }}"
                                    href="{{ url('/Taman-Kota') }}">Taman Kota</a></li>
                            <li><a class="dropdown-item {{ $title === 'Kantor Kepolisian Sektor' ? 'active' : '' }}"
                                    href="{{ url('/Polsek') }}">Polsek</a></li>
                            <li><a class="dropdown-item {{ $title === 'Kantor Pemerintahan' ? 'active' : '' }}"
                                    href="{{ url('/Kantor-Pemerintahan') }}">Kantor Pemerintahan</a></li>
                            <li><a class="dropdown-item {{ $title === 'Perguruan Tinggi' ? 'active' : '' }}"
                                    href="{{ url('/Perguruan-Tinggi') }}">Perguruan Tinggi</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                        </ul>
                    </li>
                </ul>
            </nav><!-- .navbar -->

        </div>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </header><!-- End Header -->

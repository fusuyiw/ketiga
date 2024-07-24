@extends ('utama.layouts.main')
@section('container')
    <section id="counts">
        <div class="container">
            <div class="title text-center">
                <h1 class="mb-10">Jumlah Fasilitas Umum Kota Malang</h1>
                <br>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="text-center counter">
                    <!-- Tambahkan kelas animate__animated dan animate__fadeInUp dari Animate.css -->
                    <h1><span class="animate__animated animate__fadeInUp" data-toggle="counter-up">20</span></h1>
                    <p>Selamat datang di halaman utama Sistem Informasi Geografis (SIG) Kota Malang! Kota Malang, sebuah
                        kota
                        yang terletak di Provinsi Jawa Timur, Indonesia, tidak hanya dikenal karena keindahan alamnya yang
                        memukau, tetapi juga sebagai pusat budaya dan pendidikan yang berkembang pesat. Melalui platform SIG
                        ini, kami mengundang Anda untuk menjelajahi kekayaan kota ini melalui peta interaktif yang mencakup
                        berbagai fasilitas umum seperti sarana transportasi, rumah sakit, taman, mall, dan kantor polisi.
                        Dengan
                        integrasi teknologi Leaflet.js, kami menyajikan informasi terperinci mengenai setiap kecamatan di
                        Kota
                        Malang, termasuk data geografis yang meliputi batas administratif, luas wilayah, dan statistik
                        populasi.
                        Dengan demikian, halaman ini tidak hanya bertujuan untuk memberikan pandangan menyeluruh tentang
                        Kota
                        Malang namun juga untuk memfasilitasi pengambilan keputusan yang lebih baik dan partisipasi aktif
                        masyarakat dalam pengembangan kota berbasis data spasial. Selamat menikmati eksplorasi Anda di SIG
                        Kota
                        Malang!</p>
                </div>
            </div>
        </div>
    </section><!-- End Counts Section -->
    <!-- Script untuk mengaktifkan Animate.css saat elemen muncul di layar -->
    <script>
        // Ambil semua elemen yang memiliki kelas animate__animated
        const animatedElements = document.querySelectorAll('.animate__animated');

        // Fungsi untuk memeriksa apakah elemen sudah masuk ke dalam viewport
        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // Fungsi untuk memulai animasi saat elemen masuk ke dalam viewport
        function animateElements() {
            animatedElements.forEach(el => {
                if (isElementInViewport(el)) {
                    el.classList.add('animate__fadeInUp');
                }
            });
        }

        // Memanggil fungsi saat halaman dimuat dan saat digulir
        window.addEventListener('load', animateElements);
        window.addEventListener('scroll', animateElements);
    </script>
@endsection

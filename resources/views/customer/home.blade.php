@extends('layouts.mainCus')

@section('content')
        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home" id="home">
                <div class="home__container container grid">
                    <img src="assets/img/chat.png" alt="" class="home__img">

                    <div class="home__data">
                        <h1 class="home__title">
                            Chat langsung <br> dengan admin kami!!
                        </h1>
                        <p class="home__description">
                        Anda ingin melakukan request jenis pesanan tertentu yang tidak terdaftar di menu layanan?. 
                        Silahkan gunakan fitur chat yang telah kami sediakan khusus untuk anda, Terimah kasih.
                        </p>
                        <a href="{{ route('user') }}" class="button button--flex">
                            Chat <i class="ri-arrow-right-down-line button__icon"></i>
                        </a>
                    </div>

                    <div class="home__social">
                        <span class="home__social-follow">Follow Us</span>

                        <div class="home__social-links">
                            <a href="https://t.me/Qlos_laundry" target="_blank" class="home__social-link">
                                <i class="ri-telegram-fill"></i>
                            </a>
                            <a href="https://www.instagram.com/qloslaundry.id/" target="_blank" class="home__social-link">
                                <i class="ri-instagram-line"></i>
                            </a>
                            <a href="https://www.tiktok.com/@qloslaundryblitar" target="_blank" class="home__social-link">
                                <i class="x-ri-tiktok-line">{{ svg('ri-tiktok-line') }}</i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== STEPS ====================-->
            <section class="steps section container" id=steps>
                <div class="steps__bg">
                    <h2 class="section__title-center steps__title">
                        Tata Cara <br> Pemesanan Layanan
                    </h2>

                    <div class="steps__container grid">
                        <div class="steps__card">
                            <div class="steps__card-number">01</div>
                            <h3 class="steps__card-title">Pilih jenis layanan</h3>
                            <p class="steps__card-description">
                                Silahkan anda pergi menuju menu daftar layanan, dan pilih salah satu layanan yang 
                                telah disediakan.
                            </p>
                        </div>

                        <div class="steps__card">
                            <div class="steps__card-number">02</div>
                            <h3 class="steps__card-title">Pengisian Form pesanan</h3>
                            <p class="steps__card-description">
                                Setelah anda memilih salah satu layanan, akan muncul sebuah form pesanan. 
                                isikan beberapa keperluan data pesanan seperti lokasi dll.
                            </p>
                        </div>

                        <div class="steps__card">
                            <div class="steps__card-number">03</div>
                            <h3 class="steps__card-title">Periksa status pesanan</h3>
                            <p class="steps__card-description">
                                Setelah anda mengirimkan form pesanan, maka data pesanan akan muncul pada tabel  
                                dalam menu pesanan dan akan tertera status pesanan diterima.
                            </p>
                        </div>

                        <div class="steps__card_s">
                            <div class="steps__card-number">04</div>
                            <h3 class="steps__card-title">Konfirmasi penjemputan</h3>
                            <p class="steps__card-description">
                                Anda akan menerima sebuah pesan melalui nomer Whatsapp yang anda berikan, 
                                mengenai detail penjemputan dan juga konfirmasi lokasi.
                            </p>
                        </div>

                        <div class="steps__card_s">
                            <div class="steps__card-number">05</div>
                            <h3 class="steps__card-title">Pilih metode pembayaran</h3>
                            <p class="steps__card-description">
                                Admin kami akan mengirimkan pesan berupa nota total pembayaran, anda bisa melakukan 
                                pembayaran melalui E-payment atau tunai langsung kepada kurir nantinya
                            </p>
                        </div>

                        <div class="steps__card_s">
                            <div class="steps__card-number">06</div>
                            <h3 class="steps__card-title">Pesanan anda telah seleai</h3>
                            <p class="steps__card-description">
                                Kurir akan mengirimkan pesanan anda kembali ke lokasi yang sama seperti penjemputan 
                                sebelumnya, dan anda bisa melihat detail pesanan pada website.
                            </p>
                        </div>
                    </div>
                    <div class="steps__nav-container">
                            <button class="steps__nav steps__nav--prev">
                                <i class="ri-arrow-left-s-line"></i> Back
                            </button>
                            <button class="steps__nav steps__nav--next">
                                Next <i class="ri-arrow-right-s-line"></i>
                            </button>
                    </div>
                </div>
            </section>

            <!--==================== PRODUCTS ====================-->
            <section class="product section container" id="products">
                <h2 class="section__title-center">
                    Daftar layanan <br> dari kami
                </h2>

                <p class="product__description">
                Pakaian Anda, Perhatian Kami: Cuci Hemat, Setrika Profesional, dan Lipatan Rapi, 
                Menciptakan Kesan Pertama yang Tak Terlupakan!
                </p>

                <div class="product__container grid">
                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/kiloan.png" alt="" class="product__img">

                        <h3 class="product__title">Cuci Kering</h3>
                        <span class="product__price">Mulai dari 6k/2kg</span>

                        <button class="button--flex product__button">
                            <i class="ri-shopping-bag-line"></i>
                        </button>
                    </article>

                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/cuci_setrika.png" alt="" class="product__img">

                        <h3 class="product__title">Cuci Setrika</h3>
                        <span class="product__price">Mulai dari 7k/2kg</span>

                        <button class="button--flex product__button">
                            <i class="ri-shopping-bag-line"></i>
                        </button>
                    </article>

                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/setrika.png" alt="" class="product__img">

                        <h3 class="product__title">Setrika</h3>
                        <span class="product__price">Mulai dari 6k/2kg</span>

                        <button class="button--flex product__button">
                            <i class="ri-shopping-bag-line"></i>
                        </button>
                    </article>

                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/bayi.png" alt="" class="product__img">

                        <h3 class="product__title">Cuci Baby Gear</h3>
                        <span class="product__price">$5.99</span>

                        <button class="button--flex product__button">
                            <i class="ri-shopping-bag-line"></i>
                        </button>
                    </article>

                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/sepatu.png" alt="" class="product__img">

                        <h3 class="product__title">Cuci Sepatu</h3>
                        <span class="product__price">Mulai dari 25k</span>

                        <button class="button--flex product__button">
                            <i class="ri-shopping-bag-line"></i>
                        </button>
                    </article>

                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/boneka.png" alt="" class="product__img">

                        <h3 class="product__title">Cuci Boneka</h3>
                        <span class="product__price">Mulai dari 5k</span>

                        <button class="button--flex product__button">
                            <i class="ri-shopping-bag-line"></i>
                        </button>
                    </article>

                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/sprei.png" alt="" class="product__img">

                        <h3 class="product__title">Cuci Bed Cover</h3>
                        <span class="product__price">Mulai dari 15k</span>

                        <button class="button--flex product__button">
                            <i class="ri-shopping-bag-line"></i>
                        </button>
                    </article>

                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/tas.png" alt="" class="product__img">

                        <h3 class="product__title">Cuci Tas</h3>
                        <span class="product__price">Mulai dari 20k</span>

                        <button class="button--flex product__button">
                            <i class="ri-shopping-bag-line"></i>
                        </button>
                    </article>

                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/wenter.png" alt="" class="product__img">

                        <h3 class="product__title">Wenter</h3>
                        <span class="product__price">Mulai dari 25k</span>

                        <button class="button--flex product__button">
                            <i class="ri-shopping-bag-line"></i>
                        </button>
                    </article>
                </div>
            </section>
        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <div class="footer__content">
                    <a href="#" class="footer__logo">
                        <img src="{{ asset('images/logo_qlos.png') }}" alt="Logo" width="80" height="80"> 
                        <i>QLOS LAUNDRY</i>
                    </a>

                    <h3 class="footer__title">
                        Subscribe untuk mendapatkan kabar <br> seputar promo terbaru dari kami
                    </h3>

                    <div class="footer__subscribe">
                        <input type="email" placeholder="Enter your email" class="footer__input">

                        <button class="button button--flex footer__button">
                            Subscribe
                            <i class="ri-arrow-right-up-line button__icon"></i>
                        </button>
                    </div>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Outlet Pertama</h3>

                    <ul class="footer__data">
                        <li class="footer__information">Jl. Mahakam No.59, Tanjungsari, Kec. Sukorejo, Kota Blitar, Jawa Timur 67122</li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Outlet Kedua</h3>

                    <ul class="footer__data">
                        <li class="footer__information">Jl. Bengawan Solo No.69, Sukorejo, Kec. Sukorejo, Kota Blitar, Jawa Timur 66121</li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">
                        Kami juga menerima E-payment
                    </h3>

                    <div class="footer__cards">
                        <img src="assets/img/link_aja.png" alt="" class="footer__card">
                        <img src="assets/img/ovo.png" alt="" class="footer__card">
                        <img src="assets/img/shopee.png" alt="" class="footer__card">
                        <img src="assets/img/qris.png" alt="" class="footer__card">
                    </div>
                    <div class="footer__cards">
                        <img src="assets/img/gopay.png" alt="" class="footer__card">
                        <img src="assets/img/dana.png" alt="" class="footer__card">
                    </div>
                </div>
            </div>

            <p class="footer__copy">&#169; Qlos-laundry. All rigths reserved</p>
        </footer>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
    // Variabel untuk menandai apakah tombol "Next" sudah ditekan
            let isNextButtonClicked = false;

            // Mengambil elemen-elemen card
            const card01 = document.querySelector(".steps__card:nth-child(1)");
            const card02 = document.querySelector(".steps__card:nth-child(2)");
            const card03 = document.querySelector(".steps__card:nth-child(3)");
            const card04 = document.querySelector(".steps__card_s:nth-child(4)");
            const card05 = document.querySelector(".steps__card_s:nth-child(5)");
            const card06 = document.querySelector(".steps__card_s:nth-child(6)");

            // Menyembunyikan card 4, 5, dan 6 pada awalnya
            if(!isNextButtonClicked){
            card04.style.display = "none";
            card05.style.display = "none";
            card06.style.display = "none";
            }

            // Mendapatkan tombol "Next" dan "Back"
            const nextButton = document.querySelector(".steps__nav--next");
            const prevButton = document.querySelector(".steps__nav--prev");

            // Event listener untuk tombol "Next"
            nextButton.addEventListener("click", function() {
                // Memperlihatkan card 4, 5, dan 6 hanya jika tombol "Next" belum pernah ditekan sebelumnya
                if (!isNextButtonClicked) {
                    card04.style.display = "block";
                    card05.style.display = "block";
                    card06.style.display = "block";
                    card01.style.display = "none";
                    card02.style.display = "none";
                    card03.style.display = "none";
                    // Mengubah status variabel
                    isNextButtonClicked = true;
                }
            });

            // Event listener untuk tombol "Back"
            prevButton.addEventListener("click", function() {
                // Mengembalikan tampilan card sesuai dengan kondisi awal
                card04.style.display = "none";
                card05.style.display = "none";
                card06.style.display = "none";
                card01.style.display = "block";
                card02.style.display = "block";
                card03.style.display = "block";
                // Mengubah status variabel
                isNextButtonClicked = false;
            });
        });

        </script>
@endsection


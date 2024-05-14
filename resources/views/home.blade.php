@extends('layouts.mainCus')

@section('content')
        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home" id="home">
                <div class="home__container container grid">
                    <img src="assets/img/laundry_pic.png" alt="" class="home__img">

                    <div class="home__data">
                        <h1 class="home__title">
                            QLOS-LAUNDRY <br> Cepat dan Bersih
                        </h1>
                        <p class="home__description">
                        Laundry terbaik didaeah Kota Blitar, dengan pelayanan 1 mesin 1 customer
                        </p>
                        <a href="/login" class="button button--flex">
                            Pesan Sekarang <i class="ri-arrow-right-down-line button__icon"></i>
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

            <!--==================== ABOUT ====================-->
            <section class="about section container" id="about">
                <div class="about__container grid">
                    <img src="assets/img/about2.png" alt="" class="about__img">

                    <div class="about__data">
                        <h2 class="section__title about__title">
                            Tentang Perusahaan Kami <br>
                        </h2>

                        <p class="about__description">
                            Q’LOS Laundry adalah sebuah toko laundry yang telah berdiri cukup lama yaitu sejak tahun 2016.
                            Berlokasi strategis di pusat kota Blitar tepatnya berada di Jl. Mahakam No.59, Tanjungsari, 
                            Kec. Sukorejo, Kota Blitar, Jawa Timur.
                        </p>

                        <div class="about__details">
                            <p class="about__details-description">
                                <i class="ri-checkbox-fill about__details-icon"></i>
                                Kita menggunakan 1 mesin untuk 1 customer.
                            </p>
                            <!-- <p class="about__details-description">
                                <i class="ri-checkbox-fill about__details-icon"></i>
                                Bila tidak bersih uang kembali.
                            </p> -->
                            <p class="about__details-description">
                                <i class="ri-checkbox-fill about__details-icon"></i>
                                Gratis antar jemput sekitar Kota Blitar.
                            </p>
                            <p class="about__details-description">
                                <i class="ri-checkbox-fill about__details-icon"></i>
                                Kita selalu tepat waktu.
                            </p>
                        </div>

                        <a href="#" class="button--link button--flex">
                            Pesan Sekarang <i class="ri-arrow-right-down-line button__icon"></i>
                        </a>
                    </div>
                </div>
            </section>

            <!--==================== STEPS ====================-->
            <section class="steps section container" id=steps>
                <div class="steps__bg">
                    <h2 class="section__title-center steps__title">
                        Promo menarik <br> dari kami
                    </h2>

                    <div class="steps__container grid">
                        <div class="steps__card">
                            <div class="steps__card-number">01</div>
                            <h3 class="steps__card-title">Promo Spesial Aniversary</h3>
                            <p class="steps__card-description">
                                Selamat Ulang Tahun untuk Kami! Nikmati Promo Spesial untuk Anda!
                            </p>
                        </div>

                        <div class="steps__card">
                            <div class="steps__card-number">02</div>
                            <h3 class="steps__card-title">Promo Hari Besar</h3>
                            <p class="steps__card-description">
                                Rayakan Setiap Hari Besar dengan Pakaian Bersih dan Harga Terbaik!
                            </p>
                        </div>

                        <div class="steps__card">
                            <div class="steps__card-number">03</div>
                            <h3 class="steps__card-title">Promo Tahun Baru</h3>
                            <p class="steps__card-description">
                                Rayakan Awal Tahun dengan Pakaian Bersih dan Diskon Istimewa!
                            </p>
                        </div>
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
                        <a href=/login>    
                            <i class="ri-shopping-bag-line"></i>
                        </a>    
                        </button>
                    </article>

                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/cuci_setrika.png" alt="" class="product__img">

                        <h3 class="product__title">Cuci Setrika</h3>
                        <span class="product__price">Mulai dari 7k/2kg</span>

                        <button class="button--flex product__button">
                        <a href=/login>    
                            <i class="ri-shopping-bag-line"></i>
                        </a>    
                        </button>
                    </article>

                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/setrika.png" alt="" class="product__img">

                        <h3 class="product__title">Setrika</h3>
                        <span class="product__price">Mulai dari 6k/2kg</span>

                        <button class="button--flex product__button">
                        <a href=/login>    
                            <i class="ri-shopping-bag-line"></i>
                        </a>    
                        </button>
                    </article>

                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/bayi.png" alt="" class="product__img">

                        <h3 class="product__title">Cuci Kereta Bayi</h3>
                        <span class="product__price">Mulai dari 70k</span>

                        <button class="button--flex product__button">
                        <a href=/login>    
                            <i class="ri-shopping-bag-line"></i>
                        </a>    
                        </button>
                    </article>

                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/sepatu.png" alt="" class="product__img">

                        <h3 class="product__title">Cuci Sepatu</h3>
                        <span class="product__price">Mulai dari 25k</span>

                        <button class="button--flex product__button">
                        <a href=/login>    
                            <i class="ri-shopping-bag-line"></i>
                        </a>    
                        </button>
                    </article>

                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/boneka.png" alt="" class="product__img">

                        <h3 class="product__title">Cuci Boneka</h3>
                        <span class="product__price">Mulai dari 5k</span>

                        <button class="button--flex product__button">
                        <a href=/login>    
                            <i class="ri-shopping-bag-line"></i>
                        </a>    
                        </button>
                    </article>

                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/sprei.png" alt="" class="product__img">

                        <h3 class="product__title">Cuci Bed Cover</h3>
                        <span class="product__price">Mulai dari 15k</span>

                        <button class="button--flex product__button">
                        <a href=/login>    
                            <i class="ri-shopping-bag-line"></i>
                        </a>    
                        </button>
                    </article>

                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/tas.png" alt="" class="product__img">

                        <h3 class="product__title">Cuci Tas</h3>
                        <span class="product__price">Mulai dari 20k</span>

                        <button class="button--flex product__button">
                        <a href=/login>    
                            <i class="ri-shopping-bag-line"></i>
                        </a>    
                        </button>
                    </article>

                    <article class="product__card">
                        <div class="product__circle"></div>

                        <img src="assets/img/wenter.png" alt="" class="product__img">

                        <h3 class="product__title">Wenter</h3>
                        <span class="product__price">Mulai dari 25k</span>

                        <button class="button--flex product__button">
                        <a href=/login>    
                            <i class="ri-shopping-bag-line"></i>
                        </a>    
                        </button>
                    </article>
                </div>
            </section>

            <!--==================== QUESTIONS ====================-->
            <section class="questions section" id="faqs">
                <h2 class="section__title-center questions__title container">
                Beberapa pertanyaan yang sering ditanyakan <br> bisa dilihat dibawah ini
                </h2>

                <div class="questions__container container grid">
                    <div class="questions__group">
                        <div class="questions__item">
                            <header class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    Minimal untuk laundry kiloan berapa ?
                                </h3>
                            </header>

                            <div class="questions__content">
                                <p class="questions__description">
                                    Minimal laundry kiloan adalah 2 Kg, kenapa demikian? Karena kami mengggunakan mesin 
                                    modern yang kapasitasnya besar jadi minimal load/produksi adalah 2 Kg.
                                </p>
                            </div>
                        </div>

                        <div class="questions__item">
                            <header class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    Bagaimana proses laundry kiloan di Qlos-Laundry?
                                </h3>
                            </header>

                            <div class="questions__content">
                                <p class="questions__description">
                                    Proses laundry kiloan yang kami lakukan adalah 1 Mesin 1 Pelanggan tanpa menandai p
                                    akaian/tagging, tanpa dicampur tujuannya adalah untuk menjaga kebersihan dan tidak 
                                    tertukar dengan pakaian pelanggan lain
                                </p>
                            </div>
                        </div>

                        <div class="questions__item">
                            <header class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    Apakah bisa antar-jemput laundry kerumah?
                                </h3>
                            </header>

                            <div class="questions__content">
                                <p class="questions__description">
                                    Bisa, kami melayani antar-jemput laundry untuk wilayah Blitar dan sekitarnya. 
                                    Antar-Jemput laundry gratis untuk radius < 2 Km dari workshop Qlos-Laundry, 
                                    untuk > 2 Km (keluar dari jalan raya) akan ada biaya 5.000,- per transaksi 
                                    (jika jauh akan disesuaikan dengan perjanjian)
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="questions__group">
                        <div class="questions__item">
                            <header class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    Bagaimana jika pakaian luntur untuk laundry kiloan?
                                </h3>
                            </header>

                            <div class="questions__content">
                                <p class="questions__description">
                                    Pelanggan pasti mengetahui pakaian masing-masing ketika akan di laundry. 
                                    Kami sarankan baju luntur dipisahkan dan dicuci satuan (tidak dicuci kiloan). 
                                    Jika ada baju luntur tetap di laundry kiloan maka bukan tanggungjawab kami karena 
                                    semua pakaian kiloan kami perlakukan sama.
                                </p>
                            </div>
                        </div>

                        <div class="questions__item">
                            <header class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    Apakah saya boleh mencampur laundry kiloan dengan laundry satuan ?
                                </h3>
                            </header>

                            <div class="questions__content">
                                <p class="questions__description">
                                    Mohon untuk dipisahkan antar laundry kiloan dan satuan anda dalam kantong yang berbeda dan 
                                    ditulis kiloan dan satuan.
                                </p>
                            </div>
                        </div>

                        <div class="questions__item">
                            <header class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    Apakah saya perlu menghitung berapa item pakaian saya ?
                                </h3>
                            </header>

                            <div class="questions__content">
                                <p class="questions__description">
                                    Tidak perlu karena itu adalah tugas kami, team kami akan menghitung jumlah item dan 
                                    mengkonfirmasi ke anda.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== CONTACT ====================-->
            <section class="contact section container" id="contact">                
                <div class="contact__container grid">
                    <div class="contact__box">
                        <h2 class="section__title">
                            Kirim pesan kepada <br> kami melalui email
                        </h2>

                        <div class="contact__data">
                            <div class="contact__information">
                                <h3 class="contact__subtitle">Hubungi kami via Whatsapp</h3>
                                <span class="contact__description">
                                    <i class="ri-phone-line contact__icon"></i>
                                    082219544848
                                </span>
                            </div>

                            <div class="contact__information">
                                <h3 class="contact__subtitle">Email resmi dari kami</h3>
                                <span class="contact__description">
                                    <i class="ri-mail-line contact__icon"></i>
                                    qloslaundry.id@gmail.com
                                </span>
                            </div>
                        </div>
                    </div>

                    <form action="" class="contact__form">
                        <div class="contact__inputs">
                            <div class="contact__content">
                                <input type="email" placeholder=" " class="contact__input">
                                <label for="" class="contact__label">Email</label>
                            </div>

                            <div class="contact__content">
                                <input type="text" placeholder=" " class="contact__input">
                                <label for="" class="contact__label">Subject</label>
                            </div>

                            <div class="contact__content contact__area">
                                <textarea name="message" placeholder=" " class="contact__input"></textarea>                              
                                <label for="" class="contact__label">Message</label>
                            </div>
                        </div>

                        <button class="button button--flex">
                            Kirim Pesan
                            <i class="ri-arrow-right-up-line button__icon"></i>
                        </button>
                    </form>
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
        
@endsection


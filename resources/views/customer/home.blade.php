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
                            <a href="#form_pesanan">
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
                            <a href="#form_pesanan">
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
                            <a href="#form_pesanan">
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
                            <a href="#form_pesanan">
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
                            <a href="#form_pesanan">
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
                            <a href="#form_pesanan">
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
                            <a href="#form_pesanan">
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
                            <a href="#form_pesanan">
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
                            <a href="#form_pesanan">
                                <i class="ri-shopping-bag-line"></i>
                            </a>
                        </button>
                    </article>
                </div>
            </section>

            <section class="contact section container" id="form_pesanan">                
                <div class="contact__container grid">
                    <div class="contact__box">
                        <img src="assets/img/Price_list.jpg" alt="" width="80%" height="80%">
                    </div>

                    <form action="{{ route("create_pesanan") }}" method="post" class="contact__form" enctype="multipart/form-data">
                    @csrf
                        <div class="Contact__head" style="margin-bottom:30px;">
                            <h4>Form Pesanan</h4>
                        </div>
                        <div class="contact__inputs">
                            <input type="hidden" name="customer_id" id="customer_id" value="{{ auth()->user()->customer->id }}">
                            <div class="contact__content">
                                <select class="contact__input" id="kategori_id" name="kategori_id">
                                    <option value="" disabled selected hidden>Pilih Kategori</option>
                                    @foreach($dataKategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                <label for="kategori_id" class="contact__label">Kategori</label>
                            </div>

                            <div class="contact__content">
                                <select class="contact__input" id="layanan_id" name="layanan_id">
                                    <option value="" disabled selected hidden>Pilih Layanan</option>
                                </select>
                                <label for="layanan_id" class="contact__label">Layanan</label>
                            </div>

                            <div class="contact__content">
                                <select class="contact__input" id="promo_id" name="promo_id">
                                    <option value="" disabled selected hidden>Pilih Promo</option>
                                    @foreach($dataPromo as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_promo }}</option>
                                    @endforeach
                                </select>
                                <label for="promo_id" class="contact__label">Promo</label>
                            </div>

                            <div class="contact__content">
                                <select class="contact__input" id="jenis_pembayaran" name="jenis_pembayaran">
                                    <option value="" disabled selected hidden>Pilih Jenis Pembayaran</option>
                                    <option value="Tunai">Tunai</option>
                                    <option value="Link Aja">Link Aja</option>
                                    <option value="OVO">OVO</option>
                                    <option value="Shopee Pay">Shopee Pay</option>
                                    <option value="Qris">Qris</option>
                                    <option value="Gopay">Gopay</option>
                                    <option value="Dana">Dana</option>
                                </select>
                                <label for="jenis_pembayaran" class="contact__label">Jenis Pembayaran</label>
                            </div>

                            <div class="contact__content">
                                <input type="text" id="alamat" name="alamat" placeholder=" " class="contact__input">
                                <label for="alamat" class="contact__label">Alamat</label>
                            </div>

                            <div class="contact__content contact__area">
                                <textarea name="catatan" id="catatan" placeholder=" " class="contact__input"></textarea>                              
                                <label for="catatan" class="contact__label">Catatan</label>
                            </div>
                        </div>

                        <button class="button button--flex" type="submit">
                            Buat Pesanan
                            <i class="ri-arrow-right-up-line button__icon"></i>
                        </button>
                    </form>

                </div>
            </section>

             <!--==================== RIWAYAT ====================-->
             <section class="steps section container" id=riwayat_pesanan>
                <div class="steps__bg">
                    <h2 class="section__title-center steps__title">
                        Riwayat Pemesanan
                    </h2>
                    
                    <div class="card-body">
                        <table class="table table-bordered text-center" id="tabel-pesanan">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 5%; font-size: 12px;">No.</th>
                                    <th scope="col" style="width: 12%; font-size: 12px;">Kategori</th>
                                    <th scope="col" style="width: 12%; font-size: 12px;">Layanan</th>
                                    <th scope="col" style="width: 12%; font-size: 12px;">Promo</th>
                                    <th scope="col" style="width: 12%; font-size: 12px;">Tgl Pesanan</th>
                                    <th scope="col" style="width: 12%; font-size: 12px;">Alamat</th>
                                    <th scope="col" style="width: 12%; font-size: 12px;">Catatan</th>
                                    <th scope="col" style="width: 12%; font-size: 12px;">Bobot</th>
                                    <th scope="col" style="width: 12%; font-size: 12px;">Total</th>
                                    <th scope="col" style="width: 12%; font-size: 12px;">Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            @foreach ($dataPesanan as $item)
                            <tr>
                                <td style="font-size:12px; color: white;">{{ $loop->iteration }}</td>
                                <td style="font-size:12px; color: white;">{{ $item->kategori ? $item->kategori->nama_kategori : 'kosong' }}</td>
                                <td style="font-size:12px; color: white;">{{ $item->layanan ? $item->layanan->nama_layanan : 'kosong' }}</td>
                                <td style="font-size:12px; color: white;">{{ $item->promo ? $item->promo->nama_promo : 'kosong' }}</td>
                                <td style="font-size:12px; color: white;">{{ $item->tgl_pesanan ?: 'kosong' }}</td>
                                <td style="font-size:12px; color: white;">{{ $item->alamat ?: 'kosong' }}</td>
                                <td style="font-size:12px; color: white;">{{ $item->catatan ?: 'kosong' }}</td>
                                @if($item->bobot && $item->kategori->id == 4)
                                <td style="font-size:12px; color: white;">{{ $item->bobot.' Barang'}}</td>
                                @endif
                                @if($item->bobot && in_array($item->kategori->id, [1, 2, 3]))
                                <td style="font-size:12px; color: white;">{{ $item->bobot.' Kg'}}</td>
                                @endif
                                @if(!$item->bobot)
                                <td style="font-size:12px; color: white;">{{ $item->bobot = 'kosong' }}</td>
                                @endif
                                @if($item->total_pembayaran)
                                <td style="font-size:12px; color: white;">{{ 'Rp.'.$item->total_pembayaran }}</td>
                                @else
                                <td style="font-size:12px; color: white;">{{ $item->total_pembayaran = 'kosong' }}</td>
                                @endif
                                <td style="font-size:12px; color: white;">{{ $item->status_pesanan ?: 'kosong' }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="pagination-container">
                        </div>

                    </div>
                   
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

                    const kategoriDropdown = document.querySelector('.contact__input[name="kategori_id"]');
                    const layananDropdown = document.querySelector('.contact__input[name="layanan_id"]');

                    kategoriDropdown.addEventListener('change', function() {
                        const selectedKategori = this.value;
                        $.ajax({
                            url: '{{ route("get_layanan") }}',
                            type: 'POST',
                            data: { kategori_id: selectedKategori, _token: '{{csrf_token()}}' },
                            success: function(response) {
                                layananDropdown.innerHTML = '';
                                const options = response.map(function(item) {
                                    return '<option value="' + item.id + '">' + item.nama_layanan + '</option>';
                                });
                                layananDropdown.innerHTML = options.join(''); 
                            }
                        });
                    });
                });
        </script>
@endsection


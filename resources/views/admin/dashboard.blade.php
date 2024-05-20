@extends('layouts.mainAdmin')

@section('content')
<div class="page-content">
    <div class="col-sm-12">
        <div class="page-sub-header">
            <h3 class="page-title" style="color: green;">
                <?php
                        $nama = auth()->user()->name;
                        echo $nama;
                ?> / Admin
            </h3>
        </div>
        <div class="card mb-4">
            <div class="card-header" style="max-height: 35px; padding-top: 5px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><i class="fas fa-home" style="padding-right: 5px;"></i><a
                                href="/dashboard" style="font-size: 14px;">Home</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard" style="font-size: 14px;">Dashboard</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="page-sub-header">
            <h3 class="page-title mb-3">Selamat Datang</h3>
        </div>

        <div class="card-container" style="display: flex; flex-wrap: wrap; gap: 1rem;">
            <div class="card border-primary mb-3" style="flex: 1; min-width: 13rem; max-width: calc(33.333% - 1rem);">
                <div class="card-body text-primary" style="padding: 10px; display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; flex-direction: column;">
                        <h3 class="card-title">{{ $jumlahCustomer }}</h3>
                        <p class="card-text">Data Customer</p>
                    </div>
                    <div class="icon" style="font-size: 3em; margin-right:20px;">
                        <i class="fas fa-user-tie"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-primary" style="padding: 10px;">
                    <a href="/customer">Kelola Customer <i class="fas fa-arrow-circle-right" style="transform: translateX(.25rem);"></i></a>
                </div>
            </div>

            <div class="card border-primary mb-3" style="flex: 1; min-width: 13rem; max-width: calc(33.333% - 1rem);">
                <div class="card-body text-primary" style="padding: 10px; display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; flex-direction: column;">
                        <h3 class="card-title">{{ $jumlahLayanan }}</h3>
                        <p class="card-text">Data Layanan</p>
                    </div>
                    <div class="icon" style="font-size: 3em; margin-right:20px;">
                        <i class="fas fa-tshirt"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-primary" style="padding: 10px;">
                    <a href="/layanan">Kelola Layanan <i class="fas fa-arrow-circle-right" style="transform: translateX(.25rem);"></i></a>
                </div>
            </div>

            <div class="card border-primary mb-3" style="flex: 1; min-width: 13rem; max-width: calc(33.333% - 1rem);">
                <div class="card-body text-primary" style="padding: 10px; display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; flex-direction: column;">
                        <h3 class="card-title">{{ $jumlahPromo }}</h3>
                        <p class="card-text">Data Promo</p>
                    </div>
                    <div class="icon" style="font-size: 3em; margin-right:20px;">
                        <i class="fas fa-tags"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-primary" style="padding: 10px;">
                    <a href="/promo">Kelola Promo <i class="fas fa-arrow-circle-right" style="transform: translateX(.25rem);"></i></a>
                </div>
            </div>

            <div class="card border-primary mb-3" style="flex: 1; min-width: 13rem; max-width: calc(33.333% - 1rem);">
                <div class="card-body text-primary" style="padding: 10px; display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; flex-direction: column;">
                        <h3 class="card-title">{{ $jumlahPesanan }}</h3>
                        <p class="card-text">Data Pesanan</p>
                    </div>
                    <div class="icon" style="font-size: 3em; margin-right:20px">
                        <i class="fas fa-cart-plus"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-primary" style="padding: 10px;">
                    <a href="/pesanan">Kelola Pesanan <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- Add more cards here as needed -->
        </div>
        <div class="card" style="margin-top: 5px;">
            <div class="card-header">
                <h5>Pengumuman Terbaru</h5>
            </div>
            <!-- <div class="card-body">
                <h3>Pengumuman Jadwal Upload Serkom</h3>
                <a>Berikut adalah Jadwal Upload Sertifikat Kompetensi</a>
                <ul style="list-style: circle; margin-left: 20px;">
                    <li>Batch 1 : 15 – 20 November 2023</li>
                    <li>Batch 2 : 2 – 15 Desember 2023</li>
                </ul>
            </div> -->
        </div>
    </div>
</div>
@endsection
@extends('layouts.mainKar')

@section('content')
<div class="page-content">
    <div class="col-sm-12">
        <div class="page-sub-header">
            <h3 class="page-title" style="color: green;">
                <?php
                        $nama = auth()->user()->name;
                        echo $nama;
                ?> / Karyawan
            </h3>
        </div>
        <div class="card mb-4">
            <div class="card-header" style="max-height: 35px; padding-top: 5px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><i class="fas fa-home" style="padding-right: 5px;"></i><a
                                href="/dashboard/karyawan" style="font-size: 14px;">Home</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/karyawan" style="font-size: 14px;">Dashboard</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="page-sub-header">
            <h3 class="page-title mb-3">Selamat Datang</h3>
        </div>

        <div class="card border-primary mb-3" style="max-width: 13rem;">
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
                <a href="/pesanan">Konfirmasi Pesanan <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="card" style="margin-top: 5px;">
            <div class="card-header">
                <h5>Pengumuman Terbaru</h5>
            </div>
            <div class="card-body">
                <h3>Pengumuman Jadwal Shift Karyawan</h3>
                <a>Berikut adalah Jadwal Shift Karyawan</a>
                <ul style="list-style: circle; margin-left: 20px;">
                    <li>Sesi 1 : 08:00 - 12:00</li>
                    <li>Sesi 2 : 13:00 - 17:00</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.mainKar')
@section('content')
<div class="container">
    <h3 style="color: green; margin-bottom: 5px;">Data Pesanan</h3>
    <div class="card mb-4">
        <div class="card-header" style="max-height: 35px; padding-top: 5px;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fas fa-home" style="padding-right: 5px;"></i><a
                            href="/dashboard/karyawan" style="font-size: 14px;">Home</a></li>
                    <li class="breadcrumb-item"><a href="/pesanan" style="font-size: 14px;">Data Pesanan</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    @include('layouts.alert-flash-message')
    <div class="card">
        <div class="card-body">
            <div class="table-container">
                <table class="table table-bordered text-center" id="tabel-pesanan" style="width: 170%;">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="ont-size: 12px;">No.</th>
                            <th scope="col" style="font-size: 12px;">Customer</th>
                            <th scope="col" style="font-size: 12px;">Kategori</th>
                            <th scope="col" style="font-size: 12px;">Layanan</th>
                            <th scope="col" style="font-size: 12px;">Promo</th>
                            <th scope="col" style="font-size: 12px;">Parfum</th>
                            <th scope="col" style="font-size: 12px;">Tanggal</th>
                            <th scope="col" style="font-size: 12px;">Alamat</th>
                            <th scope="col" style="font-size: 12px;">Catatan</th>
                            <th scope="col" style="font-size: 12px;">Bobot</th>
                            <th scope="col" style="font-size: 12px;">Total</th>
                            <th scope="col" style="font-size: 12px;">Pembayaran</th>
                            <th scope="col" style="font-size: 12px;">Status</th>
                            <th scope="col" style="font-size: 12px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($dataPesanan as $item)
                        <tr>
                            <td style="font-size:12px;">{{ $loop->iteration }}</td>
                            <td style="font-size:12px;">{{ $item->customer ? $item->customer->user->name : 'kosong' }}</td>
                            <td style="font-size:12px;">{{ $item->kategori ? $item->kategori->nama_kategori : 'kosong' }}</td>
                            <td style="font-size:12px;">{{ $item->layanan ? $item->layanan->nama_layanan : 'kosong' }}</td>
                            <td style="font-size:12px;">{{ $item->promo ? $item->promo->nama_promo : 'kosong' }}</td>
                            <td style="font-size:12px;">{{ $item->parfum }}</td>
                            <td style="font-size:12px;">{{ $item->tgl_pesanan ?: 'kosong' }}</td>
                            <td style="font-size:12px;">{{ $item->alamat ?: 'kosong' }}</td>
                            <td style="font-size:12px;">{{ $item->catatan ?: 'kosong' }}</td>
                            @if($item->bobot && $item->kategori->id == 4)
                            <td style="font-size:12px;">{{ $item->bobot.' Barang'}}</td>
                            @endif
                            @if($item->bobot && in_array($item->kategori->id, [1, 2, 3]))
                            <td style="font-size:12px;">{{ $item->bobot.' Kg'}}</td>
                            @endif
                            @if(!$item->bobot)
                            <td style="font-size:12px;">{{ $item->bobot = 'kosong' }}</td>
                            @endif
                            @if($item->total_pembayaran)
                            <td style="font-size:12px;">{{ 'Rp.'.$item->total_pembayaran }}</td>
                            @else
                            <td style="font-size:12px;">{{ $item->total_pembayaran = 'kosong' }}</td>
                            @endif
                            <td style="font-size:12px;">{{ $item->jenis_pembayaran ?: 'kosong' }}</td>
                            <td style="font-size:12px;">{{ $item->status_pesanan ?: 'kosong' }}</td>
                            <td class="justify-content">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#edit_pesanan_{{ $item->id }}">Edit
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-container">
            </div>
        </div>
    </div>


    @foreach ($dataPesanan as $data)
    <div class="modal fade" id="edit_pesanan_{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edit_data_pesanan', ['id' => $data->id]) }}" class="form-horizontal"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="bobot" class="col-sm-2 col-form-label">Bobot</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="bobot" id="bobot"
                                        placeholder="Total bobot pesanan" value="{{$data->bobot}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status_pesanan" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="status_pesanan" name="status_pesanan" required>
                                        <option selected disabled>Pilih Status Pesanan</option>
                                        <option value="Diproses" {{ $data->status_pesanan == 'Diproses' ? 'selected' :
                                            '' }}>Diproses
                                        </option>
                                        <option value="Diterima" {{ $data->status_pesanan == 'Diterima' ? 'selected' :
                                            '' }}>Diterima
                                        </option>
                                        <option value="Menunggu konfirmasi" {{ $data->status_pesanan == 'Menunggu konfirmasi' ? 'selected' :
                                            '' }}>Menunggu konfirmasi
                                        </option>
                                        <option value="Pengiriman" {{ $data->status_pesanan == 'Pengiriman' ? 'selected' :
                                            '' }}>Pengiriman
                                        </option>
                                        <option value="Selesai" {{ $data->status_pesanan == 'Selesai' ? 'selected' :
                                            '' }}>Selesai
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="parfum" class="col-sm-2 col-form-label">Parfum</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="parfum" name="parfum" required>
                                        <option selected disabled>Pilih Parfum</option>
                                        <option value="Akasia" {{ $data->parfum == 'Akasia' ? 'selected' :
                                            '' }}>Akasia
                                        </option>
                                        <option value="Snapi" {{ $data->parfum == 'Snapi' ? 'selected' :
                                            '' }}>Snapi
                                        </option>
                                        <option value="Starla" {{ $data->parfum == 'Starla' ? 'selected' :
                                            '' }}>Starla
                                        </option>
                                        <option value="Tidak Pakai" {{ $data->parfum == 'Tidak Pakai' ? 'selected' :
                                            '' }}>Tidak Pakai
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<script>
    $(document).ready(function () {
        var table = $('#tabel-pesanan').DataTable({
            "paging": true,
            "pageLength": 5,
            "searching": true,
            "ordering": false,
            "info": false,
            "scrollX": true,  // Enable horizontal scrolling
            "language": {
                "search": "Mencari",
                "lengthMenu": "Tampil _MENU_ entri",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            }
        });

        new $.fn.dataTable.FixedHeader(table);
    });
</script>
@endsection
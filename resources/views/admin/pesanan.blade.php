@extends('layouts.mainAdmin')
@section('content')
<div class="container">
    <h3 style="color: green; margin-bottom: 5px;">Data Pesanan</h3>
    <div class="card mb-4">
        <div class="card-header" style="max-height: 35px; padding-top: 5px;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fas fa-home" style="padding-right: 5px;"></i><a
                            href="/dashboard/admin" style="font-size: 14px;">Home</a></li>
                    <li class="breadcrumb-item"><a href="/pesanan_admin" style="font-size: 14px;">Data Pesanan</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    @include('layouts.alert-flash-message')
    <div class="card">
        <div class="card-header">
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambah_pesanan">+ Tambah
                    Pesanan</button>
        </div>
        <div class="card-body">
            <div class="table-container">
                <table class="table table-bordered text-center" id="tabel-pesanan" style="width: 200%;">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 5%; font-size: 12px;">No.</th>
                            <th scope="col" style="width: 15%; font-size: 12px;">Customer</th>
                            <th scope="col" style="width: 15%; font-size: 12px;">Karyawan</th>
                            <th scope="col" style="width: 15%; font-size: 12px;">Kategori</th>
                            <th scope="col" style="width: 15%; font-size: 12px;">Layanan</th>
                            <th scope="col" style="width: 20%; font-size: 12px;">Promo</th>
                            <th scope="col" style="width: 15%; font-size: 12px;">Parfum</th>
                            <th scope="col" style="width: 15%; font-size: 12px;">Tanggal</th>
                            <th scope="col" style="width: 15%; font-size: 12px;">Alamat</th>
                            <th scope="col" style="width: 25%; font-size: 12px;">Catatan</th>
                            <th scope="col" style="width: 5%; font-size: 12px;">Bobot</th>
                            <th scope="col" style="width: 15%; font-size: 12px;">Total</th>
                            <th scope="col" style="width: 10%; font-size: 12px;">Pembayaran</th>
                            <th scope="col" style="width: 15%; font-size: 12px;">Status</th>
                            <th scope="col" style="width: 5%; font-size: 12px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($dataPesanan as $item)
                        <tr>
                            <td style="font-size:12px;">{{ $loop->iteration }}</td>
                            <td style="font-size:12px;">{{ $item->customer ? $item->customer->user->name : 'kosong' }}</td>
                            <td style="font-size:12px;">{{ $item->karyawan ? $item->karyawan->user->name : 'kosong' }}</td>
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
                            <td class="d-flex justify-content-between">
                                <button class="btn btn-warning btn-sm mx-1 flex-fill" data-bs-toggle="modal"
                                    data-bs-target="#edit_pesanan_admin_{{ $item->id }}">Edit</button>
                                <form action="{{ route('delete_pesanan', ['id' => $item->id]) }}" method="post" class="flex-fill mx-1">
                                    @csrf
                                    <button class="btn btn-danger btn-sm w-100">Hapus</button>
                                </form>
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
    <div class="modal fade" id="edit_pesanan_admin_{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edit_data_pesanan_admin', ['id' => $data->id]) }}" class="form-horizontal"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="customer_id" class="col-sm-2 col-form-label">Nama Customer</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="customer_id" name="customer_id" required>
                                    <option selected disabled>Pilih Nama Customer</option>
                                    @foreach ($dataCustomer as $item)
                                    <option value="{{ $item->id }}" {{ $data->customer_id == $item->id ? 'selected' :
                                            '' }}>{{ $item->user->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="karyawan_id" class="col-sm-2 col-form-label">Nama Karyawan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="karyawan_id" name="karyawan_id" required>
                                    <option selected disabled>Pilih Nama karyawan</option>
                                    @foreach ($dataKaryawan as $item)
                                    <option value="{{ $item->id }}" {{ $data->karyawan_id == $item->id ? 'selected' :
                                            '' }}>{{ $item->user->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kategori_id" class="col-sm-2 col-form-label">Jenis Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="kategori_id" name="kategori_id" required>
                                    <option selected disabled>Pilih Jenis Kategori</option>
                                    @foreach ($dataKategori as $item)
                                    <option value="{{ $item->id }}" {{ $data->kategori_id == $item->id ? 'selected' :
                                            '' }}>{{ $item->nama_kategori }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" id="existingLayananId" value="{{ $data->layanan_id }}">
                                <label for="layanan_id" class="col-sm-2 col-form-label">Jenis Layanan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="layanan_id" name="layanan_id" required>
                                    <option selected disabled hidden>Pilih Jenis Layanan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="promo_id" class="col-sm-2 col-form-label">Jenis Promo</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="promo_id" name="promo_id" required>
                                    <option selected disabled>Pilih Jenis promo</option>
                                    @foreach ($dataPromo as $item)
                                    <option value="{{ $item->id }}" {{ $data->promo_id == $item->id ? 'selected' :
                                            '' }}>{{ $item->nama_promo }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alamat" id="alamat"
                                        placeholder="Alamat Lengkap" value="{{$data->alamat}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="catatan" id="catatan"
                                        placeholder="Catatan" value="{{$data->catatan}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bobot" class="col-sm-2 col-form-label">Bobot</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="bobot" id="bobot"
                                        placeholder="Total bobot pesanan" value="{{$data->bobot}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_pembayaran" class="col-sm-2 col-form-label">Jenis pembayaran</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="jenis_pembayaran" name="jenis_pembayaran" required>
                                        <option value="" disabled selected hidden>Pilih Jenis Pembayaran</option>
                                        <option value="Tunai" {{ $data->jenis_pembayaran == 'Tunai' ? 'selected' :
                                            '' }}>Tunai</option>
                                        <option value="Link Aja" {{ $data->jenis_pembayaran == 'Link Aja' ? 'selected' :
                                            '' }}>Link Aja</option>
                                        <option value="OVO" {{ $data->jenis_pembayaran == 'OVO' ? 'selected' :
                                            '' }}>OVO</option>
                                        <option value="Shopee Pay" {{ $data->jenis_pembayaran == 'Shopee Pay' ? 'selected' :
                                            '' }}>Shopee Pay</option>
                                        <option value="Qris" {{ $data->jenis_pembayaran == 'Qris' ? 'selected' :
                                            '' }}>Qris</option>
                                        <option value="Gopay" {{ $data->jenis_pembayaran == 'Gopay' ? 'selected' :
                                            '' }}>Gopay</option>
                                        <option value="Dana" {{ $data->jenis_pembayaran == 'Dana' ? 'selected' :
                                            '' }}>Dana</option>
                                    </select>
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

    <div class="modal fade" id="tambah_pesanan" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('create_pesanan_admin') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row">
                                <label for="customer_id" class="col-sm-2 col-form-label">Nama Customer</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="customer_id" name="customer_id" required>
                                    <option selected disabled>Pilih Nama Customer</option>
                                    @foreach ($dataCustomer as $item)
                                    <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="karyawan_id" class="col-sm-2 col-form-label">Nama Karyawan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="karyawan_id" name="karyawan_id" required>
                                    <option selected disabled>Pilih Nama karyawan</option>
                                    @foreach ($dataKaryawan as $item)
                                    <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kategori_id" class="col-sm-2 col-form-label">Jenis Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-select kategori-dropdown" id="kategori_id" name="kategori_id" required>
                                    <option selected disabled>Pilih Jenis Kategori</option>
                                    @foreach ($dataKategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="layanan_id" class="col-sm-2 col-form-label">Jenis Layanan</label>
                                <div class="col-sm-10">
                                    <select class="form-select layanan-dropdown" id="layanan_id" name="layanan_id" required>
                                        <option selected disabled hidden>Pilih Jenis Layanan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="promo_id" class="col-sm-2 col-form-label">Jenis Promo</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="promo_id" name="promo_id" required>
                                    <option selected disabled>Pilih Jenis promo</option>
                                    @foreach ($dataPromo as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_promo }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alamat" id="alamat"
                                        placeholder="Alamat Lengkap" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="catatan" id="catatan"
                                        placeholder="Catatan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bobot" class="col-sm-2 col-form-label">Bobot</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="bobot" id="bobot"
                                        placeholder="Total bobot pesanan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_pembayaran" class="col-sm-2 col-form-label">Jenis pembayaran</label>
                                <div class="col-sm-10">
                                <select class="form-select" id="jenis_pembayaran" name="jenis_pembayaran" required>
                                    <option value="" disabled selected hidden>Pilih Jenis Pembayaran</option>
                                    <option value="Tunai">Tunai</option>
                                    <option value="Link Aja">Link Aja</option>
                                    <option value="OVO">OVO</option>
                                    <option value="Shopee Pay">Shopee Pay</option>
                                    <option value="Qris">Qris</option>
                                    <option value="Gopay">Gopay</option>
                                    <option value="Dana">Dana</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status_pesanan" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="status_pesanan" name="status_pesanan" required>
                                        <option selected disabled>Pilih Status Pesanan</option>
                                        <option value="Diproses">Diproses
                                        </option>
                                        <option value="Diterima">Diterima
                                        </option>
                                        <option value="Menunggu konfirmasi">Menunggu konfirmasi
                                        </option>
                                        <option value="Pengiriman">Pengiriman
                                        </option>
                                        <option value="Selesai">Selesai
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="parfum" class="col-sm-2 col-form-label">Parfum</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="parfum" name="parfum" required>
                                        <option selected disabled>Pilih Parfum</option>
                                        <option value="Akasia">Akasia
                                        </option>
                                        <option value="Snapi">Snapi
                                        </option>
                                        <option value="Starla">Starla
                                        </option>
                                        <option value="Tidak Pakai">Tidak Pakai
                                        </option>
                                    </select>
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
</div>

<script>
    $(document).ready(function () {
        const kategoriDropdowns = document.querySelectorAll('.form-select[name="kategori_id"]');
        const layananDropdowns = document.querySelectorAll('.form-select[name="layanan_id"]');
        const existingLayananIds = document.querySelectorAll('#existingLayananId');
        kategoriDropdowns.forEach((kategoriDropdown, index) => {
            const layananDropdown = layananDropdowns[index];
            const existingLayananId = existingLayananIds[index].value;
            kategoriDropdown.addEventListener('change', function() {
                const selectedKategori = this.value;
                $.ajax({
                    url: '{{ route("get_layanan_admin") }}',
                    type: 'POST',
                    data: { kategori_id: selectedKategori, _token: '{{csrf_token()}}' },
                    success: function(response) {
                        layananDropdown.innerHTML = '';
                        const options = response.map(function(item) {
                            const selected = item.id === parseInt(existingLayananId) ? 'selected' : '';
                            return `<option value="${item.id}" ${selected}>${item.nama_layanan}</option>`;
                        });
                        layananDropdown.innerHTML = options.join(''); 
                    }
                });
            });

            if (kategoriDropdown.value) {
                kategoriDropdown.dispatchEvent(new Event('change'));
            }
        });
    });
</script>
@endsection
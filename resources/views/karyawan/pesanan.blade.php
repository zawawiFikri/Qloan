@extends('layouts.mainKar')
@section('content')
<div class="container">
    <h3 style="color: green; margin-bottom: 5px;">Data User</h3>
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
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered text-center" id="tabel-pesanan">
                <thead class="table-light">
                    <tr>
                        <th scope="col" style="width: 5%; font-size: 10px;">No.</th>
                        <th scope="col" style="width: 10%; font-size: 10px;">Customer</th>
                        <th scope="col" style="width: 10%; font-size: 10px;">Kategori</th>
                        <th scope="col" style="width: 10%; font-size: 10px;">Layanan</th>
                        <th scope="col" style="width: 10%; font-size: 10px;">Promo</th>
                        <th scope="col" style="width: 10%; font-size: 10px;">Tanggal</th>
                        <th scope="col" style="width: 10%; font-size: 10px;">Alamat</th>
                        <th scope="col" style="width: 10%; font-size: 10px;">Catatan</th>
                        <th scope="col" style="width: 10%; font-size: 10px;">Bobot</th>
                        <th scope="col" style="width: 10%; font-size: 10px;">Total</th>
                        <th scope="col" style="width: 10%; font-size: 10px;">Pembayaran</th>
                        <th scope="col" style="width: 10%; font-size: 10px;">Status</th>
                        <th scope="col" style="width: 10%; font-size: 10px;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($dataPesanan as $item)
                    <tr>
                        <td style="font-size:10px;">{{ $loop->iteration }}</td>
                        <td style="font-size:10px;">{{ $item->customer ? $item->customer->user->name : 'kosong' }}</td>
                        <td style="font-size:10px;">{{ $item->kategori ? $item->kategori->nama_kategori : 'kosong' }}</td>
                        <td style="font-size:10px;">{{ $item->layanan ? $item->layanan->nama_layanan : 'kosong' }}</td>
                        <td style="font-size:10px;">{{ $item->promo ? $item->promo->nama_promo : 'kosong' }}</td>
                        <td style="font-size:10px;">{{ $item->tgl_pesanan ?: 'kosong' }}</td>
                        <td style="font-size:10px;">{{ $item->alamat ?: 'kosong' }}</td>
                        <td style="font-size:10px;">{{ $item->catatan ?: 'kosong' }}</td>
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
                        <td style="font-size:10px;">{{ $item->jenis_pembayaran ?: 'kosong' }}</td>
                        <td style="font-size:10px;">{{ $item->status_pesanan ?: 'kosong' }}</td>
                        <td class="d-flex justify-content-between">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#edit_pesanan_{{ $item->id }}">Edit
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

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
                                    <input type="text" class="form-control" name="bobot" id="bobot"
                                        placeholder="Total bobot pesanan" value="{{$data->bobot}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status_pesanan" class="col-sm-2 col-form-label">Status Pesanan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="status_pesanan" name="status_pesanan">
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
    $('#tabel-pesanan').DataTable({
      "paging": true,
      "pageLength": 5,
      "searching": true,
      "ordering": false,
      "info": false,
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
  });
</script>
@endsection
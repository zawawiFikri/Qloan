@extends('layouts.mainAdmin')
@section('content')
<div class="container">
    <h3 style="color: green; margin-bottom: 5px;">Data Layanan</h3>
    <div class="card mb-4">
        <div class="card-header" style="max-height: 35px; padding-top: 5px;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fas fa-home" style="padding-right: 5px;"></i><a
                            href="/dashboard/admin" style="font-size: 14px;">Home</a></li>
                    <li class="breadcrumb-item"><a href="/layanan" style="font-size: 14px;">Data Layanan</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    @include('layouts.alert-flash-message')
    <div class="card">
        <div class="card-header">
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambah_layanan">+ Tambah
                Layanan</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center" id="tabel-layanan" style="width : 110%;">
                <thead class="table-light">
                    <tr>
                        <th scope="col" style="width: 5%; font-size: 12px;">No.</th>
                        <th scope="col" style="width: 15%; font-size: 12px;">Layanan</th>
                        <th scope="col" style="width: 15%; font-size: 12px;">Kategori</th>
                        <th scope="col" style="width: 30%; font-size: 12px;">Deskripsi</th>
                        <th scope="col" style="width: 15%; font-size: 12px;">Harga</th>
                        <th scope="col" style="width: 10%; font-size: 12px;">Durasi</th>
                        <th scope="col" style="width: 20%; font-size: 12px;">Status</th>
                        <th scope="col" style="width: 5%; font-size: 12px;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($dataLayanan as $data)
                    <tr>
                        <td style="font-size: 12px;">{{ $loop->iteration }}</td>
                        <td style="font-size: 12px;">{{ $data->nama_layanan }}</td>
                        <td style="font-size: 12px;">{{ $data->kategori->nama_kategori }}</td>
                        <td style="font-size: 12px;">{{ $data->desc_layanan }}</td>
                        <td style="font-size: 12px;">{{ 'Rp.'.$data->harga.'/kg' }}</td>
                        <td style="font-size: 12px;">{{ $data->durasi.'/jam' }}</td>
                        <td style="font-size: 12px;">{{ $data->status }}</td>
                        <td class="d-flex justify-content-between">
                            <button class="btn btn-warning btn-sm" style="width:45%;" data-bs-toggle="modal"
                                data-bs-target="#edit_layanan_{{ $data->id }}">Edit</button>
                            <form action="{{route('delete_layanan', ['id' => $data->id])}}" method="post">@csrf
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination-container">
            </div>

        </div>

    </div>


    @foreach ($dataLayanan as $data)
    <div class="modal fade" id="edit_layanan_{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edit_data_layanan', ['id' => $data->id]) }}" class="form-horizontal"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="nama_layanan" class="col-sm-2 col-form-label">Nama Layanan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_layanan" id="nama_layanan"
                                        placeholder="Nama layanan" value="{{$data->nama_layanan}}" required>
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
                                <label for="desc_layanan" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="desc_layanan" id="desc_layanan" placeholder="Deskripsi Layanan"
                                        value="{{$data->desc_layanan ?: ''}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga Layanan"
                                        value="{{$data->harga ?: ''}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="durasi" class="col-sm-2 col-form-label">Durasi Pengerjaan</label>
                                <div class="col-sm-10">
                                    <input type="durasi" class="form-control" name="durasi" id="durasi" placeholder="Durasi Pengerjaan"
                                        value="{{$data->durasi}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="status" name="status" required>
                                        <option selected disabled>Pilih Status</option>
                                        <option value="aktif" {{ $data->status == 'aktif' ? 'selected' :
                                            '' }}>Aktif
                                        </option>
                                        <option value="tidak aktif" {{ $data->status == 'tidak aktif' ? 'selected' :
                                            '' }}>Tidak aktif
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

    <div class="modal fade" id="tambah_layanan" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('create_layanan') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nama_layanan" class="col-sm-2 col-form-label">Nama Layanan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_layanan" id="nama_layanan"
                                    placeholder="Nama layanan" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kategori_id" class="col-sm-2 col-form-label">Jenis Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="kategori_id" name="kategori_id" required>
                                    <option selected disabled>Pilih Jenis Kategori</option>
                                    @foreach ($dataKategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desc_layanan" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="desc_layanan" id="desc_layanan" placeholder="Deskripsi Layanan"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga Layanan"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="durasi" class="col-sm-2 col-form-label">Durasi Pengerjaan</label>
                            <div class="col-sm-10">
                                <input type="durasi" class="form-control" name="durasi" id="durasi" placeholder="Durasi Pengerjaan"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="status" name="status" required>
                                    <option selected disabled>Pilih Status</option>
                                    <option value="aktif" {{ $data->status == 'aktif' ? 'selected' :
                                        '' }}>Aktif
                                    </option>
                                    <option value="tidak aktif" {{ $data->status == 'tidak aktif' ? 'selected' :
                                        '' }}>Tidak aktif
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
    $('#tabel-layanan').DataTable({
      "paging": true,
      "pageLength": 5,
      "searching": true,
      "ordering": false,
      "scrollX": true,
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
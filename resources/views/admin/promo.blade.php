@extends('layouts.mainAdmin')
@section('content')
<div class="container">
    <h3 style="color: green; margin-bottom: 5px;">Data Promo</h3>
    <div class="card mb-4">
        <div class="card-header" style="max-height: 35px; padding-top: 5px;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fas fa-home" style="padding-right: 5px;"></i><a
                            href="/dashboard/admin" style="font-size: 14px;">Home</a></li>
                    <li class="breadcrumb-item"><a href="/promo" style="font-size: 14px;">Data Promo</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    @include('layouts.alert-flash-message')
    <div class="card">
        <div class="card-header">
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambah_promo">+ Tambah
                Promo</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center" id="tabel-promo" style="width : 110%;">
                <thead class="table-light">
                    <tr>
                        <th scope="col" style="width: 5%; font-size: 12px;">No.</th>
                        <th scope="col" style="width: 15%; font-size: 12px;">Nama Promo</th>
                        <th scope="col" style="width: 30%; font-size: 12px;">Deskripsi</th>
                        <th scope="col" style="width: 5%; font-size: 12px;">Diskon</th>
                        <th scope="col" style="width: 15%; font-size: 12px;">Tanggal mulai</th>
                        <th scope="col" style="width: 15%; font-size: 12px;">Tanggal akhir</th>
                        <th scope="col" style="width: 20%; font-size: 12px;">Status</th>
                        <th scope="col" style="width: 5%; font-size: 12px;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($dataPromo as $data)
                    <tr>
                        <td style="font-size: 12px;">{{ $loop->iteration }}</td>
                        <td style="font-size: 12px;">{{ $data->nama_promo }}</td>
                        <td style="font-size: 12px;">{{ $data->desc_promo }}</td>
                        <td style="font-size: 12px;">{{ $data->diskon.'%' }}</td>
                        <td style="font-size: 12px;">{{ $data->tgl_mulai }}</td>
                        <td style="font-size: 12px;">{{ $data->tgl_akhir }}</td>
                        <td style="font-size: 12px;">{{ $data->status }}</td>
                        <td class="d-flex justify-content-between">
                            <button class="btn btn-warning btn-sm" style="width:45%;" data-bs-toggle="modal"
                                data-bs-target="#edit_promo_{{ $data->id }}">Edit</button>
                            <form action="{{route('delete_promo', ['id' => $data->id])}}" method="post">@csrf
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


    @foreach ($dataPromo as $data)
    <div class="modal fade" id="edit_promo_{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data promo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edit_data_promo', ['id' => $data->id]) }}" class="form-horizontal"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="nama_promo" class="col-sm-2 col-form-label">Nama promo</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_promo" id="nama_promo"
                                        placeholder="Nama promo" value="{{$data->nama_promo}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="desc_promo" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="desc_promo" id="desc_promo" placeholder="Deskripsi promo"
                                        value="{{$data->desc_promo ?: ''}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="diskon" class="col-sm-2 col-form-label">Diskon</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="diskon" id="diskon" placeholder="Besaran Diskon (%)"
                                        value="{{$data->diskon ?: ''}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai" placeholder="Tanggal Mulai promo"
                                        value="{{$data->tgl_mulai ?: ''}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl_akhir" class="col-sm-2 col-form-label">Tanggal Akhir</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" placeholder="Tanggal Akhir promo"
                                        value="{{$data->tgl_akhir ?: ''}}" required>
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

    <div class="modal fade" id="tambah_promo" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('create_promo') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nama_promo" class="col-sm-2 col-form-label">Nama promo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_promo" id="nama_promo"
                                    placeholder="Nama promo" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desc_promo" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="desc_promo" id="desc_promo" placeholder="Deskripsi promo"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="diskon" class="col-sm-2 col-form-label">Diskon</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="diskon" id="diskon" placeholder="Besaran Diskon (%)"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai" placeholder="Tanggal Mulai promo"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_akhir" class="col-sm-2 col-form-label">Tanggal Akhir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" placeholder="Tanggal Akhir promo"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="status" name="status" required>
                                    <option selected disabled>Pilih Status</option>
                                    <option value="aktif">Aktif
                                    </option>
                                    <option value="tidak aktif">Tidak aktif
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
    $('#tabel-promo').DataTable({
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
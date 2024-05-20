@extends('layouts.mainAdmin')
@section('content')
<div class="container">
    <h3 style="color: green; margin-bottom: 5px;">Data Customer</h3>
    <div class="card mb-4">
        <div class="card-header" style="max-height: 35px; padding-top: 5px;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fas fa-home" style="padding-right: 5px;"></i><a
                            href="/dashboard/admin" style="font-size: 14px;">Home</a></li>
                    <li class="breadcrumb-item"><a href="/customer" style="font-size: 14px;">Data Customer</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    @include('layouts.alert-flash-message')
    <div class="card">
        <div class="card-header">
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambah_customer">+ Tambah
                Customer</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center" id="tabel-customer" style="width : 110%;">
                <thead class="table-light">
                    <tr>
                        <th scope="col" style="width: 5%; font-size: 12px;">No.</th>
                        <th scope="col" style="width: 15%; font-size: 12px;">Nama</th>
                        <th scope="col" style="width: 15%; font-size: 12px;">Gender</th>
                        <th scope="col" style="width: 15%; font-size: 12px;">Alamat</th>
                        <th scope="col" style="width: 15%; font-size: 12px;">Nomer Hp</th>
                        <th scope="col" style="width: 15%; font-size: 12px;">Email</th>
                        <th scope="col" style="width: 5%; font-size: 12px;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($dataCustomer as $data)
                    <tr>
                        <td style="font-size: 12px;">{{ $loop->iteration }}</td>
                        <td style="font-size: 12px;">{{ $data->user->name }}</td>
                        <td style="font-size: 12px;">{{ $data->user->gender }}</td>
                        <td style="font-size: 12px;">{{ $data->alamat ?: 'kosong' }}</td>
                        <td style="font-size: 12px;">{{ $data->no_tlp ?: 'kosong' }}</td>
                        <td style="font-size: 12px;">{{ $data->user->email }}</td>
                        <td class="d-flex justify-content-between">
                            <button class="btn btn-warning btn-sm" style="width:45%;" data-bs-toggle="modal"
                                data-bs-target="#edit_customer_{{ $data->user->id }}">Edit</button>
                            <form action="{{route('delete', ['id' => $data->user->id])}}" method="post">@csrf
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


    @foreach ($dataCustomer as $data)
    <div class="modal fade" id="edit_customer_{{ $data->user->id }}" tabindex="-1" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edit_data', ['id' => $data->user->id]) }}" class="form-horizontal"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Nama Customer" value="{{$data->user->name}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" {{ $data->user->gender == 'Laki-laki' ? 'selected' :
                                            '' }}>Laki-laki
                                        </option>
                                        <option value="Perempuan" {{ $data->user->gender == 'Perempuan' ? 'selected' :
                                            '' }}>Perempuan
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat"
                                        value="{{$data->alamat ?: ''}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_tlp" class="col-sm-2 col-form-label">Nomer Hp(WA)</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="no_tlp" id="no_tlp" placeholder="Nomer Aktif"
                                        value="{{$data->no_tlp ?: ''}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                        value="{{$data->user->email}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Ganti Password Baru *opsional">
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

    <div class="modal fade" id="tambah_customer" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('create') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="roles" id="roles" value="{{ "customer" }}">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nama Customer"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="gender" name="gender" required>
                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki
                                    </option>
                                    <option value="Perempuan">Perempuan
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat"
                                        required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_tlp" class="col-sm-2 col-form-label">Nomer Hp(WA)</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="no_tlp" id="no_tlp" placeholder="Nomer Aktif" 
                                required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password" required>
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
    $('#tabel-customer').DataTable({
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
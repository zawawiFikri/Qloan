<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Karyawan;
use App\Models\Pesanan;
use App\Models\Kategori;
use App\Models\Layanan;
use App\Models\Promo;
use App\Models\ChFavorite;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function dataKelola()
    {
        $jumlahPesanan = Pesanan::count();
        $jumlahCustomer = Customer::count();
        $jumlahKaryawan = Karyawan::count();
        $jumlahAdmin = Admin::count();
        $jumlahKategori = Kategori::count();
        $jumlahLayanan = Layanan::count();
        $jumlahPromo = Promo::count();
        return view('admin.dashboard', compact('jumlahPesanan','jumlahCustomer','jumlahKaryawan',
        'jumlahAdmin','jumlahKategori','jumlahLayanan','jumlahPromo'));
    }
    public function dataCustomer()
    {
        $user = auth()->user();
        $customer = $user->customer;
        $dataUser = User::all();
        $dataCustomer = Customer::all();
        return view('Admin.customer', [
            "dataCustomer" => $dataCustomer, $dataUser,
        ]);
    }

    public function dataKaryawan()
    {
        $user = auth()->user();
        $karyawan = $user->karyawan;
        $dataUser = User::all();
        $dataKaryawan = Karyawan::all();
        return view('Admin.karyawan', [
            "dataKaryawan" => $dataKaryawan, $dataUser,
        ]);
    }

    public function dataAdmin()
    {
        $user = auth()->user();
        $admin = $user->admin;
        $dataUser = User::all();
        $dataAdmin = Admin::all();
        return view('Admin.admin', [
            "dataAdmin" => $dataAdmin, $dataUser,
        ]);
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $message = [
            'roles.required' => 'Data Level tidak boleh kosong',
            'name.required' => 'Nama tidak boleh kosong',
            'gender.required' => 'Data Gender tidak boleh kosong',
            'email.required' => 'Data Email tidak boleh kosong',
            'password.required' => 'Data Password tidak boleh kosong',
        ];

        $this->validate($request, [
            'roles' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'password' => 'required',
        ], $message);

        $data = new User();
        $data->roles = $request->roles;
        $data->name = $request->name;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();

        if($data->roles == "customer"){
            $message = [
                'alamat.required' => 'Data Alamat tidak boleh kosong',
                'no_tlp.required' => 'Data Nomer Telepon tidak boleh kosong',
                'no_tlp.numeric' => 'Data Nomer Telepon harus berupa nomer',
            ];
    
            $this->validate($request, [
                'alamat' => 'required',
                'no_tlp' => 'required','numeric',
                'email' => 'required',
            ], $message);

            ChFavorite::create([
                'user_id' => $data->id,
                'favorite_id' => 2,
            ]);
            ChFavorite::create([
                'user_id' => $data->id,
                'favorite_id' => 3,
            ]);
            Customer::create([
                'user_id' => $data->id,
                'alamat' => $request->alamat,
                'no_tlp' => $request->no_tlp,
            ]);

            return redirect('/customer')->with('success', 'Data berhasil disimpan');
        }

        if($data->roles == "karyawan"){
            $message = [
                'department.required' => 'Data Department tidak boleh kosong',
                'no_tlp.required' => 'Data Nomer Telepon tidak boleh kosong',
                'no_tlp.numeric' => 'Data Nomer Telepon harus berupa nomer',
                'gaji.required' => 'Data Gaji tidak boleh kosong',
                'tgl_masuk.required' => 'Data Tanggal Masuk tidak boleh kosong',
            ];
    
            $this->validate($request, [
                'department' => 'required',
                'no_tlp' => 'required','numeric',
                'gaji' => 'required',
                'tgl_masuk' => 'required',
            ], $message);

            Karyawan::create([
                'user_id' => $data->id,
                'department' => $request->department,
                'no_tlp' => $request->no_tlp,
                'gaji' => $request->gaji,
                'tgl_masuk' => $request->tgl_masuk,
            ]);

            return redirect('/karyawan')->with('success', 'Data berhasil disimpan');
        }

        if($data->roles == "admin"){
            $message = [
                'role_admin.required' => 'Data Role admin tidak boleh kosong',
            ];
    
            $this->validate($request, [
                'role_admin' => 'required',
            ], $message);

            Admin::create([
                'user_id' => $data->id,
                'role_admin' => $request->role_admin,
            ]);

            return redirect('/admin')->with('success', 'Data berhasil disimpan');
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = User::find($id);
        $message = [
            'name.required' => 'Nama tidak boleh kosong',
            'gender.required' => 'Data Gender tidak boleh kosong',
            'email.required' => 'Data Email tidak boleh kosong',
        ];

        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
        ], $message);

        $data->name = $request->name;
        $data->gender = $request->gender;
        $data->email = $request->email;
        if ($request->password) {
            $data->password = Hash::make($request->password);
        }
        
        if($data->roles == "customer"){
            $message = [
                'alamat.required' => 'Data Alamat tidak boleh kosong',
                'no_tlp.required' => 'Data Nomer Telepon tidak boleh kosong',
                'no_tlp.numeric' => 'Data Nomer Telepon harus berupa nomer',
            ];
    
            $this->validate($request, [
                'alamat' => 'required',
                'no_tlp' => 'required','numeric',
                'email' => 'required',
            ], $message);
            $customer = $data->customer ?? new customer();
            $customer->alamat = $request->alamat;
            $customer->no_tlp = $request->no_tlp;
            $customer->save();
            $data->save();

            return redirect('/customer')->with('success', 'Data berhasil disimpan');
        }

        if($data->roles == "karyawan"){
            $message = [
                'department.required' => 'Data Department tidak boleh kosong',
                'no_tlp.required' => 'Data Nomer Telepon tidak boleh kosong',
                'no_tlp.numeric' => 'Data Nomer Telepon harus berupa nomer',
                'gaji.required' => 'Data Gaji tidak boleh kosong',
                'tgl_masuk.required' => 'Data Tanggal Masuk tidak boleh kosong',
            ];
    
            $this->validate($request, [
                'department' => 'required',
                'no_tlp' => 'required','numeric',
                'gaji' => 'required',
                'tgl_masuk' => 'required',
            ], $message);

            $karyawan = $data->karyawan ?? new karyawan();
            $karyawan->department = $request->department;
            $karyawan->no_tlp = $request->no_tlp;
            $karyawan->gaji = $request->gaji;
            $karyawan->tgl_masuk = $request->tgl_masuk;
            $karyawan->save();
            $data->save();

            return redirect('/karyawan')->with('success', 'Data berhasil disimpan');
        }

        if($data->roles == "admin"){
            $message = [
                'role_admin.required' => 'Data Role admin tidak boleh kosong',
            ];
    
            $this->validate($request, [
                'role_admin' => 'required',
            ], $message);

            $admin = $data->admin ?? new admin();
            $admin->role_admin = $request->role_admin;
            $admin->save();
            $data->save();

            return redirect('/admin')->with('success', 'Data berhasil disimpan');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
            if($user->roles == "customer"){
                $user->customer()->delete();
                $user->delete();
                ChFavorite::where('user_id', $user->id)->delete();
                Cache::flush();
                return redirect('/customer')->with('success', 'Data berhasil dihapus');
            }

            if($user->roles == "karyawan"){
                $user->karyawan()->delete();
                $user->delete();
                ChFavorite::where('favorite_id', $user->id)->delete();
                Cache::flush();
                return redirect('/karyawan')->with('success', 'Data berhasil dihapus');
            }

            if($user->roles == "admin"){
                $user->admin()->delete();
                $user->delete();
                Cache::flush();
                return redirect('/admin')->with('success', 'Data berhasil dihapus');
            }
    }
}

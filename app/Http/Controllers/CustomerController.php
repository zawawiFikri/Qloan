<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Karyawan;
use App\Models\Kategori;
use App\Models\Layanan;
use App\Models\Pesanan;
use App\Models\Promo;
use App\Models\ChFavorite;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;


class CustomerController extends Controller
{
    public function dataCustomer()
    {
        $dataKategori = Kategori::where('status', 'aktif')->get();
        $dataPromo = Promo::where('status', 'aktif')->get();
        $user = auth()->user()->customer;
        $dataPesanan = $user->pesanan;
        return view('customer.home', [
            "dataKategori" => $dataKategori,
            "dataPromo" => $dataPromo,
            "dataPesanan" => $dataPesanan,
        ]);
    }

    public function get_layanan(Request $request)
    {
        $kategoriId = $request->input('kategori_id');
        $layanan = Layanan::where('kategori_id', $kategoriId)
                          ->where('status', 'aktif')
                          ->get();
        return response()->json($layanan);
    }

    public function create_pesanan(Request $request)
    {
        // dd($request->all());
        $message = [
            'id.unique' => 'ID Pesanan sudah digunakan',
            'kategori_id.required' => 'Kategori tidak boleh kosong',
            'layanan_id.required' => 'Layanann tidak boleh kosong',
            'jenis_pembayaran.required' => 'Jenis Pembayaran tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
        ];

        $this->validate($request, [
            'id' => 'unique:dataPesanan',
            'kategori_id' => 'required',
            'layanan_id' => 'required',
            'jenis_pembayaran' => 'required',
            'alamat' => 'required',
        ], $message);

        $data = new Pesanan();
        $data->id = $request->id;
        $data->kategori_id = $request->kategori_id;
        $data->layanan_id = $request->layanan_id;
        $data->customer_id = $request->customer_id;
        $data->jenis_pembayaran = $request->jenis_pembayaran;
        $data->alamat = $request->alamat;
        $data->parfum = $request->parfum;
        $data->catatan = $request->catatan;

        $data->save();
        return redirect('/dashboard#form_pesanan')->with('success1', 'Pesanan telah dikirim');
    }
}

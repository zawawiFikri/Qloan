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

        $curl = curl_init();
        $nomer = $data->customer->no_tlp;
        $nama = $data->customer->user->name;
        $tanggal = now();
        $kategori = $data->kategori->nama_kategori;
        $layanan = $data->layanan->nama_layanan;
        $pembayaran = $data->jenis_pembayaran;
        $catatan = $data->catatan;
        $status = $data->status_pesanan;

        $message = 
           "QLOS LAUNDRY BLITAR\n" .
           "=============================\n".
           "ID Pesanan : $data->id\n".
           "Atas nama : $nama\n" .
           "Tanggal pesanan : $tanggal\n" .
           "Kategori pesanan : $kategori\n" .
           "Layanan pesanan : $layanan\n" .
           "Jenis pembayaran : $pembayaran\n" .
           "Catatan : $catatan\n". 
           "Status : Menunggu Konfirmasi";

        $token = 'qwSHX-U7yb!1-eCBmbun';

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('target' => $nomer,'message' => $message),
        CURLOPT_HTTPHEADER => array(
            'Authorization: '. $token
        ),
        ));

        curl_exec($curl);
        curl_close($curl);

        return redirect('/dashboard#form_pesanan')->with('success1', 'Pesanan telah dikirim, Cek WhatsApp Anda');
    }
}

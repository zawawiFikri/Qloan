<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Customer;
use App\Models\Karyawan;
use App\Models\Promo;
use App\Models\Kategori;
use App\Models\Layanan;
use Illuminate\Support\Facades\Cache;

class PesananController extends Controller
{
    public function dataPesanan()
    {
        $dataKategori = Kategori::where('status', 'aktif')->get();
        $dataPromo = Promo::where('status', 'aktif')->get();
        $dataLayanan = Layanan::where('status', 'aktif')->get();
        $dataKaryawan = Karyawan::all();
        $dataCustomer = Customer::all();
        $dataPesanan = Pesanan::all();
        return view('admin.pesanan', [
            "dataPesanan" => $dataPesanan,
            "dataKategori" => $dataKategori,
            "dataPromo" => $dataPromo,
            "dataLayanan" => $dataLayanan,
            "dataKaryawan" => $dataKaryawan,
            "dataCustomer" => $dataCustomer,
        ]);
    }

    public function update_pesanan(Request $request, $id)
    {
        $data = Pesanan::find($id);
        $message = [
            'customer_id.required' => "Data Customer tidak boleh kosong",
            'karyawan_id.required' => "Data karyawan tidak boleh kosong",
            'kategori_id.required' => "Data kategori tidak boleh kosong",
            'layanan_id.required' => "Data layanan tidak boleh kosong",
            'promo_id.required' => "Data promo tidak boleh kosong",
            'alamat.required' => "Data alamat tidak boleh kosong",
            'catatan.required' => "Data catatan tidak boleh kosong",
            'bobot.required' => 'Data Bobot tidak boleh kosong',
            'jenis_pembayaran.required' => "Data jenis pembayaran tidak boleh kosong",
            'parfum.required' => "Data parfum tidak boleh kosong",
            'status_pesanan.required' => 'Data Status Pesanan tidak boleh kosong',
        ];

        $this->validate($request, [
            'customer_id' => 'required',
            'karyawan_id' => 'required',
            'kategori_id' => 'required',
            'layanan_id' => 'required',
            'promo_id' => 'required',
            'alamat' => 'required',
            'catatan' => 'required',
            'bobot' => 'required',
            'jenis_pembayaran' => 'required',
            'parfum' => 'required',
            'status_pesanan' => 'required',
        ], $message);

        if($data->promo){
            $data->customer_id = $request->customer_id;
            $data->karyawan_id = $request->karyawan_id;
            $data->kategori_id = $request->kategori_id;
            $data->layanan_id = $request->layanan_id;
            $data->promo_id = $request->promo_id;
            $data->alamat = $request->alamat;
            $data->catatan = $request->catatan;
            $data->bobot = $request->bobot;
            $totalawal = ($data->layanan->harga * $request->bobot);
            $diskon = $totalawal * ($data->promo->diskon/100);
            $data->total_pembayaran = $totalawal-$diskon;
            $data->jenis_pembayaran = $request->jenis_pembayaran;
            $data->parfum = $request->parfum;
            $data->status_pesanan = $request->status_pesanan;
        }else{
            $data->customer_id = $request->customer_id;
            $data->karyawan_id = $request->karyawan_id;
            $data->kategori_id = $request->kategori_id;
            $data->layanan_id = $request->layanan_id;
            $data->promo_id = $request->promo_id;
            $data->alamat = $request->alamat;
            $data->catatan = $request->catatan;
            $data->bobot = $request->bobot;
            $totalawal = ($data->layanan->harga * $request->bobot);
            $data->total_pembayaran = $totalawal;
            $data->jenis_pembayaran = $request->jenis_pembayaran;
            $data->parfum = $request->parfum;
            $data->status_pesanan = $request->status_pesanan;
        }
        $data->save();
        return redirect('/pesanan_admin')->with('success', 'Data berhasil disimpan');
    }

    public function create_pesanan(Request $request)
    {
        $message = [
            'customer_id.required' => "Data Customer tidak boleh kosong",
            'karyawan_id.required' => "Data karyawan tidak boleh kosong",
            'kategori_id.required' => "Data kategori tidak boleh kosong",
            'layanan_id.required' => "Data layanan tidak boleh kosong",
            'promo_id.required' => "Data promo tidak boleh kosong",
            'alamat.required' => "Data alamat tidak boleh kosong",
            'catatan.required' => "Data catatan tidak boleh kosong",
            'bobot.required' => 'Data Bobot tidak boleh kosong',
            'jenis_pembayaran.required' => "Data jenis pembayaran tidak boleh kosong",
            'parfum.required' => "Data parfum tidak boleh kosong",
            'status_pesanan.required' => 'Data Status Pesanan tidak boleh kosong',
        ];

        $this->validate($request, [
            'customer_id' => 'required',
            'karyawan_id' => 'required',
            'kategori_id' => 'required',
            'layanan_id' => 'required',
            'promo_id' => 'required',
            'alamat' => 'required',
            'catatan' => 'required',
            'bobot' => 'required',
            'jenis_pembayaran' => 'required',
            'parfum' => 'required',
            'status_pesanan' => 'required',
        ], $message);
        $data = new Pesanan();
        if($data->promo){
            $data->customer_id = $request->customer_id;
            $data->karyawan_id = $request->karyawan_id;
            $data->kategori_id = $request->kategori_id;
            $data->layanan_id = $request->layanan_id;
            $data->promo_id = $request->promo_id;
            $data->alamat = $request->alamat;
            $data->catatan = $request->catatan;
            $data->bobot = $request->bobot;
            $totalawal = ($data->layanan->harga * $request->bobot);
            $diskon = $totalawal * ($data->promo->diskon/100);
            $data->total_pembayaran = $totalawal-$diskon;
            $data->jenis_pembayaran = $request->jenis_pembayaran;
            $data->parfum = $request->parfum;
            $data->status_pesanan = $request->status_pesanan;
        }else{
            $data->customer_id = $request->customer_id;
            $data->karyawan_id = $request->karyawan_id;
            $data->kategori_id = $request->kategori_id;
            $data->layanan_id = $request->layanan_id;
            $data->promo_id = $request->promo_id;
            $data->alamat = $request->alamat;
            $data->catatan = $request->catatan;
            $data->bobot = $request->bobot;
            $totalawal = ($data->layanan->harga * $request->bobot);
            $data->total_pembayaran = $totalawal;
            $data->jenis_pembayaran = $request->jenis_pembayaran;
            $data->parfum = $request->parfum;
            $data->status_pesanan = $request->status_pesanan;
        }
        $data->save();
        return redirect('/pesanan_admin')->with('success', 'Data berhasil disimpan');
    }
    
    public function destroy_pesanan($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->delete();
        Cache::flush();
        return redirect('/pesanan_admin')->with('success', 'Data berhasil dihapus');
    }

    public function get_layanan_admin(Request $request)
    {
        $kategoriId = $request->input('kategori_id');
        $layanan = Layanan::where('kategori_id', $kategoriId)
                          ->where('status', 'aktif')
                          ->get();
        return response()->json($layanan);
    }
}

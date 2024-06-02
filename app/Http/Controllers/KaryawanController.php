<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Promo;

class KaryawanController extends Controller
{
    public function dataKaryawan()
    {
        $jumlahPesanan = Pesanan::count();
        return view('karyawan.dashboard', [
            "jumlahPesanan" => $jumlahPesanan,
        ]);
    }
    public function pesanan()
    {
        $dataPromo = Promo::where('status', 'aktif')->get();
        $dataPesanan = Pesanan::all();
        return view('karyawan.pesanan', [
            "dataPesanan" => $dataPesanan,
            "dataPromo" => $dataPromo,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = Pesanan::find($id);
        $message = [
            'bobot.required' => 'Data Bobot tidak boleh kosong',
            'status_pesanan.required' => 'Status Pesanan tidak boleh kosong',
        ];

        $this->validate($request, [
            'bobot' => 'required',
            'status_pesanan' => 'required',
        ], $message);

            $data->bobot = $request->bobot;
            $data->promo_id = $request->promo_id;
            $data->status_pesanan = $request->status_pesanan;
            $data->parfum = $request->parfum;
            $data->karyawan_id = auth()->user()->karyawan->id;
            $data->save();

            if($data->promo){
                $totalawal = ($data->layanan->harga * $request->bobot);
                $diskon = $totalawal * ($data->promo->diskon/100);
                $data->total_pembayaran = $totalawal-$diskon;
                $data->save();
            }else{
                $totalawal = ($data->layanan->harga * $request->bobot);
                $data->total_pembayaran = $totalawal;
                $data->save();
            }

        return redirect('/pesanan')->with('success', 'Data berhasil disimpan');

    }

    
}

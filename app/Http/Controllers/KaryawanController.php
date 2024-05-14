<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class KaryawanController extends Controller
{
    public function dataKaryawan()
    {
        return view('karyawan.dashboard');
    }
    public function pesanan()
    {
        $dataPesanan = Pesanan::all();
        return view('karyawan.pesanan', [
            "dataPesanan" => $dataPesanan,
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

        if($data->promo){
            $data->bobot = $request->bobot;
            $data->status_pesanan = $request->status_pesanan;
            $totalawal = ($data->layanan->harga * $request->bobot);
            $diskon = $totalawal * ($data->promo->diskon/100);
            $data->total_pembayaran = $totalawal-$diskon;
            $data->karyawan_id = auth()->user()->karyawan->id;
        }else{
            $data->bobot = $request->bobot;
            $data->status_pesanan = $request->status_pesanan;
            $totalawal = ($data->layanan->harga * $request->bobot);
            $data->total_pembayaran = $totalawal;
            $data->karyawan_id = auth()->user()->karyawan->id;
        }
        $data->save();
        return redirect('/pesanan')->with('success', 'Data berhasil disimpan');

    }

    
}

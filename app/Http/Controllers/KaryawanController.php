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

            $curl = curl_init();
            $nomer = $data->customer->no_tlp;
            $id = $data->id;
            $nama = $data->customer->user->name;
            $kategori = $data->kategori->nama_kategori;
            $layanan = $data->layanan->nama_layanan;
            $pembayaran = $data->jenis_pembayaran;
            $total = $data->total_pembayaran;
            $status = $data->status_pesanan;
            $parfum = $data->parfum;
            $promo = $data->promo->nama_promo;
            if($data->kategori->id == 4){
                $bobot = "$data->bobot Pasang";
            }else{
                $bobot = "$data->bobot Kg";
            }
    
            $messages = 
               "QLOS LAUNDRY BLITAR\n" .
               "=============================\n".
               "ID Pesanan : $id\n".
               "Atas nama : $nama\n" .
               "Parfum : $parfum\n".
               "Kategori pesanan : $kategori\n" .
               "Layanan pesanan : $layanan\n" .
               "Promo : $promo\n".
               "Jenis pembayaran : $pembayaran\n" .
               "Bobot Total : $bobot\n".
               "Total pembayaran : Rp.$total,00\n" .
               "Status : $status";
    
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
            CURLOPT_POSTFIELDS => array('target' => $nomer,'message' => $messages),
            CURLOPT_HTTPHEADER => array(
                'Authorization: '. $token
            ),
            ));
    
            curl_exec($curl);
            curl_close($curl);

        return redirect('/pesanan')->with('success', 'Data berhasil disimpan');

    }

    
}

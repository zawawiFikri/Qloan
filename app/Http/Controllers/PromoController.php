<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

class PromoController extends Controller
{
    public function dataPromo()
    {
        $dataPromo = Promo::all();
        return view('admin.promo', [
            "dataPromo" => $dataPromo, 
        ]);
    }

    public function create_promo(Request $request)
    {
        // dd($request->all());
        $message = [
            'nama_promo.required' => 'Data Nama tidak boleh kosong',
            'desc_promo.required' => 'Data Deskripsi tidak boleh kosong',
            'diskon.required' => 'Data Diskon tidak boleh kosong',
            'tgl_mulai.required' => 'Data Tanggal Mulai tidak boleh kosong',
            'tgl_akhir.required' => 'Data Tanggal Akhir tidak boleh kosong',
            'status.required' => 'Data Status tidak boleh kosong',
        ];

        $this->validate($request, [
            'nama_promo' => 'required',
            'desc_promo' => 'required',
            'diskon' => 'required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            'status' => 'required',
        ], $message);

        $data = new Promo();
        $data->nama_promo = $request->nama_promo;
        $data->desc_promo = $request->desc_promo;
        $data->diskon = $request->diskon;
        $data->tgl_mulai = $request->tgl_mulai;
        $data->tgl_akhir = $request->tgl_akhir;
        $data->status = $request->status;
        $data->save();

        return redirect('/promo')->with('success', 'Data berhasil disimpan');
    }

    public function update_promo(Request $request, $id)
    {
        // dd($request->all());
        $data = Promo::find($id);
        $message = [
            'nama_promo.required' => 'Data Nama tidak boleh kosong',
            'desc_promo.required' => 'Data Deskripsi tidak boleh kosong',
            'diskon.required' => 'Data Diskon tidak boleh kosong',
            'tgl_mulai.required' => 'Data Tanggal Mulai tidak boleh kosong',
            'tgl_akhir.required' => 'Data Tanggal Akhir tidak boleh kosong',
            'status.required' => 'Data Status tidak boleh kosong',
        ];

        $this->validate($request, [
            'nama_promo' => 'required',
            'desc_promo' => 'required',
            'diskon' => 'required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            'status' => 'required',
        ], $message);

        $data->nama_promo = $request->nama_promo;
        $data->desc_promo = $request->desc_promo;
        $data->diskon = $request->diskon;
        $data->tgl_mulai = $request->tgl_mulai;
        $data->tgl_akhir = $request->tgl_akhir;
        $data->status = $request->status;
        $data->save();

        return redirect('/promo')->with('success', 'Data berhasil disimpan');
    }

    public function destroy_promo($id)
    {
        $promo = Promo::find($id);;
        $promo->delete();
        return redirect('/promo')->with('success', 'Data berhasil dihapus');
    }
}

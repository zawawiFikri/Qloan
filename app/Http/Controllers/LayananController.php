<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Layanan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class LayananController extends Controller
{
    public function dataKategori()
    {
        $dataKategori = Kategori::all();
        return view('admin.kategori', [
            "dataKategori" => $dataKategori,
        ]);
    }
    public function dataLayanan()
    {
        $dataLayanan = Layanan::all();
        $dataKategori = Kategori::all();
        return view('admin.layanan', [
            "dataLayanan" => $dataLayanan, 
            "dataKategori" => $dataKategori,
        ]);
    }

    public function create_kategori(Request $request)
    {
        // dd($request->all());
        $message = [
            'nama_kategori.required' => 'Data Nama tidak boleh kosong',
            'status.required' => 'Data Status tidak boleh kosong',
        ];

        $this->validate($request, [
            'nama_kategori' => 'required',
            'status' => 'required',
        ], $message);

        $data = new Kategori();
        $data->nama_kategori = $request->nama_kategori;
        $data->status = $request->status;
        $data->save();

        return redirect('/kategori')->with('success', 'Data berhasil disimpan');
    }

    public function update_kategori(Request $request, $id)
    {
        // dd($request->all());
        $data = Kategori::find($id);
        $message = [
            'nama_kategori.required' => 'Data Nama tidak boleh kosong',
            'status.required' => 'Data Status tidak boleh kosong',
        ];

        $this->validate($request, [
            'nama_kategori' => 'required',
            'status' => 'required',
        ], $message);

        $data->nama_kategori = $request->nama_kategori;
        $data->status = $request->status;
        $data->save();

        return redirect('/kategori')->with('success', 'Data berhasil disimpan');
    }

    public function destroy_kategori($id)
    {
        $kategori = Kategori::find($id);;
        $kategori->delete();
        return redirect('/kategori')->with('success', 'Data berhasil dihapus');
    }


    public function create_layanan(Request $request)
    {
        // dd($request->all());
        $message = [
            'nama_layanan.required' => 'Data Nama tidak boleh kosong',
            'kategori_id.required' => 'Data Kategori tidak boleh kosong',
            'desc_layanan.required' => 'Data Deskripsi tidak boleh kosong',
            'harga.required' => 'Data Harga tidak boleh kosong',
            'durasi.required' => 'Data Durasi tidak boleh kosong',
            'status.required' => 'Data Status tidak boleh kosong',
        ];

        $this->validate($request, [
            'nama_layanan' => 'required',
            'kategori_id' => 'required',
            'desc_layanan' => 'required',
            'harga' => 'required',
            'durasi' => 'required',
            'status' => 'required',
        ], $message);

        $data = new Layanan();
        $data->nama_layanan = $request->nama_layanan;
        $data->kategori_id = $request->kategori_id;
        $data->desc_layanan = $request->desc_layanan;
        $data->harga = $request->harga;
        $data->durasi = $request->durasi;
        $data->status = $request->status;
        $data->save();

        return redirect('/layanan')->with('success', 'Data berhasil disimpan');
    }

    public function update_layanan(Request $request, $id)
    {
        // dd($request->all());
        $data = Layanan::find($id);
        $message = [
            'nama_layanan.required' => 'Data Nama tidak boleh kosong',
            'kategori_id.required' => 'Data Kategori tidak boleh kosong',
            'desc_layanan.required' => 'Data Deskripsi tidak boleh kosong',
            'harga.required' => 'Data Harga tidak boleh kosong',
            'durasi.required' => 'Data Durasi tidak boleh kosong',
            'status.required' => 'Data Status tidak boleh kosong',
        ];

        $this->validate($request, [
            'nama_layanan' => 'required',
            'kategori_id' => 'required',
            'desc_layanan' => 'required',
            'harga' => 'required',
            'durasi' => 'required',
            'status' => 'required',
        ], $message);

        $data->nama_layanan = $request->nama_layanan;
        $data->kategori_id = $request->kategori_id;
        $data->desc_layanan = $request->desc_layanan;
        $data->harga = $request->harga;
        $data->durasi = $request->durasi;
        $data->status = $request->status;
        $data->save();

        return redirect('/layanan')->with('success', 'Data berhasil disimpan');
    }

    public function destroy_layanan($id)
    {
        $layanan = Layanan::find($id);;
        $layanan->delete();
        return redirect('/layanan')->with('success', 'Data berhasil dihapus');
    }

}

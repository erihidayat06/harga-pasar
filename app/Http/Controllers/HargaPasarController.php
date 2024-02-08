<?php

namespace App\Http\Controllers;

use App\Exports\DataHarga;
use App\Models\Hargabarang;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HargaPasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("index");
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("index");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validateData = $request->validate([
            'lokasi' => 'required',
            'harga_beras_premium' => 'required',
            'harga_beras_medium' => 'required',
            'gula_pasir' => 'required',
            'minyak_grg_cur' => 'required',
            'minyak_goreng_bimoli' => 'required',
            'daging_sapi_murni' => 'required',
            'daging_sapi_kw' => 'required',
            'daging_ayam_ras' => 'required',
            'daging_ayam_kampung' => 'required',
            'telur_ayam_ras' => 'required',
            'telur_ayam_kampung' => 'required',
            'susu_bubuk_indomilk' => 'required',
            'susu_bubuk_dancow' => 'required',
            'skm_bendera' => 'required',
            'skm_indomilk' => 'required',
            'jagung_pipilan' => 'required',
            'terigu_bogasari' => 'required',
            'kedelai_lokal' => 'required',
            'kedelai_impor' => 'required',
            'cabai_merah_besar' => 'required',
            'cabai_merah_keriting' => 'required',
            'cabai_rawit_merah' => 'required',
            'cabai_rawit_hijau' => 'required',
            'bawang_merah' => 'required',
            'bawang_putih' => 'required',
            'bawang_kating' => 'required',
            'ikan_kembung' => 'required',
            'ikan_teri' => 'required',
            'ikan_bandeng' => 'required',
            'garam_bata' => 'required',
            'garam_halus' => 'required',
            'kacang_tanah' => 'required',
            'kacang_hijau' => 'required',
            'minyak_kita' => 'required',
            'ikan_tongkol' => 'required',
            'tempe' => 'required',
            'tahu_mentah_putih' => 'required',
            'udang_segar' => 'required',
            'pisang' => 'required',
            'jeruk_lokal' => 'required',
            'ketela_pohon' => 'required',
            'bawang_bombay' => 'required'
        ]);


        Hargabarang::create($validateData);

        return redirect()->back()->with('success', 'Berhasil di Kirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hargabarang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hargabarang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hargabarang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hargabarang $barang)
    {
        //
    }
}

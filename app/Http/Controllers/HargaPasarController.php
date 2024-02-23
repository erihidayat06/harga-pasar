<?php

namespace App\Http\Controllers;


use App\Exports\DataHarga;

use App\Models\Hargabarang;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class HargaPasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Harga Komoditi
        // Harga Setiap Pasar
        $tanggal1 = [date('d M Y')];
        $harga1 = [0];
        (request('produk1') == null) ? $produk = 'beras_premium' : $produk = request('produk1');

        // Perhitungan Perminggu
        $perhari1 = Hargabarang::tanggal(request(['dari', 'sampai']))->orderBy('created_at', 'asc')->get()->unique('created_at');
        if (count($perhari1) > 0) {
            $tanggal1 = [];
            $harga1 = [];
            foreach ($perhari1 as $hari) {
                $model1 = Hargabarang::where('created_at', $hari->created_at);
                $tanggal1[] = date('d M Y', strtotime($hari->created_at));
                $harga1 = number_format($model1->sum($produk) / count($model1->get()), 2, '.', '');
                $total1[] = (float)$harga1;
            }
        }




        // Data Kenikan
        $perminggu1 = Hargabarang::minggu()->orderBy('created_at', 'asc')->get()->pluck($produk)->toArray();

        $data_minggu1 = ['naik' => 0, 'awal' => 0, 'akhir' => 0];
        if (count($perminggu1)) {
            $awal_minggu1 = array_sum($perminggu1) / count($perminggu1);
            $akhir_minggu1 = end($perminggu1);
            $data_minggu1 = ['naik' => $akhir_minggu1 - $awal_minggu1, 'awal' => $awal_minggu1, 'akhir' => $akhir_minggu1];
        }


        // Data Kenikan Perbulan
        $perbulan1 = Hargabarang::bulanlalu()->orderBy('created_at', 'asc')->get()->unique('created_at')->pluck($produk)->toArray();
        $perbulan2 = Hargabarang::bulan()->orderBy('created_at', 'asc')->get()->unique('created_at')->pluck($produk)->toArray();


        $data_bulan1 = ['naik' => 0, 'awal' => 0, 'akhir' => 0];

        if (count($perbulan1)) {
            $awal_bulan1 = array_sum($perbulan1) / count($perbulan1);
            $akhir_bulan1 = array_sum($perbulan2) / count($perbulan2);
            $data_bulan1 = ['naik' => $akhir_bulan1 - $awal_bulan1, 'awal' => $awal_bulan1, 'akhir' => $akhir_bulan1];
        }


        // Data Kenikan PerTahun
        $pertahun1 = Hargabarang::tahunlalu()->orderBy('created_at', 'asc')->get()->unique('created_at')->pluck($produk)->toArray();
        $pertahun2 = Hargabarang::tahun()->orderBy('created_at', 'asc')->get()->unique('created_at')->pluck($produk)->toArray();
        $data_tahun = ['naik' => 0, 'awal' => 0, 'akhir' => 0];


        if (count($pertahun1)) {
            $awal_tahun1 = array_sum($pertahun1) / count($pertahun1);
            $akhir_tahun1 = array_sum($pertahun2) / count($pertahun2);
            $data_tahun1 = ['naik' => $akhir_tahun1 - $awal_tahun1, 'awal' => $awal_tahun1, 'akhir' => $akhir_tahun1];
        }









        // Harga Setiap Pasar
        $tanggal = [date('d M Y')];
        $harga = [0];
        (request('produk') == null) ? $produk = 'beras_premium' : $produk = request('produk');

        // Perhitungan Perminggu
        $perhari = Hargabarang::pasar(request('pasar'))->tanggal(request(['dari', 'sampai']))->orderBy('created_at', 'asc')->get()->unique('created_at');
        if (count($perhari) > 0) {
            $tanggal = [];
            $harga = [];
            foreach ($perhari as $hari) {
                $tanggal[] = date('d M Y', strtotime($hari->created_at));
                $harga[] = $hari[$produk];
            }
        }

        // Data Kenikan
        $perminggu = Hargabarang::pasar(request('pasar'))->minggu()->orderBy('created_at', 'asc')->get()->unique('created_at')->pluck($produk)->toArray();

        $data_minggu = ['naik' => 0, 'awal' => 0, 'akhir' => 0];
        if (count($perminggu)) {
            ($perminggu[0] == 0) ? $harga_minggu = end($perminggu) : $harga_minggu = $perminggu[0];
            (end($perminggu) == 0) ? $harga_minggu2 = $perminggu[0] : $harga_minggu2 = end($perminggu);
            $minggu = $harga_minggu2 - $harga_minggu;
            $data_minggu = ['naik' => $minggu, 'awal' => $harga_minggu, 'akhir' => $harga_minggu2];
        }



        // Data Kenikan Perbulan
        $perbulan = Hargabarang::pasar(request('pasar'))->bulan()->orderBy('created_at', 'asc')->get()->unique('created_at')->pluck($produk)->toArray();


        $data_bulan = ['naik' => 0, 'awal' => 0, 'akhir' => 0];

        if (count($perbulan)) {
            ($perbulan[0] == 0) ? $harga_bulan = end($perbulan) : $harga_bulan = $perbulan[0];
            (end($perbulan) == 0) ? $harga_bulan2 = $perbulan[0] : $harga_bulan2 = end($perbulan);
            $bulan = $harga_bulan2 - $harga_bulan;
            $data_bulan = ['naik' => $bulan, 'awal' => $harga_bulan, 'akhir' => $harga_bulan2];
        }


        // Data Kenikan PerTahun
        $pertahun = Hargabarang::pasar(request('pasar'))->tahun()->orderBy('created_at', 'asc')->get()->unique('created_at')->pluck($produk)->toArray();
        $data_tahun = ['naik' => 0, 'awal' => 0, 'akhir' => 0];


        if (count($pertahun)) {
            ($pertahun[0] == 0) ? $harga_tahun = end($pertahun) : $harga_tahun = $pertahun[0];
            (end($pertahun) == 0) ? $harga_tahun2 = $pertahun[0] : $harga_tahun2 = end($pertahun);
            $tahun = $harga_tahun2 - $harga_tahun;
            $data_tahun = ['naik' => $tahun, 'awal' => $harga_tahun, 'akhir' => $harga_tahun2];
        }




        // config
        $produks = config('dataproduk');
        $pasars = config('namapasar.pasar');

        return view("index", [
            'produks' => $produks,
            'pasars' => $pasars,
            'tanggal' => json_encode($tanggal),
            'harga' => json_encode($harga),
            'kenaikan_minggu' => $data_minggu,
            'kenaikan_bulan' => $data_bulan,
            'kenaikan_tahun' => $data_tahun,


            'kenaikan_minggu1' => $data_minggu1,
            'kenaikan_bulan1' => $data_bulan1,
            'kenaikan_tahun1' => $data_tahun1,
            'tanggal1' => json_encode($tanggal1),
            'harga1' => json_encode($total1),

        ]);
    }

    public function cetak_pdf()
    {
        return view('exportPDF');
    }

    public function tampilData()
    {

        $data = Hargabarang::latest();
        return view('tampilData.index', [
            'hargas' => Hargabarang::datapasar(request('pasar'))->filterTanggal(request(['dari']))->latest()->get(),
            'data' => $data,
            'pasars' =>  $pasars = config('namapasar.pasar')
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.index", [
            'pasars' =>  config('namapasar.pasar')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'lokasi' => 'required',
            'beras_premium' => 'required',
            'beras_medium' => 'required',
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
            'bawang_bombay' => 'required',
            'indomi_ayam_bawang' => 'required',
            'created_at' => 'required'
        ]);



        Hargabarang::create($validateData);

        return redirect('/create')->with('success', 'Berhasil di Kirim');
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

@extends('layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>Input Harga</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="card col-lg-8">
            <div class="card-body">
                <form action="/" method="POST">
                    @csrf
                    @method('POST')

                    <label class="mt-3" for="lokasi">Nama Pasar</label>
                    <input type="text" class="form-control" id="lokasi" value="{{ old('lokasi') }}" name="lokasi">

                    <div class="card-title">Harga Barang</div>
                    <label for="beras-premium">Beras Premium</label>
                    <input type="number" class="form-control" id="beras-premium" value="{{ old('harga_beras_premium') }}"
                        name="harga_beras_premium">

                    <label class="mt-3" for="beras-medium">Beras Medium</label>
                    <input type="number" class="form-control" id="beras-medium" value="{{ old('harga_beras_medium') }}"
                        name="harga_beras_medium">

                    <label class="mt-3" for="gula-pasir">Gula Pasir</label>
                    <input type="number" class="form-control" id="gula-pasir" value="{{ old('gula_pasir') }}"
                        name="gula_pasir">

                    <label class="mt-3" for="minyak_grg_cur">Minyak Goreng Curah</label>
                    <input type="number" class="form-control" id="minyak_grg_cur" value="{{ old('minyak_grg_cur') }}"
                        name="minyak_grg_cur">

                    <label class="mt-3" for="minyak_goreng_bimoli">Minyak Goreng Bimoli</label>
                    <input type="number" class="form-control" id="minyak_goreng_bimoli"
                        value="{{ old('minyak_goreng_bimoli') }}" name="minyak_goreng_bimoli">

                    <label class="mt-3" for="daging_sapi_murni">Daging Sapi Murni</label>
                    <input type="number" class="form-control" id="daging_sapi_murni" value="{{ old('daging_sapi_murni') }}"
                        name="daging_sapi_murni">

                    <label class="mt-3" for="daging_sapi_kw">Daging Sapi Kw</label>
                    <input type="number" class="form-control" id="daging_sapi_kw" value="{{ old('daging_sapi_kw') }}"
                        name="daging_sapi_kw">

                    <label class="mt-3" for="daging_ayam_ras">Daging Ayam Ras</label>
                    <input type="number" class="form-control" id="daging_ayam_ras" value="{{ old('daging_ayam_ras') }}"
                        name="daging_ayam_ras">

                    <label class="mt-3" for="daging_ayam_kampung">Daging Ayam Kampung</label>
                    <input type="number" class="form-control" id="daging_ayam_kampung"
                        value="{{ old('daging_ayam_kampung') }}" name="daging_ayam_kampung">

                    <label class="mt-3" for="telur_ayam_ras">Telur Ayam Ras</label>
                    <input type="number" class="form-control" id="telur_ayam_ras" value="{{ old('telur_ayam_ras') }}"
                        name="telur_ayam_ras">

                    <label class="mt-3" for="telur_ayam_kampung">Telur Ayam Kampung</label>
                    <input type="number" class="form-control" id="telur_ayam_kampung"
                        value="{{ old('telur_ayam_kampung') }}" name="telur_ayam_kampung">

                    <label class="mt-3" for="susu_bubuk_indomilk">Susu Bubuk Indomilk</label>
                    <input type="number" class="form-control" id="susu_bubuk_indomilk"
                        value="{{ old('susu_bubuk_indomilk') }}" name="susu_bubuk_indomilk">

                    <label class="mt-3" for="susu_bubuk_dancow">Susu Bubuk Dancow</label>
                    <input type="number" class="form-control" id="susu_bubuk_dancow"
                        value="{{ old('susu_bubuk_dancow') }}" name="susu_bubuk_dancow">

                    <label class="mt-3" for="skm_bendera">SKM Bendera</label>
                    <input type="number" class="form-control" id="skm_bendera" value="{{ old('skm_bendera') }}"
                        name="skm_bendera">

                    <label class="mt-3" for="skm_indomilk">SKM Indomilk</label>
                    <input type="number" class="form-control" id="skm_indomilk" value="{{ old('skm_indomilk') }}"
                        name="skm_indomilk">

                    <label class="mt-3" for="jagung_pipilan">Jagung Pipilan</label>
                    <input type="number" class="form-control" id="jagung_pipilan" value="{{ old('jagung_pipilan') }}"
                        name="jagung_pipilan">

                    <label class="mt-3" for="terigu_bogasari">Terigu Bogasari</label>
                    <input type="number" class="form-control" id="terigu_bogasari"
                        value="{{ old('terigu_bogasari') }}" name="terigu_bogasari">

                    <label class="mt-3" for="kedelai_lokal">Kedelai Lokal</label>
                    <input type="number" class="form-control" id="kedelai_lokal" value="{{ old('kedelai_lokal') }}"
                        name="kedelai_lokal">

                    <label class="mt-3" for="kedelai_impor">Kedelai Impor</label>
                    <input type="number" class="form-control" id="kedelai_impor" value="{{ old('kedelai_impor') }}"
                        name="kedelai_impor">

                    <label class="mt-3" for="cabai_merah_besar">Cabai Merah Besar</label>
                    <input type="number" class="form-control" id="cabai_merah_besar"
                        value="{{ old('cabai_merah_besar') }}" name="cabai_merah_besar">

                    <label class="mt-3" for="cabai_merah_keriting">Cabai Merah Keriting</label>
                    <input type="number" class="form-control" id="cabai_merah_keriting"
                        value="{{ old('cabai_merah_keriting') }}" name="cabai_merah_keriting">

                    <label class="mt-3" for="cabai_rawit_merah">Cabai Rawit Merah</label>
                    <input type="number" class="form-control" id="cabai_rawit_merah"
                        value="{{ old('cabai_rawit_merah') }}" name="cabai_rawit_merah">

                    <label class="mt-3" for="cabai_rawit_hijau">Cabai Rawit Hijau</label>
                    <input type="number" class="form-control" id="cabai_rawit_hijau"
                        value="{{ old('cabai_rawit_hijau') }}" name="cabai_rawit_hijau">

                    <label class="mt-3" for="bawang_merah">Bawang Merah</label>
                    <input type="number" class="form-control" id="bawang_merah" value="{{ old('bawang_merah') }}"
                        name="bawang_merah">

                    <label class="mt-3" for="bawang_putih">Bawang Putih</label>
                    <input type="number" class="form-control" id="bawang_putih" value="{{ old('bawang_putih') }}"
                        name="bawang_putih">

                    <label class="mt-3" for="bawang_kating">Bawang Kating</label>
                    <input type="number" class="form-control" id="bawang_kating" value="{{ old('bawang_kating') }}"
                        name="bawang_kating">

                    <label class="mt-3" for="ikan_kembung">Ikan Kembung</label>
                    <input type="number" class="form-control" id="ikan_kembung" value="{{ old('ikan_kembung') }}"
                        name="ikan_kembung">

                    <label class="mt-3" for="ikan_teri">Ikan Teri</label>
                    <input type="number" class="form-control" id="ikan_teri" value="{{ old('ikan_teri') }}"
                        name="ikan_teri">

                    <label class="mt-3" for="ikan_bandeng">Ikan Bandeng</label>
                    <input type="number" class="form-control" id="ikan_bandeng" value="{{ old('ikan_bandeng') }}"
                        name="ikan_bandeng">

                    <label class="mt-3" for="garam_bata">Garam Bata</label>
                    <input type="number" class="form-control" id="garam_bata" value="{{ old('garam_bata') }}"
                        name="garam_bata">

                    <label class="mt-3" for="garam_halus">Garam Halus</label>
                    <input type="number" class="form-control" id="garam_halus" value="{{ old('garam_halus') }}"
                        name="garam_halus">

                    <label class="mt-3" for="indomie_ayam_bawang">Indomie Ayam Bawang</label>
                    <input type="number" class="form-control" id="indomie_ayam_bawang"
                        value="{{ old('indomie_ayam_bawang') }}" name="indomie_ayam_bawang">

                    <label class="mt-3" for="kacang_tanah">Kacang Tanah</label>
                    <input type="number" class="form-control" id="kacang_tanah" value="{{ old('kacang_tanah') }}"
                        name="kacang_tanah">

                    <label class="mt-3" for="kacang_hijau">Kacang Hijau</label>
                    <input type="number" class="form-control" id="kacang_hijau" value="{{ old('kacang_hijau') }}"
                        name="kacang_hijau">

                    <label class="mt-3" for="minyak_kita">Minyak Kita</label>
                    <input type="number" class="form-control" id="minyak_kita" value="{{ old('minyak_kita') }}"
                        name="minyak_kita">

                    <label class="mt-3" for="ikan_tongkol">Ikan Tongkol</label>
                    <input type="number" class="form-control" id="ikan_tongkol" value="{{ old('ikan_tongkol') }}"
                        name="ikan_tongkol">

                    <label class="mt-3" for="tempe">Tempe</label>
                    <input type="number" class="form-control" id="tempe" value="{{ old('tempe') }}"
                        name="tempe">

                    <label class="mt-3" for="tahu_mentah_putih">Tahu Mentah Putih</label>
                    <input type="number" class="form-control" id="tahu_mentah_putih"
                        value="{{ old('tahu_mentah_putih') }}" name="tahu_mentah_putih">

                    <label class="mt-3" for="udang_segar">Udang Segar</label>
                    <input type="number" class="form-control" id="udang_segar" value="{{ old('udang_segar') }}"
                        name="udang_segar">

                    <label class="mt-3" for="pisang">Pisang</label>
                    <input type="number" class="form-control" id="pisang" value="{{ old('pisang') }}"
                        name="pisang">

                    <label class="mt-3" for="jeruk_lokal">Jeruk Lokal</label>
                    <input type="number" class="form-control" id="jeruk_lokal" value="{{ old('jeruk_lokal') }}"
                        name="jeruk_lokal">

                    <label class="mt-3" for="ketela_pohon">Ketela Pohon</label>
                    <input type="number" class="form-control" id="ketela_pohon" value="{{ old('ketela_pohon') }}"
                        name="ketela_pohon">

                    <label class="mt-3" for="bawang_bombay">Bawang Bombay</label>
                    <input type="number" class="form-control" id="bawang_bombay" value="{{ old('bawang_bombay') }}"
                        name="bawang_bombay">


                    <button type="submit" class="btn btn-primary mt-5">Kirim</button>

                </form>
            </div>
        </div>
    @endsection

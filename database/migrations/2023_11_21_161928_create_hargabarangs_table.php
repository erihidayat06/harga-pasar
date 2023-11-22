<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hargabarangs', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi');
            $table->integer('harga_beras_premium');
            $table->integer('harga_beras_medium');
            $table->integer('gula_pasir');
            $table->integer('minyak_grg_cur');
            $table->integer('minyak_goreng_bimoli');
            $table->integer('daging_sapi_murni');
            $table->integer('daging_sapi_kw');
            $table->integer('daging_ayam_ras');
            $table->integer('daging_ayam_kampung');
            $table->integer('telur_ayam_ras');
            $table->integer('telur_ayam_kampung');
            $table->integer('susu_bubuk_indomilk');
            $table->integer('susu_bubuk_dancow');
            $table->integer('skm_bendera');
            $table->integer('skm_indomilk');
            $table->integer('jagung_pipilan');
            $table->integer('terigu_bogasari');
            $table->integer('kedelai_lokal');
            $table->integer('kedelai_impor');
            $table->integer('cabai_merah_besar');
            $table->integer('cabai_merah_keriting');
            $table->integer('cabai_rawit_merah');
            $table->integer('cabai_rawit_hijau');
            $table->integer('bawang_merah');
            $table->integer('bawang_putih');
            $table->integer('bawang_kating');
            $table->integer('ikan_kembung');
            $table->integer('ikan_teri');
            $table->integer('ikan_bandeng');
            $table->integer('garam_bata');
            $table->integer('garam_halus');
            $table->integer('kacang_tanah');
            $table->integer('kacang_hijau');
            $table->integer('minyak_kita');
            $table->integer('ikan_tongkol');
            $table->integer('tempe');
            $table->integer('tahu_mentah_putih');
            $table->integer('udang_segar');
            $table->integer('pisang');
            $table->integer('jeruk_lokal');
            $table->integer('ketela_pohon');
            $table->integer('bawang_bombay');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hargabarangs');
    }
};

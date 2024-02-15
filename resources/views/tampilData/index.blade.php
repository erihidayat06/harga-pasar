@extends('tampilData.main')

@section('container')
    <section class=" dashboard">
        <div class="col-lg-12" style="margin-top: 50px">
            <div class="card recent-sales overflow-auto">
                {{-- Filter --}}
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="/tampil-data">All</a></li>
                        <li><a class="dropdown-item" href="/tampil-data?dari={{ date('Y-m-d') }}&waktu=Hari Ini">Hari</a>
                        </li>
                        <li><a class="dropdown-item" href="/tampil-data?dari={{ date('Y-m') }}&waktu=Bulan Ini">Bulan
                                Ini</a>
                        </li>
                        <li><a class="dropdown-item" href="/tampil-data?dari={{ date('Y') }}&waktu=Tahun Ini">Tahun
                                Ini</a>
                        </li>
                    </ul>
                </div>
                {{-- End Filter --}}
                <div class="card-body">


                    {{-- Title --}}
                    <div class="card-title">
                        Data Harga {{ request('waktu') }}
                        @if (request('dari'))
                            : {{ request('dari') }}
                        @endif
                    </div>


                    <h6 class="mt-3">Filter</h6>
                    <div class="input-group mb-3">

                        {{-- Filter Menurut Tanggal Yang di Input --}}
                        <form action="">
                            <div class="input-group input-group-sm">
                                <input style="font-size: 11px" type="date" class="form-control" name="dari"
                                    value="{{ request('dari') }}" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-sm">
                                <select class="form-select form-select-sm" aria-label="Small select example" name="pasar">
                                    @if (request('pasar') != null)
                                        <option value="{{ request('pasar') }}">{{ request('pasar') }}</option>
                                    @endif
                                    <option value="">All Pasar</option>

                                    @foreach ($pasars as $pasar)
                                        @if (request('pasar') != null)
                                            @if (request('pasar') != $pasar)
                                                <option value="{{ $pasar }}">{{ $pasar }}</option>
                                            @endif
                                        @else
                                            <option value="{{ $pasar }}">{{ $pasar }}</option>
                                        @endif
                                    @endforeach

                                </select>

                                <button type="submit" class="btn btn-sm btn-main btn-cari"><i
                                        class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <a href="/admin/excel?dari={{ request('dari') }}" class="btn btn-sm btn-success"><i
                                    class="bi bi-file-earmark-spreadsheet"></i>
                                Excel</a>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal
                                </th>
                                <th scope="col">lokasi___________</th>
                                <th scope="col">harga_beras_premium</th>
                                <th scope="col">harga_beras_medium</th>
                                <th scope="col">gula_pasir_____</th>
                                <th scope="col">minyak_grg_cur</th>
                                <th scope="col">minyak_goreng_bimoli</th>
                                <th scope="col">daging_sapi_murni</th>
                                <th scope="col">daging_sapi_kw</th>
                                <th scope="col">daging_ayam_ras</th>
                                <th scope="col">daging_ayam_kampung</th>
                                <th scope="col">telur_ayam_ras</th>
                                <th scope="col">telur_ayam_kampung</th>
                                <th scope="col">susu_bubuk_indomilk</th>
                                <th scope="col">susu_bubuk_dancow</th>
                                <th scope="col">skm_bendera</th>
                                <th scope="col">skm_indomilk</th>
                                <th scope="col">jagung_pipilan</th>
                                <th scope="col">terigu_bogasari</th>
                                <th scope="col">kedelai_lokal</th>
                                <th scope="col">kedelai_impor</th>
                                <th scope="col">cabai_merah_besar</th>
                                <th scope="col">cabai_merah_keriting</th>
                                <th scope="col">cabai_rawit_merah</th>
                                <th scope="col">cabai_rawit_hijau</th>
                                <th scope="col">bawang_merah___</th>
                                <th scope="col">bawang_putih___</th>
                                <th scope="col">bawang_kating__</th>
                                <th scope="col">ikan_kembung___</th>
                                <th scope="col">ikan_teri_______</th>
                                <th scope="col">ikan_bandeng</th>
                                <th scope="col">garam_bata</th>
                                <th scope="col">garam_halus</th>
                                <th scope="col">kacang_tanah</th>
                                <th scope="col">kacang_hijau</th>
                                <th scope="col">minyak_kita</th>
                                <th scope="col">ikan_tongkol</th>
                                <th scope="col">tempe________</th>
                                <th scope="col">tahu_mentah_putih</th>
                                <th scope="col">udang_segar</th>
                                <th scope="col">pisang_________</th>
                                <th scope="col">jeruk_lokal____</th>
                                <th scope="col">ketela_pohon___</th>
                                <th scope="col">bawang_bombay__</th>
                                <th scope="col">indomie_ayam_bawang</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                use App\Models\Hargabarang;
                            @endphp

                            @foreach ($hargas as $harga)
                                @php
                                    $barang = Hargabarang::latest()
                                        ->where('lokasi', $harga->lokasi)
                                        ->where('created_at', '<', date('Y-m-d', strtotime($harga->created_at)))
                                        ->first();
                                @endphp
                                <tr>
                                    @if ($barang)
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ date('d_F_Y', strtotime($harga->created_at)) }}</td>
                                        <td>{{ $harga->lokasi }}</td>
                                        <td>
                                            <i
                                                class="{{ $harga->beras_premium == $barang->beras_premium ? 'bi bi-dash-lg' : ($harga->beras_premium > $barang->beras_premium ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->beras_premium, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->beras_medium == $barang->beras_medium ? 'bi bi-dash-lg' : ($harga->beras_medium > $barang->beras_medium ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->beras_medium, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->gula_pasir == $barang->gula_pasir ? 'bi bi-dash-lg' : ($harga->gula_pasir > $barang->gula_pasir ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp{{ number_format($harga->gula_pasir, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->minyak_grg_cur == $barang->minyak_grg_cur ? 'bi bi-dash-lg' : ($harga->minyak_grg_cur > $barang->minyak_grg_cur ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->minyak_grg_cur, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->minyak_goreng_bimoli == $barang->minyak_goreng_bimoli ? 'bi bi-dash-lg' : ($harga->minyak_goreng_bimoli > $barang->minyak_goreng_bimoli ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->minyak_goreng_bimoli, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->daging_sapi_murni == $barang->daging_sapi_murni ? 'bi bi-dash-lg' : ($harga->daging_sapi_murni > $barang->daging_sapi_murni ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->daging_sapi_murni, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->daging_sapi_kw == $barang->daging_sapi_kw ? 'bi bi-dash-lg' : ($harga->daging_sapi_kw > $barang->daging_sapi_kw ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->daging_sapi_kw, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->daging_ayam_ras == $barang->daging_ayam_ras ? 'bi bi-dash-lg' : ($harga->daging_ayam_ras > $barang->daging_ayam_ras ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->daging_ayam_ras, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->daging_ayam_kampung == $barang->daging_ayam_kampung ? 'bi bi-dash-lg' : ($harga->daging_ayam_kampung > $barang->daging_ayam_kampung ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->daging_ayam_kampung, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->telur_ayam_ras == $barang->telur_ayam_ras ? 'bi bi-dash-lg' : ($harga->telur_ayam_ras > $barang->telur_ayam_ras ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->telur_ayam_ras, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->telur_ayam_kampung == $barang->telur_ayam_kampung ? 'bi bi-dash-lg' : ($harga->telur_ayam_kampung > $barang->telur_ayam_kampung ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->telur_ayam_kampung, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->susu_bubuk_indomilk == $barang->susu_bubuk_indomilk ? 'bi bi-dash-lg' : ($harga->susu_bubuk_indomilk > $barang->susu_bubuk_indomilk ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->susu_bubuk_indomilk, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->susu_bubuk_dancow == $barang->susu_bubuk_dancow ? 'bi bi-dash-lg' : ($harga->susu_bubuk_dancow > $barang->susu_bubuk_dancow ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->susu_bubuk_dancow, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->skm_bendera == $barang->skm_bendera ? 'bi bi-dash-lg' : ($harga->skm_bendera > $barang->skm_bendera ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->skm_bendera, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->skm_indomilk == $barang->skm_indomilk ? 'bi bi-dash-lg' : ($harga->skm_indomilk > $barang->skm_indomilk ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->skm_indomilk, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->jagung_pipilan == $barang->jagung_pipilan ? 'bi bi-dash-lg' : ($harga->jagung_pipilan > $barang->jagung_pipilan ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->jagung_pipilan, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->erigu_bogasari == $barang->erigu_bogasari ? 'bi bi-dash-lg' : ($harga->erigu_bogasari > $barang->erigu_bogasari ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->terigu_bogasari, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->bedelai_loka == $barang->bedelai_loka ? 'bi bi-dash-lg' : ($harga->bedelai_loka > $barang->bedelai_loka ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->kedelai_lokal, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->kedelai_impor == $barang->kedelai_impor ? 'bi bi-dash-lg' : ($harga->kedelai_impor > $barang->kedelai_impor ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->kedelai_impor, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->cabai_merah_besar == $barang->cabai_merah_besar ? 'bi bi-dash-lg' : ($harga->cabai_merah_besar > $barang->cabai_merah_besar ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->cabai_merah_besar, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->cabai_merah_keriting == $barang->cabai_merah_keriting ? 'bi bi-dash-lg' : ($harga->cabai_merah_keriting > $barang->cabai_merah_keriting ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->cabai_merah_keriting, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->cabai_rawit_merah == $barang->cabai_rawit_merah ? 'bi bi-dash-lg' : ($harga->cabai_rawit_merah > $barang->cabai_rawit_merah ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->cabai_rawit_merah, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->cabai_rawit_hijau == $barang->cabai_rawit_hijau ? 'bi bi-dash-lg' : ($harga->cabai_rawit_hijau > $barang->cabai_rawit_hijau ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->cabai_rawit_hijau, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->bawang_merah == $barang->bawang_merah ? 'bi bi-dash-lg' : ($harga->bawang_merah > $barang->bawang_merah ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->bawang_merah, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->bawang_putih == $barang->bawang_putih ? 'bi bi-dash-lg' : ($harga->bawang_putih > $barang->bawang_putih ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->bawang_putih, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->bawang_kating == $barang->bawang_kating ? 'bi bi-dash-lg' : ($harga->bawang_kating > $barang->bawang_kating ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->bawang_kating, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->kan_kembung == $barang->kan_kembung ? 'bi bi-dash-lg' : ($harga->kan_kembung > $barang->kan_kembung ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->ikan_kembung, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->ikan_teri == $barang->ikan_teri ? 'bi bi-dash-lg' : ($harga->ikan_teri > $barang->ikan_teri ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->ikan_teri, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->ikan_bandeng == $barang->ikan_bandeng ? 'bi bi-dash-lg' : ($harga->ikan_bandeng > $barang->ikan_bandeng ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->ikan_bandeng, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->garam_bata == $barang->garam_bata ? 'bi bi-dash-lg' : ($harga->garam_bata > $barang->garam_bata ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->garam_bata, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->garam_halus == $barang->garam_halus ? 'bi bi-dash-lg' : ($harga->garam_halus > $barang->garam_halus ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->garam_halus, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->kacang_tanah == $barang->kacang_tanah ? 'bi bi-dash-lg' : ($harga->kacang_tanah > $barang->kacang_tanah ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->kacang_tanah, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->kacang_hijau == $barang->kacang_hijau ? 'bi bi-dash-lg' : ($harga->kacang_hijau > $barang->kacang_hijau ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->kacang_hijau, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->minyak_kita == $barang->minyak_kita ? 'bi bi-dash-lg' : ($harga->minyak_kita > $barang->minyak_kita ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->minyak_kita, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->ikan_tongkol == $barang->ikan_tongkol ? 'bi bi-dash-lg' : ($harga->ikan_tongkol > $barang->ikan_tongkol ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->ikan_tongkol, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->tempe == $barang->tempe ? 'bi bi-dash-lg' : ($harga->tempe > $barang->tempe ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->tempe, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->tahu_mentah_putih == $barang->tahu_mentah_putih ? 'bi bi-dash-lg' : ($harga->tahu_mentah_putih > $barang->tahu_mentah_putih ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->tahu_mentah_putih, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->udang_segar == $barang->udang_segar ? 'bi bi-dash-lg' : ($harga->udang_segar > $barang->udang_segar ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->udang_segar, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->pisang == $barang->pisang ? 'bi bi-dash-lg' : ($harga->pisang > $barang->pisang ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->pisang, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->jeruk_lokal == $barang->jeruk_lokal ? 'bi bi-dash-lg' : ($harga->jeruk_lokal > $barang->jeruk_lokal ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->jeruk_lokal, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->ketela_pohon == $barang->ketela_pohon ? 'bi bi-dash-lg' : ($harga->ketela_pohon > $barang->ketela_pohon ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->ketela_pohon, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->bawang_bombay == $barang->bawang_bombay ? 'bi bi-dash-lg' : ($harga->bawang_bombay > $barang->bawang_bombay ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->bawang_bombay, '0', '', '.') }}
                                        </td>
                                        <td>
                                            <i
                                                class="{{ $harga->indomi_ayam_bawang == $barang->indomi_ayam_bawang ? 'bi bi-dash-lg' : ($harga->indomi_ayam_bawang > $barang->indomi_ayam_bawang ? 'bi bi-caret-up-fill text-success' : 'bi bi-caret-down-fill text-danger') }} p-1"></i>
                                            Rp {{ number_format($harga->indomi_ayam_bawang, '0', '', '.') }}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </section>
@endsection

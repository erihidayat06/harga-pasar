@extends('admin.layouts.main')

@section('container')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card recent-sales overflow-auto">

                    <div class="card-body">


                        {{-- Title --}}
                        <div class="card-title">
                            Data Harga {{ request('waktu') }}
                            @if (request('dari'))
                                : {{ date('d M Y', strtotime(request('dari'))) }}
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
                                    <th scope="col">lokasi</th>
                                    <th scope="col">harga_beras_premium</th>
                                    <th scope="col">harga_beras_medium</th>
                                    <th scope="col">gula_pasir</th>
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
                                    <th scope="col">bawang_merah</th>
                                    <th scope="col">bawang_putih</th>
                                    <th scope="col">bawang_kating</th>
                                    <th scope="col">ikan_kembung</th>
                                    <th scope="col">ikan_teri</th>
                                    <th scope="col">ikan_bandeng</th>
                                    <th scope="col">garam_bata</th>
                                    <th scope="col">garam_halus</th>
                                    <th scope="col">kacang_tanah</th>
                                    <th scope="col">kacang_hijau</th>
                                    <th scope="col">minyak_kita</th>
                                    <th scope="col">ikan_tongkol</th>
                                    <th scope="col">tempe</th>
                                    <th scope="col">tahu_mentah_putih</th>
                                    <th scope="col">udang_segar</th>
                                    <th scope="col">pisang</th>
                                    <th scope="col">jeruk_lokal</th>
                                    <th scope="col">ketela_pohon</th>
                                    <th scope="col">bawang_bombay</th>


                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($hargas as $harga)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ date('d_F_Y', strtotime($harga->created_at)) }}</td>
                                        <td>{{ $harga->lokasi }}</td>
                                        <td>{{ $harga->beras_premium }}</td>
                                        <td>{{ $harga->beras_medium }}</td>
                                        <td>{{ $harga->gula_pasir }}</td>
                                        <td>{{ $harga->minyak_grg_cur }}</td>
                                        <td>{{ $harga->minyak_goreng_bimoli }}</td>
                                        <td>{{ $harga->daging_sapi_murni }}</td>
                                        <td>{{ $harga->daging_sapi_kw }}</td>
                                        <td>{{ $harga->daging_ayam_ras }}</td>
                                        <td>{{ $harga->daging_ayam_kampung }}</td>
                                        <td>{{ $harga->telur_ayam_ras }}</td>
                                        <td>{{ $harga->telur_ayam_kampung }}</td>
                                        <td>{{ $harga->susu_bubuk_indomilk }}</td>
                                        <td>{{ $harga->susu_bubuk_dancow }}</td>
                                        <td>{{ $harga->skm_bendera }}</td>
                                        <td>{{ $harga->skm_indomilk }}</td>
                                        <td>{{ $harga->jagung_pipilan }}</td>
                                        <td>{{ $harga->terigu_bogasari }}</td>
                                        <td>{{ $harga->kedelai_lokal }}</td>
                                        <td>{{ $harga->kedelai_impor }}</td>
                                        <td>{{ $harga->cabai_merah_besar }}</td>
                                        <td>{{ $harga->cabai_merah_keriting }}</td>
                                        <td>{{ $harga->cabai_rawit_merah }}</td>
                                        <td>{{ $harga->cabai_rawit_hijau }}</td>
                                        <td>{{ $harga->bawang_merah }}</td>
                                        <td>{{ $harga->bawang_putih }}</td>
                                        <td>{{ $harga->bawang_kating }}</td>
                                        <td>{{ $harga->ikan_kembung }}</td>
                                        <td>{{ $harga->ikan_teri }}</td>
                                        <td>{{ $harga->ikan_bandeng }}</td>
                                        <td>{{ $harga->garam_bata }}</td>
                                        <td>{{ $harga->garam_halus }}</td>
                                        <td>{{ $harga->kacang_tanah }}</td>
                                        <td>{{ $harga->kacang_hijau }}</td>
                                        <td>{{ $harga->minyak_kita }}</td>
                                        <td>{{ $harga->ikan_tongkol }}</td>
                                        <td>{{ $harga->tempe }}</td>
                                        <td>{{ $harga->tahu_mentah_putih }}</td>
                                        <td>{{ $harga->udang_segar }}</td>
                                        <td>{{ $harga->pisang }}</td>
                                        <td>{{ $harga->jeruk_lokal }}</td>
                                        <td>{{ $harga->ketela_pohon }}</td>
                                        <td>{{ $harga->bawang_bombay }}</td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

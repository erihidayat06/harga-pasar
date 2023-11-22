 <table>
     <thead>
         <tr>
             <th>#</th>
             <th>Tanggal
             </th>
             <th>lokasi</th>
             <th>harga beras premium</th>
             <th>harga beras medium</th>
             <th>gula pasir</th>
             <th>minyak grg cur</th>
             <th>minyak goreng bimoli</th>
             <th>daging sapi murni</th>
             <th>daging sapi kw</th>
             <th>daging ayam ras</th>
             <th>daging ayam kampung</th>
             <th>telur ayam ras</th>
             <th>telur ayam kampung</th>
             <th>susu bubuk indomilk</th>
             <th>susu bubuk dancow</th>
             <th>skm bendera</th>
             <th>skm indomilk</th>
             <th>jagung pipilan</th>
             <th>terigu bogasari</th>
             <th>kedelai lokal</th>
             <th>kedelai impor</th>
             <th>cabai merah besar</th>
             <th>cabai merah keriting</th>
             <th>cabai rawit merah</th>
             <th>cabai rawit hijau</th>
             <th>bawang merah</th>
             <th>bawang putih</th>
             <th>bawang kating</th>
             <th>ikan kembung</th>
             <th>ikan teri</th>
             <th>ikan bandeng</th>
             <th>garam bata</th>
             <th>garam halus</th>
             <th>kacang tanah</th>
             <th>kacang hijau</th>
             <th>minyak kita</th>
             <th>ikan tongkol</th>
             <th>tempe</th>
             <th>tahu mentah putih</th>
             <th>udang segar</th>
             <th>pisang</th>
             <th>jeruk lokal</th>
             <th>ketela pohon</th>
             <th>bawang bombay</th>


         </tr>
     </thead>
     <tbody>
         @php
             $i = 1;
         @endphp
         @foreach ($hargas as $harga)
             <tr>
                 <th scope="row">{{ $i++ }}</th>
                 <td>{{ date('d F Y', strtotime($harga->created_at)) }}</td>
                 <td>{{ $harga->lokasi }}</td>
                 <td>{{ $harga->harga_beras_premium }}</td>
                 <td>{{ $harga->harga_beras_medium }}</td>
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

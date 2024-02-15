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
             <th>Indomie Ayam Bawang</th>


         </tr>
     </thead>
     <tbody>
         @php
             $i = 1;
         @endphp
         @foreach ($hargas as $harga)
             <tr>
                 <th scope="row">{{ $i++ }}</th>
                 <td>{{ date('d F Y', strtotime($harga->tanggal)) }}</td>
                 <td>{{ $harga->lokasi }}</td>
                 <td>Rp {{ number_format($harga->beras_premium, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->beras_medium, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->gula_pasir, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->minyak_grg_cur, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->minyak_goreng_bimoli, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->daging_sapi_murni, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->daging_sapi_kw, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->daging_ayam_ras, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->daging_ayam_kampung, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->telur_ayam_ras, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->telur_ayam_kampung, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->susu_bubuk_indomilk, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->susu_bubuk_dancow, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->skm_bendera, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->skm_indomilk, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->jagung_pipilan, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->terigu_bogasari, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->kedelai_lokal, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->kedelai_impor, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->cabai_merah_besar, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->cabai_merah_keriting, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->cabai_rawit_merah, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->cabai_rawit_hijau, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->bawang_merah, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->bawang_putih, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->bawang_kating, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->ikan_kembung, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->ikan_teri, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->ikan_bandeng, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->garam_bata, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->garam_halus, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->kacang_tanah, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->kacang_hijau, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->minyak_kita, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->ikan_tongkol, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->tempe, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->tahu_mentah_putih, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->udang_segar, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->pisang, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->jeruk_lokal, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->ketela_pohon, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->bawang_bombay, '0', '', '.') }}</td>
                 <td>Rp {{ number_format($harga->indomi_ayam_bawang, '0', '', '.') }}</td>



             </tr>
         @endforeach
     </tbody>
 </table>

<?php

namespace App\Exports;

use App\Models\Hargabarang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;


class DataHarga implements FromView
{
    use Exportable;

    public function view(): view
    {
        return view('harga', [
            'hargas' => Hargabarang::filterTanggal(request(['dari']))->get()
        ]);
    }
}

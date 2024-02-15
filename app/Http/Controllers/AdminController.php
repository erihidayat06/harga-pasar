<?php

namespace App\Http\Controllers;

use App\Models\Hargabarang;
use Illuminate\Http\Request;
use App\Exports\DataHarga;

use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin', [
            'hargas' => Hargabarang::filterTanggal(request(['dari']))->latest()->get()
        ]);
    }

    public function laporanExcel()
    {
        if (request('dari')) {
            $tanggal = request('dari');
        } else {
            $tanggal = 'semua data';
        }
        return (new DataHarga)->download("$tanggal.xlsx");
    }
}

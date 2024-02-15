<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hargabarang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFiltertanggal($query, array $filters)
    {
        $query->when($filters['dari'] ?? false, function ($query, $dari) {
            return $query->where('created_at', 'like', '%' . $dari . '%');
        });
    }


    public function scopePasar($query, $pasar)
    {
        $query->where('lokasi', ($pasar == null ? 'Pasar winduaji' : $pasar));
    }

    public function scopeDatapasar($query, $pasar)
    {
        $query->where('lokasi', 'like', '%' . $pasar . '%');
    }


    public function scopeTanggal($query, array $filters)
    {


        if ($filters) {
            $query->where('created_at', '>=', $filters['dari']);
            $query->where('created_at', '<=', $filters['sampai']);
        } else {
            $query->where('created_at', '>=', date('Y-m-d', strtotime('-1 month')));
            $query->where('created_at', '<=', date('Y-m-d', strtotime('+8 day', strtotime(date('Y-m-d')))));
        }
    }


    public function scopeMinggu($query)
    {
        $query->where('created_at', '<=', date('Y-m-d'));
        $query->where('created_at', '>=', date('Y-m-d', strtotime('-14 day', strtotime(date('Y-m-d')))));
    }

    public function scopeBulanlalu($query)
    {
        $query->where('created_at', 'like', '%' . date('Y-m', strtotime('-1 month')) . '%');
    }

    public function scopeBulan($query)
    {
        $query->where('created_at', 'like', '%' . date('Y-m') . '%');
    }

    public function scopeTahunlalu($query)
    {
        $query->where('created_at', 'like', '%' . date('Y', strtotime('-1 year')) . '%');
    }

    public function scopeTahun($query)
    {
        $query->where('created_at', 'like', '%' . date('Y') . '%');
    }
}

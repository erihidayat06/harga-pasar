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
}

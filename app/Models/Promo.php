<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Pesanan;

class Promo extends Model
{
    use HasFactory;
    protected $table = 'promo';
    protected $fillable = [
        'nama_promo',
        'desc_promo',
        'diskon',
        'tgl_mulai',
        'tgl_akhir',
        'status',
    ];

    public function pesanan():HasMany
    {
        return $this->hasMany(Pesanan::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Pesanan;
use App\Models\Layanan;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable = [
        'nama_kategori',
        'kategori',
    ];

    public function pesanan():HasMany
    {
        return $this->hasMany(Pesanan::class);
    }

    public function layanan():HasMany
    {
        return $this->hasMany(Layanan::class);
    }
}

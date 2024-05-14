<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Pesanan;
use App\Models\Kategori;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';
    protected $fillable = [
        'nama_layanan',
        'kategori_id',
        'desc_layanan',
        'harga',
        'durasi',
    ];

    public function pesanan():HasMany
    {
        return $this->hasMany(Pesanan::class);
    }

    public function kategori():BelongsTo
    {
        return $this->BelongsTo(Kategori::class, 'kategori_id');
    }
}

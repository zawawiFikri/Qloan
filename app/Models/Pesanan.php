<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Karyawan;
use App\Models\Customer;
use App\Models\Layanan;
use App\Models\Promo;
use App\Models\Kategori;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $fillable = [
        'karyawan_id',
        'customer_id',
        'kategori_id',
        'layanan_id',
        'promo_id',
        'tgl_pesanan',
        'alamat',
        'catatan',
        'bobot',
        'total_pembayaran',
        'jenis_pembayaran',
        'status_pesanan',
        'parfum',
        'nota',
    ];

    public function karyawan():BelongsTo
    {
        return $this->BelongsTo(Karyawan::class, 'karyawan_id');
    }

    public function customer():BelongsTo
    {
        return $this->BelongsTo(Customer::class, 'customer_id');
    }
    public function layanan():BelongsTo
    {
        return $this->BelongsTo(Layanan::class, 'layanan_id');
    }
    public function promo():BelongsTo
    {
        return $this->BelongsTo(Promo::class, 'promo_id');
    }
    public function kategori():BelongsTo
    {
        return $this->BelongsTo(Kategori::class, 'kategori_id');
    }
}

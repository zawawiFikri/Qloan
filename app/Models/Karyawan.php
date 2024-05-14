<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Pesanan;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $fillable = [
        'user_id',
        'department',
        'no_tlp',
        'gaji',
        'tgl_masuk',
    ];

    public function user():BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id');
    }

    public function pesanan():HasMany
    {
        return $this->hasMany(Pesanan::class);
    }
}

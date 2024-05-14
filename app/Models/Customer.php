<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Pesanan;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = [
        'id',
        'user_id',
        'alamat',
        'no_tlp',
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

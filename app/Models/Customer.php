<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = [
        'user_id',
        'alamat',
        'NoTlp',
    ];

    public function user():BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id');
    }
}

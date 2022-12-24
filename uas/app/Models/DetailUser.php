<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'agama_id',
        'foto_ktp',
        'umur'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_id' => 'integer',
        'alamat' => 'string',
        'tempat_lahir' => 'string',
        'tanggal_lahir' => 'datetime',
        'agama_id' => 'integer',
        'foto_ktp' => 'string',
        'umur' => 'integer'
    ];
}

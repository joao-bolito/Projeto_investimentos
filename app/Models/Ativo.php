<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ativo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_de_ativo',
        'ativo',
        'data_de_compra',
        'quantidade',
        'preco',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

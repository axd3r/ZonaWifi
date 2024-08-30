<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CodigoWifi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo',
        'estado',
        'fecha_creacion',
        'valor',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha_creacion' => 'date',
        'valor' => 'float',
    ];

    public function asignamientoCodigos(): HasMany
    {
        return $this->hasMany(AsignamientoCodigos::class);
    }
}

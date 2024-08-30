<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AsignamientoCodigos extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha_asignamiento',
        'usuario_id',
        'codigo_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha_asignamiento' => 'date',
        'usuario_id' => 'integer',
        'codigo_id' => 'integer',
    ];

    public function ventas(): HasMany
    {
        return $this->hasMany(Ventas::class);
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(\App\Models\TipoUsuario::class);
    }

    public function codigo(): BelongsTo
    {
        return $this->belongsTo(\App\Models\AsignamientoCodigos::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class tbl_cuentas extends Model
{
    protected $table = 'tbl_cuentas';
    protected $primaryKey = 'cue_id';
    protected $fillable = ['cue_correo','cue_contra','cue_fecha_compra','cue_dias','cue_fecha_vence','cue_proveedor','tbl_tipo_tipo_id','users_id'];

    // Definir la relación con el usuario
    public function usuario(): BelongsTo {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function tipo(): BelongsTo {
        return $this->belongsTo(tbl_tipo::class, 'tbl_tipo_tipo_id');
    }
}


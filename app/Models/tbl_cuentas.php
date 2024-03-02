<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_cuentas extends Model
{
    use HasFactory;

    protected $table = 'tbl_cuenta';
    protected $primaryKey = 'cue_id';
    protected $fillable = ['cue_correo','cue_contra','cue_fecha_compra','cue_dias','cue_fecha_vence','cue_proveedor'];

    public function tipo() {
        return $this->hasMany(tbl_tipo::class,'tipo_id');
    }

    public function usuario() {
        return $this->hasMany(User::class,'id');
    }
}

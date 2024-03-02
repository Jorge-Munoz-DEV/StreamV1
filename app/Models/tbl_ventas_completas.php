<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_ventas_completas extends Model
{
    use HasFactory;

    protected $table = 'tbl_ventas';
    protected $primaryKey = 'idtbl_ventas';
    protected $fillable = ['ven_nombre_perfil','ven_fecha_compra','ven_dias','ven_fecha_vence','ven_precio','ven_pin','ven_notas'];

    public function perfil() {
        return $this->hasMany(tbl_perfiles::class,'per_id');
    }

    public function cliente(){
        return $this->hasMany(tbl_clientes::class,'cli_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_perfiles extends Model
{
    use HasFactory;
<<<<<<< Updated upstream
=======

    protected $table = 'tbl_perfiles';
    protected $primaryKey = 'per_id';
    protected $fillable = ['per_num','tbl_estado_perfil_est_id','tbl_cuentas_cue_id'];

    public function estado_perfil() {
        return $this->hasMany(tbl_estado_perfil::class,'est_id');
    }

    public function cuenta() {
        return $this->hasMany(tbl_cuentas::class,'cue_id');
    }
>>>>>>> Stashed changes
}

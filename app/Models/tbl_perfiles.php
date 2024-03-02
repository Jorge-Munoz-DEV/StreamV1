<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_perfiles extends Model
{
    use HasFactory;

    protected $table = 'tbl_perfiles';
    protected $primaryKey = 'per_id';
    protected $fillable = ['per_num'];

    public function estado_perfil() {
        return $this->hasMany(tbl_estado_perfil::class,'est_id');
    }
}


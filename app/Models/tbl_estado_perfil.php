<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_estado_perfil extends Model
{
    use HasFactory;

    protected $table = 'tbl_estado_perfil';
    protected $primaryKey = 'est_id';
    protected $fillable = ['est_denominacion'];
}
    


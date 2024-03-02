<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_tipo extends Model
{
    use HasFactory;
    
    protected $table = 'tbl_tipo';
    protected $primaryKey = 'tipo_id';
    protected $fillable = ['tipo_nombre','tipo_num_perfil'];
}

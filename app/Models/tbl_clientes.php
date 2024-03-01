<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tbl_clientes extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'cli_id';
    protected $fillable = ['cli_nombre','cli_apellido','cli_telefono','cli_correo','cli_notas'];

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReglaComision extends Model
{
    protected $table = 'reglas_comision';
    protected $fillable = ['monto_minimo','tasa'];
    

}

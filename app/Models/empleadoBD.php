<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleadoBD extends Model
{
    use HasFactory;
    protected $table='tbl_empleado';
    protected $primaryKey = 'idempleado';

    protected $fillable = ['idlempleado','nombre','apellido','cedula','telefono','direccion','email'];
}

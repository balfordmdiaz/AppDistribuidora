<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articuloBD extends Model
{
    use HasFactory;

    protected $table='tbl_articulo';
    protected $primaryKey = 'idarticulo';

    protected $fillable = ['idlarticulo','descripcion','medida','precio','idarticulostock'];

    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ["cod_marca", "cod_categ", "cod_prov", "cod_orig_prod", "nombre", "stock", "precio"];
}
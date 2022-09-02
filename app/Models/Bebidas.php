<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bebidas;

class Bebidas extends Model
{
    use HasFactory;

    protected $table = 'product';

    public function getCategory(){
        return $this->hasOne(Categoria::class, 'id', 'category');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productsModel extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
}

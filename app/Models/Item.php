<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_id',
        'name',
        'category_id',
        'description',
        'price',
        'owner',
        'publish'
    ];
    use HasFactory;
}

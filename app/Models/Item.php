<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'price', 'description', 'category_id', 'user_id', 'ph_no', 'publish', 'item_photo', 'owner_name', 'address'];
    use HasFactory;
}

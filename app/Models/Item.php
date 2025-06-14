<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['item_name', 'item_group', 'description', 'price', 'stock', 'photo_url'];

}

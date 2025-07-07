<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesRoute extends Model
{
    protected $table = 'sales_route';
    protected $fillable = ['user_id', 'salesman_name', 'customer', 'day', 'area'];
}

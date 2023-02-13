<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['order_for','restaurant_name','status','menu_image'];
    public function items()
    {
        return $this->hasMany(Order::class,'order_id');
    }
}
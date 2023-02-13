<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $fillable = ['item','amount','price','comment','order_id'];
    
    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
}
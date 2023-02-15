<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroubFriend extends Model
{
    use HasFactory;
    protected $fillable = ['friend_id','groub_id'];

    protected $table = 'groub_friends';

    // public function friends()
    // {
    //     return $this->belongsToMany(Friend::class);
    // }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Groub extends Model
{

    use  HasFactory, SoftDeletes;
    protected $fillable = ['name'];

    public function friend()
    {
        return $this->hasMany(Friend::class);
    }

    public function friends()
    {
        return $this->belongsToMany(Friend::class,'groub_friends','friend_id', 'groub_id');
    }
}

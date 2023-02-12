<?php

namespace App\Models;

use App\Models\Groub;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Friend extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name'];

    public function Groub()
    {
        return $this->belongsTo(Groub::class);
    }
}
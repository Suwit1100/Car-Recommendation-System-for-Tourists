<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeCar extends Model
{
    use HasFactory;
    protected $table = 'like_car';
    protected $guarded = [];
    protected $primaryKey = 'id';
}

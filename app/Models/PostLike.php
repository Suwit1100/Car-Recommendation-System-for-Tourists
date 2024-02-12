<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    use HasFactory;
    protected $table = 'post_like';
    protected $guarded = [];
    protected $primaryKey = 'id';
}

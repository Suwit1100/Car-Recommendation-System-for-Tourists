<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewRecomment extends Model
{
    use HasFactory;
    protected $table = 'review_recomment';
    protected $guarded = [];
    protected $primaryKey = 'id';
}

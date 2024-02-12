<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenLine extends Model
{
    use HasFactory;
    protected $table = 'tokenline';
    protected $guarded = [];
    protected $primaryKey = 'id';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UseModel extends Model
{
    use HasFactory;
    protected $table = 'use';
    protected $guarded = [];
    protected $primaryKey = 'id';
}

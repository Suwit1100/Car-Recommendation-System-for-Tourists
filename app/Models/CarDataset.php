<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDataset extends Model
{
    use HasFactory;
    protected $table = 'car_dataset';
    protected $guarded = [];
    protected $primaryKey = 'id_cardataset';
}

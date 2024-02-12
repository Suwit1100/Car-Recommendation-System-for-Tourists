<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqReply extends Model
{
    use HasFactory;
    protected $table = 'faq_reply';
    protected $guarded = [];
    protected $primaryKey = 'id';
}

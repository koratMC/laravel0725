<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;

    // マスアサインメントが可能な属性を指定
    protected $fillable = ['title', 'content'];
}

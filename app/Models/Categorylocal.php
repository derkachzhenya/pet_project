<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorylocal extends Model
{
    use HasFactory;

    protected $table = 'categorylocals';
    protected $fillable = ['title'];

}

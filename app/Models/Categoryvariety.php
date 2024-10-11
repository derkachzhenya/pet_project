<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoryvariety extends Model
{
    use HasFactory;

    protected $table = 'categoryvarieties';
    protected $fillable = ['title'];


}

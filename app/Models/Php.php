<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Php extends Model
{
    protected $table = 'phpes';
    protected $fillable = ['code', 'how', 'explanation', 'user_id'];
    use HasFactory;
}

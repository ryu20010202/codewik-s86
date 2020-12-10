<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laravel extends Model
{
    protected $fillable = ['code', 'how', 'explanation', 'user_id'];
    use HasFactory;
}

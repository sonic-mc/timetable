<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    // Add 'id' to the fillable property to allow mass assignment
    protected $fillable = ['id', 'name'];
}

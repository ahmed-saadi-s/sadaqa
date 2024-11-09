<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charity extends Model
{
    protected $fillable = ['name', 'description', 'image', 'type', 'location'];

    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = ['category', 'type', 'serial_number', 'user', 'department', 'info'];
}

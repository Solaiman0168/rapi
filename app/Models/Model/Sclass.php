<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sclass extends Model
{
    use HasFactory;
    protected $table = 'sclasses';
    protected $fillable = [
        'class_name',
    ];
}

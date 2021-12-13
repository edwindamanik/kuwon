<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umpan extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaPengirim',
        'name',
        'isiFeedback',
        'ratingValue'
    ];
}

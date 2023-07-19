<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paires extends Model
{
    use HasFactory;

    protected $fillable =[
        "devise_1",
        "devise_2",
        "taux"
    ];
}

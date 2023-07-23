<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conversion extends Model
{
    use HasFactory;

    protected $fillable =[
        "id",
        "paire_id",
        "conversion_number"
    ];

    public function convertions()
    {
        return $this->belongsTo(Paires::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Touchable extends Model
{
    use HasFactory;

    protected $fillable = [
        'pageID',
        'name',
        'audioID',
        'imageID',
        'height',
        'width',
        'xPosition',
        'yPosition',
        'blinkOrder'
    ];


}

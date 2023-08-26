<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Touchable extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'pageID',
        'textID',
        'audioID',
        'imageID',
        'height',
        'width',
        'xPosition',
        'yPosition',
        'blinkOrder'
    ];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty();
    }
}

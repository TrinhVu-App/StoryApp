<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Page extends Model
{
    use HasFactory, LogsActivity;
    protected $fillable = [
        'textID',
        'audioID',
        'pageNum',
        'imageID',
        'storyID'
    ];

    public function texts(): BelongsToMany {
        return $this->belongsToMany(Text::class, 'text_page', 'pageID', 'textID')->withTimestamps();
    }

    public function getTexts() {
        return $this->texts()->orderBy('id');
    }

//    protected $timestamp;


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*']);
    }
}

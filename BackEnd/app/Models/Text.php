<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Text extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable =[
        'audioID',
        'text',
        'xPosition',
        'yPosition'
        ];

    public $timestamps = false;

    public function pages(): BelongsToMany {
            return $this->belongsToMany(Page::class, 'text_page', 'textID', 'pageID')->withTimestamps();
    }

    public function getPages() {
        return $this->orderBy('id')->get();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty();
    }
}

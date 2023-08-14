<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Story extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'stories';
    protected $fillable = [
        'storyName',
        'author',
        'illustrator',
        'price',
        'like',
        'read',
        'listen',
        'practice'
    ];


    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'story_user', 'storyID', 'userID')->withTimestamps();
    }



    public function getOwners() {
        return $this->users()->orderBy('name')->get();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty();
    }
}

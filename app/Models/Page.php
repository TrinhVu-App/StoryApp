<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Page extends Model
{
    use HasFactory;
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


}

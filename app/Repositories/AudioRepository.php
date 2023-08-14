<?php

namespace App\Repositories;

use App\Interfaces\AudioRepositoryInterface;
use App\Models\Audio;
use Illuminate\Http\Request;


class AudioRepository implements AudioRepositoryInterface
{

    public function getAllAudios()
    {
        $result = Audio::all();
        if ($result->count() <= 0) {
            return ['No Audio Found! Rerun the seeder', 404];
        }
        return [$result, 200];
    }

    public function getAudioByID($id)
    {
        $audio = Audio::find($id);

        if ($audio === null) {
            return ['Audio not found!', 404];
        }
        return [$audio, 200];
    }
}

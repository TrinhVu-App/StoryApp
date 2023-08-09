<?php

namespace  App\Interfaces;

interface AudioRepositoryInterface {
    public function getAllAudios();

    public function getAudioByID($id);
}

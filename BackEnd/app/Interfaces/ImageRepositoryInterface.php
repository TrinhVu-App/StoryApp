<?php

namespace App\Interfaces;

interface ImageRepositoryInterface {
    public function getAllImages();

    public function getImageByID($id);
}

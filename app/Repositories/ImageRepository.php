<?php
namespace App\Repositories;
use App\Interfaces\ImageRepositoryInterface;
use App\Models\Image;

class ImageRepository implements ImageRepositoryInterface
{

    public function getAllImages()
    {
        $result = Image::all();

        if ($result->count() <= 0) {
            return ['No Image Found! Rerun the seeder', 404];
        }
        return [$result, 200];
    }

    public function getImageByID($id)
    {
        $image = Image::find($id);

        if ($image === null) {
            return ['Image not found!', 404];
        }
        return [$image, 200];
    }


}

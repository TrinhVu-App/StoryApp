<?php


namespace App\Http\Controllers;

use App\Interfaces\ImageRepositoryInterface;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private ImageRepositoryInterface $imageRepository;

    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function index()
    {
        $result = $this->imageRepository->getAllImages();
        return response()->json($result[0], $result[1]);
    }

    public function show($id)
    {
        $result = $this->imageRepository->getImageByID($id);
        return response()->json($result[0], $result[1]);
    }
}

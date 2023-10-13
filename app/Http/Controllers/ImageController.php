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
        $image = $result[0];
        return response()->file(public_path("/storage/images/" . $image->name));
    }

    public function uploadImage(Request $request)
    {
        if (!$request->hasFile('image')) {
            return response()->json("Select an image to upload", 400);
        }

        $image = $request->file('image');
        $storedPath = $image->move('image', $image->getClientOriginalName());

        return response()->json("image uploaded", 201);
    }
}

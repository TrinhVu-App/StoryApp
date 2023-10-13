<?php

namespace App\Http\Controllers;

use App\Interfaces\AudioRepositoryInterface;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    private AudioRepositoryInterface $audioRepository;

    public function __construct(AudioRepositoryInterface $audioRepository) {
        $this->audioRepository = $audioRepository;
    }

    public function index(){
        $result = $this->audioRepository->getAllAudios();
        return response()->json($result[0], $result[1]);
    }

    public function show($id){
        $result = $this->audioRepository->getAudioByID($id);
        $audio = $result[0];
        return response()->file(public_path("/storage/audios/" . $audio->name));
    }
}

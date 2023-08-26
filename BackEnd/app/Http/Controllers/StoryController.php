<?php

namespace App\Http\Controllers;

use App\Interfaces\StoryRepositoryInterface;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StoryController extends Controller
{
    private StoryRepositoryInterface $storyRepository;

    public function __construct(StoryRepositoryInterface $storyRepository) {
        $this->storyRepository = $storyRepository;
    }
    //get all story
    public function index() {
        $result = $this->storyRepository->getAllStories();
        return response()->json($result[0], $result[1]);
    }

    public function show($id) {
        $result = $this->storyRepository->getStoryById($id);
        return response()->json($result[0], $result[1]);

    }
    public function edit($id) {
        $result = $this->storyRepository->editStory($id);
        return response()->json($result[0], $result[1]);
    }
    public function store(Request $request) {

        //validation
        $validator = Validator::make($request->all(),[
            'storyName' => ['required', Rule::unique('stories', 'storyName')],
            'author' => 'required',
            'illustrator' => 'required',
            'price' => 'required',
            'like'=> 'required',
            'read' => 'required',
            'listen' => 'required',
            'practice' => 'required'
        ]);

        if($validator-> fails()) {
            return response()->json($validator->messages(), 422);
        }

        $result = $this->storyRepository->createStory($request);
        return response()->json($result[0], $result[1]);

    }

    public function update(int $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'storyName' => ['required', Rule::unique('stories', 'storyName')],
            'author' => 'required',
            'illustrator' => 'required',
            'price' => 'required',
            'like' => 'required',
            'read' => 'required',
            'listen' => 'required',
            'practice' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $result = $this->storyRepository->updateStory($request, $id);
        return response()->json($result[0], $result[1]);

    }

    public function destroy($id) {
        $result = $this->storyRepository->deleteStory($id);
        return response()->json($result[0], $result[1]);
    }

    public function getFull($id) {
        $result = $this->storyRepository->getFullStory($id);
      //  return response()->json($result[0], $result[1]);
        return response()->json($result);
    }
}


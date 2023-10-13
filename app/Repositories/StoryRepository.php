<?php
namespace App\Repositories;

use App\Interfaces\PageRepositoryInterface;
use App\Interfaces\StoryRepositoryInterface;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryRepository implements StoryRepositoryInterface {

    private PageRepositoryInterface $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository) {
        $this->pageRepository = $pageRepository;
    }

    public function getAllStories()
    {
        $result = Story::all();
        if($result->count() <= 0) {
           // return response()->json('No Story Found', 404);
            return ['No Story Found', 404];
        }

       // return response()->json($result, 200);
        return [$result, 200];
    }

    public function getStoryById($id)
    {
        $story = Story::find($id);
        if ($story === null) {
            return ['Story Not Found', 404];
        }
        return [$story, 200];
    }

    public function deleteStory($id)
    {
        $story = Story::find($id);
        if ($story) {
            $this->pageRepository->deletePagesByStoryID($id);
            $story->delete();
            return ["Story deleted", 200];
        } else {
            return ['Cant find that story!', 404];
        }
    }
    public function createStory(Request $request)
    {
        $read= false;
        $listen=false;
        $practice=false;
        $like = 0;
        $thumbnail = rand(1, 5);

        if($request->like) {
            $like = $request->like;
        }
        if($request->read) {
            $read = $request->read;
        }
        if($request->listen) {
            $listen = $request->listen;
        }
        if ($request->practice) {
            $practice = $request->practice;
        }
        if ($request->thumbnail) {
            $thumbnail = $request->thumbnail;
        }
        $newStory = Story::create([
            'storyName' => $request->storyName,
            'author' => $request->author,
            'illustrator' => $request->illustrator,
            'price' => $request->price,
            'like' => $like,
            'level' => $request->level,
            'read' => $read ,
            'listen' => $listen,
            'practice' => $practice,
            'thumbnail' => $thumbnail
        ]);

        if($newStory) {
            return [$newStory,  201];
        } else {
            return ['You broke it!',500];
        }
    }

    public function updateStory(Request $request, int $id)
    {
        $story = Story::find($id);
        if ($story) {
            $story->update([
                'storyName' => $request->storyName,
                'author' => $request->author,
                'illustrator' => $request->illustrator,
                'price' => $request->price,
                'like' => $request->like,
                'read' => $request->read,
                'listen' => $request->listen,
                'practice' => $request->practice
            ]);

            return [$story, 200];
        } else {
            return ['Cant find that story!', 404];
        }
    }

    public function editStory(int $id)
    {
        $story = Story::find($id);
        if ($story === null) {
            return ['Story Not Found', 404];
        }
        return [$story, 200];
    }
    public function getFullStory($id) {
        $story = Story::find($id);
        if ($story===null) {
            return ['Story not found', 404];
        }

        $pages = $this->pageRepository->getPagesByStoryID($id);

        $result = [
            'story' => $story,
            'pages' => $pages[0]
        ];
        return [$result, 200];
    }
}

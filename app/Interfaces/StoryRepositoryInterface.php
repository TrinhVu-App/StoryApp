<?php

namespace  App\Interfaces;

use Illuminate\Http\Request;

interface StoryRepositoryInterface {
    public function getAllStories();
    public function getStoryById($id);
    public function deleteStory($id);
    public function createStory(Request $request);
    public function updateStory(Request $request, int $id);
    public function editStory(int $id);


}

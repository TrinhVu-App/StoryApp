<?php

namespace  App\Interfaces;

use Illuminate\Http\Request;

interface PageRepositoryInterface {
    public function getAllPages();
    public function getPageById($id);
    public function deletePage($id);
    public function createPage(Request $request);
    public function updatePage(Request $request, int $id);
    public function editPage(int $id);
    public function deletePagesByStoryID (int $id);
    public function getPagesByStoryID (int $id);
}

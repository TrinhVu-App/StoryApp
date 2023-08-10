<?php
namespace App\Repositories;

use App\Interfaces\PageRepositoryInterface;
use App\Interfaces\TouchableRepositoryInterface;
use App\Models\Page;
use Illuminate\Http\Request;

class PageRepository implements PageRepositoryInterface {


    private TouchableRepositoryInterface $touchableRepository;

    public function __construct(TouchableRepositoryInterface $touchableRepository) {
        $this->touchableRepository = $touchableRepository;
    }
    public function getAllPages()
    {
        $result = Page::all();

        if($result->count() <= 0) {
            return ['No Page Found', 404];
        }

        return [$result, 200];
    }

    public function getPageById($id)
    {
        $page = Page::find($id);

        if($page === null) {
            return ['Page Not Found', 404];
        }
        return [$page, 200];
    }

    public function deletePage($id)
    {
        $page = Page::find($id);
        if ($page) {
            $this->touchableRepository->deleteTouchablesByPageID($id);
            $page->delete();
            return ['Page deleted', 200];
        } else {
            return ['Cant find that page!', 404];
        }
    }

    public function createPage(Request $request)
    {
        $newPage = Page::create([
            'textID' => $request->textID,
            'storyID' => $request->storyID,
            'audioID' => $request->audioID,
            'imageID' => $request->imageID,
            'pageNum' => $request->pageNum
        ]);

        if($newPage) {
            return [$newPage, 201];
        } else {
            return ['You broke it!', 500];
        }
    }

    public function updatePage(Request $request, int $id)
    {
        $page = Page::find($id);
        if ($page) {
            $page->update([
                'textID' => $request->textID,
                'storyID' => $request->storyID,
                'audioID' => $request->audioID,
                'imageID' => $request->imageID,
                'pageNum' => $request->pageNum
            ]);

            return [$page, 200];
        } else {
            return ['Cant find that page!', 404];
        }
    }

    public function editPage(int $id)
    {
        $page = Page::find($id);

        if($page === null) {
            return ['Page Not Found', 404];
        }
        return [$page, 200];
    }

    public function deletePagesByStoryID(int $id)
    {
        $pages = Page::where('storyID', '=', $id)->get();

        foreach ($pages as $page) {
            $this->touchableRepository->deleteTouchablesByPageID($page->id);
        }

        $result = Page::where('storyID','=', $id)->delete();
        return [$result, 200];
    }

    public function getPagesByStoryID(int $id)
    {
        $pages = Page::where('storyID','=', $id)->get();
        if($pages->count() <=0 ) {
            return ['Cant find any pages for that storyID!', 404];
        }
        $result = [];
        foreach($pages as $thisPage) {
            $touchables = $this->touchableRepository->getTouchablesByPageID($thisPage->id);
            $page = [
                'page' => $thisPage,
                'touchables' => $touchables[0]
            ];
          $result[] = $page;
        }

//        $result = [
//            "pages" => $pages,
//            "touchables" => $touchables
//        ];
        return [$result, 200];
    }
}

<?php

namespace App\Http\Controllers;

use App\Interfaces\PageRepositoryInterface;
use App\Models\Page;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PageController extends Controller
{

    private PageRepositoryInterface $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository) {
        $this->pageRepository = $pageRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->pageRepository->getAllPages();
        return response()->json($result[0],$result[1]);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $result = $this->pageRepository->getPageById($id);
        return response()->json($result[0],$result[1]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'textID' =>  'required',
            'audioID' => 'required',
            'pageNum' => 'required',
            'imageID' => 'required',
            'storyID' => 'required'
        ]);

        if($validator-> fails()){
            return response()->json($validator->messages(), 422);
        }

        $result = $this->pageRepository->createPage($request);
        return response()->json($result[0],$result[1]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $result = $this->pageRepository->editPage($id);
        return response()->json($result[0],$result[1]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Int $id)
    {
        $validator = Validator::make($request->all(), [
            'textID' =>  'required',
            'audioID' => 'required',
            'pageNum' => 'required',
            'imageID' => 'required',
            'storyID' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $result = $this->pageRepository->updatePage($request, $id);
        return response()->json($result[0],$result[1]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = $this->pageRepository->deletePage($id);
        return response()->json($result[0],$result[1]);
    }

    public function showByStoryID($id) {
        $result = $this->pageRepository->getPagesByStoryID($id);
        return response()->json($result[0],$result[1]);
    }

    public function destroyByStoryID($id){
        $result = $this->pageRepository->deletePagesByStoryID($id);
        return response()->json($result[0],$result[1]);
    }

}

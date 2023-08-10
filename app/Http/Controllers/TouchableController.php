<?php

nameSpace App\Http\Controllers;

use App\Interfaces\TouchableRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TouchableController extends Controller {

    private TouchableRepositoryInterface $touchableRepository;

    public function __construct(TouchableRepositoryInterface $touchableRepository) {
        $this->touchableRepository = $touchableRepository;
    }

    public function index() {
        $result = $this->touchableRepository->getAllTouchables();
        return response()->json($result[0], $result[1]);
    }

    public function show($id)
    {
        $result = $this->touchableRepository->getTouchableById($id);
        return response()->json($result[0],$result[1]);
    }
    public function edit($id)
    {
        $result = $this->touchableRepository->editTouchable($id);
        return response()->json($result[0],$result[1]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pageID' => 'required',
            'audioID' => 'required',
            'textID' => 'required',
            'imageID'=>'required',
            'height' => 'required',
            'width' => 'required',
            'xPosition' => 'required',
            'yPosition' => 'required',
            'blinkOrder'=>'required'
        ]);

        if($validator-> fails()){
            return response()->json($validator->messages(), 422);
        }

        $result = $this->touchableRepository->createTouchable($request);
        return response()->json($result[0],$result[1]);
    }

    public function update(Request $request, Int $id)
    {
        $validator = Validator::make($request->all(), [
            'pageID' => 'required',
            'audioID' => 'required',
            'textID' => 'required',
            'imageID'=>'required',
            'height' => 'required',
            'width' => 'required',
            'xPosition' => 'required',
            'yPosition' => 'required',
            'blinkOrder'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $result = $this->touchableRepository->updateTouchable($request, $id);
        return response()->json($result[0],$result[1]);
    }

    public function destroy($id)
    {
        $result = $this->touchableRepository->deleteTouchable($id);
        return response()->json($result[0],$result[1]);
    }

    public function showByPageID($id) {
        $result = $this->touchableRepository->getTouchablesByPageID($id);
        return response()->json($result);
    }

    public function destroyByPageID($id){
        $result = $this->touchableRepository->deleteTouchablesByPageID($id);
        return response()->json($result[0],$result[1]);
    }




}

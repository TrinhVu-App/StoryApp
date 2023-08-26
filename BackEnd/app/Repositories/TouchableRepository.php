<?php

namespace App\Repositories;

use App\Interfaces\TouchableRepositoryInterface;
use App\Models\Touchable;
use Illuminate\Http\Request;

class TouchableRepository implements TouchableRepositoryInterface {

    public function getAllTouchables()
    {
        $result = Touchable::all();

        if($result->count() <= 0) {
            return ['No Touchable Found', 404];
        }

        return [$result, 200];
    }

    public function getTouchableById($id)
    {
        $touchable = Touchable::find($id);

        if($touchable === null) {
            return ['Touchable Not Found', 404];
        }
        return [$touchable, 200];
    }

    public function deleteTouchable($id)
    {
        $touchable = Touchable::find($id);
        if ($touchable) {
            $touchable->delete();
            return ['Touchable deleted', 200];
        } else {
            return ['Cant find that Touchable!', 404];
        }
    }

    public function createTouchable(Request $request)
    {
        $newTouchable = Touchable::create([
            'pageID' => $request->pageID,
            'textID' => $request->textID,
            'audioID' => $request->audioID,
            'imageID' => $request->imageID,
            'height' => $request->height,
            'width' => $request->width,
            'xPosition' => $request->xPosition,
            'yPosition' => $request->yPosition,
            'blinkOrder' => $request->blinkOrder
        ]);

        if($newTouchable) {
            return [$newTouchable, 201];
        } else {
            return ['You broke it!', 500];
        }
    }

    public function updateTouchable(Request $request, int $id)
    {
        $touchable = Touchable::find($id);
        if ($touchable) {
            $touchable->update([
                'pageID' => $request->pageID,
                'name' => $request->name,
                'audioID' => $request->audioID,
                'imageID' => $request->imageID,
                'height' => $request->height,
                'width' => $request->width,
                'xPosition' => $request->xPosition,
                'yPosition' => $request->yPosition,
                'blinkOrder' => $request->blinkOrder
            ]);
            return [$touchable, 200];
        } else {
            return ['Cant find that touchable!', 404];
        }
    }

    public function editTouchable(int $id)
    {
        $touchable = Touchable::find($id);

        if($touchable === null) {
            return ['Touchable Not Found', 404];
        }
        return [$touchable, 200];
    }

    public function deleteTouchablesByPageID(int $id)
    {
        $result = Touchable::where('pageID','=',  $id)->delete();
        return [$result, 200];
    }

    public function getTouchablesByPageID($id)
    {
        $touchables = Touchable::where('pageID','=', $id)->get();

        if($touchables->count() <=0 ) {
            return ['Cant find any touchable for that pageID!', 404];
        }

        return [$touchables, 200];
    }
}

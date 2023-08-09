<?php
namespace  App\Interfaces;
use Illuminate\Http\Request;

interface TouchableRepositoryInterface
{
    public function getAllTouchables();

    public function getTouchableById($id);

    public function deleteTouchable($id);

    public function createTouchable(Request $request);

    public function updateTouchable(Request $request, int $id);

    public function editTouchable(int $id);
    public function deleteTouchablesByPageID(int $id);
    public function getTouchablesByPageID(int $id);


}

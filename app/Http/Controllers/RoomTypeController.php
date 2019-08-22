<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RoomType;
use App\Repositories\RoomType\RoomTypeRepository;

class RoomTypeController extends Controller
{
    //
    protected $roomTypeRepository;

    public function __construct(RoomTypeRepository $roomTypeRepository)
    {
        $this->roomTypeRepository = $roomTypeRepository;
    }

    public function create(Request $request){
        $this->roomTypeRepository->create($request->all());
         return redirect('/');
    }
}

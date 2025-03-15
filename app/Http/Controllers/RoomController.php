<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
class RoomController extends Controller
{
    public function index(Request $request){
        // dd($request);
        $rooms = Room::get();
        // $rooms = Room::where('id',1)->get(); //single row data with any condition
        // dd($rooms->toArray());
        return view("room",compact("rooms"));
    }

    public function store(Request $request){
        $room = Room::create($request->all());
    }
    public function show(Room $room){
        $room->load("");
    }
}

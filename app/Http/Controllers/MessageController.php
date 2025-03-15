<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index(Request $request){
        $user = Auth::id();
        $room = DB::table("rooms")
            ->select('id')
            ->where('sender',$user)
            ->where('receiver',$request->receiver)
            ->orwhere('sender',$request->receiver)
            ->where('receiver',$user)
            ->first();
        $room = $room->id;
        $messages = DB::table('messages')
            ->join('rooms', function ($join) {
                $join->on('messages.room', '=', 'rooms.sender')
                     ->orOn('messages.room', '=', 'rooms.receiver');
            })
            ->join('users', function ($join) {
                $join->on('users.id', '=', 'rooms.sender')
                     ->orOn('users.id', '=', 'rooms.receiver');
            })
            ->select(
                'messages.id as msg_id',
                'users.id as user_id',
                'users.name as name',
                'users.file as profile',
                'users.is_active as status',
                'users.last_login',
                'messages.text',
                'messages.resource as resource',
                'messages.room as room',
                'messages.sender',
                'messages.is_see as seen_status',
                'messages.created_at as msg_time'
            )
            ->where('users.id',$user)
            ->where('room',$room)
            ->distinct('msg_id')
            ->orderBy('msg_id','desc')
            ->get();
        return view("message",compact("messages"));
    }
    public function store(Request $request){
        $sender = Auth::id();
        $room = DB::table("rooms")
            ->select('id')
            ->where('sender',$sender)
            ->where('receiver',$request->receiver)
            ->orwhere('sender',$request->receiver)
            ->where('receiver',$sender)
            ->first();
        if (!$room){
            $data = Room::create([
                'sender'=> $sender,
                'receiver'=> $request->receiver,
            ]);
            $room = $data->id;
        }else{
            $room = $room->id;
        }
        $message = new Message();
        $message->text = $request->content;
        $message->resource = $request->resource;
        $message->room = $room;
        $message->sender = $sender;
        $message->save();
        return redirect('/');
    }
}

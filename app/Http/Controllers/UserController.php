<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function validate(){
        $user = User::find(Auth::id());
        $user->is_active = '1';
        $user->save();
        return view("home");
    }
    public function index(){
        $users = User::get();
        return view("users",compact("users"));



        // $user = Auth::id();
        // $room = DB::table("rooms")
        //     ->select('id')
        //     ->where('sender',$user)
        //     ->orWhere('receiver',$user)
        //     ->get();

        // $allroom = [];
        // foreach($room as $r){
        //     $allroom[] = $r->id;
        // }
        // $users = DB::table('users')
        //     ->join('rooms', function ($join) {
        //         $join->on('users.id', '=', 'rooms.sender')
        //              ->orOn('users.id', '=', 'rooms.receiver');
        //     })
        //     ->select(
        //             'users.id',
        //         'users.name',
        //         'users.file',
        //         'users.is_active',
        //         'users.last_login',
        //         'rooms.id as room'
        //     )
        //     ->whereNot('users.id',$user)
        //     ->whereIn('rooms.id', $allroom)


        //     // ->join(table: 'messages', function ($join) {
        //     //     $join->on('messages.sender', '=', 'rooms.sender')
        //     //          ->orOn('messages.sender', '=', 'rooms.receiver');
        //     // })
        //     // ->whereIn('rooms.id', $allroom)
        //     // ->distinct('users.id')

        //     // ->distinct('msg_id')
        //     // ->orderBy('messages.id','desc')
        //     ->get();
        //     dd($users);
        // return view("users",compact("users"));

    }
    public function create(){
        return redirect('');
    }
    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->pwd;
        $user->save();
        return redirect('')->with("success","Created Success");
    }
    public function show(string $id){
        $users = User::where('name','like',$id.'%')->get();
        return view("users",compact("users"));
        // dd ($search_name->toArray());
        // return response()->json(['msg' => 'Success!','test' => Input::get('test')]);
    }
    public function edit(string $id){
        return 'nothing';
    }
    public function update(Request $request, string $id){
        $user = User::find($id);
        $user->is_active = '0';
        $user->last_login = date("Y-m-d H:i:s");;
        $user->save();
        return redirect('logout')->with("status","Logout successfully");
    }
    public function destroy(string $id){
        //
    }
}

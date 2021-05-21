<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //

    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            $request->session()->flash('message', 'Image Uploaded');
            User::find(1)->update(['avatar' => $filename]);
        }



        return redirect()->back();
    }
    public function index()
    {

        DB::insert('insert into users (name,email,password)
        value (?,?,?)', ['truong', 'truong1234@vip.pro', '123456789']);


        DB::update('update users set name = ? where id = 1', ['truong nguyen']);

        DB::delete('delete from users where id=1');

        $user = DB::select('select * from users');
        return $user;

        return view('home');
    }
}

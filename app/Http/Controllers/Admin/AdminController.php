<?php

namespace App\Http\Controllers\Admin;

use App\Mail\SendEmailUser;
use App\Post;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = User::paginate(5);
        return view('admin.users', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.edit-user', compact('user'));
    }

    public function blockUser(Request $request)
    {
        $userId = $request->user_id;
        $status = $request->user_status;
        if ($status == 'active'){
            $data =  "Barev";
            Mail::to('gevor_grigoryan89@mail.ru')->send(new SendEmailUser($data));
        }
        $result = 1;
        if ($status == 'active') {
            User::where('id', $userId)->update(['status' => 'inactive']);
            $result = 0;

        } else {
            User::where('id', $userId)->update(['status' => 'active']);
            $result = 1;
        }

        return $result;

    }

    public function deleteUser(Request $request)
    {
        $userId = $request->user_id;
        Profile::where('user_id',$userId)->delete();
        Post::where('user_id',$userId)->delete();
        User::where('id', $userId)->delete();
        return response()->json();

    }


}

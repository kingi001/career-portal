<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        $roles = Role::get();
        $telephone = UserInformation::where('user_id')->first();  // Get the first associated user information
        return view('roles-permissions.users.lists.index',compact('users','roles','telephone'));
    }
}

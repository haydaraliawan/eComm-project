<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    function login(Request $req)
    {
        $userInDb = User::where(['email' => $req->email])->first();
        if (!$userInDb || !Hash::check($req->password, $userInDb->password)) {
            return "Username or Password is Incorrect";
        } else {
            $req->session()->put('user',$userInDb);
            return redirect('product');
        }
    }
}

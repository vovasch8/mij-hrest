<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    public function showProfile(){
        $link = new Link();

        return view('cabinet/profile', ['links' => $link->all()]);
    }
    public function showUser($id){
        $link = new Link();
        $user = User::find($id);

        return view('cabinet/user', ['links' => $link->all(), 'user' => $user]);
    }
}

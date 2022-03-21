<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    public function showProfile(){
        $link = new Link();

        return view('cabinet/profile', ['links' => $link->all()]);
    }
}

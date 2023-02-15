<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function editRole(Request $req) {
        $user = User::find($req->input('id'));
        $user->role = $req->input('role');

        $user->save();

        return redirect()->route('admin-users')->with('success', 'Роль змінено!');
    }

    public function deleteUser(Request $req) {
        User::find($req->input('id'))->delete();

        return redirect()->route('admin-users')->with('success', 'Користувача видалено!');
    }

    public function editProfile($id, Request $req) {
        $user = User::find($id);
        $user->avatar = $req->input('avatar');
        $user->name = $req->input('name');
        $user->phone = $req->input('phone');
        $user->location = $req->input('location');

        $user->save();

        return redirect()->route('profile')->with('success', 'Дані оновлено!');
    }
}

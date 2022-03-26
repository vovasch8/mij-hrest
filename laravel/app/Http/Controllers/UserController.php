<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function editRole(Request $rec){
        $user = User::find($rec->input('id'));
        $user->role = $rec->input('role');

        $user->save();

        return redirect()->route('admin-users')->with('success', 'Роль змінено!');
    }
    public function deleteUser(Request $rec){
        User::find($rec->input('id'))->delete();

        return redirect()->route('admin-users')->with('success', 'Користувача видалено!');
    }
    public function editProfile($id, Request $rec){
        $user = User::find($id);
        $user->avatar = $rec->input('avatar');
        $user->name = $rec->input('name');
        $user->phone = $rec->input('phone');
        $user->location = $rec->input('location');

        $user->save();
        return redirect()->route('profile')->with('success', 'Дані оновлено!');
    }

}

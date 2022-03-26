<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Block;
use App\Models\Category;
use App\Models\ForumCategory;
use App\Models\Link;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAdminPanel(){
        $block = new Block();
        $link = new Link();

        return view("admin/admin-home", ['blocks' => $block->all(), 'links' => $link->all()]);
    }
    public function showArticlesPanel(){
        $article = new Article();
        $category = new Category();
        $link = new Link();

        return view("admin/admin-articles", ['articles' => $article->all(), 'categories' => $category->all(), 'links' => $link->all()]);
    }
    public function showUsersPanel(){
        $link = new Link();
        $user = new User();

        return view("admin/admin-users", [ 'links' => $link->all(), 'users' => $user->all()]);
    }
    public function showForumPanel(){
        $link = new Link();
        $category = new ForumCategory();
        $topic = new Topic();

        return view("admin/admin-forum", [ 'links' => $link->all(), 'categories' => $category->all(), 'topics' => $topic]);
    }
    public function addBlock(Request $rec){
        $block = new Block();
        $block->name = $rec->input('name');

        $block->save();

        return redirect()->route('admin-home')->with('success', 'Новий блок додано!');
    }
    public function addLink(Request $rec){
        $link = new Link();
        $link->name = $rec->input('name');
        $link->link = $rec->input('link');
        $link->sort = $rec->input('sort');
        $link->id_block = $rec->input('id_block');

        $link->save();

        return redirect()->route('admin-home')->with('success', 'Нове посилання додано!');
    }
    public function editLink(Request $rec){
        $link = Link::find($rec->input('id'));
        $link->name = $rec->input('name');
        $link->link = $rec->input('link');
        $link->sort = $rec->input('sort');
        $link->id_block = $rec->input('id_block');

        $link->save();

        return redirect()->route('admin-home')->with('success', 'Посилання оновлено!');
    }
    public function deleteLink(Request $rec){
        Link::find($rec->input('id'))->delete();

        return redirect()->route('admin-home')->with('success', 'Посилання видалено!');
    }
}

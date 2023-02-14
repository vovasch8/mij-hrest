<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Block;
use App\Models\Category;
use App\Models\ForumCategory;
use App\Models\Link;
use App\Models\Topic;
use App\Models\User;
use App\Models\Album;
use App\Models\AlbumImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $articles = Article::where('id_category', 1)->orderBy('id', 'DESC')->paginate(10);

        return view("admin/admin-articles", ['articles' => $articles, 'categories' => $category->all(), 'links' => $link->all(), 'active' => Category::find(1)]);
    }
    public function filterArticles($id){
        $article = new Article();
        $category = new Category();
        $link = new Link();
        $articles = Article::where('id_category', $id)->orderBy('id', 'DESC')->paginate(10);

        return view("admin/admin-articles", ['articles' => $articles, 'categories' => $category->all(), 'links' => $link->all(), 'active' => Category::find($id)]);
    }
    public function showUsersPanel(){
        $link = new Link();
        $user = User::orderBy('id', 'DESC')->paginate(10);

        return view("admin/admin-users", [ 'links' => $link->all(), 'users' => $user]);
    }
    public function showForumPanel(){
        $link = new Link();
        $category = new ForumCategory();
        $topic = new Topic();

        return view("admin/admin-forum", [ 'links' => $link->all(), 'categories' => $category->all(), 'topics' => $topic]);
    }
    public function showAlbumsPanel(){
        $link = new Link();
        return view("admin/admin-albums", ['links' => $link->all()]);
    }
    public function addAlbum(Request $rec){
        $album = new Album();
        $album->name = $rec->title;
        $album->save();

        foreach ($rec->images as $key => $image) {
            $imageAlbum = new AlbumImage();
            $imageName = time() . $key . '.' . $image->extension();
            Storage::disk('public')->putFileAs('/albums', $image, $imageName);
            $imageAlbum->id_album = $album->id;
            $imageAlbum->name = $imageName;
            $imageAlbum->save();
        }
        return true;
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
    public function loadAdminArticles(Request $rec){
        $article = new Article();

        $articles = $article->all()->where('id_category', $rec->id_category)->sortByDesc('id')->skip(10 * $rec->counter)->take(10);

        return view('ajax/article/admin-articles', ['articles' => $articles]);
    }
}

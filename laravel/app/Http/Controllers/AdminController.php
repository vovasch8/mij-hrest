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
use App\Models\AlbumVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function showAdminPanel() {
        $block = new Block();
        $link = new Link();

        return view("admin/admin-home", ['blocks' => $block->all(), 'links' => $link->all()]);
    }

    public function showArticlesPanel() {
        $category = new Category();
        $link = new Link();
        $articles = Article::where('id_category', 1)->orderBy('id', 'DESC')->paginate(10);

        return view("admin/admin-articles", ['articles' => $articles, 'categories' => $category->all(), 'links' => $link->all(), 'active' => Category::find(1)]);
    }

    public function filterArticles($id) {
        $category = new Category();
        $link = new Link();
        $articles = Article::where('id_category', $id)->orderBy('id', 'DESC')->paginate(10);

        return view("admin/admin-articles", ['articles' => $articles, 'categories' => $category->all(), 'links' => $link->all(), 'active' => Category::find($id)]);
    }

    public function showUsersPanel() {
        $link = new Link();
        $user = User::orderBy('id', 'DESC')->paginate(10);

        return view("admin/admin-users", [ 'links' => $link->all(), 'users' => $user]);
    }

    public function showForumPanel() {
        $link = new Link();
        $category = new ForumCategory();
        $topic = new Topic();

        return view("admin/admin-forum", [ 'links' => $link->all(), 'categories' => $category->all(), 'topics' => $topic]);
    }

    public function showAlbumsPanel() {
        $link = new Link();

        return view("admin/admin-albums", ['links' => $link->all()]);
    }

    public function addAlbum(Request $req) {
        $album = new Album();
        $album->name = $req->title;
        $album->save();

        foreach ($req->entities as $key => $entity) {
            if ($entity->extension() == 'mp4'){
                $videoAlbum = new AlbumVideo();
                $videoName = time() . $key . '.' . $entity->extension();
                Storage::disk('public')->putFileAs('/albums', $entity, $videoName);
                $videoAlbum->id_album = $album->id;
                $videoAlbum->name = $videoName;

                $videoAlbum->save();
            } else {
                $imageAlbum = new AlbumImage();
                $imageName = time() . $key . '.' . $entity->extension();
                Storage::disk('public')->putFileAs('/albums', $entity, $imageName);
                $imageAlbum->id_album = $album->id;
                $imageAlbum->name = $imageName;

                $imageAlbum->save();
            }
        }

        return true;
    }

    public function addBlock(Request $req) {
        $block = new Block();
        $block->name = $req->input('name');

        $block->save();

        return redirect()->route('admin-home')->with('success', 'Новий блок додано!');
    }

    public function addLink(Request $req) {
        $link = new Link();
        $link->name = $req->input('name');
        $link->link = $req->input('link');
        $link->sort = $req->input('sort');
        $link->id_block = $req->input('id_block');

        $link->save();

        return redirect()->route('admin-home')->with('success', 'Нове посилання додано!');
    }

    public function editLink(Request $req) {
        $link = Link::find($req->input('id'));
        $link->name = $req->input('name');
        $link->link = $req->input('link');
        $link->sort = $req->input('sort');
        $link->id_block = $req->input('id_block');

        $link->save();

        return redirect()->route('admin-home')->with('success', 'Посилання оновлено!');
    }

    public function deleteLink(Request $req) {
        Link::find($req->input('id'))->delete();

        return redirect()->route('admin-home')->with('success', 'Посилання видалено!');
    }

    public function loadAdminArticles(Request $req) {
        $article = new Article();

        $articles = $article->all()->where('id_category', $req->id_category)->sortByDesc('id')->skip(10 * $req->counter)->take(10);

        return view('ajax/article/admin-articles', ['articles' => $articles]);
    }
}

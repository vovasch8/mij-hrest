<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\ForumCategory;
use App\Models\Link;
use App\Models\Topic;
use App\Models\Album;
use App\Models\AlbumImage;
use App\Models\AlbumVideo;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function showSviataGoraPage() {

        return view('sviata-gora');
    }

    public function showArticles() {
        $article = new Article();
        $link = new Link();
        $category = new Category();

        return view('articles', ['articles' => $article->all()->sortByDesc('id')->take(10), 'links' => $link->all(), 'category' => $category]);
    }

    public function showArticle($id) {
        $article = Article::find($id);
        $link = new Link();
        $category = new Category();

        $article->views++;
        $article->save();

        return view('article', ['article' => $article, 'links' => $link->all(), 'category' => $category]);
    }

    public function filterArticles($id) {
        $article = new Article();
        $link = new Link();
        $category = new Category();

        return view('articles', ['articles' => $article->all()->where('id_category', $id)->sortByDesc('id')->take(10), 'links' => $link->all(), 'category' => $category, 'active' => $id]);
    }

    public function loadArticles(Request $req) {
        $article = new Article();
        $category = new Category();

        $articles = [];

        if ($req->id_category == 0) {
            if (Article::all()->count() > (10 * $req->counter )) {
                $articles = $article->all()->sortByDesc('id')->skip(10 * $req->counter)->take(10);
            }

            return view('ajax/article/articles', ['articles' => $articles, 'category' => $category]);
        } else {
            if (Article::all()->count() > (10*$req->counter)) {
                $articles = $article->all()->where('id_category', $req->id_category)->sortByDesc('id')->skip(10 * $req->counter)->take(10);
            }

            return view('ajax/article/articles', ['articles' => $articles, 'category' => $category]);
        }
    }

    public function showCalendar() {
        $link = new Link();

        return view('calendar', ['links' => $link->all()]);
    }

    public function showForum() {
        $category = new ForumCategory();
        $topic = new Topic();

        return view('forum', ['categories' => $category->all(), 'topics' => $topic->all()->sortByDesc('id'), 'active' => 0]);
    }

    public function showDictionary() {
        $link = new Link();
        return view('dictionary', ['links' => $link->all()]);
    }

    public function showAlbums() {
        $link = new Link();
        $albumModel = new Album();
        $albumsEntities = $albumModel->all()->sortByDesc('id');
        $albums = [];
        foreach ($albumsEntities as $albumEntity) {
            $images = AlbumImage::where('id_album', $albumEntity->id)->get()->toArray();
            $videos = AlbumVideo::where('id_album', $albumEntity->id)->get()->toArray();
            $albums[] = [
                'name' => $albumEntity->name,
                'images' => array_column($images, 'name'),
                'videos' => array_column($videos, 'name')
            ];
        }

        return view('albums', ['links' => $link->all(), 'albums' => $albums]);
    }

    public function showMain() {
        $link = new Link();

        return view('main', ['links' => $link->all()]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\ForumCategory;
use App\Models\Link;
use App\Models\Topic;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function showSite(){
        $article = new Article();
        $link = new Link();
        $category = new Category();

        return view('home', ['articles' => $article->all()->take(10), 'links' => $link->all(), 'category' => $category]);
    }
    public function showArticle($id){
        $article = new Article();
        $link = new Link();
        $category = new Category();

        return view('article', ['article' => $article->find($id), 'links' => $link->all(), 'category' => $category]);
    }
    public function filterArticles($id){
        $article = new Article();
        $link = new Link();
        $category = new Category();

        return view('home', ['articles' => $article->all()->where('id_category', $id), 'links' => $link->all(), 'category' => $category]);
    }
    public function showCalendar(){
        $link = new Link();
        return view('calendar', ['links' => $link->all()]);
    }
    public function showForum(){
        $link = new Link();
        $category = new ForumCategory();
        $topic = new Topic();
        return view('forum', ['categories' => $category->all(), 'topics' => $topic->all()->sortByDesc('id'), 'active' => 0]);
    }

    public function showDictionary(){
        $link = new Link();
        return view('dictionary', ['links' => $link->all()]);
    }
}

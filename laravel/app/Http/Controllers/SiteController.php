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

        return view('home', ['articles' => $article->all()->sortByDesc('id')->take(10), 'links' => $link->all(), 'category' => $category]);
    }
    public function showArticle($id){
        $article = Article::find($id);
        $link = new Link();
        $category = new Category();

        $article->views++;
        $article->save();

        return view('article', ['article' => $article, 'links' => $link->all(), 'category' => $category]);
    }
    public function filterArticles($id){
        $article = new Article();
        $link = new Link();
        $category = new Category();

        return view('home', ['articles' => $article->all()->where('id_category', $id)->sortByDesc('id')->take(10), 'links' => $link->all(), 'category' => $category, 'active' => $id]);
    }

    public function loadArticles(Request $rec){
        $article = new Article();
        $link = new Link();
        $category = new Category();

        $articles = [];

        if($rec->id_category == 0){
            if(Article::all()->count() > (10 * $rec->counter )){
                $articles = $article->all()->sortByDesc('id')->skip(10 * $rec->counter)->take(10);
            }
            return view('ajax/article/articles', ['articles' => $articles, 'category' => $category]);
        }else {
            if(Article::all()->count() > (10*$rec->counter)){
                $articles = $article->all()->where('id_category', $rec->id_category)->sortByDesc('id')->skip(10 * $rec->counter)->take(10);
            }
            return view('ajax/article/articles', ['articles' => $articles, 'category' => $category]);
        }
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

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function addCategory(Request $rec){
        $category = new Category();
        $category->name = $rec->input('name');

        $category->save();

        return redirect()->route('admin-articles')->with('success', 'Нову категорію додано!');
    }
    public function addArticle(Request $rec){
        $article = new Article();
        $article->subject = $rec->input('subject');
        $article->content = $rec->input('add-content');
        $article->image = $rec->input('image');
        $article->video = $rec->input('video');
        $article->id_category = $rec->input('id_category');

        $article->save();

        return redirect()->route('admin-articles')->with('success', 'Нову статтю додано!');
    }
    public function editArticle(Request $rec){
        $article = Article::find($rec->input('id'));
        $article->subject = $rec->input('subject');
        $article->content = $rec->input('content');
        $article->image = $rec->input('image');
        $article->video = $rec->input('video');
        $article->id_category = $rec->input('id_category');

        $article->save();

        return redirect()->route('admin-articles')->with('success', 'Статтю оновлено!');
    }
    public function deleteArticle(Request $rec){
        Article::find($rec->input('id'))->delete();

        return redirect()->route('admin-articles')->with('success', 'Статтю видалено!');
    }
}

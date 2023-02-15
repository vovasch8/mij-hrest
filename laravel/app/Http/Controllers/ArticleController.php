<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function addCategory(Request $req) {
        $category = new Category();
        $category->name = $req->input('name');

        $category->save();

        return redirect()->route('admin-articles')->with('success', 'Нову категорію додано!');
    }

    public function addArticle(Request $req) {
        $article = new Article();
        $article->subject = $req->input('subject');
        $article->content = $req->input('add-content');
        $image = $req->file('image');
        $imageName = time() . '.' . $image->extension();
        Storage::disk('public')->putFileAs('/articles', $image, $imageName);
        $article->image = $imageName;
        $article->source = $req->input('source');
        $article->id_category = $req->input('id_category');

        $article->save();

        return redirect()->route('admin-articles')->with('success', 'Нову статтю додано!');
    }

    public function editArticle(Request $req) {
        $article = Article::find($req->input('id'));
        $article->subject = $req->input('subject');
        if ($req->input('content')) {
            $article->content = $req->input('content');
        }
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '.' . $image->extension();
            Storage::disk('public')->putFileAs('/articles', $image, $imageName);
            $article->image = $imageName;
        }
        $article->source = $req->input('source');
        $article->id_category = $req->input('id_category');

        $article->save();

        return redirect()->route('admin-articles')->with('success', 'Статтю оновлено!');
    }

    public function deleteArticle(Request $req) {
        Article::find($req->input('id'))->delete();

        return redirect()->route('admin-articles')->with('success', 'Статтю видалено!');
    }
}

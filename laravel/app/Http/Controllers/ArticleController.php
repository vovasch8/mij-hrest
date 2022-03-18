<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function createArticle(Request $rec){
        $contact = new Article();
        $contact->name = $rec->input('name');
        $contact->email = $rec->input('email');
        $contact->subject = $rec->input('subject');
        $contact->message = $rec->input('message');

        $contact->save();

        return redirect()->route('admin-article')->with('success', 'Статтю додано!');
    }
    public function updateArticle($id, Request $rec){
        $contact = Article::find($id);
        $contact->name = $rec->input('name');
        $contact->email = $rec->input('email');
        $contact->subject = $rec->input('subject');
        $contact->message = $rec->input('message');

        $contact->save();

        return redirect()->route('admin-article')->with('success', 'Статтю відредаговано!');
    }
    public function deleteArticle($id){
        Article::find($id)->delete();
        return redirect()->route('admin-article')->with('success', 'Статтю видалено!');
    }
}

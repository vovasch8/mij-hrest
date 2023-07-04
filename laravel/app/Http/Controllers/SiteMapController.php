<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Topic;

class SiteMapController extends Controller
{
    public function index() {

        return response()->view("sitemap", [
            'articles' => Article::pluck("updated_at", "id"),
            'topics' => Topic::pluck("updated_at", "id")
        ])->header("Content-Type", "text/xml");
    }
}

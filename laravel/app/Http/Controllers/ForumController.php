<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ForumCategory;
use App\Models\Reply;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller
{
    public function showForumCategory($id) {
        $topic = new Topic();
        $category = new ForumCategory();

        return view('forum', ['topics' => $topic->all()->where('id_category', $id)->sortByDesc('id'), 'categories' => $category->all(), 'active' => $id]);

    }

    public function showTopic($id) {
        $topic = Topic::find($id);
        $reply = new Reply();
        $category = new ForumCategory();
        $topic->views++;
        $topic->save();

        return view('topic', ["topic" => $topic, "replies" => $reply->all()->where("id_topic", $id), 'categories' => $category->all()]);
    }

    public function createTopic(Request $req) {
        $topic = new Topic();
        $topic->topic = $req->input('topic');
        $topic->message = $req->input('message');
        $topic->id_author = $req->input('id_user');
        $topic->id_category = $req->input('id_category');

        $topic->save();
        return redirect()->route('forum')->with('success', 'Нову дискусію додано!');
    }

    public function createReply(Request $req) {
        $reply = new Reply();
        $reply->message = $req->input('message');
        $reply->id_topic = $req->input('id_topic');
        $reply->id_user = $req->input('id_user');

        $reply->save();
    }

    public function sendMessage(Request $req) {
        date_default_timezone_set('Europe/Kiev');
        $reply = new Reply();
        $reply->message = $req->message;
        $reply->id_user = $req->id_user;
        $reply->id_topic = $req->id_topic;

        $topic = Topic::find($reply->id_topic);
        $topic->comments++;

        $topic->save();
        $reply->save();

        echo view('ajax/forum/reply')->with(['reply' => $reply]);
    }

    public function sortTopics(Request $req) {
        $topic = new Topic();

        if ($req->id_category == 0) {
            if ($req->sort == 1) {
                $topics = $topic->all()->sortByDesc('id');
            } elseif ($req->sort == 2) {
                $topics = $topic->all()->sortByDesc('views');
            } else {
                $topics = $topic->all()->sortByDesc('comments');
            }
        } else {
            if ($req->sort == 1) {
                $topics = $topic->all()->where('id_category', $req->id_category)->sortByDesc('id');
            } elseif ($req->sort == 2) {
                $topics = $topic->all()->where('id_category', $req->id_category)->sortByDesc('views');
            } else {
                $topics = $topic->all()->where('id_category', $req->id_category)->sortByDesc('comments');
            }
        }

        echo view('ajax/forum/topics')->with(['topics' => $topics]);
    }

    public function searchTopics(Request $req) {
        if ($req->id_category == 0) {
            if ($req->sort == 1) {
                $topics = DB::table('topics')
                    ->where('topic', 'LIKE', "%$req->search%")
                    ->orWhere('message', 'LIKE',"%$req->search%")->get()->sortByDesc('id');
            } elseif($req->sort == 2) {
                $topics = DB::table('topics')
                    ->where('topic', 'LIKE', "%$req->search%")
                    ->orWhere('message', 'LIKE',"%$req->search%")->get()->sortByDesc('views');
            } else {
                $topics = DB::table('topics')
                    ->where('topic', 'LIKE', "%$req->search%")
                    ->orWhere('message', 'LIKE',"%$req->search%")->get()->sortByDesc('comments');
            }
        } else {
            if ($req->sort == 1) {
                $topics = (DB::table('topics')
                    ->where('topic', 'LIKE', "%$req->search%")
                    ->orWhere('message', 'LIKE',"%$req->search%")
                    ->get())->where('id_category', $req->id_category)->sortByDesc('id');
            } elseif ($req->sort == 2) {
                $topics = (DB::table('topics')
                    ->where('topic', 'LIKE', "%$req->search%")
                    ->orWhere('message', 'LIKE',"%$req->search%")
                    ->get())->where('id_category', $req->id_category)->sortByDesc('views');
            } else {
                $topics = (DB::table('topics')
                    ->where('topic', 'LIKE', "%$req->search%")
                    ->orWhere('message', 'LIKE',"%$req->search%")
                    ->get())->where('id_category', $req->id_category)->sortByDesc('comments');
            }
        }

        echo view('ajax/forum/topics')->with(['topics' => $topics]);
    }

    public function searchReply(Request $req) {
        echo view('ajax/forum/replies')->with(['replies' => (DB::table('replies')
            ->where('message', 'LIKE',"%$req->search%")->get())
            ->where('id_topic', $req->id_topic)]);
    }

    public function addCategory(Request $req) {
        $category = new ForumCategory();
        $category->name = $req->input('name');

        $category->save();

        return redirect()->route('admin-forum')->with('success', 'Нову категорію додано!');
    }

    public function editCategory(Request $req) {
        $category = ForumCategory::find($req->input('id'));
        $category->name = $req->input('name');

        $category->save();

        return redirect()->route('admin-forum')->with('success', 'Категорію відредаговано!');
    }

    public function deleteCategory(Request $req) {
        ForumCategory::find($req->input('id'))->delete();

        return redirect()->route('admin-forum')->with('success', 'Категорію видалено!');
    }

    public function editTopic(Request $req) {
        $topic = Topic::find($req->input('id'));
        $topic->id_category = $req->input('id_category');
        $topic->topic = $req->input('topic');
        $topic->message = $req->input('message');

        $topic->save();

        return redirect()->route('admin-forum')->with('success', 'Тему відредаговано!');
    }

    public function deleteTopic(Request $req) {
        Topic::find($req->input('id'))->delete();

        return redirect()->route('admin-forum')->with('success', 'Тему видалено!');
    }
}

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
    public function showForumCategory($id){
        $topic = new Topic();
        $category = new ForumCategory();

        return view('forum', ['topics' => $topic->all()->where('id_category', $id)->sortByDesc('id'), 'categories' => $category->all(), 'active' => $id]);

    }
    public function showTopic($id){
        $topic = Topic::find($id);
        $reply = new Reply();
        $category = new ForumCategory();
        $topic->views++;
        $topic->save();

        return view('topic', ["topic" => $topic, "replies" => $reply->all()->where("id_topic", $id), 'categories' => $category->all()]);
    }
    public function createTopic(Request $rec){
        $topic = new Topic();
        $topic->topic = $rec->input('topic');
        $topic->message = $rec->input('message');
        $topic->id_author = $rec->input('id_user');
        $topic->id_category = $rec->input('id_category');

        $topic->save();
        return redirect()->route('forum')->with('success', 'Нову дискусію додано!');
    }

    public function createReply(Request $rec){
        $reply = new Reply();
        $reply->message = $rec->input('message');
        $reply->id_topic = $rec->input('id_topic');
        $reply->id_user = $rec->input('id_user');

        $reply->save();
    }

    public function sendMessage(Request $rec){
        date_default_timezone_set('Europe/Kiev');
        $reply = new Reply();
        $reply->message = $rec->message;
        $reply->id_user = $rec->id_user;
        $reply->id_topic = $rec->id_topic;

        $topic = Topic::find($reply->id_topic);
        $topic->comments++;

        $topic->save();
        $reply->save();

        echo view('ajax/forum/reply')->with(['reply' => $reply]);
    }

    public function sortTopics(Request $rec){
        $topic = new Topic();

        if($rec->id_category == 0){
            if($rec->sort == 1){
                $topics = $topic->all()->sortByDesc('id');
            }elseif($rec->sort == 2){
                $topics = $topic->all()->sortByDesc('views');
            }else{
                $topics = $topic->all()->sortByDesc('comments');
            }
        }else {
            if ($rec->sort == 1) {
                $topics = $topic->all()->where('id_category', $rec->id_category)->sortByDesc('id');
            } elseif ($rec->sort == 2) {
                $topics = $topic->all()->where('id_category', $rec->id_category)->sortByDesc('views');
            } else {
                $topics = $topic->all()->where('id_category', $rec->id_category)->sortByDesc('comments');
            }
        }

        echo view('ajax/forum/topics')->with(['topics' => $topics]);
    }

    public function searchTopics(Request $rec){
        $topic = new Topic();

        if($rec->id_category == 0){
            if($rec->sort == 1){
                $topics = DB::table('topics')
                    ->where('topic', 'LIKE', "%$rec->search%")
                    ->orWhere('message', 'LIKE',"%$rec->search%")->get()->sortByDesc('id');
            }elseif($rec->sort == 2){
                $topics = DB::table('topics')
                    ->where('topic', 'LIKE', "%$rec->search%")
                    ->orWhere('message', 'LIKE',"%$rec->search%")->get()->sortByDesc('views');
            }else{
                $topics = DB::table('topics')
                    ->where('topic', 'LIKE', "%$rec->search%")
                    ->orWhere('message', 'LIKE',"%$rec->search%")->get()->sortByDesc('comments');
            }
        }else {
            if ($rec->sort == 1) {
                $topics = $topics = (DB::table('topics')
                    ->where('topic', 'LIKE', "%$rec->search%")
                    ->orWhere('message', 'LIKE',"%$rec->search%")
                    ->get())->where('id_category', $rec->id_category)->sortByDesc('id');
            } elseif ($rec->sort == 2) {
                $topics = $topics = (DB::table('topics')
                    ->where('topic', 'LIKE', "%$rec->search%")
                    ->orWhere('message', 'LIKE',"%$rec->search%")
                    ->get())->where('id_category', $rec->id_category)->sortByDesc('views');
            } else {
                $topics = $topics = (DB::table('topics')
                    ->where('topic', 'LIKE', "%$rec->search%")
                    ->orWhere('message', 'LIKE',"%$rec->search%")
                    ->get())->where('id_category', $rec->id_category)->sortByDesc('comments');
            }
        }

        echo view('ajax/forum/topics')->with(['topics' => $topics]);
    }

    public function searchReply(Request $rec){

        echo view('ajax/forum/replies')->with(['replies' => (DB::table('replies')
            ->where('message', 'LIKE',"%$rec->search%")->get())
            ->where('id_topic', $rec->id_topic)]);
    }

    public function addCategory(Request $rec){
        $category = new ForumCategory();
        $category->name = $rec->input('name');

        $category->save();

        return redirect()->route('admin-forum')->with('success', 'Нову категорію додано!');
    }

    public function editCategory(Request $rec){
        $category = ForumCategory::find($rec->input('id'));
        $category->name = $rec->input('name');

        $category->save();

        return redirect()->route('admin-forum')->with('success', 'Категорію відредаговано!');
    }

    public function deleteCategory(Request $rec){
        ForumCategory::find($rec->input('id'))->delete();

        return redirect()->route('admin-forum')->with('success', 'Категорію видалено!');
    }

    public function editTopic(Request $rec){
        $topic = Topic::find($rec->input('id'));
        $topic->id_category = $rec->input('id_category');
        $topic->topic = $rec->input('topic');
        $topic->message = $rec->input('message');

        $topic->save();

        return redirect()->route('admin-forum')->with('success', 'Тему відредаговано!');
    }

    public function deleteTopic(Request $rec){
        Topic::find($rec->input('id'))->delete();

        return redirect()->route('admin-forum')->with('success', 'Тему видалено!');
    }
}

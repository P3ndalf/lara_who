<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use App\Models\User;
use Illuminate\Http\Request;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class CommentController extends Controller
{
    public $model;

    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        $this->model = new CommentModel();
    }

    public function sendComment(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $this->model->authorId = $_SESSION['user']['id'];
        $this->model->authorLogin = User::where('id', $_SESSION['user']['id'])->first()->login;
        $this->model->postId = $request['postId'];
        $this->model->content = $request['content'];

        $isSaved = $this->model->save();
        return redirect('/Blog/detailedBlog/' . $this->model->postId);
    }
}

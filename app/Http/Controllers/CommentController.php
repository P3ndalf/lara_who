<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use Illuminate\Http\Request;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class CommentController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new CommentModel();
    }

    public function addComment($request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $this->model->authorId = $_SESSION['user']['id'];
        $this->model->blogId = $request['blogId'];
        $this->model->content = $request['content'];

        $isSaved = $this->model->save();

        return redirect('/Blog/detailed/' . $this->model->blogId);
    }

    public function getComments($blogId)
    {
        $comments = $this->model->all()->where('blogId', '=', $blogId)->orderBy('date', 'desc');
    }
}

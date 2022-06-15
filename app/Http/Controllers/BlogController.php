<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use App\Models\CommentModel;
use App\Models\User;
use Illuminate\Pagination\Paginator;

class BlogController extends Controller
{
    public $model;

    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        $this->model = new BlogModel();
    }

    public function index()
    {
        $posts = $this->model->orderBy('date', 'desc')->paginate(3);
        Paginator::useBootstrap();
        return view("blog", compact("posts"));
    }

    public function detailedBlog($id)
    {
        $post = $this->model->where('id', $id)->first();
        $comments = CommentModel::all();
        return view("detailed_blog", ['post' => $post, 'comments' => $comments]);
    }

    public function delete($id)
    {
        if ($_SESSION['user']['role'] != 'admin') {
            return redirect('/User/login');
        }
        $this->model->where('id', $id)->delete();

        return redirect('/Blog');
    }
}

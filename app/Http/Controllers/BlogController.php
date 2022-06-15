<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

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
        $post = $this->model->where('id', $id);
        return view("detailedBlog", ["post" => $post]);
    }

    public function deletePost($id)
    {
        $this->model->where('id', '=', $id)->delete();

        return redirect('/');
    }
}

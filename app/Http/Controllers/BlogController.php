<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class BlogController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new BlogModel();
    }

    public function index()
    {
        $posts = $this->model->orderBy('date', 'desc')->paginate(3);
        Paginator::useBootstrap();
        return view("blog", compact("posts"));
    }

    public function createPost()
    {
        return view("add_post");
    }

    public function addPost(Request $request)
    {
        $request->validate([
            'theme' => 'required',
            'imageFile' => 'mimes:jpg, jpeg, png',
            'content' => 'required'
        ]);

        $this->model->theme = $_POST['theme'];
        $this->model->content = $_POST['content'];
        $this->model->imageLink = trim($_FILES['imageFile']['name']) ? $this->getImageLink($_FILES['imageFile']) : null;

        return $this->model->save();
    }

    public function updatePost(Request $request)
    {
        // copy from prev
    }

    private function getImageLink($file)
    {
        $imagePath = Storage::putFile("public", new File($file['tmp_name']));
        return "../assets/imgs/blog" . mb_substr(stristr($imagePath, '/'), 1);
    }
}

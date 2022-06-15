<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use Illuminate\Http\Request;

class CreateBlogController extends Controller
{
    public $model;

    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        $this->model = new BlogModel();
    }

    public function createView()
    {
        if (!$_SESSION['user']) {
            return redirect('/User/login');
        }
        return view("create_post");
    }

    public function create(Request $request)
    {
        $request->validate([
            'theme' => 'required',
            //'imageFile' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'content' => 'required'
        ]);

        $this->model->theme = $request['theme'];
        $this->model->content = $request['content'];
        $this->model->imageLink = "";
        //$this->model->imageLink = $request('imageFile')->store('public/assets/imgs/blog');

        $isSaved = $this->model->save();

        if ($isSaved ==  true) {
            return redirect('/Blog');
        }
    }

    public function editPost($id)
    {
        if ($_SESSION['user']['role'] != 'admin') {
            return redirect('/User/login');
        }
        $post = $this->model->where('id', $id)->first();
        return view('edit_post', ['post' => $post]);
    }

    public function edit(Request $request)
    {
        if ($_SESSION['user']['role'] != 'admin') {
            return redirect('/User/login');
        }
        $request->validate([
            'theme' => 'required',
            //'imageFile' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'content' => 'required'
        ]);

        $post = $this->model->find($request['id']);

        $post->theme = $request['theme'];
        $post->content = $request['content'];
        $post->imageLink = "";
        //$this->model->imageLink = $request('imageFile')->store('public/assets/imgs/blog');

        $isUpdated = $post->update();

        if ($isUpdated ==  true) {
            return redirect('/Blog');
        }
    }
}

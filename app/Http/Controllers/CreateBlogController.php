<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CreateBlogController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new BlogModel();
    }
    public function createPost()
    {
        return view("create_post");
    }

    public function create(Request $request)
    {
        $request->validate([
            'theme' => 'required',
            'imageFile' => 'file|mimes:jpg,jpeg,png',
            'content' => 'required'
        ]);

        $this->model->theme = $request['theme'];
        $this->model->content = $request['content'];
        $this->model->imageLink = trim($_FILES['imageFile']['name']) ? $this->getImageLink($_FILES['imageFile']) : null;

        $isSaved = $this->model->save();

        if ($isSaved ==  true) {
            return redirect('/Blog');
        }
    }

    public function updatePost(Request $request)
    {
        $xmlString = file_get_contents('php://input');
        $xml = simplexml_load_string($xmlString, null, LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);


        $validator = Validator::make(
            $array,
            [
                'theme' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'The title field is required.',
                'content.required' => 'The content field is required.',
            ]
        );

        if ($validator->fails()) {
            http_response_code(400);
            return (json_encode(['errors' => $validator->errors()]));
        }

        $post = $this->model->all()->find($array["id"]);
        if (!$post) {
            http_response_code(400);
            exit;
        }

        $post->theme = $array["theme"];
        $post->content = $array["content"];
        $post->save();

        echo json_encode($post);
    }

    private function getImageLink($file)
    {
        $imagePath = Storage::putFile("public", new File($file['tmp_name']));
        return "../storage/" . mb_substr(stristr($imagePath, '/'), 1);
    }
}

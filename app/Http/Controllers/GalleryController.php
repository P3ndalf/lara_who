<?php

namespace App\Http\Controllers;

use App\Models\GalleryModel;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new GalleryModel();
    }

    public function index()
    {
        return view('gallery', ["data" => $this->model->getData()]);
    }
}

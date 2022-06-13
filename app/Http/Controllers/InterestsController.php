<?php

namespace App\Http\Controllers;

use App\Models\InterestsModel;
use Illuminate\Http\Request;

class InterestsController extends Controller
{
    public $model;

    public function index()
    {
        $this->model = new InterestsModel();
        return view('interests', ["data" => $this->model->getData()]);
    }
}

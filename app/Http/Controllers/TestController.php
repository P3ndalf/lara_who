<?php

namespace App\Http\Controllers;

use App\Models\TestModel;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public $model;

    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        $this->model = new TestModel();
    }

    public function index()
    {
        if (isset($_SESSION['user'])) {
            $results = $this->model->all();
            return view('test', ['results' => $results]);
        }
        return view('test');
    }
}

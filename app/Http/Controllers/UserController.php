<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UserController extends Controller
{
    private $adminModel = [
        'login' => 'admin',
        'password' => '21232f297a57a5a743894a0e4a801fc3'
    ];

    public $model;

    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        $this->model = new User;
    }

    public function loginView()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|min:3',
            'password' => 'required|min:3'
        ]);

        $user = $this->model->all()->where('login', $request['login'])->where('password', md5($request['password']))->first();

        if ($user) {
            $_SESSION['user'] = [
                'id' => $user->id,
                'name' => $user->name,
                'login' => $user->login,
                'role' => 'user'
            ];

            if ($request['login'] == $this->adminModel['login'] && md5($request['password']) == $this->adminModel['password']) {
                $_SESSION['user']['role'] = 'admin';
            }

            return redirect('/');
        } else {
            return view('login', ['notFound' => 'User was not found']);
        }
    }

    public function registrationView()
    {
        return view('registration');
    }

    public function registrate(Request $request)
    {
        $request->validate([
            'login' => 'required|min:3|unique:users,login',
            'password' => 'required|min:3',
            'name' => 'required|min:2',
            'lastName' => 'required|min:2',
            'email' => 'required|email'
        ]);

        $this->model->name = $request['name'];
        $this->model->lastName = $request['lastName'];
        $this->model->login = $request['login'];
        $this->model->email = $request['email'];
        $this->model->password = md5($request['password']);

        $isSaved = $this->model->save();

        if ($isSaved) {
            $user = $this->model->all()->where('login', $request['login'])->first();
            $_SESSION['user'] = [
                'id' => $user->id,
                'name' => $user->name,
                'login' => $user->login,
                'role' => 'user'
            ];

            if ($request['login'] == $this->adminModel['login'] && ($request['password'] == $this->adminModel['password'])) {
                $_SESSION['user']['role'] = 'admin';
            }

            return redirect('/');
        }
    }

    public function logout()
    {
        if (!isset($_SESSION['user'])) {
            return redirect('/');
        }
        session_destroy();
        return redirect('/');
    }
}

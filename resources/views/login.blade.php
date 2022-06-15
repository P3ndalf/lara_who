@extends('layout')

@section('title')
Login
@endsection

@section('main_content')
<div class="main-center justify-content-center">
    <div class="container-md">
        <h1 class="text-center mb-3">
            Login
        </h1>
        <a href="/User/registration">to registration</a>
        <form method="post" enctype="application/x-www-form-urlencoded" action="/User/login">
            @csrf
            <div class="form-group mb-3">
                <label for="inputLoginId">Write your login</label>
                <input type="text" class="form-control" placeholder="Yyour login" name="login" data-validate>
            </div>
            <div class="form-group mb-3">
                <label for="inputPasswordId">Write your password</label>
                <input type="text" class="form-control" placeholder="Your password" name="password" data-validate>
            </div>
            @if (isset($notFound))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ $notFound }}</li>
                </ul>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="d-flex mb-3">
                <input class="btn btn-outline-dark mr-3" type="submit" name="submit" value="Login">
                <button class="btn btn-outline-danger" type="reset" value="reset">Clear</button>
            </div>
        </form>
    </div>
</div>

@endsection
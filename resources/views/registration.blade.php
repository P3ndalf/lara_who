@extends('layout')

@section('title')
Registration
@endsection

@section('main_content')

<div class="main-center justify-content-center">
    <div class="container-md">
        <h1 class="text-center mb-3">
            Registration
        </h1>
        <a href="/User/login">to Login</a>
        <form id="registrationForm" method="post" enctype="application/x-www-form-urlencoded" action="/User/registration">
            @csrf
            <div class="form-row d-flex justify-content-between">
                <div id="nameFieldId" class="col-md-5 mb-3">
                    <label for="NameId">Write name</label>
                    <input id="NameId" type="text" class="form-control" placeholder="Your name" name="name" data-validate>
                    <div id="NameErrorId"></div>
                </div>
                <div id="lastNameFieldId" class="col-md-5 mb-3">
                    <label for="LastNameId">Write lastName</label>
                    <input id="LastNameId" type="text" class="form-control" placeholder="Your lastname" name="lastName" data-validate>
                    <div id="LastNameErrorId"></div>
                </div>
            </div>

            <div id="emailFieldId" class="form-group mb-3">
                <label for="EmailId">Enter email</label>
                <input id="EmailId" class="form-control" placeholder="Your email" name="email" data-validate>
                <div id="EmailErrorId"></div>
            </div>

            <div id="loginFieldId" class="form-group mb-3">
                <label for="LoginId">Enter login</label>
                <input id="LoginId" class="form-control" placeholder="Your login" name="login" data-validate>
                <div id="LoginErrorId"></div>
            </div>

            <div id="passwordFieldId" class="form-group mb-3">
                <label for="PasswordId">Enter password</label>
                <input id="PasswordId" type="text" class="form-control" placeholder="Your password" name="password" data-validate>
                <div id="PasswordErrorId"></div>
            </div>

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
                <input class="btn btn-outline-dark mr-3" type="submit" name="submit" value="Registrate">
                <button class="btn btn-outline-danger" type="reset" value="reset">Clear</button>
            </div>
        </form>
    </div>
</div>

@endsection
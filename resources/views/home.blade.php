@extends('layout')

@section('title')
Home
@endsection

@section('main_content')

<div class="d-flex justify-content-center" style="align-items: center; margin: 50px;">
    <div class="d-flex justify-content-center">
        <div class="card card-poster gradient-overlay" style="width: 250px;">
            <a class="tile-link" href="category.html"></a>
            <img class="bg-image" src="../assets/imgs/other/profileAvatar.jpg" alt="Card image">
            <div class="card-body text-center">
                <h6 class="card-title text-shadow">Калмыков Иван</h6>
                <p class="card-text text-sm">Ис/б-19-2о</p>
            </div>
        </div>
    </div>
</div>
@endsection
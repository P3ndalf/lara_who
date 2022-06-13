@extends('layout')

@section('title')
Gallery
@endsection

@section('main_content')

<style>
    *,
    *::before,
    *::after {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    html,
    body {
        height: 100%;
    }
</style>
<div class="d-flex justify-content-center" style="align-items: center; margin: 50px;">
    <div class="album mb-3">
        <?php
        for ($i = 0; $i < sizeof($data); $i++) {
            echo '<div class="gallery-card">';
            echo '      <img class="card-img zoomed-image" src="' . $data[$i]["photo"] . '">';
            echo '</div>';
        }
        ?>
    </div>
</div>

@endsection
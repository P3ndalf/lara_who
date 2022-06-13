@extends('layout')

@section('title')
Blog
@endsection

@section('main_content')

<div class="main-center justify-content-center">
    <div class="container-md">
        <?php
        foreach ($posts as $value) {
            echo '<div class="card mb-3">';
            if (trim($value->imageLink)) {
                echo '  <div  class="card-img zoomed-image">';
                echo '  <img src="' . $value->imageLink . '"  onerror="this.src=&#39;../../assets/placeholderImage.png&#39;">';
                echo '</div>';
            }
            echo '  <div class="card-body">';
            echo '      <h5 class="card-title">' . $value->theme . '</h5>';
            echo '      <p class="card-text">' . $value->content . '</p>';
            echo '      <p class="card-text d-flex justify-content-between"><small class="text-muted">' . $value->date . '</small>';
            echo '      <img style="width:20px;" src="../assets/icons/Chat.png" onclick="location=\'/Blog/detailedBlog?id=' . ($value->id) . '\'" />';
            echo '      </p>';
            echo '  </div>';
            echo '</div>';
        } ?>

        <div class="d-flex justify-content-center my-3">
            {$posts->links('pagintaion::bootstrap-4')}
        </div>
    </div>
</div>

@endsection
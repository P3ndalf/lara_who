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
            echo '  <div  class="card-img zoomed-image" style="height: 300px;">';
            echo '      <img src="' . $value->imageLink . '"  onerror="this.src=&#39;../assets/imgs/blog/placeholderImage.png&#39;">';
            echo '  </div>';
            echo '  <div class="card-body">';
            echo '      <h5 class="card-title">' . $value->theme . '</h5>';
            echo '      <p class="truncated-p">' . $value->content . '</p>';
            echo '      <p class="card-text d-flex justify-content-between"><small class="text-muted">' . $value->date . '</small>';
            if ($_SESSION['user']) {
                if ($_SESSION['user']['role'] == 'admin') {
                    echo '      <img style="width:20px;" src="../assets/imgs/icons/Settings.png" onclick="location=\'/CreateBlog/editPost/' . ($value->id) . '\'" />';
                    echo '      <img style="width:20px;" src="../assets/imgs/icons/delete.png" onclick="location=\'/Blog/delete/' . ($value->id) . '\'" />';
                }
            }
            echo '      <img style="width:20px;" src="../assets/imgs/icons/Chat.png" onclick="location=\'/Blog/detailedPost/' . ($value->id) . '\'" />';
            echo '      </p>';
            echo '  </div>';
            echo '</div>';
        } ?>

        <div class="d-flex justify-content-center my-3">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

@endsection
@extends('layout')

@section('title')
<? echo $post->theme; ?>
@endsection

@section('main_content')

<div class="main-center justify-content-center">
    <div class="container-md">
        <?php
        echo '<div class="card mb-3">';
        echo '  <img class="card-img zoomed-image" src="' . $post->imageLink . '"  onerror="this.src=&#39;../../assets/imgs/blog/placeholderImage.png&#39;">';
        echo '  <div class="card-body">';
        echo '      <h5 class="card-title">' . $post->theme . '</h5>';
        echo '      <p class="card-text">' . $post->content . '</p>';
        echo '      <p class="card-text d-flex justify-content-between"><small class="text-muted">' . $post->date . '</small>';
        echo '      </p>';
        echo '  </div>';
        echo '</div>';
        ?>

        <form id="AddComment" class="mb-3" method="post" enctype="multipart/form-data" action="/Comment/sendComment">
            @csrf
            <fieldset <?php if (isset($_SESSION['user'])) echo 'enabled';
                        else echo 'disabled'; ?>>
                <input type="hidden" name="postId" value='<?php echo $post->id; ?>'>
                <div class="form-group mb-3">
                    <label for="blogContent">Write comment</label>
                    <textarea class="form-control" placeholder="Write all your thoughts about your theme" rows="3" name="content"></textarea>
                </div>
                <input <?php if (isset($_SESSION['user'])) echo 'class="btn btn-outline-primary" enabled';
                        else echo 'class="btn btn-secondary" disabled' ?> type="submit" name="submit" value="Add comment">
            </fieldset>
        </form>

        <?php
        foreach ($comments as $comment) {
            echo '  <div class="card mb-3">';
            echo '      <div class="card-title">' . $comment->authorLogin . '</div>';
            echo '      <div class="card-text">' . $comment->content . '</div>';
            echo '  </div>';
        }
        ?>
    </div>
</div>

@endsection
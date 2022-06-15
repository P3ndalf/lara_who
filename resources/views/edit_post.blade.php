@extends('layout')

@section('title')
edit "<?php echo $post->theme ?>"
@endsection

@section('main_content')

<div class="main-center justify-content-center">
    <div class="container-lg">
        <h1 class="text-center mb-3">
            Add post
        </h1>

        <form enctype="multipart/form-data" method="post" action="/CreateBlog/edit">
            @csrf
            <input type="hidden" class="form-control" name="id" value="<?php echo $post->id ?>">

            <div class="mb-3">
                <label for="blogThemeId">Write theme</label>
                <input type="text" class="form-control" id="blogThemeId" name="theme" value="<?php echo $post->theme ?>" placeholder="Come up with breathtaking theme for your post">
            </div>

            <div class="mb-3">
                <label for="blogContent">Write content</label>
                <textarea class="form-control" placeholder="Write all your thoughts about your theme" value="<?php echo $post->content ?>" rows="5" name="content"><?php echo $post->content ?></textarea>
            </div>

            <div class="d-flex mb-3">
                <input class="btn btn-outline-dark mr-3" type="submit" name="submit" value="Add blog">
                <button class="btn btn-outline-danger" type="button" value="reset">Clear</button>
            </div>
        </form>
    </div>
</div>

@endsection
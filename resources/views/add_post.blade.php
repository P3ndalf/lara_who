@extends('layout')

@section('title')
Add post
@endsection

@section('main_content')

<div class="main-center justify-content-center">
    <div class="container-lg">
        <h1 class="text-center mb-3">
            Add post
        </h1>

        <form enctype="multipart/form-data" method="post">

            <div class="mb-3">
                <label for="blogThemeId">Write theme</label>
                <input type="text" class="form-control" id="blogThemeId" name="blogTheme" placeholder="Come up with breathtaking theme for your post">
            </div>

            <div class="mb-3">
                <label for="blogImage">Choose image</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Image</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="blogImage">
                        <label class="custom-file-label" for="inputGroupFile01">Choose memorable image for your post</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="blogContent">Write content</label>
                <textarea class="form-control" placeholder="Write all your thoughts about your theme" rows="5" name="blogContent"></textarea>
            </div>

            <div class="d-flex mb-3">
                <input class="btn btn-outline-dark mr-3" type="submit" name="submit" value="Add blog">
                <button class="btn btn-outline-danger" type="button" value="reset">Clear</button>
            </div>
        </form>
    </div>
</div>

@endsection
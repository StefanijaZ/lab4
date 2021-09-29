@extends('layouts.app')

@section('content')

<h1 class="title text-center">Create a new post</h1>

<form class="text-center" method="post" action="/create-blog" enctype="multipart/form-data">

    @csrf


    <div class="field">
        <label class="label">Title</label>
        <div class="control">
            <input type="text" name="title" value="" class="input" placeholder="Title" required />
        </div>
    </div>

    <div class="field">
        <label class="label">Content</label>
        <div class="control">
            <textarea name="content" class="textarea" placeholder="Content" required rows="10"></textarea>
        </div>
    </div>

    <div class="field">
        <label class="label">Choose image</label>
        <div class="control">
            <input type="file" name="postImage" required>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link is-outlined mt-4">Save</button>
        </div>
    </div>

</form>

@endsection
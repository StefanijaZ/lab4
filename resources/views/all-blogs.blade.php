@extends('layouts.app')

@section('content')

<h1 class="title text-center">All blogs</h1>

<table class="table table-striped text-center">
  <thead>
    <tr>
        <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td><img class="ml-5" src="{{ asset( 'images/' . $post->image ) }}" style="width:100px;height:100px"></td>
        </tr>
    @endforeach
  </tbody>
</table>


@endsection
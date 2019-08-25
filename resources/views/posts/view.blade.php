@extends('layouts.app')

@section('content')
   <div class="container">
      <h1>Blog Post: {{ $post->title }}</h1>
      <a href="{{ route('posts.like', ['postId' => $post->id]) }}">Like</a>
      <br>
      <a href="{{ route('posts.follow', ['postId' => $post->id]) }}">Follow</a>
      <br>
      <div class="post-body">
         <p>{!! $post->body !!}</p>
      </div>
   </div>
@endsection
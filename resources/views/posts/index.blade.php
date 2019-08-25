@extends('layouts.app')

@section('content')
   <div class="container">
      <h1>All Posts</h1>

      <ul>
         @foreach($posts as $post)
            <li class="post-title">
               <a href="{{ route('posts.view', ['postId' => $post->id]) }}">{{ $post->title }}</a>
            </li>
         @endforeach
      </ul>
   </div>
@endsection
@extends('layouts.app')

@section('content')
   <div class="container">
      <h1>All Posts</h1>

      <ul>
         @foreach($posts as $post)
            <div class="post-title">{{ $post->title }}</div>
            <div class="post-body">{!! $post->body  !!} </div>
         @endforeach
      </ul>
   </div>
@endsection
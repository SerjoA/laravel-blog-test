@extends('layouts.app')

@section('content')
   <div class="container">
      <h1>Blog Post: {{ $post->title }}</h1>
      <div class="post-body">
         <p>{!! $post->body !!}</p>
      </div>
   </div>
@endsection
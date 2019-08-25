@extends('layouts.app')

@section('content')
   <div class="container">
      <h1>Add Post</h1>

      <form action="/posts/create/">
         <label for="name">Title</label>
         <input type="text" name="title">
         <br>
         <label for="body">Body</label>
         <textarea name="body" id="body" cols="30" rows="10"></textarea>
         <br>
         <input type="submit" value="Save">
      </form>
   </div>
@endsection
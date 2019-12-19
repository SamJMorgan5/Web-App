
@extends('layouts.app')

@section('title', 'Home')

@section('content')

      <style>
      .jumbotron{

      }
          /* Adds borders for tabs */
      .tab-content {

      }
      .nav-tabs {

      }

    </style>

    <div class="container">
    <ul>

        @foreach ($posts->reverse() as $post)
        <div class="jumbotron">
            <a href="{{ route('posts.show', ['id' => $post->id]) }}">
                <h5> {{ $post->text }} </h5> </a>
                Posted by {{ $post->user->name }}
        </div>
        @endforeach
    </ul>



    <a href="{{ route('posts.create' )}}">Create Post</a>


    {{ $posts->links() }}
    </div>



@endsection

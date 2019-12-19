
@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="container">
        @foreach ($posts as $post)
        <div class="jumbotron">
            <a href="{{ route('posts.show', ['id' => $post->id]) }}">
                <h5> {{ $post->text }} </h5> </a>
                Posted by {{ $post->user->name }}
        </div>
        @endforeach




    <a href="{{ route('posts.create' )}}">Create Post</a>


    {{ $posts->links() }}
    </div>



@endsection

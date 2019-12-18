@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    @if ($errors->any())
        <div>
            Errors:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
    @endif

    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')

        <div class="container">
          <div class="jumbotron">
            <p>Text: <input class="input-group" type="text" name="text"
              value="{{ $post->text }}"></p>

             <p>Image: <input id="profile_image" type="file"
                name="image_location" value="{{ $post->text }}"></p>

             <input type="submit" value="Submit">
             <a href="{{ route('posts.index') }}">Cancel</a>
           </div>
         </div>
    </form>

@endsection

@extends('layouts.app')

@section('title', 'Edit')

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

        <div class="form-group">
        <p>Text: <input type="text" name="text"
            value="{{ $post->text }}"></p>
        </div>

        <div class="form-group">
        <input id="profile_image" type="file" 
            class="form-control" name="image_location" value="{{ $post->text }}"> 
        </div>

        <div class="form-group">
        

        <input type="submit" value="Submit">
        <a href="{{ route('posts.index') }}">Cancel</a>

        
    </form>

@endsection
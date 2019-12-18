@extends('layouts.app')

@section('title', 'Edit Comment')

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

    <form method="POST" action="{{ route('comments.update', $comment->id) }}">
        @csrf
        @method('PUT')

        <div class="container">
          <div class="call-md-6">
          <p>Text: <input class="input-group" type="text" name="text"
              value="{{ $comment->text }}"></p>
          </div>
          <button class="btn btn-primary" type="submit" value="Submit">Submit</button>
          <a href="{{ route('posts.index') }}">Cancel</a>
        </div>

    </form>

@endsection

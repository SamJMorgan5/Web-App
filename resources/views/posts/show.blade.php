@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <div class="container">
      <div class="row">
          <div class="jumbotron">
            <div class="col-sm">
              <h5>{{ $post->text }}</h5>

              <p>Posted By: {{ $post->user->name }}</p>
              <p>Tags: </p>

              @foreach ($post->tags as $tag)
                  {{ $tag->name }}
              @endforeach

              @if(!Auth::guest())
                  @if(Auth::user()->id == $post->user_id || Auth::user()->is_admin == 1)
              <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Delete">
              </form>

              <form>
                  @csrf
                  <button formaction="{{ route('posts.edit', ['id' => $post->id]) }}">Edit</button>
              </form>
                  @endif
              @endif
            </div>
            <div class="col-sm">
              <img src="storage/app/public/images/{{ $post->image_location }}" width="75px" height="75px">
            </div>
          </div>
      </div>
    </div>


    <div class="container">
      <h1>Comments</h1>
          @foreach ($post->comments as $comment)
            <div class="jumbotron jumbotron-comment">
                    <p>{{ $comment->text }}</p>
                    <p>{{ $comment->user->name }}</p>

                @if(!Auth::guest())
                    @if(Auth::user()->id == $comment->user_id || Auth::user()->is_admin == 1)
                        <form method="POST" action="{{ route('comments.destroy', ['id' => $comment->id]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                        </form>

                        <form>
                        <button formaction="{{ route('comments.edit', ['id' => $comment->id]) }}">Edit</button>
                        </form>
                    @endif
                @endif
              </div>
            @endforeach
      </div>

    <div class="container">
      @if(!Auth::guest())
        <form method="POST" action="{{ route('comments.store') }}">
          @csrf
          <h2>New Comment</h2>
          Text: <input type="text" name="text" value="{{ old('text') }}">
          <input type="hidden" name="post_id" value="{{ $post->id }}" i>
          <input type="submit" value="Submit">
      @endif
  </div>

    <a href="{{ route('posts.index') }}">Back</a>



@endsection

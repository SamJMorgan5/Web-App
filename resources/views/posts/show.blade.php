@extends('layouts.app')

@section('title', 'Post')

@section('content')



    <div class="container">
          <div class="jumbotron">
            <div class="row">
            <div class="col-sm">
              <h5>{{ $post->text }}</h5>

              <p>Posted By: {{ $post->user->name }}</p>


            </div>

            <div class="col-sm">
              <img src="/public/{{ $post->image_location }}" class="card-img" width="300px" height="300px">
            </div>
            </div>
            <div class="row">
              <p>Tags:
              @foreach ($post->tags as $tag)
                  {{ $tag->name }},
              @endforeach</p>
            </div>
            <div class="row">
              @if(!Auth::guest())
                  @if(Auth::user()->id == $post->user_id || Auth::user()->is_admin == 1)
              <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                  @csrf
                  @method('DELETE')
                  <button class = "btn btn-primary" type="submit">Delete</button>
              </form>

              <form>
                  @csrf
                  <button class="btn btn-primary" formaction="{{ route('posts.edit', ['id' => $post->id]) }}">Edit</button>
              </form>
                  @endif
              @endif
            </div>
          </div>
      </div>



    <div class="container">
      <h1>Comments</h1>
          @foreach ($post->comments->reverse() as $comment)
            <div class="jumbotron">
                    <p>{{ $comment->text }}</p>
                    <p>Comment By: {{ $comment->user->name }}</p>
                <div class="row">
                @if(!Auth::guest())
                    @if(Auth::user()->id == $comment->user_id || Auth::user()->is_admin == 1)
                        <form method="POST" action="{{ route('comments.destroy', ['id' => $comment->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button class = "btn btn-primary" type="submit">Delete</button>
                        </form>

                        <form>
                        <button class="btn btn-primary" formaction="{{ route('comments.edit', ['id' => $comment->id]) }}">Edit</button>
                        </form>
                    @endif
                @endif
              </div>
              </div>
            @endforeach
      </div>

    <div class="container">
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
    </div>

    <div class="container">
      @if(!Auth::guest())
        <form method="POST" action="{{ route('comments.store') }}">
          @csrf
          <h2>New Comment</h2>
          Text: <input class="input-group" type="text" name="text" value="{{ old('text') }}">
          <input type="hidden" name="post_id" value="{{ $post->id }}" i>
          <button class="btn btn-primary" type="submit" value="Submit">Submit</button>
      @endif
  </div>

    <a href="{{ route('posts.index') }}">Back</a>



@endsection

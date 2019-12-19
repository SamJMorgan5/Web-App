@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <div class = "container">
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
      <form method="POST" action="{{ route('posts.store') }}" enctype = 'multipart/form-data'>
          @csrf

          <p>Text: <input class="input-group" type="text" name="text"
              value="{{ old('text') }}"></p>

          <p>Image: <input id="profile_image" type="file"
              name="image_location"></p>

          <select name="tag1_id">
              @foreach ($tags as $tag)
                  <option value="{{ $tag->id }}"
                      @if ($tag->id == old('tag1_id'))
                          selected="selected"
                      @endif
                  >{{ $tag->name }}</option>
              @endforeach
          </select>

          <select name="tag2_id">
              @foreach ($tags as $tag)
                  <option value="{{ $tag->id }}"
                      @if ($tag->id == old('tag2_id'))
                          selected="selected"
                      @endif
                  >{{ $tag->name }}</option>
              @endforeach
          </select>

          <select name="tag3_id">
              @foreach ($tags as $tag)
                  <option value="{{ $tag->id }}"
                      @if ($tag->id == old('tag3_id'))
                          selected="selected"
                      @endif
                  >{{ $tag->name }}</option>
              @endforeach
          </select>
          <br>
          <button class="btn btn-primary" type="submit" value="Submit">Submit</button>
          <a href="{{ route('posts.index') }}">Cancel</a>


        </form>
      </div>
@endsection

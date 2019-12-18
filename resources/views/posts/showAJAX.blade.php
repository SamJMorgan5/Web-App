@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <ul>
        <li>Text: {{ $post->text }}</li>
        <li>Image: <img src="/public/images/{{ $post->image_location }}" width="75px" height="75px"></li>
        <li>Posted By: {{ $post->user->name }}</li>
    

    @foreach ($post->tags as $tag)
                <li>
                    <p>{{ $tag->name }}</p>
                </li>
    @endforeach


    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id || Auth::user()->is_admin == 1)
    <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
        <a href="{{ route('posts.index') }}">Back</a>
        
    </form>

    <form method="POST" action="{{ route('posts.update', ['id' => $post->id]) }}">
        @csrf
        @method('UPDATE')
        <input type="submit" value="Update">
        <a href="{{ route('posts.index') }}">Back</a>
        
    </form>
        @endif
    @endif

    <h1>Comments</h1>
        
            @foreach ($post->comments as $comment)
                <li>
                    <p>{{ $comment->text }}</p>
                    <p>{{ $comment->user->name }}</p>
                </li>
                @if(!Auth::guest())
                    @if(Auth::user()->id == $comment->comment_id || Auth::user()->is_admin == 1)
                        <form method="POST" action="{{ route('comments.destroy', ['id' => $comment->id]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    @endif
                @endif
            @endforeach
        </ul>


    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com./axios/dist/axios.min.js"></script>
    
    @if(!Auth::guest())
        <div id="root">  
            <h2>New Comment</h2>
            Text: <input type="text" id="text" v-model="newCommentName">
            <button @click="createComment">Post</button>
        </div>
    @endif

    <script>
        var app = new Vue({
            el: "#root",
            data: {
                newCommentName: '',
            },
        methods: {
            createComment: function () {
                axios.post("{{ route ('api.comments.store') }}", {
                    user_id: 1,
                    post_id: {{ $post->id }},
                    text: this.newCommentName 
                })
                .then(response => {
                    this.comments.push(response.data);
                    this.newCommentName = '';
                })
                .catch(response => {
                    console.log(response);
                })
            }
        }
        });
    </script>

    
@endsection

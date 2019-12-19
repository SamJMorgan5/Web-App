<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PostController extends Controller
{
public function __construct()
{
    $this->middleware('auth', ['except' => ['index', 'show']]);
}

public function index()
{
    $posts = Post::orderBy('created_at', 'desc')->paginate(20);
    return view('posts.index', ['posts' => $posts]);
}

public function show($id)
{
    $post = Post::findOrFail($id);
    return view('posts.show', ['post' => $post]);
}

public function create()
{
    $tags = Tag::all();
    return view('posts.create', ['tags' => $tags]);
}

public function store(Request $request)
{
    $validateData = $request->validate([
        'text' => 'required|max:255'
    ]);

    $p = new Post;
    $p->user_id = Auth::id();
    $p->text = $validateData['text'];

    if($request->hasFile('image_location')){
      $file = $request->file('image_location');
      $ext = $file->getClientOriginalExtension();
      $filename = $file->getFilename();
      $fullfile = File::get($file);
      echo($filename);
      Storage::disk('local')->put($filename.'.'.$ext , $fullfile);
      $p->image_location = $file->getFilename().'.'.$ext;
    } else {
      echo('no image');
    }


    $p->save();
    $p->tags()->attach($request->tag1_id);
    $p->tags()->attach($request->tag2_id);
    $p->tags()->attach($request->tag3_id);


    session()->flash('message', 'Post created');

    return redirect()->route('posts.index');
}

public function destroy($id)
{
    $post = Post::findOrFail($id);
    $post->delete();

    return redirect()->route('posts.index')->with('message', 'Post was deleted');
}

public function edit($id)
{
    $post = Post::findOrFail($id);
    return view('posts.edit')->with('post', $post);
}

public function update(Request $request, $id)
{
    $validateData = $request->validate([
        'text' => 'required|max:255',
        'image_location' => 'image|nullable'
    ]);

    $post = Post::find($id);
    $post->text = $validateData['text'];
    $post->image_location = $validateData['image_location'];
    $post->save();
    $post->tags()->attach($request->tag1_id);
    $post->tags()->attach($request->tag2_id);
    $post->tags()->attach($request->tag3_id);

    session()->flash('message', 'Post updated');

    return redirect()->route('posts.index');
}
}

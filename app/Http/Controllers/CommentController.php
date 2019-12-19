<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function apiIndex()
    {
        $comments = Comment::all();
        return $comments;
    }

    public function show($id)
    {
        $comment = Post::findOrFail($id);
        return view('comments.show', ['comment' => $comment]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'text' => 'required|max:255'
        ]);
        $c = new Comment;
        $c->user_id = Auth::id();
        $c->post_id = $request->get('post_id');
        $c->text = $validateData['text'];
        $c->save();

        session()->flash('message', 'Comment Created');
        return redirect()->route('posts.index');
    }

    public function page()
    {
       return view('comments.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit')->with('comment', $comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validateData = $request->validate([
          'text' => 'required|max:255'
      ]);

        $comment = Comment::find($id);
        $comment->text = $validateData['text'];
        $comment->save();

        session()->flash('message', 'Comment Updated');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('posts.index')->with('message', 'Post was deleted');
    }
}

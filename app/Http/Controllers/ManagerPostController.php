<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\ManagerPostRequest;
use Illuminate\Support\Str;

class ManagerPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('manager.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagerPostRequest $request)
    {
        if ($request->validated()) {
          $post = New Post();
          $post->title=$request->get('title');
          $post->url=Str::slug($request->get('title'),'-');
          $post->description=$request->get('description');
          $post->content=$request->get('content');
          $post->keywords=$request->get('keywords');
          $post->status=$request->get('status');
          $post->save();
          return redirect()->route('manager.post.index');
        }
        else
        {
         return back()->withErrors($request->errors())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('manager.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManagerPostRequest $request, $id)
    {
      if ($request->validated()) {
          $post=Post::find($id);
          $post->title=$request->get('title');
          $post->url=Str::slug($request->get('title'),'-');
          $post->description=$request->get('description');
          $post->content=$request->get('content');
          $post->keywords=$request->get('keywords');
          $post->status=$request->get('status');
          $post->save();
        return redirect()->route('manager.post.index');
     }
     else
     {
      return back()->withErrors($request->errors())->withInput();
     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::delete($id);
        return redirect()->route('manager.post.index');
    }
}

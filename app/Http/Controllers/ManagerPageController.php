<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Illuminate\Support\Str;
use App\Http\Requests\ManagerPageRequest;
class ManagerPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages=Page::orderBy('id','desc')->get();
        return view('manager.page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagerPageRequest $request)
    {
       if($request->validated())
       {
          $page=New Page();
          $page->title=$request->get('title');
          $page->url=Str::slug($request->get('title'),'-');
          $page->description=$request->get('description');
          $page->content=$request->get('content');
          $page->keywords=$request->get('keywords');
          $page->status=$request->get('status');
          $page->save();
          return redirect()->route('manager.page.index');
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
        $page=Page::find($id);
        return view('edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManagerPageRequest $request, $id)
    {
        if ($request->validated()) {
            $page=Page::find($id);
            $page->title=$request->get('title');
            $page->url=Str::slug($request->get('title'),'-');
            $page->description=$request->get('description');
            $page->content=$request->get('content');
            $page->keywords=$request->get('keywords');
            $page->status=$request->get('status');
            $page->save();
          return redirect()->route('manager.page.index');
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
        Page::delete($id);
        return redirect()->route('manager.page.index');
    }
}

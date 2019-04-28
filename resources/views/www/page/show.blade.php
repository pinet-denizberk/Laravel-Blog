@extends('www.layout.common')
@section('head-title',$page->title)
@section('title',$page->title)
@section('keywords',$page->keywords)
@section('description',$page->description)
@section('subtitle',$page->description)
@section('bg-image',asset('img/post-bg.jpg'))
@section('body')
<article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>{{$page->content}}</p>
                </div>
            </div>
        </div>
    </article>
@endsection

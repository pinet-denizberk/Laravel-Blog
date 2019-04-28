@extends('www.layout.common')
@section('head-title',$post->title)
@section('title',$post->title)
@section('keywords',$post->keywords)
@section('description',$post->description)
@section('subtitle',$post->description)
@section('bg-image',asset('img/post-bg.jpg'))
@section('body')
<article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>{{$post->content}}</p>
                </div>
            </div>
        </div>
    </article>
@endsection

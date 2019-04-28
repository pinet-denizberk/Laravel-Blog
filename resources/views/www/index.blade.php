@extends('www.layout.common')
@section('head-title',config('app.name','Laravel'))
@section('title',config('app.name','Laravel'))
@section('bg-image',asset('img/home-bg.jpg'))
@section('body')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @foreach ($posts as $post)
            <div class="post-preview">
                    <a href="{{route('post.show',$post->url)}}">
                        <h2 class="post-title">
                            {{$post->title}}
                        </h2>
                        <h3 class="post-subtitle">
                        {{substr($post->description,4)}}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> {{$post->updated_at}}</p>
                </div>
                <hr>
            @endforeach
            
            <!-- Pager -->
            @if($posts->links())
            <ul class="pager">
                <li class="next">
                    {{ $posts->links() }}
                </li>
            </ul>                                     
            @endif

           
        </div>
    </div>
</div>

<hr>
@endsection
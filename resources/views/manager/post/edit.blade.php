@extends('manager.layout.common')
@section('body')
    <div class="container">
        <div class="card text-white bg-dark mt-4">
                <div class="card-body">
            <div class="card-header">{{__('manager.create-new-post')}}</div>

                <div class="row">
                    <div class="col-md-12">
                <form action="{{route('manager.post.update',$post->id)}}" method="POST">
                    <input name="_method" type="hidden" value="PATCH" />
                @csrf
                <div class="form-group">
                <input name="title" id="title" type="text" class="form-control" placeholder="{{__('manager.title')}}" value="{{$post->title}}" required>
                </div>
                <div class="form-group">
                 <input name="description" id="description" type="text" class="form-control" placeholder="{{__('manager.description')}}" value="{{$post->description}}" required>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="content" id="content" cols="50" rows="10"  required>{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                <input type="text" name="keywords" id="keywords" title="keywords" class="form-control" value="{{$post->keywords}}" placeholder="{{__('manager.keywords')}}" required>
                </div>
                <div class="form-group">
                    <select name="status" id="status" class="form-control">
                    <option value="active">{{__('manager.active')}}</option>
                    <option value="passive">{{__('manager.passive')}}</option>
                    </select>
                </div>
            <button type="submit" class="btn btn-success btn-lg btn-block">{{__('manager.update')}}</button>
                </form>
            </div>
                </div>
            </div>
        </div>
    </div>
@endsection

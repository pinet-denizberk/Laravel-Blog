@extends('manager.layout.common')
@section('body')

<div class="container">
    <div class="card text-white bg-dark mt-4">

            <div class="card-body">
            <div class="card-header">{{__('manager.post')}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

               <div class="row">
                   <div class="col-md-12">
                        <table class="table table-dark">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('manager.url')}}</th>
                                    <th scope="col">{{__('manager.title')}}</th>
                                    <th scope="col">{{__('manager.description')}}</th>
                                    <th scope="col">{{__('manager.status')}}</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                    <tr>
                               <th scope="row">{{$post->id}}</th>
                                    <td><a href="{{route('manager.post.show',$post->id)}}">{{$post->url}}</a></td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->description}}</td>
                                    <td>{{$post->status}}</td>
                                    <td>
                                        <form action="{{ route('manager.post.destroy', $post->id) }}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <div class="btn-group d-flex" role="group">
                                                <a class="btn btn-warning w-100" href="{{ route('manager.post.edit', $post->id) }}">{{ __('manager.edit') }}</a>
                                                <button class="btn btn-danger w-100" type="submit">{{ __('manager.remove') }}</button>
                                            </div>
                                        </form>
                                    </td>

                                      </tr>
                                    @endforeach

                              </table>
                            <a href="{{route('manager.post.create')}}" class="btn btn-success btn-lg btn-block">{{__('manager.create-new-post')}}</a>
                   </div>
               </div>
                </div>
            </div>
    </div>
</div>
@endsection

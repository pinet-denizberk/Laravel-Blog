@extends('manager.layout.common')
@section('body')
<div class="container">
  <div class="card text-white bg-dark mt-4">
          <div class="card-body">
          <div class="card-header">{{__('manager.home')}}</div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

             <div class="row"> 
                 <div class="col-md-12">
                 <a href="{{route('manager.page.index')}}" class="btn btn-secondary btn-lg btn-block">{{__('manager.page')}}</a>   
                 <a href="{{route('manager.post.index')}}" class="btn btn-secondary btn-lg btn-block">{{__('manager.post')}}</a>   
            
                </div>
             </div>
              </div>
          </div>
  </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<style>
  #admin-nav li a{
    color: #fff;
    position: relative;
    transition: 0.3s;
    /*text-decoration: underline;*/
    line-height: 20px;
    font-size: 19px;
    letter-spacing: 2px;
  }
  #admin-nav li a:after{
    content: '';
    position: absolute;
    width: 0%;
    height: 2px;
    transition: 0.3s;
    background: orangered;
    left: 0px;
    bottom: 0;
  }
  #admin-nav li a:hover:after{
    width: 85%;
  }
  #admin-nav li a:hover:not(.active){
    padding-left: 0px;
    color: #e2e2e2;
  }
</style>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

      <div class="container-fluid">
          <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-info rounded pt-2 sidebar">
              <div class="sidebar-sticky">
                <ul class="nav flex-column" id="admin-nav">
                  <li class="nav-item">
                    <a class="nav-link active" href="all-posts" id="all-posts">
                      <span data-feather="home"></span>
                      All posts <span class="sr-only">(current)</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/posts/create">
                      New post
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal" href="#">
                      Change logo
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="subscribers" id="subscribers">
                      <span data-feather="users"></span>
                      Subscribers
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="add-admin" id="add-admin">
                      <span data-feather="bar-chart-2"></span>
                      Add an admin
                    </a>
                  </li>
                  <li class="nav-item notice">
                    <a class="nav-link" href="#" id="getNotifications" data-action='notifications'>
                      <span data-feather="layers"></span>
                      Notifications 
                      <span class="badge badge-warning" style="position: absolute;">{{notifyCount()}}</span>
                    </a>
                  </li>
                </ul>
                <hr>
            </div>
        </nav>
        <nav class="col-md-10" id="table-container-admin">
          <table id="allposts" class="table table-striped">
            <tr>
              <th>Title</th>
              <th></th>
              <th></th>
            </tr>
            @foreach($posts as $post)
            <tr>
              <th>
                <a href="/posts/{{$post->id}}"> {{$post->ico_name}}</a><br>

              <form class="publish-form" action="admin-dashboard/{{$post->id}}" method="GET">
                @csrf
               {{-- {{Form::checkbox('publish','',$val,['id'=>$post->id])}} --}}

               @if($post->published)
                   <input type="checkbox" name="publish" id="{{$post->id}}" checked=""> 
               @else        
                   <input type="checkbox" name="publish" id="{{$post->id}}"> 
                @endif

                <button class="btn btn-default" type="submit" for="{{$post->id}}">
                  <small style="text-decoration: none;">Show/Hide</small>
                </button>

              </form>
              </th>
              <th><a href="/posts/{{$post->id}}/edit" class="btn btn-default" style="border-style: none; color: skyblue; text-transform: none;">Edit</a></th>
              <th>
                {!!Form::open(['action'=>['postsController@destroy',$post->id],'method'=>'POST', 'class'=>'pull-left'])!!}
                {{Form::token()}}
              {{Form::hidden('_method','DELETE')}}
              {{Form::submit('Delete',['class'=>'text-danger','style'=>'border:none;outline:none;background:transparent;cursor:pointer;padding-top:1%;'])}}
              {!!Form::close()!!}
              </th>
            </tr>
            @endforeach
          </table>
        </nav>
    </div>
  </div>
</div>
<div class="modal fade" id="new-admin-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
</div>
<button type="button" class="hidden" id="admin-modal" data-toggle="modal" data-target="#new-admin-modal"></button>
@include('pages.modal')
@include('js')
@endsection



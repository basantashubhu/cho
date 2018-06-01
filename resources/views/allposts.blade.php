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

      <form id="publish-form-{{$post->id}}" action="admin-dashboard/{{$post->id}}" method="GET">
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
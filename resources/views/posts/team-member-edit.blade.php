@extends('layouts.apped')

@section('content')
	<div class="showpage">
        {{-- {!!Form::open(['action' => ['TeamMemberController@update', 1],'method'=>'PATCH','id'=>'update-member', 'files' => true])!!} --}}
        <form action="{{route('team-member.update', ['id'=> 1])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach($mems as $mem)
            <div class="report showpage">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group"s style="display: none;">
                            <input type="hidden" name="member_id[]" value="{{$mem->id
                            }}">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name[]" id="name" value="{{$mem->name}}" required="">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="position">Position</label>
                            <input class="form-control" type="text" name="position[]" id="position" required="" value="{{$mem->position}}">
                        </div>
                        <div class="row showpage">
                            <div class="form-group col-sm-6">
                                <label for="member_photo">Photo</label><br>
                                    <img width="100px" height="100px" class="mb-2" src="{{route('member', ['filename'=>$mem->id])}}" alt="member_photo">
                                <input class="form-control-file" type="file" name="member_photo[]" id="member_photo">
                            </div>
                            @if(isset($stone))
                            @else
                                <div class="form-group col-sm-6 hidden">
                                    <label for="milestone_photo">Milestone</label> <br>                        
                                        <img width="100px" height="100px" class="mb-2" src="{{route('milestone', ['filename' => $id])}}" alt="milestone_photo">
                                    <input class="form-control-file" type="file" name="milestone_photo[]" id="milestone_photo">
                                </div>
                            @endif    
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group col-sm-12">
                            <label for="fb_link">Facebook Link</label>
                            <input class="form-control" type="text" name="fb_link[]" id="fb_link" required="" value="{{$mem->fb_link}}">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="linked_link">Linked Link</label>
                            <input class="form-control" type="text" name="linked_link[]" id="linked_link" required="" value="{{$mem->linked_link}}">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="twitter_link">Twitter Link</label>
                            <input class="form-control" type="text" name="twitter_link[]" id="twitter_link" value="{{$mem->twitter_link}}">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row showpage">
                <div class="form-group col-sm-12">
                    @isset($id)
                    <input type="hidden" name="post_id[]" value="{{$id}}">
                    @endisset
                    {{Form::submit('Save',['class'=>'btn btn-primary col-sm-3 float-right'])}}
                </div>
            </div>
        {!!Form::close()!!}
	</div>
@endsection
@extends('layouts.apped')

@section('content')
<div class="row" style="margin: 25px 0; min-height: 82vh;display: flex;">
<div class="col-sm-8" style="border: 1px solid #ccc;padding: 15px;margin: auto;">
        <h4>Add New Team Member</h4> <hr>
        {!!Form::open(['action' => 'TeamMemberController@store','method'=>'POST','id'=>'add-new-member', 'files' => true])!!}
            <div class="row" style="padding: 40px 100px;">
                <div class="col-sm-6">
                    <div class="form-group col-sm-12">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" required="">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="position">Position</label>
                        <input class="form-control" type="text" name="position" id="position" required="">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="member_photo">Photo</label>
                        <input class="form-control-file" type="file" name="member_photo" id="member_photo" required="">
                    </div>
                    @if(isset($stone))
                    @else
                        <div class="form-group col-sm-12 hidden">
                            <label for="milestone_photo">Milestone</label>
                            <input class="form-control-file" type="file" name="milestone_photo" id="milestone_photo" required="">
                        </div>
                    @endif    
                </div>
                <div class="col-sm-6">
                    <div class="form-group col-sm-12">
                        <label for="fb_link">Facebook Link</label>
                        <input class="form-control" type="text" name="fb_link" id="fb_link" required="">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="linked_link">Linked Link</label>
                        <input class="form-control" type="text" name="linked_link" id="linked_link" required="">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="twitter_link">Twitter Link</label>
                        <input class="form-control" type="text" name="twitter_link" id="twitter_link">
                    </div>
                    <div class="custom-control custom-checkbox ml-3 my-3 mt-3"">
                        <input type="checkbox" class="custom-control-input ml-5" id="customControlInline" name="another_member">
                        <label class="custom-control-label" for="customControlInline">Add Another Member</label>
                  </div>
                </div>
                    
                <div class="form-group col-sm-12">
                    @isset($id)
                    <input type="hidden" name="post_id" value="{{$id}}">
                    @endisset
                    {{Form::submit('Save',['class'=>'btn btn-primary col-sm-3 float-right'])}}
                </div>
            </div>
        {!!Form::close()!!}

</div>
</div>
@endsection
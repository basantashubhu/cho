   <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">About your team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            {!!Form::open(['action' => 'TeamMemberController@store','method'=>'POST','id'=>'add-new-member', 'files' => true])!!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>{{Form::label('','Name')}}</b>
                            {{Form::text('member_name','',['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            <b>{{Form::label('','Description')}}</b>
                            {{Form::textarea('description','',['class'=>'form-control', 'name'=>'description'])}}
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>{{Form::label('','Photo')}}</b>
                            {{Form::file('member_photo',['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            <b>{{Form::label('','Position')}}</b>
                            {{Form::text('position','',['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            <b>{{Form::label('','Facebook profile link')}}</b>
                            {{Form::text('fb_link','',['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            <b>{{Form::label('','Linkedin profile link')}}</b>
                            {{Form::text('linked_link','',['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            <b>{{Form::label('','Milestone photo')}}</b>
                            {{Form::file('milestone_photo',['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <input type="hidden" name="user_id" value="">
                        <input type="hidden" name="post_id" value="">
                        <button type="button" class="btn btn-default float-left" data-dismiss="modal">Close</button>
                        <a href="{{route('team-member.show', ['team-member' => 2 ])}}" 
                        class="btn btn-secondary ml-3" id="member-index">Remove Member</a>
                        {{Form::submit('Save',['class'=>'btn btn-primary col-sm-6 float-right'])}}
                    </div>
                </div>
            {!!Form::close()!!}
    </div>
</div>
@extends('layouts.apped')

@section('content')
    <div class="showpage">
      <div class="container publishing-form">
        <h1>Edit</h1>
        <p>Please note that listing on BlogICO is free. Because we have a very long queue of pending ICOs to be listed on BlogICO it might take several days for your ICO to be published. If you want your ICO to be reviewed before others, apply for Priority application. You will be notified via your email when your ICO is published.</p>


  {!! Form::open(['action'=>['postsController@update',$post->id],'method'=>'POST','files' => true]) !!}
            <div class="tab-pane active" id="general">
              @include('extra.edit.general')
            </div>
            <div class="tab-pane" id="token">
              @include('extra.edit.token')
            </div>
            <div class="tab-pane" id="invest">
              @include('extra.edit.invest');
            </div>
            <div class="tab-pane" id="extra-detail">
              @include('extra.edit.extra');
            </div>
                <div class="form-group">
                  <input type="checkbox" name="terms" required>
                  I am the official representative of this ICO and I give full permission to use all the needed data from all of our resources (website, social networks, white paper, etc.) for the listing on ICObench and the ICObench API. I have read and I agree with ICObench publishing policy presented in the site's FAQ and terms. I am aware that priority application and the payment for it does not mean that my ICO will be automatically accepted. I am also aware that if my ICO is declined I will not get a refund.

                  
                  {{Form::hidden('_method','PUT')}}
              <div class="row">
                <div class="col-sm-12">

                {{Form::submit('Save',['class'=>'btn btn-primary pull-right col-sm-2 offset-1 mt-sm-0 btn-next'])}}
                </div>
              </div>


                </div>
         {{--  </div> --}}
         
       {!! Form::close() !!}

      </div>
    </div>
    @include('pages.modal')
    @include('posts.edit-js')
@endsection
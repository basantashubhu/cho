@extends('layouts.apped')

  @section('content')

    <div class="showpage">
      <center>
          <h1>Publish an ICO</h1>
          <h3>Submit the form to get your pre-ICO or ICO published on the {{config('app.name','BlogICO')}} for free.</h3>
      </center>
    
      <div class="container publishing-form">
        <p>Please note that listing on BlogICO is free. Because we have a very long queue of pending ICOs to be listed on BlogICO it might take several days for your ICO to be published. If you want your ICO to be reviewed before others, apply for Priority application. You will be notified via your email when your ICO is published.</p>


      {!! Form::open(['action'=>'postsController@store','method'=>'POST', 'files' => true]) !!} 

            <div class="tab-pane active" id="general">
              @include('extra.publishgeneral')
            </div>
            <div class="tab-pane" id="token">
              @include('extra.publishtoken')
            </div>
            <div class="tab-pane" id="invest">
              @include('extra.publishinvest');
            </div>
            <div class="tab-pane" id="extra-detail">
              @include('extra.publishextra');
            </div>
                <div class="form-group">
                  <input type="checkbox" name="terms" required>
                  I am the official representative of this ICO and I give full permission to use all the needed data from all of our resources (website, social networks, white paper, etc.) for the listing on ICObench and the ICObench API. I have read and I agree with ICObench publishing policy presented in the site's FAQ and terms. I am aware that priority application and the payment for it does not mean that my ICO will be automatically accepted. I am also aware that if my ICO is declined I will not get a refund.
                </div>
         {{--  </div> --}}
         <div class="form-group text-right mb-0">
            {{Form::submit('Submit application',['class'=>'btn btn-primary btn-next'])}}           
         </div>
       {!! Form::close() !!}

      </div>
    </div>
  </div>
@endsection

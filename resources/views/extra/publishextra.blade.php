<table class="table">
        <tr>
            <td class="tdborder">
                <b>{{Form::label('','Whitelist')}}</b>            
            </td>
            <td class="tdborder">
                <b>{{Form::label('','Bonus')}}</b>            
            </td>
            <td class="tdborder">
                <b>{{Form::label('','Pre-sale bonus')}}</b>        
            </td>
            <td class="tdborder">
                <b>{{Form::label('','Main sale bonus')}}</b>                
            </td>
        </tr>
        <tr>
            <td class="tdborder gapping">
                {{Form::select('whitelist',['No'=>'No','Yes'=>'Yes'],'Yes',['class'=>'form-control'])}}
            </td>
            <td class="tdborder gapping">
                {{Form::select('bonus',['Available'=>'Available','Not available'=>'Not available'],'Available',['class'=>'form-control'])}}
            </td>
            <td class="tdborder gapping">
                {{Form::text('pre_sale_bonus','',['class'=>'form-control'])}}                        
            </td>
            <td class="tdborder">
                {{Form::text('main_sale_bonus','',['class'=>'form-control'])}}                            
            </td>
        </tr>
</table>
                <b>{{Form::label('categories','Category',['class'=>'control-label'])}}</b><br>

{{-- category checkboxes --}}
<div class="row">
    @include('extra.categories')
    <div class="col-md-6">
                <h3>Social media links</h3>
        <div class="row">
            
          <div class="col-md-6">
              <div class="form-group">
                  <b>{{Form::label('','Facebook')}}</b>
                  {{Form::text('facebook_link','',['class'=>'form-control','placeholder'=>'www.facebook.com/url'])}}
              </div>
              <div class="form-group">
                  <b>{{Form::label('','Twitter')}}</b>
                  {{Form::text('twitter_link','',['class'=>'form-control','placeholder'=>'www.twitter.com/url'])}}
              </div>
              <div class="form-group">
                  <b>{{Form::label('','Medium')}}</b>
                  {{Form::text('medium_link','',['class'=>'form-control','placeholder'=>'www.medium.com/url'])}}
              </div>
              <div class="form-group">
                  <b>{{Form::label('','Reddit')}}</b>
                  {{Form::text('reddit_link','',['class'=>'form-control','placeholder'=>'www.reddit.com/url'])}}
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <b>{{Form::label('','BitcoinTalk')}}</b>
                  {{Form::text('bitcointalk_link','',['class'=>'form-control','placeholder'=>'www.bitcointalk.net/url'])}}
              </div>
              <div class="form-group">
                  <b>{{Form::label('','Github')}}</b>
                  {{Form::text('github_link','',['class'=>'form-control','placeholder'=>'www.github.net/url'])}}
              </div>
              <div class="form-group">
                  <b>{{Form::label('','Telegram')}}</b>
                  {{Form::text('telegram_link','',['class'=>'form-control','placeholder'=>'www.telegram.io/url'])}}
              </div>
          </div>
      </div>
                <div class="form-group">
                  <b>{{Form::label('','Contact email')}}</b>
                  {{Form::email('contact_email','',['class'=>'form-control'])}}
                  <small class="text-muted">We will notify you to your e-mail address if your application was accepted.</small>
                </div>
    </div>
</div>
{{-- end of category --}}
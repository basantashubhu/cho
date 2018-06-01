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
                {{Form::select('whitelist',['No'=>'No','Yes'=>'Yes'], $post->whitelist,['class'=>'form-control'])}}
            </td>
            <td class="tdborder gapping">
                {{Form::select('bonus',['Available'=>'Available','Not available'=>'Not available'], $post->bonus,['class'=>'form-control'])}}
            </td>
            <td class="tdborder gapping">
                {{Form::text('pre_sale_bonus',$post->pre_sale_bonus,['class'=>'form-control'])}}                        
            </td>
            <td class="tdborder">
                {{Form::text('main_sale_bonus',$post->main_sale_bonus,['class'=>'form-control'])}}                            
            </td>
        </tr>
</table>
                <b>{{Form::label('category','Category',['class'=>'control-label'])}}</b><br>

{{-- category checkboxes --}}
@php
$categories = explode(',', $post->categories);
@endphp

<div id="categories" style="display: none;">
  
  @foreach($categories as $cat)
    @if($loop->last)
      @break
    @endif
    <div>{{$cat}}</div>
  @endforeach

</div>

<div class="row">
    @include('extra.categories')
    {{-- end of category --}}
    <div class="col-md-6">
                <h3>Social media links</h3>
        <div class="row">
            
          <div class="col-md-6">
              <div class="form-group">
                  <b>{{Form::label('','Facebook')}}</b>
                  {{Form::text('facebook_link',$post->facebook_link,['class'=>'form-control','placeholder'=>'www.facebook.com/url'])}}
              </div>
              <div class="form-group">
                  <b>{{Form::label('','Twitter')}}</b>
                  {{Form::text('twitter_link',$post->twitter_link,['class'=>'form-control','placeholder'=>'www.twitter.com/url'])}}
              </div>
              <div class="form-group">
                  <b>{{Form::label('','Medium')}}</b>
                  {{Form::text('medium_link',$post->medium_link,['class'=>'form-control','placeholder'=>'www.medium.com/url'])}}
              </div>
              <div class="form-group">
                  <b>{{Form::label('','Reddit')}}</b>
                  {{Form::text('reddit_link',$post->reddit_link,['class'=>'form-control','placeholder'=>'www.reddit.com/url'])}}
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <b>{{Form::label('','BitcoinTalk')}}</b>
                  {{Form::text('bitcointalk_link',$post->bitcointalk_link,['class'=>'form-control','placeholder'=>'www.bitcointalk.net/url'])}}
              </div>
              <div class="form-group">
                  <b>{{Form::label('','Github')}}</b>
                  {{Form::text('github_link',$post->github_link,['class'=>'form-control','placeholder'=>'www.github.net/url'])}}
              </div>
              <div class="form-group">
                  <b>{{Form::label('','Telegram')}}</b>
                  {{Form::text('telegram_link',$post->telegram_link,['class'=>'form-control','placeholder'=>'www.telegram.io/url'])}}
              </div>
          </div>
      </div>
                <div class="form-group">
                  <b>{{Form::label('','Contact email')}}</b>
                  {{Form::email('contact_email',$post->contact_email,['class'=>'form-control'])}}
                  <small class="text-muted">We will notify you to your e-mail address if your application was accepted.</small>
                </div>
    </div>
</div>

<script>
  $(document).ready(function(){
    var data = {};
    $('#categories').find('div').each(function(){
      data[$(this).text()]= $(this).text();
    });
      // console.log(data);
      $.each(data, function(ind, val){
        $(document).find('input[id="'+val+'"]').attr('checked', 'checked');
      });
  });
</script>
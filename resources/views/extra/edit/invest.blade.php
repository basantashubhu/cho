<table class="table">
  <tr>
    <td class="tdborder">
      <b>{{Form::label('','Accepting')}}</b>
    </td>
    <td class="tdborder">
      <b>{{Form::label('','Soft cap')}}</b>            
    </td>
    <td class="tdborder">
      <b>{{Form::label('','Hard cap')}}</b>
    </td>
    <td class="tdborder">
      <b>{{Form::label('','Distributed in ICO')}}</b>
    </td>
  </tr>
  <tr>
    <td class="tdborder gapping">
      {{Form::text('accepting',$post->accepting,['class'=>'form-control'])}}
    </td>
    <td class="tdborder gapping">
        {{Form::text('soft_cap',$post->soft_cap,['class'=>'form-control','placeholder'=>'e.g. 1000000 USD'])}}
    </td>
    <td class="tdborder gapping">
      {{Form::text('hard_cap',$post->hard_cap,['class'=>'form-control','placeholder'=>'e.g. 4000000 USD'])}}      
    </td>
    <td class="tdborder">
      {{Form::text('distributed_ico',$post->distributed_ico,['class'=>'form-control','placeholder'=>''])}}
    </td>
  </tr>
  <tr>
    <td class="tdborder">
      <b>{{Form::label('','(pre)ICO start date')}}</b>
    </td>
    <td class="tdborder">
      <b>{{Form::label('','(pre)ICO end date')}}</b>
    </td>
    <td class="tdborder">
        <b>{{Form::label('','Link to whitepaper')}}</b>
    </td>
    <td class="tdborder">
      <b>{{Form::label('','KYC')}}</b>  
    </td>
  </tr>
  <tr>
    <?php
      $ico_start_date = Carbon\Carbon::parse($post->ico_start_date)->format('Y-m-d');
      $ico_end_date = Carbon\Carbon::parse($post->ico_end_date)->format('Y-m-d');
    ?>
    <td class="tdborder gapping">
      {{Form::date('ico_start_date',$ico_start_date,['class'=>'form-control', 'placeholder' =>'date'])}}
    </td>
    <td class="tdborder gapping">
      {{Form::date('ico_end_date',$ico_end_date,['class'=>'form-control'])}}      
    </td>
    <td class="tdborder gapping">
        {{Form::text('link_to_whitepaper',$post->link_to_whitepaper,['class'=>'form-control'])}}     
    </td>
    <td class="tdborder">
      @if($post->kyc == "Y")
        {{Form::select('kyc',['Yes'=>'Yes','No'=>'No'], 'Yes',['class'=>'form-control'])}}
      @else
        {{Form::select('kyc',['Yes'=>'Yes','No'=>'No'], 'No',['class'=>'form-control'])}}
      @endif
    </td>
  </tr>
</table>
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
      {{Form::text('accepting','',['class'=>'form-control'])}}
    </td>
    <td class="tdborder gapping">
        {{Form::text('soft_cap','',['class'=>'form-control','placeholder'=>'e.g. 1000000 USD'])}}
    </td>
    <td class="tdborder gapping">
      {{Form::text('hard_cap','',['class'=>'form-control','placeholder'=>'e.g. 4000000 USD'])}}      
    </td>
    <td class="tdborder">
      {{Form::text('distributed_ico','',['class'=>'form-control','placeholder'=>''])}}
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
    <td class="tdborder gapping">
      {{Form::date('ico_start_date','',['class'=>'form-control'])}}
    </td>
    <td class="tdborder gapping">
      {{Form::date('ico_end_date','',['class'=>'form-control'])}}      
    </td>
    <td class="tdborder gapping">
        {{Form::text('link_to_whitepaper','',['class'=>'form-control'])}}     
    </td>
    <td class="tdborder">
      {{Form::select('kyc',['Yes'=>'Yes','No'=>'No'],'Yes',['class'=>'form-control'])}}
    </td>
  </tr>
</table>
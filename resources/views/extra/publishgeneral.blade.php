    <table class="table">
        <tr>
            <td class="tdborder long">
                <b>{{Form::label('','Type of application')}}</b>        
            </td>
            <td class="tdborder">
                <b>{{Form::label('','ICO name')}}</b>
            </td>
        </tr>
        <tr>
            <td class="tdborder long">
                {{Form::select('type_of_application', ['R' => 'Regular listing (FREE)', 'P' => 'Priority listing (0.05 BTC)'],'R',['class'=>'form form-control'])}}
            </td>
            <td class="tdborder">
                {{Form::text('ico_name','',['class'=>'form-control','placeholder'=>'Your ICO name','required'])}}
            </td>
        </tr>
        <tr>
            <td class="tdborder long">
                <b>{{Form::label('','ICO slogan')}}</b>            
            </td>
            <td class="tdborder">
                <b>{{Form::label('','Website URL')}}</b>                
            </td>
        </tr>
        <tr>
            <td class="tdborder long">
                {{Form::text('ico_slogan','',['class'=>'form-control','placeholder'=>'Your ICO slogan','required'])}}                
            </td>
            <td class="tdborder">
                {{Form::text('website_url','',['class'=>'form-control','placeholder'=>'Your ICO website URL'])}}                
            </td>
        </tr>
        <tr>
            <td class="tdborder long">
              <b>{{Form::label('','Country of operation')}}</b>            
            </td>
            <td class="tdborder">
              <b>{{Form::label('','Link to video')}}</b>                
            </td>
        </tr>
        <tr>
            <td class="tdborder long">
              {{Form::text('country_of_operation','',['class'=>'form-control'])}}                
            </td>
            <td class="tdborder">
              {{Form::text('link_to_video','',['class'=>'form-control'])}}                
            </td>
        </tr>
        <tr>
            <td class="tdborder long">
              <b>{{Form::label('','Introduction to ICO')}}</b>                
              {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'About your ICO'])}}
            </td>
            <td class="tdborder">
                <div class="row">
                    <div class="col-md-6">
                      <b>{{Form::label('','Bounty')}}</b>                                  
                      {{Form::select('bounty',['Available'=>'Available','Not available'=>'Not available'],'Available',['class'=>'form-control','required'])}}
                    </div>
                    <div class="col-md-6">
                      <b>{{Form::label('','Link to bounty')}}</b>                        
                      {{Form::text('link_to_bounty','',['class'=>'form-control'])}}
                    </div>
                    <div class="col-md-6">
                       <b>{{Form::label('','ICO logo')}}</b>
                        {!!Form::file('ico_logo',['class'=>'form-control','required'])!!}
                    </div>
                    <div class="col-md-6">
                        <b>{{Form::label('','Minimum investment')}}</b>
                        {{Form::text('minimum_investment','',['class'=>'form-control'])}}
                    </div>    
                </div>
            </td>
        </tr>
        <tr>
            <td class="tdborder"></td>
            <td class="tdborder">
            </td>
        </tr>
        <tr>
            <td class="tdborder"></td>

            <td class="tdborder">
              
            </td>
        </tr>

    </table>

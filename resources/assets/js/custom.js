

function callAjax(options, callback=''){
  var url = options.url?options.url:"/";
  var method = options.method?options.method:"GET";
  var data = options.data?options.data:{};

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  
  $.ajax({
    url:url,
    method:method,
    data:data,
    beforeSend:function(){

    },
    error: function(error){

    },
    statusCode:{
      404:function(){
        console.log('page not found');
      },
      405:function(){
        console.log('method did not match');
      },
      500:function(){
        console.log('server error or php error');
      }
    },
    success: function(response){
      if(typeof(callback) != 'String'){
        callback(response);
      }
    }
  });
}
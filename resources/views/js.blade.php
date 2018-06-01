
<script>
  $(document).ready(function(){
    setInterval(function(){
      $('.nav-item.notice').load(' #getNotifications');
    }, 2000);
      $(document).on('click', 'input[type="checkbox"]', function(){
          var form_id = 'publish-form';
          var id = $(this).attr('id');
          $('#'+form_id+'-'+id).trigger('submit');
      });    
  });

$(document).ready(function(){

  //published or not published
  $(document).on('submit', '.publish-form',function(event){
    event.preventDefault();
    // alert('ready to submit');
    var url = $(this).attr('action');
    // console.log(url);
    var method = $(this).attr('method');
    // console.log(method);
    var data = $(this).serializeArray();
    // console.log(data);

    callAjax({url:url,method:method,data:data},function(data){
      console.log(data);
 
    });
  });

//all subscribers
$('#subscribers').on('click', function(event){
  event.preventDefault();
  var url = $(this).attr('href');
  callAjax({url:url}, function(response){
    $(document).find('#table-container-admin').html(response);
  });
});

//all subscribers
$('#all-posts').on('click', function(event){
  event.preventDefault();
  var url = $(this).attr('href');
  callAjax({url:url}, function(response){
    $(document).find('#table-container-admin').html(response);
  });
});
});

//notifications
$(document).on('click', '#getNotifications', function(event){
  event.preventDefault();
  let url = $(this).data('action');
  callAjax({url:url}, function(response){
    $(document).find('#table-container-admin').html(response);
  });
});
//mark read
$(document).on('click', '.mark-read', function(event){
  event.preventDefault();
  let url = $(this).data('action');
  callAjax({url:url}, function(response){
    $(document).find('#getNotifications').trigger('click');
  });
});
  
  //see later
$(document).on('click', '.see-later', function(event){
  event.preventDefault();
  let url = $(this).data('action');
  callAjax({url:url}, function(response){
    $(document).find('#getNotifications').trigger('click');
  });
});

//add admin modal
$(document).on('click', '#add-admin', function(e){
  e.preventDefault();
  callAjax({url:'add-admin'}, function(response){
    $(document).find('#new-admin-modal').html(response);
    $(document).find('#admin-modal').off('click').trigger('click');
  });
});

// admin form submit
$(document).on('submit', '#add-admin-form', function(e){
  e.preventDefault();
  let url = $(this).attr('action');
  let data ={};
  let validate = true;
  $(this).find('input,select').each(function(){
    if( $(this).val() == '' || $(this).val() == null ){
        $(this).css('border', '1px solid brown');
        validate = false;
    }
    data[ $(this).attr('name') ] = $(this).val();
  });
  if(validate){
      callAjax({url:url,method:'POST',data:data}, function(response){
          if( response != null && response != ''){
            $(document).find('#new-admin-modal .modal-dialog').html('<p class="text-white font-weight-bold">Successfully completed the action.</p>');
          }else{
            $(document).find('#new-admin-modal .modal-dialog').html('<p class="text-white font-weight-bold">Something went wrong!</p>');
          }
      });
  }
});
</script>
<script>
	//shows model for joining new member
	$(document).on('click', '#add-team-member',function(event){
			event.preventDefault();
			let url = $(this).attr('href');
			let user_id = $(this).data('user_id');
			let post_id = $(this).data('post_id');
			callAjax({
				url: url
			},
				function(response){
					$(document).find('#modalBody').html(response);
					$(document).find('#modal_button').trigger('click');
					$(document).find('input[name="user_id"]').val(user_id);
					$(document).find('input[name="post_id"]').val(post_id);
				}
			);

	});
	//new member submit form operation
	$(document).on('submit', '#add-new-member', function(event){
		event.preventDefault();
		let url = $(this).attr('action');
		let method = $(this).attr('method');
		let data = {};
		let validate = true;
		$('#add-new-member').find('input, textarea').each(function(){
			if($(this).val() == null || $(this).val() == ''){
				$(this).css('border', '1px solid brown');
				validate = false;
			}
			data[$(this).attr('name')] = $(this).val();
		});
		if(validate){
			callAjax({url:url,method:method,data:data}, function(response){
				$(document).find('#modal_button').trigger('click');
			});
		}
	});

	$(document).on('click', '#member-index', function(event){
		event.preventDefault();
		// console.log('loading index...');
		let url = $(this).attr('href');
		let post_id = $
		callAjax({url:url}, function(response){
			$(document).find('.modal-body').html(response);
			console.log(response);
			// debugger;
		});
	});

	function callAjax(options, callback = ''){
		let url = options.url?options.url:'';
		let method = options.method?options.method:'GET';
		let data = options.data?options.data:{};
		
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
</script>
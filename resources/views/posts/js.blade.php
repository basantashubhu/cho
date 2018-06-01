
<script>
	$(document).ready(function(){
		$('#categories').find('div').each(function(){
			var cat_val = $(this);
			$(document).find('#category').find('option').each(function(){
				let opt = $(this);
				if(cat_val.attr('data-value') == opt.val()){
					opt.text(cat_val.text());
				}
			});
		});
	});
</script>
<script>
	$(document).ready(function(){
		$('form').on('submit', function(event){
			event.preventDefault();
		});
		var data= {};
		$(document).find('form')
		.find('input, select, input[type="date"]')
		.each(function(){
			$(this).on('change', function(event){
				// event.preventDefault();
				data[$(this).attr('name')] = $(this).val();
				// console.log(data);
				$('#table-container-posts').html('');
				searchAjax(data, function(response){
					$('#table-container-posts').html(response);
				});
			})
		});
	});
	function searchAjax(options, callback = ''){
		var data = {};
		data.search_box = options.search_box?options.search_box:'';
		data.category = options.category?options.category:'';
		data.rating = options.rating?options.rating:'';
		data.start_date = options.start_date?options.start_date:'';
		data.end_date = options.end_date?options.end_date:'';
		data.country = options.country?options.country:'';
		data.feature_bonus = options.feature_bonus?options.feature_bonus:'';
		data.feature_bounty = options.feature_bounty?options.feature_bounty:'';
		data.feature_team = options.feature_team?options.feature_team:'';
		data.feature_rating = options.feature_rating?options.feature_rating:'';
		let url = 'search';
		let method= 'GET';
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
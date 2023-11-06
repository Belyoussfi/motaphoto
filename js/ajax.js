jQuery( document ).ready( function($){

	var posts_per_page = 4; 

	function cxc_load_more_posts( cxc_this, pageNumber ){
		var page_count = 0;
		var str = '&pageNumber=' + pageNumber + '&posts_per_page=' + posts_per_page + '&action=codex_load_more_post_ajax';

		if( !cxc_this.hasClass('cxc-disabled') ) {

			jQuery.ajax({
				type: "POST",
				dataType: "html",
				url: ajax_posts.ajaxurl,
				data: str,
				success: function(response){
					if( response ){
						cxc_this.removeClass('cxc-active');
						var json_html = JSON.parse(response); 
						if( json_html.html.length ){
							page_count = parseInt(pageNumber) + parseInt(1);
							cxc_this.attr('data-page', page_count);
                            cxc_this.parents('.cxc-post-wrapper').find(".cxc-posts").append(json_html.html);
						} else {
							cxc_this.attr("disabled",true);
							cxc_this.addClass('cxc-disabled');
						}
					}
				}
			});
		}
		return false;
	}

	jQuery(document).on("click",".codex-load-more",function(){ 
		var cxc_this = jQuery(this);
		var paged = cxc_this.attr('data-page');	
		cxc_this.addClass('cxc-active');
		cxc_load_more_posts( cxc_this, paged );
        cxc_this.insertAfter('.cxc-posts'); // Move the 'Load More' button to the end of the the newly added posts.
	});

});


// FILTRES TEST 1
jQuery(function($){
	$('#filter').submit(function(){
		var filter = $('#filter');
		$.ajax({
			url:filter.attr('action'),
			data:filter.serialize(), // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				filter.find('button').text('Processing...'); // changing the button label
			},
			success:function(data){
				filter.find('button').text('Apply filter'); // changing the button label back
				$('#response').html(data); // insert data
			}
		});
		return false;
	});
});


// TEST FILTRES 2
jQuery(function($){
	$('.js-filter select').on('change', function () {
		let cat = $('#cat').val()
		let format = $('#format').val()
		let date = $('#date').val();
		var data = {
			action: 'filter_posts',
			cat: cat,
			format: format,
			date: date,
		}
		$.ajax({
			url: ajax_posts.ajaxurl,
			type: 'POST',
			data: data,
			success: function(response) {
				$('.cxc-posts').html(response);

			}
		})

	});
});



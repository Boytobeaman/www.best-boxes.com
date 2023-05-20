<?php
add_action( 'wp_footer', function () { ?>
<div id="contactUs" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Request a Free Quote</h4>
			</div>
			<div class="modal-body">
				<?php echo do_shortcode( '[contact-form-7 id="244" title="Contact form 1"]' ); ?>
			</div>
		</div>
	</div>
</div>
	
<script>

	/* write your JavaScript code here */

	
jQuery(document).ready(function( $ ){

	$(document).on("click",".product a.woocommerce-LoopProduct-link,.product-inquiry", function(e){
		if($(e.target).hasClass("product-model")){
			e.preventDefault();
		}else if($(e.target).hasClass("product-cat-inquiry")){
			e.preventDefault();
			var productModel = $(this).find(".product-model").html();
			if(!productModel){
				productModel = $(this).closest("li.product").find(".woo-acf-metas .model .item-value").html()
			}
			$("#ProductModel").val(productModel);
			$("#contactUs").modal();
		}else if($(e.target).hasClass("product-inquiry")){
			$("#ProductModel").val($('.product-model .value').html());
			$("#contactUs").modal();
		}
	})
	$("#contactUs").off().on('show.bs.modal', function () {
		var url = window.document.location.href;
		$('#productURL').val(url);
	})
});
</script>
<?php } );

?>

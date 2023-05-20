<?php
/**
 * 模板兔添加
 * 前端 产品详情页面展示 高级自定义字段
 */
add_action( 'woocommerce_single_product_summary', function () {
	$productlenght = get_field('productlenght');
$productwidth = get_field('productwidth');
$productheight = get_field('productheight');
$productinnerlength = get_field('productinnerlength');
$productinnerwidth = get_field('productinnerwidth');
$productinnerheight = get_field('productinnerheight');
$productweight = get_field('productweight');
$productvolumn = get_field('productvolumn');
$productmodel = get_field('productmodel');
$productfoldedheight = get_field('productfoldedheight');
$staticload = get_field('staticload');
$dynamicload = get_field('dynamicload');
$mmtoinch = 0.03937;
$kgtolbs = 2.20462262;
$ltogal = 0.26417;
if (!$productmodel) {
    $productmodel = "N/A";
}

if (!$productfoldedheight || $productfoldedheight == NULL || $productfoldedheight == "NULL") {
    $displayFoldedHeight = "none";
}else{
	$displayFoldedHeight = "";
}

if (!$productinnerlength) {
    $displayInternalDimensions = "none";
}else{
	$displayInternalDimensions = "";
}

if (!$staticload) {
    $displayStaticLoad = "none";
}else{
	$displayStaticLoad = "";
}

if (!$dynamicload) {
    $displayDynamicLoad = "none";
}else{
	$displayDynamicLoad = "";
}

if (!$productvolumn) {
    $displayVolumn = "none";
}else{
	$displayVolumn = "";
}

echo ' 
	<table class="table table-hover table-bordered single-product-attr">
		 <caption><h3 class="pull-left mt-0">Specifications</h3>
		 		<button class="btn btn-danger pull-right inquiry-btn single-product product-inquiry">Request a Free Quote</button>
 		</caption>
	    <tbody>
	    	<tr>
			<td><h4>Product Model</h4></td>
			<td class="product-model">
				<span class="mm pull-left value">'. $productmodel .'</span>
			</td>
	    	</tr>
	      <tr>
	      	<td><h4>External Dimensions</h4></td>
	      	<td class="external-dimension">
	      		<span class="mm pull-left value">' .$productlenght .'X'. $productwidth  .'X'. $productheight . '</span>
	      		<span class="pull-right">mm</span>
	      		<hr>      	
	      		<span class="inch pull-left value">'. round($productlenght*$mmtoinch,2) .'X'.round($productwidth*$mmtoinch,2) .'X'. round($productheight*$mmtoinch,2) .'</span>
	      		<span class="pull-right">in</span>
	      	</td>
	  	  </tr>
	      <tr style="display:'. $displayInternalDimensions .'">
	        <td><h4>Internal Dimensions</h4></td>
	        <td class="internal-dimension">
	        	<span class="mm pull-left value">
	        		' . $productinnerlength .'X'. $productinnerwidth .'X'. $productinnerheight . '
	        	</span>
	        	<span class="pull-right">mm</span>
	        	<hr>	        
	        	<span class="inch pull-left value">
	        		'. round($productinnerlength*$mmtoinch,2) .'X'. round($productinnerwidth*$mmtoinch,2) .'X'. round($productinnerheight*$mmtoinch,2) .'
	        	</span>
	        	<span class="pull-right">in</span>
	        </td>
	       
	      </tr>
	      <tr style="display:'. $displayFoldedHeight .'">
	      	<td><h4>Folded Height</h4></td>
	      	<td>
	      		<span class="folded-height pull-left value">
		        		'. $productfoldedheight .'
	        	</span>
	        	<span class="pull-right">mm</span>
	        	<hr>	        
	        	<span class="in pull-left value">
	        		'. round($productfoldedheight*$mmtoinch,2) .'
	        	</span>
	        	<span class="pull-right">in</span>
        	</td>
	      </tr>
	      <tr style="display:'. $displayStaticLoad .'">
	      	<td><h4>Static Load Weight</h4></td>
	      	<td>
	      		<span class="folded-height pull-left value">
		        		'. $staticload .'
	        	</span>
	        	<span class="pull-right">T</span>
        	</td>
	      </tr>
	      <tr style="display:'. $displayDynamicLoad .'">
	      	<td><h4>Dynamic Load Weight</h4></td>
	      	<td>
	      		<span class="folded-height pull-left value">
		        		'. $dynamicload .'
	        	</span>
	        	<span class="pull-right">T</span>
        	</td>
	      </tr>
	      <tr>
	        <td><h4>Weight</h4></td>
	        <td class="internal-dimension">
	        	<span class="kg pull-left value">
	        		'. $productweight .'
	        	</span>
	        	<span class="pull-right">kg</span>
	        	<hr>	        
	        	<span class="lbs pull-left value">
	        		'. round($productweight*$kgtolbs,2) .'
	        	</span>
	        	<span class="pull-right">lbs</span>
	        </td>
	       
	      </tr>
	      <tr style="display:'. $displayVolumn .'">
	        <td><h4>Volumn</h4></td>
	        <td class="internal-dimension">
	        	<span class="liters pull-left value">
	        		'. $productvolumn .'
	        	</span>
	        	<span class="pull-right">Liters</span>
	        	<hr>	        
	        	<span class="gallon pull-left value">
	        		'. round($productvolumn*$ltogal,2) .'
	        	</span>
	        	<span class="pull-right">Us gallon</span>
	        </td>
	       
	      </tr>
	    </tbody>
  	</table>';

});


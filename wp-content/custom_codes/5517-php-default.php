<?php
// 去掉产品分类页面 每个产品的 read more 按钮

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');



// 每个产品循环，紧跟产品的<a>标签后面
add_action( 'woocommerce_before_shop_loop_item', function () {
	global $post;

	$terms = get_the_terms($post->ID,'product_cat');
	// 获取产品 分类名
	foreach ($terms  as $term  ) {                    
		$product_cat_id = $term->term_id;              
		$product_cat_name = $term->name;            

		break;

	}

	if($product_cat_name !== "new vertical cat name"){
		// 去掉 产品分类页面 每个产品的 title,默认是h2 标签
		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title');
		
		echo '<div class="product-wrap">';
	}
});


/**
 * 模板兔添加
 * 前端 产品分类页面展示 高级自定义字段
 * woocommerce_after_shop_loop_item 默认产品链接结束标签</a> 后面
 * woocommerce_after_shop_loop_item_title 默认产品链接结束标签</a> 前面面
 */
add_action( 'woocommerce_after_shop_loop_item_title', function () {

     global $post;

	$terms = get_the_terms($post->ID,'product_cat');
	// 获取产品 分类名
	foreach ($terms  as $term  ) {                    
		$product_cat_id = $term->term_id;              
		$product_cat_name = $term->name;            

		break;

	}
	// 老的横向排版，固定方式展示箱子长宽高等属性
	if($product_cat_name !== "new vertical cat name"){
		
		$productlenght = get_field('productlenght');
		$productwidth = get_field('productwidth');
		$productheight = get_field('productheight');
		$productinnerlength = get_field('productinnerlength');
		$productinnerwidth = get_field('productinnerwidth');
		$productinnerheight = get_field('productinnerheight');
		$productweight = get_field('productweight');
		$productvolumn = get_field('productvolumn');
		$productmodel = get_field('productmodel');
		$mmtoinch = 0.03937;
		$kgtolbs = 2.20462262;
		$ltogal = 0.26417;
		if (!$productmodel) {
		    $productmodel = "N/A";
		}
		if (!$productlenght) {
		    $productlenght = 0;
		}
		if (!$productinnerlength) {
		    $productinnerlength = 0;
		}
		if (!$productinnerwidth) {
		    $productinnerwidth = 0;
		}
		if (!$productinnerheight) {
		    $productinnerheight = 0;
		}
		if (!$productweight) {
		    $productweight = 0;
		}
		if (!$productvolumn) {
		    $productvolumn = 0;
		}
		echo '	<div class="product-right"> 
					<div class="row no-gutters"> 
						<div class="product-name">
							<div class="col-sm-12">
								<h2 class="product-title pl-1" title="'. get_the_title() .'">'. get_the_title() .'</h2>
								<span class="btn btn-danger pull-right product-cat-inquiry">Inquiry</span>
								<span class="btn btn-info pull-right product-model mr-1">'. $productmodel .'</span>
							</div>
						</div>
						<div class="product-attributes">
							<div class="col-xs-6 img-thrumbnail-xs visible-xs">'
							.woocommerce_get_product_thumbnail().
							'</div>
							<div class="col-sm-3 col-xs-6 br-2-white external-dimension">
								<div class="table-head bb-2-white">External Dimensions</div>
								<div class="product-val-mm"><span class="value">' .$productlenght .'X'. $productwidth  .'X'. $productheight . '</span> <span class="pull-right">mm</span></div>
								<div class="product-val-inch"><span class="value"> '. round($productlenght*$mmtoinch,2) .'X'.round($productwidth*$mmtoinch,2) .'X'. round($productheight*$mmtoinch,2) .'</span> <span class="pull-right">in</span></div>
							</div>
							<div class="col-sm-3 col-xs-6 br-2-white internal-dimension hidden-xs">
								<div class="table-head bb-2-white">Internal Dimensions</div>
								<div class="product-val-mm"><span class="value">'. $productinnerlength .'X'. $productinnerwidth .'X'. $productinnerheight .'</span> <span class="pull-right">mm</span></div>
								<div class="product-val-inch"><span class="value">'. round($productinnerlength*$mmtoinch,2) .'X'. round($productinnerwidth*$mmtoinch,2) .'X'. round($productinnerheight*$mmtoinch,2) .'</span> <span class="pull-right">in</span></div>
							</div>
							<div class="col-sm-3 col-xs-6 br-2-white weight hidden-xs">
								<div class="table-head bb-2-white">Weight</div>
								<div class="product-val-mm"><span class="value">'. $productweight . '</span> <span class="pull-right">kg</span></div>
								<div class="product-val-inch"><span class="value">'. round($productweight*$kgtolbs,2) .'</span> <span class="pull-right">lbs</span></div>
							</div>
							<div class="col-sm-3 col-xs-6 volumn hidden-xs">
								<div class="table-head bb-2-white">Volume</div>
								<div class="product-val-mm"><span class="value">'. $productvolumn . '</span> <span class="pull-right">Liters</span></div>
								<div class="product-val-inch"><span class="value">'. round($productvolumn*$ltogal,2) .'</span> <span class="pull-right">Us gallon</span></div>
							</div>
						</div>
					</div>
				</div>';
		echo '</div>';// <div class="product-wrap"> 的结尾
		
	}else{
	// 新的根据 产品分类页面属性配置 竖向展示产品属性
		echo '<div class="inquiry-btn-wrap"><button title="'. get_the_title() .'" class="inquiry-btn product-cat-inquiry product-inquiry btn btn-danger">Inquiry</button></div>';
		if($terms){

			$acf_metas = get_term_meta($terms[0]->term_id,'acf_metas',true);

			if($acf_metas){
				$arr = json_decode($acf_metas);
				$attr_length = count($arr);
				if($attr_length > 0){
				  echo '<div class="woo-acf-metas">';
				  foreach ($arr as $value) {
						$className=$value->class;
						if($className){
							echo '<div class="acf-item ' . $className .'">';
						}else{
							echo '<div class="acf-item">';
						}

					  echo '<div class="item-key">';
					  echo $value->key_content;
					  echo '</div>';

					  $value_content = $value->value_content;

					  $pattern='/_(.*?)_/s';
					  preg_match_all($pattern, $value_content, $matches);
					  $variable_count = count($matches[1]);
					  for ($i = 0; $i < $variable_count; $i++) {
						$trimed_str = $matches[1][$i];
						$original_str = $matches[0][$i];
						$new_str = get_post_meta($post->ID,$trimed_str,true);
						$value_content = str_replace($original_str,$new_str,$value_content);
					  }
					  echo '<div class="item-value">';
					  echo $value_content;
					  echo '</div>';

					  echo '</div>';
				  }
				  echo '</div>';
				}

			}

		}
	}

	
});

?>
<?php
/**
 * 模板兔添加
 * 后台管理页面 新增产品分类时 增加 自定义表单
 */
add_action( 'product_cat_add_form_fields', function () {

	echo '<div class="form-field">  
            <label for="acf_metas">ACF metas</label>  
            <textarea name="acf_metas" id="acf_metas" type="text" rows="4"></textarea>
            <p>例如: [
							{
							 "key_content": "Model",
							 "value_content": "_productmodel_",
							 "class": "model"
							},
							{
							 "key_content": "Dimension",
							 "value_content": "_productlenght_ * _productwidth_ * _productheight_"
							}
						]</p>  
          </div>';
});

/**
 * 模板兔添加
 * 后台管理页面 新增产品分类时 保存时更新acf_metas
 */
add_action( 'created_product_cat', function ($term_id) {
	update_term_meta($term_id,'acf_metas',$_POST['acf_metas']);
});
?>
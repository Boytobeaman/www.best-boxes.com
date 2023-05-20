<?php
/**
 * 模板兔添加
 * 后台管理页面 编辑产品分类时 渲染出 acf_metas 自定义表单
 */
add_action( 'product_cat_edit_form_fields', function ($tag) {

	echo '<tr class="form-field">  
            <th scope="row"><label for="acf_metas">ACF metas</label></th>  
            <td>  
                <textarea name="acf_metas" id="acf_metas" type="text" rows="4">';  

                echo get_term_meta($tag->term_id,'acf_metas',true).'</textarea><br>  
                <code class="cat-color">
                	[
										{
										 "key_content": "Model",
										 "value_content": "_productmodel_"
										},
										{
										 "key_content": "Dimension",
										 "value_content": "_productlenght_ * _productwidth_ * _productheight_"
										}
									]
                </code>  
            </td>  
        </tr>'; 
});

/**
 * 模板兔添加
 * 后台管理页面 编辑产品分类时 保存时更新acf_metas
 */
add_action( 'edited_product_cat', function ($term_id) {
	update_term_meta($term_id,'acf_metas',$_POST['acf_metas']);
});

?>
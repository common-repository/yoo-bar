<?php
$yoobar_amineditorcolor = get_post_meta($post_id, "yoobar_amineditorcolor", true);
$yoo_type_posts = get_post_meta($post_id, "yoo_type_posts", true);
$yoo_bar_wrapper_height = get_post_meta($post_id, "yoo_bar_wrapper_height", true);
$yoo_bar_back_image = get_post_meta($post_id, "yoo_bar_back_image", true);
$yoo_bar_slideanimation = get_post_meta($post_id, "yoo_bar_slideanimation", true);
$yoo_bar_back_position = get_post_meta($post_id, "yoo_bar_back_position", true);
$yoo_bar_back_repeat = get_post_meta($post_id, "yoo_bar_back_repeat", true);
$yoo_bar_back_size = get_post_meta($post_id, "yoo_bar_back_size", true);

$yoo_type_pages = get_post_meta($post_id, "yoo_type_pages", true);
$ybar_clum_position = get_post_meta($post_id, "ybar_clum_position", true);
$yoo_type_products = get_post_meta($post_id, "yoo_type_products", true);
$yoo_type_customs = get_post_meta($post_id, "yoo_type_customs", true);
$yoo_main_title = get_post_meta($post_id, "yoo_main_title", true);

$yoo_slct_post_types = get_post_meta($post_id, "yoo_slct_post_types", true);
$display_shop_page = get_post_meta($post_id, "display_shop_page", true);
$display_frontpage = get_post_meta($post_id, 'display_frontpage', true);

$display_entire_site = get_post_meta($post_id, 'display_entire_site', true);
$yoo_btn_backhround = get_post_meta($post_id, "yoo_btn_backhround", true);
$yoobtn_txt = get_post_meta($post_id, "yoobtn_txt", true);
$yoobtn_link = get_post_meta($post_id, "yoobtn_link", true);
$yoo_btn_txt_cl = get_post_meta($post_id, "yoo_btn_txt_cl", true);

$yoo_bar_back = get_post_meta($post_id, "yoo_bar_back", true);

if (empty($yoo_bar_back))
{
    $yoo_bar_back = '#f5f5f5';
}
$yoo_close_back = get_post_meta($post_id, "yoo_close-back", true);
$to_btn_round = get_post_meta($post_id, "to_btn_round", true);
$yoo_remove_close_btn = get_post_meta($post_id, "yoo_remove_close_btn", true);

$ybariconLink = YOO_BAR_URL . '/assets/img/color/';
$ybar_facebook_link = get_post_meta($post_id, "ybar_facebook_link", true);
$ybar_custom_color = get_post_meta($post_id, "ybar_custom_color", true);
$ybar_custom_color_choos = get_post_meta($post_id, "ybar_custom_color_choos", true);
$ybar_social_label = get_post_meta($post_id, "ybar_social_label", true);

$yoobar_addres_metafield = get_post_meta($post_id, "yoobar_addres_metafield", true);
$yoobar_email_fiedl = get_post_meta($post_id, "yoobar_email_fiedl", true);
$yoobar_phnumberfiedl = get_post_meta($post_id, "yoobar_phnumberfiedl", true);
$yoo_adres_txt_clr = get_post_meta($post_id, "yoo_adres_txt_clr", true);
$yoobar_displayaddreessicon = get_post_meta($post_id, "yoobar_displayaddreessicon", true);
$yoobar_addres_icon_st = get_post_meta($post_id, "yoobar_addres_icon_st", true);
$yoo_adres_icon_clr = get_post_meta($post_id, "yoo_adres_icon_clr", true);

$yoobar_serach_placehol = get_post_meta($post_id, "yoobar_serach_placehol", true);
$yoobar_serach_color = get_post_meta($post_id, "yoobar_serach_color", true);
$yoobar_serach_btncolor = get_post_meta($post_id, "yoobar_serach_btncolor", true);
$yoobar_serach_boxdesign = get_post_meta($post_id, "yoobar_serach_boxdesign", true);
$yoobar_serach_btntext = get_post_meta($post_id, "yoobar_serach_btntext", true);
$yoobar_serach_btndesign = get_post_meta($post_id, "yoobar_serach_btndesign", true);
$yoobar_serach_btnbg = get_post_meta($post_id, "yoobar_serach_btnbg", true);
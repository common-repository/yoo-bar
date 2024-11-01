<?php


$top_button_btn = '';
if (!empty($yoobtn_txt))
{
    $top_button_btn = '<div class="yoobar_button"><a style="background:' . $yoo_btn_backhround . ';border-radius:' . $to_btn_round . 'px;color:' . $yoo_btn_txt_cl . '" href="' . esc_url($yoobtn_link) . '" class="ybr-ybar-button-text ybr-ybar-padding-text">' . esc_html($yoobtn_txt) . '</a></div><style>div#YooFiledData{ background:#dffbbf;}</style>';
}
$yoobar_amineditorcolor = get_post_meta($post_id, "yoobar_amineditorcolor", true);
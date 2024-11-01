<?php


	$ybariconLink =  YOO_BAR_URL . 'assets/public/img/color/';

$ybar_facebook_links = '';
$ybar_twitter_links = '';

if (!empty($ybar_facebook_link))
{
$ybar_facebook_links = '<li><a href="' . $ybar_facebook_link . '" title="facebook"> <img src="' . $ybariconLink . 'facebook.svg' . '" alt="facebook"></a></li>';

}
$ybar_twitter_link = get_post_meta($post_id, "ybar_twitter_link", true);

if (!empty($ybar_twitter_link))
{

$ybar_twitter_links = '<li><a href="' . $ybar_twitter_link . '" title="twitter"> <img src="' . $ybariconLink . 'twitter.svg' . '" alt="twitter"></a></li>';

}
$ybar_linkdin_link = get_post_meta($post_id, "ybar_linkdin_link", true);

if (!empty($ybar_linkdin_link))
{

$ybar_linkdin_link = '<li><a href="' . $ybar_linkdin_link . '" title="linkedin"> <img src="' . $ybariconLink . 'linkedin.svg' . '" alt="linkedin"></a></li>';

}

$ybar_youtube_link = get_post_meta($post_id, "ybar_youtube_link", true);

if (!empty($ybar_youtube_link))
{



$ybar_youtube_link = '<li><a href="' . $ybar_youtube_link . '" title="Youtube"> <img src="' . $ybariconLink . 'ytube.svg' . '" alt="youtube"></a></li>';

}

$ybar_pinterest_link = get_post_meta($post_id, "ybar_pinterest_link", true);

if (!empty($ybar_pinterest_link))
{

$ybar_pinterest_link = '<li><a href="' . $ybar_pinterest_link . '" title="pinterest"> <img src="' . $ybariconLink . 'pinterest.svg' . '" alt="pinterest"></a></li>';


}
$ybar_instagram_link = get_post_meta($post_id, "ybar_instagram_link", true);

if (!empty($ybar_instagram_link))
{

$ybar_instagram_link = '<li><a href="' . $ybar_instagram_link . '" title="instagram"> <img src="' . $ybariconLink . 'instagram.svg' . '" alt="instagram"></a></li>';
}
$ybar_tumblr_link = get_post_meta($post_id, "ybar_tumblr_link", true);

if (!empty($ybar_tumblr_link))
{

$ybar_tumblr_link = '<li><a href="' . $ybar_tumblr_link . '" title="tumbler"> <img src="' . $ybariconLink . 'tumbler.svg' . '" alt="tumbler"></a></li>';

}
$ybar_flickr_link = get_post_meta($post_id, "ybar_flickr_link", true);

if (!empty($ybar_flickr_link))
{

$ybar_flickr_link = '<li><a href="' . $ybar_flickr_link . '" title="flickr_"> <img src="' . $ybariconLink . 'flickr.svg' . '" alt="flickr"></a></li>';
}
$ybar_reddit_link = get_post_meta($post_id, "ybar_reddit_link", true);

if (!empty($ybar_reddit_link))
{

$ybar_reddit_link = '<li><a href="' . $ybar_reddit_link . '" title="reddit"> <img src="' . $ybariconLink . 'reddit.svg' . '" alt="reddit"></a></li>';
}
$ybar_StumbleUpon_link = get_post_meta($post_id, "ybar_StumbleUpon_link", true);

if (!empty($ybar_StumbleUpon_link))
{

$ybar_StumbleUpon_link = '<li><a href="' . $ybar_StumbleUpon_link . '" title="StumbleUpon"> <img src="' . $ybariconLink . 'StumbleUpon.svg' . '" alt="StumbleUpon"></a></li>';


}
$ybar_vk_link = get_post_meta($post_id, "ybar_vk_link", true);

if (!empty($ybar_vk_link))
{
$ybar_vk_link = '<li><a href="' . $ybar_vk_link . '" title="vk"> <img src="' . $ybariconLink . 'vkround.svg' . '" alt="vk"></a></li>';

}
$ybar_social_size = get_post_meta($post_id, "ybar_social_size", true);
$ybar_social_label_clr = get_post_meta($post_id, "ybar_social_label_clr", true);
$ybar_social_label_bg = get_post_meta($post_id, "ybar_social_label_bg", true);
if(!empty($ybar_social_label)){
$ybar_social_label_wrap ='<li class="ybarfowlous" style="color:'.$ybar_social_label_clr.';background:'.$ybar_social_label_bg.'">'.$ybar_social_label.'</li>  ';
}else{
$ybar_social_label_wrap ='';  
}

$ybarsocial = '<ul class="yoobar_social_color">
' . $ybar_social_label_wrap . '
' . $ybar_facebook_links . '
' . $ybar_twitter_links . '
' . $ybar_linkdin_link . '
' . $ybar_youtube_link . '
' . $ybar_pinterest_link . '
' . $ybar_instagram_link . '
' . $ybar_tumblr_link . '
' . $ybar_flickr_link . '
' . $ybar_reddit_link . '
' . $ybar_StumbleUpon_link . '
' . $ybar_vk_link . '
</ul><style>ul.yoobar_social_color li {width:' . $ybar_social_size . 'px;}ul.yoobar_social_color li a svg{fill:'.$ybar_custom_color_choos.'}div#YooSocialLink{ background:#dffbbf;}</style>';

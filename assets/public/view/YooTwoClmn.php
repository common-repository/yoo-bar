<?php

if(!$yoo_bar_slideanimation){
$yooslideUp = 'yoobarTopperhold';
}else{
 $yooslideUp= '';   
}

$column_left = get_post_meta($post_id, "column_left", true);

$column_right = get_post_meta($post_id, "column_right", true);

if ($column_left === 'Static Text')
{
    $column_left = '<div class="ybr-ybar-text" style= "color:' . $yoobar_amineditorcolor . '">' . wp_kses_post($yoo_main_title) . '</div><style>div#Maintitle{ background:#dffbbf;}</style>';
}
if ($column_left === 'Static Text and Link Button')
{
    $column_left = '<div class="ybr-ybar-text" style= "color:' . $yoobar_amineditorcolor . '">' . wp_kses_post($yoo_main_title) . $top_button_btn . '</div><style>div#Maintitle,#YooFiledData{ background:#dffbbf;}</style>';
}
if ($column_left === 'Link Button')
{
    $column_left = $top_button_btn;
}
if ($column_left === 'Social Icon')
{
    $column_left = $ybarsocial;
}

if ($column_left === 'Address Bar')
{
    $column_left = $yoo_address_bar;
}
if ($column_left === 'Search')
{
    $column_left = $yoo_Search_bar;
}

if ($column_right === 'Search')
{
    $column_right = $yoo_Search_bar;
}

if ($column_right === 'Address Bar')
{
    $column_right = $yoo_address_bar;
}
if ($column_right === 'Static Text')
{
    $column_right = '<div class="ybr-ybar-text" style= "color:' . $yoobar_amineditorcolor . '">' . wp_kses_post($yoo_main_title) . '</div>';
}
if ($column_right === 'Static Text and Link Button')
{
    $column_right = '<div class="ybr-ybar-text" style= "color:' . $yoobar_amineditorcolor . '">' . wp_kses_post($yoo_main_title) . $top_button_btn . '</div>';
}
if ($column_right === 'Link Button')
{
    $column_right = $top_button_btn;
}
if ($column_right === 'Social Icon')
{
    $column_right = $ybarsocial;
}

$ybarnoclass_right = '';
$ybarnoclass_left = '';
$ybarnoclass_right_row = '';
if ($column_right === 'None')
{
    $column_right = '';
    $ybarnoclass_right = 'noyooclass';
    $ybarnoclass_right_row = 'yoo_row_class';
}
if ($column_left === 'None')
{
    $column_left = '';
    $ybarnoclass_left = 'noyooclass';
    $ybarnoclass_right_row = 'yoo_row_class';
}

if ($column_right === 'Typed Animation')
{
    $column_right = $yoo_typed_animation;
}
if ($column_right === 'CountDown and Button')
{
    $column_right = '';
}

if ($column_left === 'CountDown and Button')
{
    $column_left = '';
}
if ($column_right === 'Text Slideshow and Button')
{
    $column_right = $yoo_txtslideshowbutton;
}

if ($column_left === 'Text Slideshow and Button')
{
    $column_left = $yoo_txtslideshowbutton;
}

$yoo_barcustom_css = get_post_meta($post_id, "yoo_barcustom_css", true);

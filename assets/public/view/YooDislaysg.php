<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Yoo_Bar
 * @subpackage Yoo_Bar
 * @author     Sharabindu <sharabindu86@gmail.com>
 */

if ($display_entire_site)
{

    echo $html;
}

if (class_exists("WooCommerce"))
{
    $ishome = is_shop();
}

if (class_exists("WooCommerce"))
{

    if ($display_shop_page && !$display_entire_site && !is_single() && is_shop())
    {

        echo $html;

    }

}

switch ($html)
{

    case ($display_frontpage && is_front_page() && !$display_entire_site):
        echo $html;
    break;
    case ($yoo_type_pages && is_page($yoo_type_pages) && !$display_entire_site):
        echo $html;
    break;
    case ($yoo_type_posts && is_single($yoo_type_posts) && !$display_entire_site):
        echo $html;

    break;
    case ($yoo_type_customs && is_single($yoo_type_customs) && !$display_entire_site):
        echo $html;
    break;
    case ($yoo_type_products && is_single($yoo_type_products) && !$display_entire_site):
        echo $html;

    break;
    case ($yoo_slct_post_types && is_singular($yoo_slct_post_types) && !$display_entire_site):
        echo $html;

    break;

    default:
        echo "";
    break;
}
<?php
/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      2.0.6
 * @package    Yoo_Bar
 * @subpackage Yoo_Bar/includes
 * @author     Sharabindu <plugin@sharabindu.com>
 */
class YooBarDisplayData
{

    public function __construct()
    {

        add_action('admin_menu', array(
            $this,
            'yoobar_posttype_metas'
        ));
        add_action('save_post', array(
            $this,
            'yoobar_posttype_save_metas'
        ) , 10, 2);
    }

    public function yoobar_posttype_metas()
    {
        add_meta_box('yoo_type', 'Location Settings', array(
            $this,
            'yoobar_posttype_select_metas'
        ) , 'yoo_bar', 'side', 'default');
    }

    public function yoobar_posttype_select_metas($post_object)
    {

        $appended_posts = get_post_meta($post_object->ID, 'yoo_type_posts', true);
        $appended_pages = get_post_meta($post_object->ID, 'yoo_type_pages', true);
        $appended_products = get_post_meta($post_object->ID, 'yoo_type_products', true);
        $appended_customs = get_post_meta($post_object->ID, 'yoo_type_customs', true);
        $appended_slct_post_types = get_post_meta($post_object->ID, 'yoo_slct_post_types', true);

        $display_entire_site = get_post_meta($post_object->ID, 'display_entire_site', true);

        $display_shop_page = get_post_meta($post_object->ID, 'display_shop_page', true);
        $display_frontpage = get_post_meta($post_object->ID, 'display_frontpage', true);

        $metafrontpage = $display_frontpage === '1' ? 'checked' : '';
        $metavabuleshp = $display_shop_page === '1' ? 'checked' : '';

        $metavabule = $display_entire_site === '1' ? 'checked' : '';

        $html = '<ul id="yoo_display_wrapper " class="spcifiwrapperfli"><li id="yoo_display_wrapper_bold"><em>Click on the switcher to display the specified location</em><table class="yoo-table_hg">';

             $html .= '<tr><th scope="row">
        <strong><label for="display_entire_site"> Entire Site:</label></strong></th><td><div class="wp-picker-container"><input type="checkbox" id="display_entire_site"  name="display_entire_site" class="yoobar_apple-switch" value="1" ' . $metavabule . '></div></td></tr>';

             $html .= '<tr><th scope="row">
        <strong><label for="display_frontpage"> Front Page:</label></strong></th><td><div class="wp-picker-container"><input type="checkbox" id="display_frontpage"  name="display_frontpage" class="yoobar_apple-switch" value="1" ' . $metafrontpage . '></div></td></tr>';
             $html .= '<tr><th scope="row">
        <strong><label for="display_shop_page"> Shop Page :</label></strong></th><td><div class="wp-picker-container"><input type="checkbox" id="display_shop_page"  name="display_shop_page" class="yoobar_apple-switch" value="1" ' . $metavabuleshp . '></div></td></tr></table>';

        $html .= '</table></li><li id="yoo_display_wrapper_bold"><em>Click the dropdown and select the specific post, page or post type where you want the Yoobar to appear <a class="metaProlink" href="https://yoobar.dipashi.com/docs/display-specific-place/" target="_blank">See Docs</a></em><table class="yoo-table_spcifi">';


        $yoo_type_posts = get_posts(array(
            'post_type' => 'post',
            'posts_per_page' => - 1,
        ));
        if ($yoo_type_posts)
        {
            $html .= '<tr><th scope="row">
    <strong><label for="yoo_type_posts"> Posts:</label></strong></th><td><div class="wp-picker-container"><select id="yoo_type_posts"  name="yoo_type_posts[]" multiple="multiple" class="yoo_display_option">';
            foreach ($yoo_type_posts as $yoo_type_post)
            {
                $selected = (is_array($appended_posts) && in_array($yoo_type_post->ID, $appended_posts)) ? ' selected="selected"' : '';
                $html .= '<option value="' . $yoo_type_post->ID . '"' . $selected . '>' . $yoo_type_post->post_title . '</option>';
            }
            $html .= '</select></div></td></tr>';
        }

        $pblog = get_option('page_for_posts');
        $pshop = get_option('woocommerce_shop_page_id');

        $yoo_type_pages = get_posts(array(
            'post_type' => 'page',
            'posts_per_page' => - 1,
            'post__not_in' => array(
                $pblog,
                $pshop
            )
        ));
        if ($yoo_type_pages)
        {
            $html .= '<tr><th scope="row"><strong>
  <label for="yoo_type_pages"> Pages:</label></strong></th><td><div class="wp-picker-container"><select id="yoo_type_pages" name="yoo_type_pages[]" multiple="multiple" class="yoo_display_option">';
            foreach ($yoo_type_pages as $yoo_type_page)
            {
                $selected = (is_array($appended_pages) && in_array($yoo_type_page->ID, $appended_pages)) ? ' selected="selected"' : '';
                $html .= '<option value="' . $yoo_type_page->ID . '"' . $selected . '>' . $yoo_type_page->post_title . '</option>';
            }
            $html .= '</select></div></td></tr>';

        }
        if (class_exists("WooCommerce"))
        {
            $yoo_type_products = get_posts(array(
                'post_type' => 'product',
                'posts_per_page' => - 1,
            ));
            if ($yoo_type_products)
            {
            $html .= '<tr><th scope="row"><strong><label for="yoo_type_products">Products:</label></strong></th><td><div class="wp-picker-container"><select id="yoo_type_products" name="yoo_type_products[]" multiple="multiple" class="yoo_display_option">';
                foreach ($yoo_type_products as $yoo_type_product)
                {
                    $selected = (is_array($appended_products) && in_array($yoo_type_product->ID, $appended_products)) ? ' selected="selected"' : '';
                    $html .= '<option value="' . $yoo_type_product->ID . '"' . $selected . '>' . $yoo_type_product->post_title . '</option>';
                }
                $html .= '</select></div></td></tr>';
            }
        }
        $excluded_posttypdes = array(
            'attachment',
            'revision',
            'nav_menu_item',
            'custom_css',
            'customize_changeset',
            'oembed_cache',
            'user_request',
            'wp_block',
            'scheduled-action',
            'product_variation',
            'shop_order',
            'shop_order_refund',
            'shop_coupon',
            'page',
            'product',
            'yoo_bar',
            'post'
        );

        $gdtypes = get_post_types();
        $cpost_types = array_diff($gdtypes, $excluded_posttypdes);
        if ($cpost_types)
        {

            $yoos_type_customs = get_posts(array(
                'post_type' => $cpost_types,
                'posts_per_page' => - 1,
            ));
        }
        else
        {
            $yoos_type_customs = null;
        }

        if (($yoos_type_customs))
        {
            $html .= '<tr><th scope="row"><strong><label for="yoo_type_customs">Custom Posts:</label></strong></th><td><div class="wp-picker-container"><select id="yoo_type_customs" name="yoo_type_customs[]" multiple="multiple" class="yoo_display_option">';

            foreach ($yoos_type_customs as $yoo_type_custom)
            {
                $selected = (is_array($appended_customs) && in_array($yoo_type_custom->ID, $appended_customs)) ? ' selected="selected"' : '';
                $html .= '<option value="' . $yoo_type_custom->ID . '"' . $selected . '>' . $yoo_type_custom->post_title . '</option>';
            }
            $html .= '</select></div></td></tr>';
        }
        $selct_posttypes = array(
            'attachment',
            'revision',
            'nav_menu_item',
            'custom_css',
            'customize_changeset',
            'oembed_cache',
            'user_request',
            'wp_block',
            'scheduled-action',
            'product_variation',
            'shop_order',
            'shop_order_refund',
            'shop_coupon',
            'yoo_bar'
        );

        $alltypes = get_post_types();
        $slct_post_types = array_diff($alltypes, $selct_posttypes);

        if ($slct_post_types)
        {
            $html .= '<tr><th scope="row"><strong><label for="yoo_slct_post_types">Post Types: </label></strong></th><td><div class="wp-picker-container"><select id="yoo_slct_post_types" name="yoo_slct_post_types[]" multiple="multiple" class="yoo_display_option">';
            foreach ($slct_post_types as $yoo_slct_post_type)
            {

                $post_type_title = get_post_type_object($yoo_slct_post_type);
                $selected = (is_array($appended_slct_post_types) && in_array($yoo_slct_post_type, $appended_slct_post_types)) ? ' selected="selected"' : '';
                $html .= '<option value="' . $yoo_slct_post_type . '" ' . $selected . '>' . $post_type_title
                    ->labels->name . '</option>';
            }
            $html .= '</select></div></td></tr>';
        }






        $html .= '</table></li><ul>';

        echo $html;
    }

    public function yoobar_posttype_save_metas($post_id, $post)
    {

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

        if ($post->post_type == 'yoo_bar')
        {
            if (isset($_POST['yoo_type_posts'])) update_post_meta($post_id, 'yoo_type_posts', sanitize_mime_type($_POST['yoo_type_posts']));
            else delete_post_meta($post_id, 'yoo_type_posts');

            if (isset($_POST['yoo_type_pages'])) update_post_meta($post_id, 'yoo_type_pages', sanitize_mime_type($_POST['yoo_type_pages']));
            else delete_post_meta($post_id, 'yoo_type_pages');
            if (isset($_POST['yoo_type_products'])) update_post_meta($post_id, 'yoo_type_products', sanitize_mime_type($_POST['yoo_type_products']));
            else delete_post_meta($post_id, 'yoo_type_products');
            if (isset($_POST['yoo_type_customs'])) update_post_meta($post_id, 'yoo_type_customs', sanitize_mime_type($_POST['yoo_type_customs']));
            else delete_post_meta($post_id, 'yoo_type_customs');

            if (isset($_POST['yoo_slct_post_types'])) update_post_meta($post_id, 'yoo_slct_post_types', sanitize_mime_type($_POST['yoo_slct_post_types']));
            else delete_post_meta($post_id, 'yoo_slct_post_types');

            if (isset($_POST['display_entire_site'])) update_post_meta($post_id, 'display_entire_site', sanitize_text_field($_POST['display_entire_site']));
            else delete_post_meta($post_id, 'display_entire_site');
            if (isset($_POST['display_shop_page'])) update_post_meta($post_id, 'display_shop_page', sanitize_text_field($_POST['display_shop_page']));
            else delete_post_meta($post_id, 'display_shop_page');
            if (isset($_POST['display_frontpage'])) update_post_meta($post_id, 'display_frontpage', sanitize_text_field($_POST['display_frontpage']));
            else delete_post_meta($post_id, 'display_frontpage');

            return $post_id;
        }
    }

}

if (class_exists('YooBarDisplayData'))
{
    new YooBarDisplayData;
};


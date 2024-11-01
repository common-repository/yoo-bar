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
class Yoobar_settings_option
{

    public function __construct()
    {

        add_action('manage_yoo_bar_posts_custom_column', array(
            $this,
            'yoobar_columns_content'
        ) , 10, 3);
        add_action('manage_yoo_bar_posts_custom_column', array(
            $this,
            'yoobar_columns_location_name'
        ) , 10, 3);

        add_action('init', array(
            $this,
            'yoobar__post_type'
        ) , 0);


        add_filter('default_title', array(
            $this,'ybardefayult_title_filter'));

        add_filter('tiny_mce_before_init', array(
            $this,
            'yoobar_tiny_mce_font_size'
        ));

        add_filter('mce_buttons_2', array(
            $this,
            'yoobar_editro_font_buttons'
        ));

        add_filter( 'mce_buttons_2', array(
            $this,'tp_editor_background_color_button'), 1, 2 ); 


        add_action('admin_head', array(
            $this,'harun_mce_button'));

        add_filter('manage_yoo_bar_posts_columns', array(
            $this,
            'yoobar_columns_head'
        ) , 10);
        add_filter('manage_yoo_bar_posts_columns', array(
            $this,
            'yoobar_columns_location'
        ) , 10);


        add_filter( 'post_updated_messages', array(
            $this,'yoobar_update_messages' ));

    }

    public function ybardefayult_title_filter() {
        global $post_type;

        if ('yoo_bar' == $post_type){
            return 'default title #1';
        }
    }
    public function yoobar__post_type()
    {

        $labels = array(
            'name' => _x('Yoo Bars', 'Post Type General Name', 'yoo-bar') ,
            'singular_name' => _x('Yoo Bar', 'Post Type Singular Name', 'yoo-bar') ,
            'menu_name' => __('Yoo Bar', 'yoo-bar') ,
            'name_admin_bar' => __('Yoo Bar', 'yoo-bar') ,
            'parent_item_colon' => __('Parent Item:', 'yoo-bar') ,
            'all_items' => __('All Bars', 'yoo-bar') ,
            'add_new_item' => __('Add New Bar', 'yoo-bar') ,
            'add_new' => __('Add Bar', 'yoo-bar') ,
            'new_item' => __('New YooBar', 'yoo-bar') ,
            'edit_item' => __('Edit YooBar', 'yoo-bar') ,
            'update_item' => __('Update YooBar', 'yoo-bar') ,
            'view_item' => __('View YooBar', 'yoo-bar') ,
            'view_items' => __('View YooBars', 'yoo-bar') ,
            'search_items' => __('Search YooBar', 'yoo-bar') ,
            'not_found' => __('YooBar Not found', 'yoo-bar') ,
            'not_found_in_trash' => __('YooBar Not found in Trash', 'yoo-bar') ,

            'items_list' => __('YooBar list', 'yoo-bar') ,
            'items_list_navigation' => __('YooBar list navigation', 'yoo-bar') ,
            'filter_items_list' => __('YooBar Filter list', 'yoo-bar') ,
        );

        $args = array(
            'label' => __('Yoo Bar', 'yoo-bar') ,
            'description' => __('Post Type Description', 'yoo-bar') ,
            'labels' => $labels,
            'supports' => array(
                'title'
            ) ,
            'public' => false,
            'publicly_queryable' => false,

            'show_ui' => true, //
            'exclude_from_search' => true,
            'show_in_nav_menus' => false,
            'has_archive' => false,
            'rewrite' => false,
            'menu_icon' => YOO_BAR_URL . '/assets/admin/img/FGFGF.png',
        );

        register_post_type('yoo_bar', $args);

    }

    
    public function yoobar_update_messages( $messages ) {

        $post             = get_post();
        $post_type        = get_post_type( $post );
        $post_type_object = get_post_type_object( $post_type );
        
        $messages['yoo_bar'] = array(
            0  => '', 
            1  => __( 'Yoobar update.' ),
            2  => __( 'Yoobar field updated.' ),
            3  => __( 'Yoobar field deleted.'),
            4  => __( 'Yoobar updated.' ),
            5  => isset( $_GET['revision'] ) ? sprintf( __( 'Yoobar restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6  => __( 'Yoobar published.' ),
            7  => __( 'Yoobar saved.' ),
            8  => __( 'Yoobar submitted.' ),
            9  => sprintf(
                __( 'Yoobar scheduled for: <strong>%1$s</strong>.' ),
                date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) )
            ),
            10 => __( 'Yoobar draft updated.' )
        );

        return $messages;
    }


    public function yoobar_columns_head($defaults)
    {
        $defaults['yoo_shortcode'] = 'Shortcode';

        $yshrtco_clmn = array();
        $yshrtco = $defaults['yoo_shortcode'];
        unset($defaults['yoo_shortcode']);

        foreach ($defaults as $key => $value)
        {
            if ($key == 'date')
            {
                $yshrtco_clmn['yoo_shortcode'] = $yshrtco;
            }
            $yshrtco_clmn[$key] = $value;
        }

        return $yshrtco_clmn;

    }

    public function yoobar_columns_location($defaults)
    {
        $defaults['yoo_location'] = 'Location';

        $yshrtco_clmn = array();
        $yshrtco = $defaults['yoo_location'];
        unset($defaults['yoo_location']);

        foreach ($defaults as $key => $value)
        {
            if ($key == 'date')
            {
                $yshrtco_clmn['yoo_location'] = $yshrtco;
            }
            $yshrtco_clmn[$key] = $value;
        }

        return $yshrtco_clmn;

    }

    public function yoobar_columns_content($column_name, $post_ID)
    {

        if ($column_name == 'yoo_shortcode')
        { ?>
        <input type="text" class="yoo_bar_shrt" onfocus="this.select();"  value = '[yoobar_scode id ="<?php echo esc_attr($post_ID); ?>" title ="<?php echo esc_attr(get_the_title($post_ID)); ?>"]' readonly>
        
   <?php
        }

    }
    public function yoobar_columns_location_name($column_name, $post_ID)
    {

    if ($column_name == 'yoo_location')
    { 

    $appended_posts = get_post_meta($post_ID, 'yoo_type_posts', true);
    $appended_pages = get_post_meta($post_ID, 'yoo_type_pages', true);
    $appended_products = get_post_meta($post_ID, 'yoo_type_products', true);
    $appended_customs = get_post_meta($post_ID, 'yoo_type_customs', true);
    $appended_slct_post_types = get_post_meta($post_ID, 'yoo_slct_post_types', true);

    $display_entire_site = get_post_meta($post_ID, 'display_entire_site', true);

    $display_shop_page = get_post_meta($post_ID, 'display_shop_page', true);
    $display_frontpage = get_post_meta($post_ID, 'display_frontpage', true);

    if(!empty($appended_posts)) {
    echo '<strong>Posts:</strong> ';
    foreach ($appended_posts as $appended_postsvalue) {

    echo get_the_title($appended_postsvalue) .", ";
    }

    }
    if(!empty($appended_pages)) {
    echo '<strong>Pages:</strong> ';
    foreach ($appended_pages as $appended_pagesvalue) {

    echo get_the_title($appended_pagesvalue) .", ";
    }

    }
    if(!empty($appended_products)) {
    echo '<strong>Products:</strong> ';
    foreach ($appended_products as $appended_productsvalue) {

    echo get_the_title($appended_productsvalue) .", ";
    }

    }
    if(!empty($appended_customs)) {
    echo '<strong>Custom Posts:</strong> ';
    foreach ($appended_customs as $appended_customsvalue) {

    echo get_the_title($appended_customsvalue) .", ";
    }

    }
    if(!empty($appended_slct_post_types)) {
    echo '<strong>Post Types:</strong> ' ;
    foreach ($appended_slct_post_types as $value) {

    echo $value .", ";
    }

    }
    if(($display_entire_site)) {

    echo "Entire Site, ";
    }
    if(($display_shop_page)) {

    echo "Shop Page, ";
    }
    if(($display_frontpage)) {

    echo "Front Page, ";
    }

    }

    }

    function yoobar_editro_font_buttons($buttons)
    {

        array_unshift($buttons, 'fontselect');
        array_unshift($buttons, 'fontsizeselect');
        return $buttons;

    }

    public function yoobar_tiny_mce_font_size($initArray)
    {
        $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 60px 70px 80px 100px 130px 160px 200px";
        return $initArray;
    }



    function tp_editor_background_color_button( $buttons, $id )
    {
    
        array_splice( $buttons, 4, 0, 'backcolor' );

        return $buttons;
    }

    function harun_mce_button()
    {

        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
        {
            return;
        }
        if ('true' == get_user_option('rich_editing'))
        {
            add_filter('mce_external_plugins', array(
            $this, 'harun_tinymce_plugin'));
            add_filter('mce_buttons', array(
            $this,'harun_register_mce_button'));
        }
    }



    function harun_tinymce_plugin($plugin_array)
    {
        $plugin_array['harun_mce_button'] = YOO_BAR_URL . 'assets/admin/js/button.js';
        return $plugin_array;
    }


    function harun_register_mce_button($buttons)
    {
        array_push($buttons, 'harun_mce_button');
        return $buttons;
    }





}

if (class_exists('Yoobar_settings_option'))
{
    new Yoobar_settings_option;
};


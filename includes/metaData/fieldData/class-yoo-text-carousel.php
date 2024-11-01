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

class YoobarTextCarouselMetabox
{

    private $screens = array(
        'yoo_bar'
    );

    private $fields = array(
        array(
            'label' => 'Post Type',
            'id' => 'ybar_carousel_posttype',
            'type' => 'select',
            'class' => '',
        ) ,
        array(
            'label' => 'Posts Per Page',
            'id' => 'ybar_carousel_postperpage',
            'type' => 'text',
            'class' => '',
            'default' => '10'
        ),
        array(
            'label' => 'Slide per row',
            'id' => 'ybar_carousel_slideprow',
            'type' => 'text',
            'class' => '',
            'default' => '7'
        ),
        array(
            'label' => 'image size(optional)',
            'id' => 'ybar_carousel_imagesize',
            'type' => 'text',
            'class' => '',
            'default' => '100'
        ),
        array(
            'label' => 'Title Font(Px)',
            'id' => 'ybar_carousel_txtfont',
            'type' => 'text',
            'class' => '',
            'default' => '16'
        ) ,
        array(
            'label' => 'Title Color',
            'id' => 'ybar_carousel_txtcolor',
            'type' => 'text',
            'class' => 'yoobar_colors',
            'default' => '#000'
        ) ,
        array(
            'label' => 'Display Thumbnail',
            'id' => 'ybar_carousel_thunbnail',
            'type' => 'checkbox',
            'class' => '',
        ) ,
        array(
            'label' => 'Auto Play',
            'id' => 'ybar_carousel_autoplay',
            'type' => 'checkbox',
            'class' => '',
            'default' => '1'
        ) ,
        array(
            'label' => 'Show Nav?',
            'id' => 'ybar_carousel_shownav',
            'type' => 'checkbox',
            'class' => '',
        ) ,
        array(
            'label' => 'Show Dots?',
            'id' => 'ybar_carousel_showdots',
            'type' => 'checkbox',
            'class' => '',
            'default' => '1'
        ) ,
        array(
            'label' => 'RTL',
            'id' => 'ybar_carousel_rtl',
            'type' => 'checkbox',
            'class' => '',
        ) ,
        array(
            'label' => 'Enable Loop?',
            'id' => 'ybar_carousel_infinity',
            'type' => 'checkbox',
            'class' => '',
            'default' => '1'
        ) ,
        array(
            'label' => 'Animation Effects',
            'id' => 'ybar_carousel_animation',
            'type' => 'elect',
            'class' => '',
            'default' => 'center',
            'options' => array(
                'scroll',
                'smooth',
                'default',
            ) ,
        ),
        array(
            'label' => 'Display Price(WooCommerce)',
            'id' => 'ybar_carousel_showprices',
            'type' => 'checkbox',
            'class' => '',
        ) ,
        array(
            'label' => 'Price Font(Px)',
            'id' => 'ybar_carousel_printfont',
            'type' => 'text',
            'class' => '',
            'default' => '15'
        ) ,
        array(
            'label' => 'Price Color(WooCommerce)',
            'id' => 'ybar_carousel_pricecolor',
            'type' => 'text',
            'class' => 'yoobar_colors',
            'default' => '#FF4C29'
        )

    );

    public function __construct()
    {
        add_action('add_meta_boxes', array(
            $this,
            'add_meta_boxes'
        ));
    }

    public function add_meta_boxes()
    {
        foreach ($this->screens as $s)
        {
            add_meta_box('YoobarTextCarousel', __('Carousel Bar (Premium)', 'yoo-bar') , array(
                $this,
                'meta_box_callback'
            ) , $s, 'normal', 'default');
        }
    }

    public function meta_box_callback($post)
    {
        wp_nonce_field('YoobarTextCarousel_data', 'YoobarTextCarousel_nonce');
        echo "<ul class='metaProlinkList'>
        <li><a class='metaProlink' href='https://yoobar.dipashi.com/text-carousel/' target='_blank'>Demo</a></li> 
        <li><a class='metaProlink' href='https://sharabindu.com/plugins/yoo-bar/' target='_blank'>Get Pro</a></li>

                <li>           
     <a id='yvideo-staticbar_5' video-url='https://www.youtube.com/watch?v=z1Z5ub_CCH0'><span title='Video Documentation' id='yoobardocside' class='dashicons dashicons-video-alt3'></span></a></li>

        </ul>";
        $this->field_generator($post);
    }

    public function field_generator($post)
    {
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
            'yoo_bar'
        );

        $gdtypes = get_post_types();
        $cpost_types = array_diff($gdtypes, $excluded_posttypdes);

        $output = '';
        foreach ($this->fields as $field)
        {
            $label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
            $meta_value = get_post_meta($post->ID, $field['id'], true);
            if (empty($meta_value))
            {
                if (isset($field['default']))
                {
                    $meta_value = $field['default'];
                }
            }
            if (isset($field['placeholder']))
            {
                $placeholder = $field['placeholder'];
            }
            else
            {
                $placeholder = '';
            }

            switch ($field['type'])
            {
                case 'checkbox':
                    $input = sprintf('<input %s id=" %s" name="%s" type="checkbox" value="1" class="yoobar_apple-switch">', $meta_value === '1' ? 'checked' : 'checked', $field['id'], $field['id']);
                break;

                case 'select':
                    $input = sprintf('<select id="%s" name="%s">', $field['id'], $field['id']);

                    foreach ($cpost_types as $key => $value)
                    {

                        $value_title = get_post_type_object($value);

                        $field_value = !is_numeric($key) ? $key : $value;

                        $input .= sprintf('<option %s value="%s">%s</option>', $meta_value === $field_value ? 'selected' : '', $field_value, $value_title
                            ->labels
                            ->name);

                    }
                    $input .= '</select>';
                break;
                case 'elect':
                    $input = sprintf('<select id="%s" name="%s">', $field['id'], $field['id']);
                    foreach ($field['options'] as $key => $value)
                    {
                        $field_value = !is_numeric($key) ? $key : $value;
                        $input .= sprintf('<option %s value="%s">%s</option>', $meta_value === $field_value ? 'selected' : '', $field_value, $value);
                    }
                    $input .= '</select>';
                break;
                default:
                    $input = sprintf('<input %s id="%s" class="%s" name="%s" type="%s" value="%s" placeholder="%s">', $field['type'] !== 'color' ? 'style="width: 100%"' : '', $field['id'], $field['class'], $field['id'], $field['type'], $meta_value, $placeholder);
            }
            $output .= $this->format_rows($label, $input);
        }
        echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
    }

    public function format_rows($label, $input)
    {
        return '<tr id="nticker_r"><th scope="row"><strong>' . $label . '</strong></th><td><div class="wp-picker-container">' . $input . '</div></td></tr>';
    }


}

if (class_exists('YoobarTextCarouselMetabox'))
{
    new YoobarTextCarouselMetabox;
};


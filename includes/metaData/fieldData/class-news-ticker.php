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

class NewstickerMetabox
{

    private $screens = array(
        'yoo_bar'
    );

    private $fields = array(
         array(
             'label' => 'Content',
             'id' => 'nes_conts_from',
             'type' => 'yoolect',
             'class' => '',

         ) ,
        array(
            'label' => 'Posts per Page',
            'id' => 'nes_post_per_page',
            'type' => 'text',
            'class' => '',
            'default' => '10'
        ) ,
        array(
            'label' => 'Animation Effects',
            'id' => 'nes_effect',
            'type' => 'select',
            'default' => 'scroll',
            'class' => '',
            'options' => array(
                'slide-left',
                'slide-right',
                'slide-down',
                'slide-up',
                'fade',
                'scroll',
            ) ,
        ) ,
        array(
            'label' => 'Direction',
            'id' => 'nes_rtldirec',
            'type' => 'select',
            'class' => '',
            'options' => array(
                'ltr',
                'rtl',
            ) ,
        ) ,
        array(
            'label' => 'Item Background',
            'id' => 'nws_backgroudn_color',
            'class' => 'yoobar_colors',
            'type' => 'text',
            'default' => '#3D087B'
        ) ,
        array(
            'label' => 'Title Color',
            'id' => 'nes_txt_clr',
            'class' => 'yoobar_colors',
            'type' => 'text',
            'default' => '#7FC8A9'
        ) ,
        array(
            'label' => 'Title Font size(Px)',
            'id' => 'nes_txt_fnt_size',
            'type' => 'text',
            'class' => '',
            'default' => '16'
        ) ,
        array(
            'label' => 'Label(Optional)',
            'id' => 'nes_ticker_label',
            'type' => 'text',
            'class' => '',
            'default' => 'Headline'
        ) ,

        array(
            'label' => 'Label Background',
            'id' => 'nes_label_bgclr',
            'type' => 'text',
            'class' => 'yoobar_colors',
            'default' => '#FF2626'
        ) ,
        array(
            'label' => 'Label Color',
            'id' => 'nes_label_clr',
            'class' => 'yoobar_colors',
            'type' => 'text',
            'default' => '#64C9CF'
            
        ) ,
        array(
            'label' => 'Display Controls Bar?',
            'id' => 'yoobar_display_control',
            'type' => 'checkbox',
            'class' => '',
        ) ,
        array(
            'label' => 'Control Background',
            'id' => 'yoobar_t_control_bg',
            'class' => 'yoobar_colors',
            'type' => 'text',
            'default' => '#F8485E'
            
        ) ,
        array(
            'label' => 'Control Color',
            'id' => 'yoobar_t_control_color',
            'class' => 'yoobar_colors',
            'type' => 'text',
            'default' => '#F8485E'
        ) ,
        array(
            'label' => 'Contant Divider',
            'id' => 'yoobar_content_divider',
            'type' => 'text',
            'class' => '',
            'default' => '|'
        ) ,
        array(
            'label' => 'Enbable Read More(Optional)',
            'id' => 'yoobar_enable_readmore',
            'class' => '',
            'type' => 'checkbox',
        ) ,
        array(
            'label' => 'Readmore Button color',
            'id' => 'yoobar_readmore_clr',
            'class' => 'yoobar_colors',
            'type' => 'text',
            'default' => '#F8485E'
        ) ,
        array(
            'label' => 'Readmore Button Background',
            'id' => 'yoobar_readmore_bg',
            'class' => 'yoobar_colors',
            'type' => 'text',
            'default' => '#F8485E'
        ) ,
        array(
            'label' => 'ReadMore Button Text',
            'id' => 'yoobar_readmore_ratxt',
            'type' => 'text',
            'class' => '',
            'default' => 'Read More'
        ) ,
        array(
            'label' => 'Display Thumbnail?',
            'id' => 'yoobar_news_thumbnai',
            'type' => 'checkbox',
            'class' => '',
        ) ,
        array(
            'label' => 'Select Thumbnail Size(Px)',
            'id' => 'yoobar_news_thumbnai_size',
            'type' => 'text',
            'class' => '',
            'default' => '100'
        ) ,
       array(
           'label' => 'Hide Title ?',
           'id' => 'yoobar_news_hidetitle',
           'type' => 'checkbox',
           'class' => '',
       ) ,
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
            add_meta_box('Newsticker', __('News ticker (Premium)', 'yoo-bar') , array(
                $this,
                'meta_box_callback'
            ) , $s, 'normal', 'default');
        }
    }

    public function meta_box_callback($post)
    {
        wp_nonce_field('Newsticker_data', 'Newsticker_nonce');
        echo "<ul class='metaProlinkList'>
        <li><a class='metaProlink' href='https://yoobar.dipashi.com/news-ticker/' target='_blank'>Demo</a></li>
        <li><a class='metaProlink' href='https://yoobar.dipashi.com/news-ticker-product/' target='_blank'>WooCommerce Demo</a></li>
        <li><a class='metaProlink' href='https://sharabindu.com/plugins/yoo-bar/' target='_blank'>Get Pro</a></li>

                <li>           
     <a id='yvideo-staticbar_7' video-url='https://www.youtube.com/watch?v=KZ3YKtSAe5E'><span title='Video Documentation' id='yoobardocside' class='dashicons dashicons-video-alt3'></span></a></li>
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
                case 'yoolect':
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
                case 'select':
                    $input = sprintf('<select id="%s" name="%s">', $field['id'], $field['id']);
                    foreach ($field['options'] as $key => $value)
                    {
                        $field_value = !is_numeric($key) ? $key : $value;
                        $input .= sprintf('<option %s value="%s">%s</option>', $meta_value === $field_value ? 'selected' : '', $field_value, $value);
                    }
                    $input .= '</select>';
                break;


                case 'checkbox':
                    $input = sprintf('<input %s id=" %s" name="%s" type="checkbox" value="1" class="yoobar_apple-switch">', $meta_value === '1' ? 'checked' : 'checked', $field['id'], $field['id']);
                break;
                default:
                    $input = sprintf('<input %s class="%s" id="%s" name="%s" type="%s" value="%s" placeholder="%s">', $field['type'] !== 'color' ? 'style="width: 100%"' : '', $field['class'], $field['id'], $field['id'], $field['type'], $meta_value, $placeholder);
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

if (class_exists('NewstickerMetabox'))
{
    new NewstickerMetabox;
};


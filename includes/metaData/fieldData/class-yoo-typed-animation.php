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
class YooTypedTextMetabox
{

    private $screens = array(
        'yoo_bar'
    );

    private $fields = array(

        array(
            'label' => 'Typed Text (Press the "Enter" key for New Line)',
            'id' => 'yoobar_typpedtext_editor',
            'type' => 'wysiwyg',
            'class' => ' ',
            'default' => '<p><strong><span style="font-size: 28px">MEGA SALE ⚡ ON YOUR STORE</span></strong></p>
            <p><strong><span style="font-size: 28px">UP TO 30% OFF ON PHONE</span></strong></p>
            <p><span style="font-size: 22px"><strong> ✂&nbsp; 50%&nbsp; ALL HOME APPEARANCE</strong>&nbsp;</span></p>
            <p><span style="font-size: 22px">HURRY UP!!! OFFER END THIS 30TH</span></p>
            <p>&nbsp;</p>'

        ) ,
        array(
            'label' => 'Text Color',
            'id' => 'yoobar_typpedtextcolor',
            'type' => 'text',
            'class' => 'yoobar_colors',
            'default' => '#FF4C29'
        ) ,
        array(
            'label' => 'Height(Px)',
            'id' => 'yoobar_typpedtext_heigth',
            'type' => 'text',
            'class' => '',
            'default' => '30'
        ) ,
        array(
            'label' => 'Min Width(vw)',
            'id' => 'yoobar_typpedtext_width',
            'type' => 'text',
            'default' => '40',
            'class' => '',
        ) ,
        array(
            'label' => 'Typing Speed',
            'id' => 'yoobar_typpedtext_tspeed',
            'type' => 'text',
            'default' => '30',
            'class' => '',
        ) ,
        array(
            'label' => 'Back Speed',
            'id' => 'yoobar_typpedtext_bspeed',
            'type' => 'text',
            'class' => '',
            'default' => '20'
        ) ,
        array(
            'label' => 'Back delay',
            'id' => 'yoobar_typpedtext_bdelay',
            'type' => 'text',
            'class' => '',
            'default' => '500'
        ) ,
        array(
            'label' => 'Start Dely',
            'id' => 'yoobar_typpedtext_sdelay',
            'type' => 'text',
            'class' => '',
            'default' => '1000'
        ) ,
        array(
            'label' => 'Cursor Style(| _)',
            'id' => 'yoobar_typpedtext_carstyle',
            'type' => 'text',
            'class' => '',
            'default' => '|'
        ) ,
        array(
            'label' => 'Cursor Font Size(Px)',
            'id' => 'yoobar_typpedtext_carfntsize',
            'type' => 'text',
            'class' => '',
            'default' => '10'
        ) ,
        array(
            'label' => 'Loop',
            'id' => 'yoobar_typpedtext_loop',
            'type' => 'checkbox',
            'class' => ''
        ) ,

        array(
            'label' => 'Static Text (Before the Typed Text)',
            'id' => 'yoobar_typpedtext_ftext',
            'type' => 'wysiwyg',
            'class' => '',
            'default' => '<p><strong><span style="font-size: 28px">WOO SHOP</span></strong></p>'
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
            add_meta_box('YooTypedText', __('Typed Text (Premium)', 'yoo-bar') , array(
                $this,
                'meta_box_callback'
            ) , $s, 'normal', 'default');
        }
    }

    public function meta_box_callback($post)
    {
        wp_nonce_field('YooTypedText_data', 'YooTypedText_nonce');
        echo "<ul class='metaProlinkList'>
        <li><a class='metaProlink' href='https://yoobar.dipashi.com/typed-text/' target='_blank'>Demo</a></li>

        <li><a class='metaProlink' href='https://sharabindu.com/plugins/yoo-bar/'>Get Pro</a></li>
        <li>           
     <a id='yvideo-staticbar_6' video-url='https://www.youtube.com/watch?v=e3wFJjYA1bw'><span title='Video Documentation' id='yoobardocside' class='dashicons dashicons-video-alt3'></span></a></li>


        </ul>";
        $this->field_generator($post);
    }

    public function field_generator($post)
    {
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
            switch ($field['type'])
            {
                case 'wysiwyg':
                    ob_start();
                    wp_editor($meta_value, $field['id'], array(
                        'wpautop' => false,
                        'media_buttons' => false,
                        'drag_drop_upload' => false,
                        'textarea_rows' => '8',
                        'editor_class' => 'ybartypededitor',
                    ));
                    $input = ob_get_contents();
                    ob_end_clean();
                break;
                case 'checkbox':
                    $input = sprintf('<input %s id=" %s" name="%s" type="checkbox" value="1" class="yoobar_apple-switch">', $meta_value === '1' ? 'checked' : '', $field['id'], $field['id']);
                break;
                default:
                    $input = sprintf('<input %s class ="%s" id="%s" name="%s" type="%s" value="%s" >', $field['type'] !== 'color' ? 'style="width: 100%"' : '', $field['class'],$field['id'], $field['id'], $field['type'], $meta_value);
            }
            $output .= $this->format_rows($label, $input);
        }
        echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
    }

    public function format_rows($label, $input)
    {
        return '<tr id="nticker_r" class="ytypednaimate"><th scope="row"><strong>' . $label . '</strong></th><td><div class="wp-picker-container">' . $input . '</div></td></tr>';
    }


}

if (class_exists('YooTypedTextMetabox'))
{
    new YooTypedTextMetabox;
};


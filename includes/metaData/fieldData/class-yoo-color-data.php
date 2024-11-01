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
class ColorOptionMetabox
{

    private $screens = array(
        'yoo_bar'
    );

    private $fields = array(
        array(
            'label' => 'Bar Background',
            'id' => 'yoo_bar_back',
            'type' => 'text',
            'class' => 'yoobar_colors_trasn',
            'default' => 'rgba(30, 176, 30, 1)'

        ) ,
        array(
            'label' => 'Wrapper Height (Px)',
            'id' => 'yoo_bar_wrapper_height',
            'type' => 'text',
            'class' => '',
            'placeholder' => 'e.g: 10',
            'default' => '20'
        ) ,
        array(
            'label' => 'Background Image(Optional)',
            'id' => 'yoo_bar_back_image',
            'type' => 'media',
            'returnvalue' => 'url',
            'class' => ''
        ) ,
        array(
            'label' => 'Background size',
            'id' => 'yoo_bar_back_size',
            'class' => '',
            'type' => 'select',
            'options' => array(
                'cover',
                'contain',
                'auto',
            ) ,
        ) ,
        array(
            'label' => 'Background repeat',
            'id' => 'yoo_bar_back_repeat',
            'type' => 'select',
            'class' => '',
            'options' => array(
                'repeat',
                'repeat-x',
                'repeat-y',
                'no-repeat',
            ) ,
        ) ,
        array(
            'label' => 'Background position',
            'id' => 'yoo_bar_back_position',
            'type' => 'select',
            'class' => '',
            'options' => array(
                'left top',
                'left center',
                'left bottom',
                'right top',
                'right center',
                'right bottom',
                'center top',
                'center center',
                'center bottom',
            ) ,
        ) ,

        array(
            'label' => 'Close icon background',
            'id' => 'yoo_close-back',
            'type' => 'text',
            'class' => 'yoobar_colors'
        ) ,

        array(
            'label' => 'Remove Close Icon ( X )',
            'id' => 'yoo_remove_close_btn',
            'type' => 'checkbox',
            'class' => '',
        ) ,

        array(
            'label' => 'Top bar fixed position',
            'id' => 'yoo_bar_fixedtopbar',
            'type' => 'checkbox',
            'class' => '',
        ) ,
        array(
            'label' => 'Footer bar fixed position',
            'id' => 'yoo_bar_fixedfooterbar',
            'type' => 'checkbox',
            'class' => '',
        ) ,
        array(
            'label' => 'Stop delay animation',
            'id' => 'yoo_bar_slideanimation',
            'type' => 'checkbox',
            'class' => '',
        ) ,
        array(
            'label' => 'Display footer Bar:',
            'id' => 'display_footer_bar',
            'type' => 'checkbox',
            'class' => '',
        ) ,
        array(
            'label' => 'Hide Top Bar:',
            'id' => 'hide_top_bar',
            'type' => 'checkbox',
            'class' => '',
        ) ,
    );

    public function __construct()
    {
        add_action('add_meta_boxes', array(
            $this,
            'yoobar_color_add_meta_boxes'
        ));
        add_action('save_post', array(
            $this,
            'save_fields'
        ));
    }

    public function yoobar_color_add_meta_boxes()
    {
        foreach ($this->screens as $s)
        {
            add_meta_box('ColorOption', __('Background & Extra Setting', 'yoo-bar') , array(
                $this,
                'meta_box_callback'
            ) , $s, 'side', 'default');
        }
    }

    public function meta_box_callback($post)
    {
        wp_nonce_field('ColorOption_data', 'ColorOption_nonce');
        echo "<em>YooBar Background color, Image & Settings optins <a class='metaProlink' href='https://yoobar.dipashi.com/background-image-and-color/' target='_blank'> Demo</a> | <a class='metaProlink' href='https://yoobar.dipashi.com/docs/yoobar-background-box/' target='_blank'>See Docs</a></em>";
        $this->field_generator($post);
    }

    public function field_generator($post)
    {
        $output = '';
        foreach ($this->fields as $field)
        {
            $label = '<label class="y-coo-op" for="' . $field['id'] . '">' . $field['label'] . '</label>';
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
                    $input = sprintf('<input %s id="%s" name="%s" type="checkbox" value="1" class="yoobar_apple-switch">', $meta_value === '1' ? 'checked' : '', $field['id'], $field['id']);
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
                case 'media':
                    $meta_url = '';
                    if ($meta_value)
                    {
                        if ($field['returnvalue'] == 'url')
                        {
                            $meta_url = $meta_value;
                        }
                        else
                        {
                            $meta_url = wp_get_attachment_url($meta_value);
                        }
                    }
                    $input = sprintf('<input style="display:none;" id="%s" name="%s" type="text" value="%s" data-return="%s"><div id="preview%s" style="background-color:#fafafa;margin-right:12px;border:1px solid #eee;width: 250px;height:50px;margin-bottom:10px;background-image:url(%s);background-size:cover;background-repeat:no-repeat;background-position:center;"></div><input style="width: 50%%;margin-right:5px;" class="button new-media" id="%s_button" name="%s_button" type="button" value="Select" /><input style="width:40%%;" class="button remove-media" id="%s_buttonremove" name="%s_buttonremove" type="button" value="Delete" />', $field['id'], $field['id'], $meta_value, $field['returnvalue'], $field['id'], $meta_url, $field['id'], $field['id'], $field['id'], $field['id']);
                break;
                default:
                    $input = sprintf('<input %s  class="%s" id="%s" name="%s" type="%s" value="%s" placeholder="%s">', $field['type'] !== 'color' ? 'style="width: 100%"' : '', $field['class'], $field['id'], $field['id'], $field['type'], $meta_value, $placeholder);
            }
            $output .= $this->format_rows($label, $input);
        }
        echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
    }

    public function format_rows($label, $input)
    {
        return '<div style="margin-top: 10px;"><strong>' . $label . '</strong></div><div>' . $input . '</div>';
    }

    public function save_fields($post_id)
    {
        if (!isset($_POST['ColorOption_nonce']))
        {
            return $post_id;
        }
        $nonce = $_POST['ColorOption_nonce'];
        if (!wp_verify_nonce($nonce, 'ColorOption_data'))
        {
            return $post_id;
        }
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        {
            return $post_id;
        }
        foreach ($this->fields as $field)
        {
            if (isset($_POST[$field['id']]))
            {
                switch ($field['type'])
                {
                    case 'email':
                        $_POST[$field['id']] = sanitize_email($_POST[$field['id']]);
                    break;
                    case 'text':
                        $_POST[$field['id']] = sanitize_text_field($_POST[$field['id']]);
                    break;
                }
                update_post_meta($post_id, $field['id'], sanitize_text_field($_POST[$field['id']]));
            }
            else if ($field['type'] === 'checkbox')
            {
                update_post_meta($post_id, $field['id'], '0');
            }
        }
    }

}

if (class_exists('ColorOptionMetabox'))
{
    new ColorOptionMetabox;
};


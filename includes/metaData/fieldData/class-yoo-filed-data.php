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
class YooFiledData
{

    private $screens = array(
        'yoo_bar'
    );

    private $fields = array(

        array(
            'label' => 'Button Link',
            'id' => 'yoobtn_link',
            'type' => 'text',
            'placeholder' => 'e.g: www.expample.com',
            'class' => '',
            'default' => 'https://sharabindu.com/plugins/yoo-bar//'
        ) ,
        array(
            'label' => 'Button Text ',
            'id' => 'yoobtn_txt',
            'type' => 'text',
            'placeholder' => 'e.g: Lear More',
            'class' => '',
            'default' => 'Learn More'
        ) ,

        array(
            'label' => 'Button border radius (Px)',
            'id' => 'to_btn_round',
            'type' => 'text',
            'placeholder' => 'e.g: 5',
            'class' => '',
            'default' => '5'
        ) ,
        array(
            'label' => 'Button Background',
            'id' => 'yoo_btn_backhround',
            'type' => 'text',
            'class' => 'yoobar_colors',
            'default' => '#e53434'
        ) ,
        array(
            'label' => 'Button Text Color',
            'id' => 'yoo_btn_txt_cl',
            'type' => 'text',
            'class' => 'yoobar_colors',
            'default' => '#fff'
        ) ,
    );

    public function __construct()
    {
        add_action('add_meta_boxes', array(
            $this,
            'add_meta_boxes'
        ));
        add_action('save_post', array(
            $this,
            'save_fields'
        ));

    }

    public function add_meta_boxes()
    {
        foreach ($this->screens as $s)
        {
            add_meta_box('YooFiledData', __('Link Button Section', 'yoo-bar') , array(
                $this,
                'meta_box_callback'
            ) , $s, 'normal', 'high');

        }
    }

    public function meta_box_callback($post)
    {
        wp_nonce_field('YooFiledData_data', 'YooFiledData_nonce');
        
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
                    $input = sprintf('<input %s id=" %s" name="%s" type="checkbox" value="1" class="yoobar_apple-switch">', $meta_value === '1' ? 'checked' : '', $field['id'], $field['id']);
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
        return '<tr id="nticker_r"><th scope="row">' . $label . '</strong></th><td><div class="wp-picker-container">' . $input . '</div></td></tr>';
    }

    public function save_fields($post_id)
    {
        if (!isset($_POST['YooFiledData_nonce']))
        {
            return $post_id;
        }
        $nonce = $_POST['YooFiledData_nonce'];
        if (!wp_verify_nonce($nonce, 'YooFiledData_data'))
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

if (class_exists('YooFiledData'))
{
    new YooFiledData;
};


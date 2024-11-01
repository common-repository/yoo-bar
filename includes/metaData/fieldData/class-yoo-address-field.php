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

class YooAddressBarMetabox
{
    private $screens = array(
        'yoo_bar'
    );

    private $fields = array(
        array(
            'label' => 'Write Adddress',
            'id' => 'yoobar_addres_metafield',
            'type' => 'textarea',
            'placeholder' => 'e.g: 28 Jackson Street,USA',
            'class' => '',
            'default' => '28 Jackson Street,USA',
        ) ,
        array(
            'label' => 'Email Adddress',
            'id' => 'yoobar_email_fiedl',
            'type' => 'email',
            'placeholder' => 'e.g: info.@domain.com',
            'class' => '',
            'default' => 'info.@domain.com',
        ) ,
        array(
            'label' => 'Phone Number',
            'id' => 'yoobar_phnumberfiedl',
            'type' => 'tel',
            'placeholder' => 'e.g: +00-000-00',
            'class' => '',
            'default' => '+00-000-00',
        ) ,
        array(
            'label' => 'Text Color',
            'id' => 'yoo_adres_txt_clr',
            'type' => 'text',
            'placeholder' => '',
            'class' => 'yoobar_colors',
            'default' => '#fff',
        ) ,
        array(
            'label' => 'Display Icon',
            'id' => 'yoobar_displayaddreessicon',
            'type' => 'checkbox',
            'placeholder' => '',
            'class' => ''
        ) ,
        array(
            'label' => 'Icon Design',
            'id' => 'yoobar_addres_icon_st',
            'type' => 'select',
            'options' => array(
                'Solid',
                'Line',
            ) ,
            'placeholder' => '',
            'class' => ''
        ) ,

        array(
            'label' => 'Icon Color',
            'id' => 'yoo_adres_icon_clr',
            'type' => 'text',
            'placeholder' => '',
            'class' => 'yoobar_colors',
            'default' => '#fff',
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
            add_meta_box('YooAddressBar', __('Address Bar Section', 'yoo-bar') , array(
                $this,
                'meta_box_callback'
            ) , $s, 'normal', 'core');
        }
    }

    public function meta_box_callback($post)
    {
        wp_nonce_field('YooAddressBar_data', 'YooAddressBar_nonce');
        echo "<ul class='metaProlinkList'>
        <li>           
    <a id='yvideo-staticbar_1' video-url='https://www.youtube.com/watch?v=DLryXmqXiQs'><span title='Video Documentation' id='yoobardocside' class='dashicons dashicons-video-alt3'></span></a></li>
        
        <li><a class='metaProlink' href='https://yoobar.dipashi.com/address-bar-single/' target='_blank'>View Demo</a></li> 
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
                case 'textarea':
                    $input = sprintf('<textarea style="width: 100%%" id="%s" name="%s" rows="5">%s</textarea>', $field['id'], $field['id'], $meta_value);
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
                    $input = sprintf('<input %s id=" %s" name="%s" type="checkbox" value="1" class="yoobar_apple-switch">', $meta_value === '1' ? 'checked' : '', $field['id'], $field['id']);
                break;

                default:
                    $input = sprintf('<input %s class="%s" id="%s" name="%s" type="%s" value="%s" placeholder="%s">', $field['type'] !== 'color' ? 'style="width: 100%"' : '', $field['class'], $field['id'], $field['id'], $field['type'], $meta_value, $field['placeholder']);
            }
            $output .= $this->format_rows($label, $input);
        }
        echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
    }

    public function format_rows($label, $input)
    {
        return '<tr id="nticker_r"><th scope="row"><strong>' . $label . '</strong></th><td><div class="wp-picker-container">' . $input . '</div></td></tr>';
    }

    public function save_fields($post_id)
    {
        if (!isset($_POST['YooAddressBar_nonce']))
        {
            return $post_id;
        }
        $nonce = $_POST['YooAddressBar_nonce'];
        if (!wp_verify_nonce($nonce, 'YooAddressBar_data'))
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

if (class_exists('YooAddressBarMetabox'))
{
    new YooAddressBarMetabox;
};


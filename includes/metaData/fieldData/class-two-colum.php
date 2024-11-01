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

class DisplayTwoColumnMetabox
{

    private $screens = array(
        'yoo_bar'
    );

    private $fields = array(
        array(
            'label' => 'Left SIde',
            'id' => 'column_left',
            'type' => 'select',
            'default' => 'Static Text',
            'options' => array(
                'None',
                'Static Text',
                'Link Button',
                'Static Text and Link Button',
                'Address Bar',
                'Search',
                'Social Icon',
                'News Ticker(PRO)',
                'CountDown(PRO)',
                'PopUp Section(PRO)',
                'Carousel(PRO)',
                'Logo Slideshow(PRO)',
                'Typed Animation(PRO)',
                'Nav Menu(PRO)',
                'Text Slideshow(PRO)',
            ) ,
        ) ,
        array(
            'label' => 'Right Side',
            'id' => 'column_right',
            'type' => 'select',
            'default' => 'Link Button',
            'options' => array(
                'None',
                'Static Text',
                'Link Button',
                'Static Text and Link Button',
                'Address Bar',
                'Search',
                'Social Icon',
                'News Ticker(PRO)',
                'CountDown(PRO)',
                'PopUp Section(PRO)',
                'Carousel(PRO)',
                'Logo Slideshow(PRO)',
                'Typed Animation(PRO)',
                'Nav Menu(PRO)',
                'Text Slideshow(PRO)',

            ) ,
        ) ,
        array(
            'label' => 'Position',
            'id' => 'ybar_clum_position',
            'type' => 'select',
            'default' => 'center',
            'options' => array(
                'center',
                'space-evenly',
                'space-between',
                'space-around',
                'flex-start',
                'flex-end',
            ) ,
        )
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
            add_meta_box('DisplayTwoColumn', __('Display Settings', 'yoo-bar') , array(
                $this,
                'meta_box_callback'
            ) , $s, 'side', 'core');
        }
    }

    public function meta_box_callback($post)
    {
        wp_nonce_field('DisplayTwoColumn_data', 'DisplayTwoColumn_nonce');
        echo "<em>Select any one 'None' for a single column, <a class='metaProlink' href='https://yoobar.dipashi.com/docs/display-as-column/' target='_blank'>See Docs</a> |  <a class='metaProlink' href='https://yoobar.dipashi.com/yoobar-column/' target='_blank'>View Demo</a></em>";
        
        
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
                default:
                    $input = sprintf('<input %s id="%s" name="%s" type="%s" value="%s">', $field['type'] !== 'color' ? 'style="width: 100%"' : '', $field['id'], $field['id'], $field['type'], $meta_value);
            }
            $output .= $this->format_rows($label, $input);
        }
        echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
    }

    public function format_rows($label, $input)
    {
        return '<div style="margin: 10px 0;"><strong>' . $label . '</strong></div><div>' . $input . '</div>';
    }

    public function save_fields($post_id)
    {
        if (!isset($_POST['DisplayTwoColumn_nonce']))
        {
            return $post_id;
        }
        $nonce = $_POST['DisplayTwoColumn_nonce'];
        if (!wp_verify_nonce($nonce, 'DisplayTwoColumn_data'))
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
                    case 'select':
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

if (class_exists('DisplayTwoColumnMetabox'))
{
    new DisplayTwoColumnMetabox;
};


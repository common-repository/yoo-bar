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
class MaintitleMetabox
{

    private $screens = array(
        'yoo_bar'
    );

    private $fields = array(
        array(
            'label' => '',
            'id' => 'yoo_main_title',
            'type' => 'wysiwyg',
            'class' => '',
            'default' => '<span style="font-size: 16pt;">YooBar Plugin is Live! Full Support and Features Available! </span>'
        ),
        array(
            'label' => 'Text Color',
            'id' => 'yoobar_amineditorcolor',
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
            add_meta_box('Maintitle', __('Static Text Bar', 'yoo-bar') , array(
                $this,
                'meta_box_callback'
            ) , $s, 'normal', 'high');
        }
    }

    public function meta_box_callback($post)
    {
        wp_nonce_field('Maintitle_data', 'Maintitle_nonce');
        echo "<ul class='metaProlinkList'>
        <li>           
    <a id='yvideo-staticbar' video-url='https://www.youtube.com/watch?v=wQ45TJDA1eU'><span title='Video Documentation' id='yoobardocside' class='dashicons dashicons-video-alt3'></span></a></li>
        <li><a class='metaProlink' href='https://yoobar.dipashi.com/static-content/' target='_blank'> Demo</a></li>

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
                        'textarea_rows' => '10'
                    ));
                    $input = ob_get_contents();
                    ob_end_clean();

                break;

                default:
                    $input = sprintf('<input %s class="%s" id="%s" name="%s" type="%s" value="%s">', $field['type'] !== 'color' ? 'style="width: 100%"' : '', $field['class'],$field['id'], $field['id'], $field['type'], $meta_value);
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
        if (!isset($_POST['Maintitle_nonce']))
        {
            return $post_id;
        }
        $nonce = $_POST['Maintitle_nonce'];
        if (!wp_verify_nonce($nonce, 'Maintitle_data'))
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
                update_post_meta($post_id, $field['id'], wp_filter_post_kses($_POST[$field['id']]));
            }
            else if ($field['type'] === 'checkbox')
            {
                update_post_meta($post_id, $field['id'], '0');
            }
        }
    }

}

if (class_exists('MaintitleMetabox'))
{
    new MaintitleMetabox;
};


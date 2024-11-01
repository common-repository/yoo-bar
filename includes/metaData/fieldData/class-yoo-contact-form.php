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

class ContactFromMetabox
{

    private $screens = array(
        'yoo_bar'
    );

    private $fields = array(
        array(
            'label' => 'Select Option',
            'id' => 'ybar_popup_option',
            'type' => 'select',
            'default' => 'Video link',
            'options' => array(
                'Video link',
                'Shortcode',
                'Raw html'
            ) ,
        ),
        array(
            'label' => 'Write Content',
            'id' => 'yoo_contact_shortcode',
            'type' => 'textarea',
            'class' => '',
            'default' => 'https://www.youtube.com/watch?v=H28l9m6SHzQ'
        ) ,
        array(
            'label' => 'Button Text',
            'id' => 'yoobar_contact_btn_text',
            'type' => 'text',
            'class' => '',
            'default' => 'See Video'
        ) ,
        array(
            'label' => 'Button Color',
            'id' => 'yoobar_contact_btn_color',
            'type' => 'text',
            'class' => 'yoobar_colors',
            'default' => '#fff'
        ) ,
        array(
            'label' => 'Button Background',
            'id' => 'yoobar_contact_btn_bg',
            'type' => 'text',
            'class' => 'yoobar_colors',
            'default' => '#A03C78'
        ) ,
        array(
            'label' => 'Font Size (Px)',
            'id' => 'yoobar_contact_btn_fsize',
            'type' => 'text',
            'class' => '',
            'default' => '15'
        ) ,
        array(
            'label' => 'Font wight',
            'id' => 'yoobar_contact_btn_fweight',
            'type' => 'text',
            'class' => '',
            'default' => '600'
        ) ,
        array(
            'label' => 'Button Border Radius(Px)',
            'id' => 'yoobar_contact_btn_radius',
            'type' => 'text',
            'class' => '',
            'default' => '5'
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
            add_meta_box('ContactFrom', __('Popup Section (Premium)', 'yoo-bar') , array(
                $this,
                'meta_box_callback'
            ) , $s, 'normal', 'default');
        }
    }

    public function meta_box_callback($post)
    {
        wp_nonce_field('ContactFrom_data', 'ContactFrom_nonce');

        echo "<ul class='metaProlinkList'>
        <li><a class='metaProlink' href='https://yoobar.dipashi.com/popup-video/' target='_blank'>Popup Video Demo</a></li> 
        <li><a class='metaProlink' href='https://yoobar.dipashi.com/contact-form/' target='_blank'>Shortcode Demo</a></li>
        <li><a class='metaProlink' href='https://yoobar.dipashi.com/raw-html/' target='_blank'>Raw html Demo</a></li>
       <li><a class='metaProlink' href='https://sharabindu.com/plugins/yoo-bar/' target='_blank'>Get Pro</a></li>
        
        </ul><ul class='metaProlinkList'>
        <li>PopUp Video docs&#8594;           
     <a id='yvideo-staticbar_10' video-url='https://www.youtube.com/watch?v=H28l9m6SHzQ'><span title='Video Documentation' id='yoobardocside' class='dashicons dashicons-video-alt3'></span></a></li>

        <li>Shortcode docs&#8594;           
     <a id='yvideo-staticbar_11' video-url='https://www.youtube.com/watch?v=Eb4gvfQz2DM'><span title='Video Documentation' id='yoobardocside' class='dashicons dashicons-video-alt3'></span></a></li>     
        <li>Raw Html docs&#8594;           
     <a id='yvideo-staticbar_12' video-url='https://www.youtube.com/watch?v=0CCHsPXDbnE'><span title='Video Documentation' id='yoobardocside' class='dashicons dashicons-video-alt3'></span></a></li>
 
        </ul>";
        echo "<em class='yooemclasss'>in raw html you can add embed code,like:Google Map</em>";
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
                default:
                    $input = sprintf('<input %s class ="%s" id="%s" name="%s" type="%s" value="%s" placeholder="%s">', $field['type'] !== 'color' ? 'style="width: 100%"' : '', $field['class'], $field['id'],

                    $field['id'], $field['type'], $meta_value, $placeholder);
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

if (class_exists('ContactFromMetabox'))
{
    new ContactFromMetabox;
};


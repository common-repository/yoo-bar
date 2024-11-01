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

class YooSocialLinkMetabox
{

 private $screens = array(
     'yoo_bar'
 );

 private $fields = array(
     array(
         'label' => 'Size (Px)',
         'id' => 'ybar_social_size',
         'type' => 'text',
         'placeholder' => 'e.g: 30',
         'class' => '',
         'default' => '25'
     ) ,
     array(
         'label' => 'Label Text',
         'id' => 'ybar_social_label',
         'type' => 'text',
         'class' => '',
         'placeholder' => 'e.g: Follow Us',
     ) ,
     array(
         'label' => 'Label Text Color',
         'id' => 'ybar_social_label_clr',
         'type' => 'text',
         'class' => 'yoobar_colors',
     ) ,
     array(
         'label' => 'Label Text background',
         'id' => 'ybar_social_label_bg',
         'type' => 'text',
         'class' => 'yoobar_colors',
     ) ,
     array(
         'label' => 'Facebook',
         'id' => 'ybar_facebook_link',
         'type' => 'text',
         'class' => '',
         'placeholder' => 'e.g: facebook.com/username',
         'default' => 'https://www.facebook.com/#'
     ) ,
     array(
         'label' => 'Twitter',
         'id' => 'ybar_twitter_link',
         'type' => 'text',
         'class' => '',
         'placeholder' => 'e.g: twitter.com/username',
         'default' => 'https://www.twitter.com/#'
     ) ,
     array(
         'label' => 'Linkdin',
         'id' => 'ybar_linkdin_link',
         'type' => 'text',
         'class' => '',
         'placeholder' => 'e.g: linkdin.com/username',
     ) ,
     array(
         'label' => 'Youtube',
         'id' => 'ybar_youtube_link',
         'type' => 'text',
         'class' => '',
         'placeholder' => 'e.g: youtube.com/username',
     ) ,
     array(
         'label' => 'Pinterest',
         'id' => 'ybar_pinterest_link',
         'type' => 'text',
         'class' => '',
         'placeholder' => 'e.g: pinterest.com/username',
     ) ,
     array(
         'label' => 'Instagram',
         'id' => 'ybar_instagram_link',
         'type' => 'text',
         'class' => '',
         'placeholder' => 'e.g: instagram.com/username',
     ) ,
     array(
         'label' => 'Tumblr',
         'id' => 'ybar_tumblr_link',
         'type' => 'text',
         'class' => '',
         'placeholder' => 'e.g: tumblr.com/username',
     ) ,
     array(
         'label' => 'Flickr',
         'id' => 'ybar_flickr_link',
         'type' => 'text',
         'class' => '',
         'placeholder' => 'e.g: flickr.com/username',
     ) ,
     array(
         'label' => 'Reddit',
         'id' => 'ybar_reddit_link',
         'type' => 'text',
         'class' => '',
         'placeholder' => 'e.g: reddit.com/username',
     ) ,
     array(
         'label' => 'StumbleUpon',
         'id' => 'ybar_StumbleUpon_link',
         'type' => 'text',
         'class' => '',
         'placeholder' => 'e.g: stumbleupon.com/username',
     ) ,
     array(
         'label' => 'Vk',
         'id' => 'ybar_vk_link',
         'type' => 'text',
         'class' => '',
         'placeholder' => 'e.g: vk.com/username',
     ) ,
     array(
         'label' => 'Enable Custom Icon Color (Pro)',
         'id' => 'ybar_custom_color',
         'type' => 'checkbox',
         'class' => '',
         

     ) ,
     array(
         'label' => 'Select Icon Color (Pro)',
         'id' => 'ybar_custom_color_choos',
         'type' => 'text',
         'class' => 'yoobar_colors',
         'default' => '#222b75',
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
            add_meta_box('YooSocialLink', __('Social Link Section', 'yoo-bar') , array(
                $this,
                'meta_box_callback'
            ) , $s, 'normal', 'core');
        }
    }

    public function meta_box_callback($post)
    {
        wp_nonce_field('YooSocialLink_data', 'YooSocialLink_nonce');
        echo "<ul class='metaProlinkList'>
        <li>           
     <a id='yvideo-staticbar_3' video-url='https://www.youtube.com/watch?v=5OPMnLLV_Yo'><span title='Video Documentation' id='yoobardocside' class='dashicons dashicons-video-alt3'></span></a></li>


        <li><a class='metaProlink' href='https://yoobar.dipashi.com/social-icon-free/' target='_blank'>View Demo</a></li>
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
                    $input = sprintf('<input %s class= "%s" id="%s" name="%s" type="%s" value="%s" placeholder="%s">',

                    $field['id'], $field['class'], $field['id'], $field['id'], $field['type'], $meta_value, $placeholder);
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
        if (!isset($_POST['YooSocialLink_nonce']))
        {
            return $post_id;
        }
        $nonce = $_POST['YooSocialLink_nonce'];
        if (!wp_verify_nonce($nonce, 'YooSocialLink_data'))
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

if (class_exists('YooSocialLinkMetabox'))
{
    new YooSocialLinkMetabox;
};


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

class YooShortcodeMetabox
{

    private $screens = array(
        'yoo_bar'
    );

    private $fields = array(
        array(
            'label' => '',
            'id' => 'yoobar_shrtcode_meta',
            'type' => 'text',
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
            add_meta_box('ShortcodeMeta', __('Shortcode', 'yoo-bar') , array(
                $this,
                'meta_box_callback'
            ) , $s, 'side', 'default');
        }
    }
    
    public function meta_box_callback($post)
    {
        wp_nonce_field('ShortcodeMetabox_data', 'ShortcodeMetabox_nonce');
        echo "<em>Click the button and copy it to the clipboard and use it in the preferred location of your site<a class='metaProlink' href='https://yoobar.dipashi.com/dynamic-shortcode/' target='_blank'>View Docs</a></em>";
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
                case 'text': 
                $input = '';
                ?>
                <input type="text" class="yoo_bar_shrt_edito" onfocus="this.select();"  value ='[yoobar_scode id =" <?php echo esc_attr($post->ID); ?>" title = "<?php echo esc_attr(get_the_title($post->ID)); ?>"]' readonly id="YooCopyInput">
                <div class="ybarcopybtn">
                <button type="button" onclick="YooCopyShortcode()" onmouseout="YoobaroutFunc()">Copy</button>
                <span class="tooltiptext" id="myTooltip">Copy to clipboard</span></div>

                <?php
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

}

if (class_exists('YooShortcodeMetabox'))
{
    new YooShortcodeMetabox;
};


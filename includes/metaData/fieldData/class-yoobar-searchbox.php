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


class YooSearchboxMetabox {

  private $screens = array('yoo_bar');

  private $fields = array(
    array(
      'label' => 'Placeholder Name (Optional)',
      'id' => 'yoobar_serach_placehol',
      'type' => 'text',
      'class' => '',
      'placeholder' => 'e.g: Search...',
      'default' => 'Search...',
     ),
    array(
      'label' => 'Color',
      'id' => 'yoobar_serach_color',
      'type' => 'text',
      'class' => 'yoobar_colors',
      'default' => '#fff',
     ),
    array(
      'label' => 'Buttton Color',
      'id' => 'yoobar_serach_btncolor',
      'type' => 'text',
      'class' => 'yoobar_colors',
      'default' => '#fff',
     ),
    array(
      'label' => 'Buttton Background',
      'id' => 'yoobar_serach_btnbg',
      'type' => 'text',
      'class' => 'yoobar_colors',
      'default' => '#0a4a72',
     ),
    array(
      'label' => 'Search Box Design',
      'id' => 'yoobar_serach_boxdesign',
      'type' => 'select',
      'class' => '',
      'options' => array(
         'One',
         'Two',
         'Three',
      ),
     ),
    array(
      'label' => 'Search Button',
      'id' => 'yoobar_serach_btndesign',
      'type' => 'select',
      'class' => '',
      'options' => array(
         'Icon',
         'Text',
      ),
     ),
     array(
       'label' => 'Button Label Text',
       'id' => 'yoobar_serach_btntext',
       'type' => 'text',
       'class' => '',
       'placeholder' => 'e.g: Search',
       'default' => 'Search',
      ),  
  );

  public function __construct() {
    add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
    add_action( 'save_post', array( $this, 'save_fields' ) );
  }

  public function add_meta_boxes() {
    foreach ( $this->screens as $s ) {
      add_meta_box(
        'Searchbox',
        __( 'Search box Section', 'yoo-bar' ),
        array( $this, 'meta_box_callback' ),
        $s,
        'normal',
        'core'
      );
    }
  }

  public function meta_box_callback( $post ) {
    wp_nonce_field( 'Searchbox_data', 'Searchbox_nonce' );

    echo "<ul class='metaProlinkList'>
 <li>           
    <a id='yvideo-staticbar_2' video-url='https://www.youtube.com/watch?v=PKbT0kHCjCg'><span title='Video Documentation' id='yoobardocside' class='dashicons dashicons-video-alt3'></span></a></li>

    <li><a class='metaProlink' href='https://yoobar.dipashi.com/search-box/' target='_blank'>View Demo</a></li> 
    </ul>";
    $this->field_generator( $post );
  }

  public function field_generator( $post ) {
    $output = '';
    foreach ( $this->fields as $field ) {
      $label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
      $meta_value = get_post_meta( $post->ID, $field['id'], true );
      if ( empty( $meta_value ) ) {
        if ( isset( $field['default'] ) ) {
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
      switch ( $field['type'] ) {
        case 'select':
        $input = sprintf(
          '<select id="%s" name="%s">',
          $field['id'],
          $field['id']
        );
        foreach ( $field['options'] as $key => $value ) {
          $field_value = !is_numeric( $key ) ? $key : $value;
          $input .= sprintf(
            '<option %s value="%s">%s</option>',
            $meta_value === $field_value ? 'selected' : '',
            $field_value,
            $value
          );
        }
        $input .= '</select>';
        break;
  
        default:
          $input = sprintf(
          '<input %s class="%s" id="%s" name="%s" type="%s" value="%s" placeholder="%s">',
          $field['type'] !== 'color' ? 'style="width: 100%"' : '',
          $field['class'],
          $field['id'],
          $field['id'],
          $field['type'],
          $meta_value,
           $placeholder
        );
      }
      $output .= $this->format_rows( $label, $input );
    }
    echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
  }

  public function format_rows( $label, $input ) {
    return '<tr id="nticker_r"><th scope="row"><strong>' . $label . '</strong></th><td><div class="wp-picker-container">' . $input . '</div></td></tr>';
  }

  

  public function save_fields( $post_id ) {
    if ( !isset( $_POST['Searchbox_nonce'] ) ) {
      return $post_id;
    }
    $nonce = $_POST['Searchbox_nonce'];
    if ( !wp_verify_nonce( $nonce, 'Searchbox_data' ) ) {
      return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return $post_id;
    }
    foreach ( $this->fields as $field ) {
      if ( isset( $_POST[ $field['id'] ] ) ) {
        switch ( $field['type'] ) {
          case 'email':
            $_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
            break;
          case 'text':
            $_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
            break;
        }
        update_post_meta( $post_id, $field['id'], sanitize_text_field($_POST[ $field['id'] ] ));
      } else if ( $field['type'] === 'checkbox' ) {
        update_post_meta( $post_id, $field['id'], '0' );
      }
    }
  }

}

if (class_exists('YooSearchboxMetabox')) {
  new YooSearchboxMetabox;
};



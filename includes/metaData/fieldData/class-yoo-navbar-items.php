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

   class YooNavBarMetabox {
    private $screens = array('yoo_bar');

         private $fields = array(
           array(
             'label' => 'Select  Nav Items',
             'id' => 'yoobar_select_nav_itsm',
             'type' => 'select',
             'class' => '',
            ),
           array(
             'label' => 'Font weight',
             'id' => 'yoobar_navfont_weight',
             'class' => '',
             'type' => 'text',
             'default' => '600'
            ),
            array(
              'label' => 'Menu Text Color',
              'id' => 'yoobar_select_nav_color',
              'class' => 'yoobar_colors',
              'type' => 'text',
              'default' => '#494646'
             ),
            array(
              'label' => 'Mobile Toggle Button Color',
              'id' => 'yoobar_mobiel_toggle_color',
              'class' => 'yoobar_colors',
              'type' => 'text',
              'default' => '#4ca515'
             ),
            array(
              'label' => 'Enable Cart icon for the last Item',
              'id' => 'yoobar_enable_cart_item',
              'description' => 'If WooCommerce is enabled',
              'class' => '',
              'type' => 'checkbox',
             ), 
            array(
              'label' => 'Choose Icon Style',
              'id' => 'yoobar_icon_cart_style',
              'type' => 'elelect',
              'description' => 'If WooCommerce is enabled',
              'class' => '',
              'options' => array(
                 'Icon One',
                 'Icon Two',
                 'Icon Three',
                 'Icon Four',
                 'Icon Five',
                 'Icon Six',
                 'Icon Seven',
              ),
             ),
            array(
              'label' => 'Input Cart Page Link',
              'id' => 'yoobar_cart_pagelink',
              'type' => 'text',
              'class' => '',
              'description' => 'If WooCommerce is enabled',
              'default' => 'https://domain.com/cart'
             ),
            array(
              'label' => 'Cart Icon Color',
              'id' => 'yoobar_cart_nav_color',
              'class' => 'yoobar_colors',
              'description' => 'If WooCommerce is enabled',
              'type' => 'text',
              'default' => '#035397'
             ),
            array(
              'label' => 'Bubble Bg Color',
              'id' => 'yoobar_cart_bubble_color',
              'class' => 'yoobar_colors',
              'description' => 'If WooCommerce is enabled',
              'type' => 'text',
              'default' => '#FF3F00'
             ),
            array(
              'label' => 'Bubble Text Color',
              'id' => 'yoobar_cart_bubble_txtcolor',
              'class' => 'yoobar_colors',
              'description' => 'If WooCommerce is enabled',
              'type' => 'text',
              'default' => '#fff'
             ),
         );


         public function __construct() {
           add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
         }

        public function add_meta_boxes() {
          foreach ( $this->screens as $s ) {
            add_meta_box(
              'YooNavBar',
              __( 'Menu Bar (Premium)', 'yoo-bar' ),
              array( $this, 'meta_box_callback' ),
              $s,
              'normal',
              'default'
            );
          }
        }

        public function meta_box_callback( $post ) {
          wp_nonce_field( 'YooNavBar_data', 'YooNavBar_nonce' );

          echo "<ul class='metaProlinkList'>
          <li><a class='metaProlink' href='https://yoobar.dipashi.com/nav-bar/' target='_blank'>Demo</a></li> 
        <li>           
     <a id='yvideo-staticbar_9' video-url='https://www.youtube.com/watch?v=AIyMbB6Pfz0'><span title='Video Documentation' id='yoobardocside' class='dashicons dashicons-video-alt3'></span></a></li>
          <li><a class='metaProlink' href='https://sharabindu.com/plugins/yoo-bar/' target='_blank'>Get Pro</a></li>
          </ul>"; 
          $this->field_generator( $post );

        }
         public function field_generator( $post ) {
          $collection = wp_get_nav_menus();

           $output = '';
           foreach ( $this->fields as $field ) {
             $label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
             $meta_value = get_post_meta( $post->ID, $field['id'], true );
             if ( empty( $meta_value ) ) {
               if ( isset( $field['default'] ) ) {
                 $meta_value = $field['default'];
               }
             }
             if ( isset( $field['placeholder'] ) ) {
               $placeholder = $field['placeholder'];
             }else{
              $placeholder= '';
             }
             
             $field['description'] = isset( $field['description'] ) ?  '<p><em>' .$field['description'].'</em></p>' : '';

             
             switch ( $field['type'] ) {
              case 'select':
              $input = sprintf(
                '<select id="%s" name="%s">',
                $field['id'],
                $field['id']
              );

              foreach($collection as $key => $value) {
            
                $field_value = !is_numeric( $key ) ? $key : $value->slug;

                $input .= sprintf(
                  '<option %s value="%s">%s</option>',
                  $meta_value === $field_value ? 'selected' : '', $field_value,$value->name
                );

              }
              $input .= '</select>';

              break;
              case 'elelect':
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
              $input .= $field['description'];

              break;
              case 'checkbox':
                $input = sprintf(
                '<input %s id=" %s" name="%s" type="checkbox" value="1" class="yoobar_apple-switch">%s',
                $meta_value === '1' ? 'checked' : '',
                $field['id'],
                $field['id'],
                $field['description']
                );
                break;
               default:
                 $input = sprintf(
                 '<input %s class="%s" id="%s" name="%s" type="%s" value="%s">%s',
                 $field['type'] !== 'color' ? 'style="width: 100%"' : '',
                 $field['class'],
                 $field['id'],
                 $field['id'],
                 $field['type'],
                 $meta_value,
                 $field['description']
               );
             }
             $output .= $this->format_rows( $label, $input );
           }
           echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
         }

         public function format_rows( $label, $input ) {
          return '<tr id="nticker_r"><th scope="row"><strong>' . $label . '</strong></th><td><div class="wp-picker-container">' . $input . '</div></td></tr>';
         }

       }


   if (class_exists('YooNavBarMetabox')) {
     new YooNavBarMetabox;
   }

   

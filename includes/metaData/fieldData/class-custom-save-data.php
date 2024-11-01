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

class YbarCustom_save_data
{

    public function __construct()
    {

        add_action('admin_init', array(
            $this,
            'yoobar_Custom_data'
        ) , 2);

    }

    function yoobar_Custom_data()
    {
        add_meta_box('gpminvoice-group', 'Text SlideShow (Premium)', array(
            $this,
            'YoobarCustom_save_data'
        ) , 'yoo_bar', 'normal', 'default');
    }

    function YoobarCustom_save_data()
    {
    
      echo "<ul class='metaProlinkList'>
      <li><a class='metaProlink' href='https://yoobar.dipashi.com/text-slideshow/' target='_blank'>Demo</a></li> 
   
      <li><a class='metaProlink' href='https://sharabindu.com/plugins/yoo-bar//'>Get Pro</a></li>
         <li> 
          <a id='yvideo-staticbar_13' video-url='https://www.youtube.com/watch?v=iuLR_Jsivbk'><span title='Video Documentation' id='yoobardocside' class='dashicons dashicons-video-alt3'></span></a></li>
      </ul>";
        ?>
        <div class="ylabelwraper">
          <ul>
            <li>
           <strong>
           <label for="yoslidesowtcolor">Text Color</label></strong>
           <input  type="text" value="#11052C"  class="yoobar_colors" />
            </li><li>
           <strong><label for="yoslidesowbcolor">Border Color</label></strong>
           <input  type="text"  value="#3D087B" id="yoslidesowbcolor"  class="yoobar_colors"/>
           </li><li>
           <strong><label for="yoslidesofsize">Font Size</label></strong>
           <input  type="text" value="20" id="yoslidesofsize"/>
           </li><li>
           <strong><label for="yoslidesofweight">Font wight</label></strong>
           <input  type="text" value="600" id="yoslidesofweight"/>
          </li>
           </ul>
        </div>
        <div class="ybarreadetheading">
           <p><span class="dashicons dashicons-tide"></span>Reapeater Field </p>
        </div>
        <table id="repeatable-fieldset-one" width="100%">
           <tbody>
              <th>Content</th>
              <th></th>
              <tr>
                 <td>
                    <textarea cols="55" rows="3" >YooBar Notification Bar Plugin for WordPress</textarea>
                 </td>
                 <td><a class="button remove-row" href="#1">Remove</a></td>
              </tr>
              <tr>
                 <td> 
                    <textarea cols="55" rows="3"  >Amazing looking Notification Bar on your site</textarea>
                 </td>
                 <td><a class="button  cmb-remove-row-button" href="#">Remove</a></td>
              </tr>
              <tr>
                 <td> 
                    <textarea cols="55" rows="3"  >The plugin is fully responsive and features rich</textarea>
                 </td>
                 <td><a class="button  cmb-remove-row-button " href="#">Remove</a></td>
              </tr>
              <tr class="empty-row screen-reader-text">
                 <td>
                    <textarea placeholder="e.g: Write Content" cols="55" rows="3" name="TitleDescription[]"  id="yrepetetextarea"></textarea>
                 </td>
                 <td><a class="button remove-row" href="#">Remove</a></td>
              </tr>
           </tbody>
        </table>
        <p><a  class="button" >Add another</a></p>
     <?php
        }

    }

    if (class_exists('YbarCustom_save_data'))
    {
        new YbarCustom_save_data;
    };

    

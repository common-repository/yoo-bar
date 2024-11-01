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

class YoobarCountdownMeta
{
    public function __construct()
    {
        add_action('admin_menu', array(
            $this,
            'yoobarGalleryMeta'
        ));


    }

    public function yoobarGalleryMeta()
    {

        add_meta_box('YbarCountdown_metabox', 'Countdown Timer (Premium)', array(
            $this,
            'YbarCountdown_metabox_callback'
        ) , 'yoo_bar', 'normal', 'default');

    }

    public function YbarCountdown_metabox_callback($post)
    {
      echo "<ul class='metaProlinkList'>
      <li><a class='metaProlink' href='https://yoobar.dipashi.com/countdown-circle/' target='_blank'>Circle Demo</a></li> 
      <li><a class='metaProlink' href='https://yoobar.dipashi.com/flipping/' target='_blank'>Flipping Demo</a></li>
      <li><a class='metaProlink' href='https://yoobar.dipashi.com/countdown-square/' target='_blank'>Square Demo</a></li>
      <li><a class='metaProlink' href='https://sharabindu.com/plugins/yoo-bar/'>Get Pro</a></li>
          <li>           
     <a id='yvideo-staticbar_4' video-url='https://www.youtube.com/watch?v=2J6_0YpXdWc'><span title='Video Documentation' id='yoobardocside' class='dashicons dashicons-video-alt3'></span></a></li>
      </ul>";

        $yoobar_date_picker = get_post_meta($post->ID, "yoobar_date_picker", true);

        if (isset($yoobar_date_picker))
        {
            $yoobar_date_picker = date('Y-m-d H:i', strtotime("+7 day"));
        }
        
       
        echo '<ul id="countdown_figure"><li class="count-fig-snd"><table class="form-table">
    <tbody>
      <tr>
        <th><label for="seo_tobots">CountDown Style</label></th>
        <td>
          <select id="select_countdown_style" name="select_countdown_style">
            <option value="Circle">Circle</option>
            <option value="Square">Square</option>
            <option value="flipping">Flipping</option>
          </select>
        </td>
      </tr>
      <tr >
        <th><label for="seo_tobots">Square Style</label></th>
        <td>
          <select id="select_yoosar_style" name="select_yoosar_style">

            <option value="background">Background Style</option>
            <option value="border">Border Style</option>
          </select>
        </td>
      </tr>
      <tr>
        <th><label for="select_flimmip_style">Flipping Style</label></th>
        <td>
          <select id="select_flimmip_style" name="select_flimmip_style">
            <option value="Row">Row</option>
            <option value="Column">Column</option>
          </select>
        </td>
      </tr>

      <tr>
          <th><label for="yoobar_date_picker">Set Date & Time</label></th>
          <td><input type="text" value="' . $yoobar_date_picker . '"></td>
        </tr>



        <tr>
              <th><label for="select_flimmip_padding">Padding(Px)</label></th>
                <td><input type="text" value="10"></td>
              </tr>

              <tr>
                <th><label for="flip_wpaerr_bg">Wrapper Background</label></th>
                <td>
                  <input type="text" id="flip_wpaerr_bg" value="#FF2442" class="yoobar_hx_colors">
                </td>
              </tr>

        <tr>
          <th><label for="seo_tobots">Border Color</label></th>
          <td>
            <input type="text"  value="#150050" class="yoobar_hx_colors">
          </td>
        </tr>
        <tr>
          <th><label for="seo_tobots">Box Shadow Color</label></th>
          <td>
            <input type="text" value="#911F27" class="yoobar_hx_colors">
          </td>
        </tr>
        <tr>
          <th><label for="tbar_cnt_ti_size">Countdown Size</label></th>
          <td><input type="text" value="100"></td>
        </tr>
   
        <tr>
          <th><label for="yoo_bar_count_bg">Background Width</label></th>
          <td><input type="text" value="0.5" ></td>
        </tr>
        <tr>
          <th><label for="figure_width">Figure Width</label></th><td><input type="text" id="figure_width" name="figure_width" value="0.05"></td>
        </tr>
        <tr>
          <th><label for="ybat_cnt_bg_clr">Circle Background</label></th>
          <td><input type="text" value="#22577A" class="yoobar_hx_colors"></td>
        </tr>
        <tr>
            <th><label for="select_direction">Direction</label></th>
            <td>
            <select>
              <option value="Clockwise">Clockwise</option>
              <option value="Counter-clockwise">Counter clockwise</option>
              <option value="Both">Both</option>
            </select>

          </tr>

          <tr>
           <th><label for="font_size_square">Font Size (Px)</label></th>
           <td><input type="text"  value="30"></td>
         </tr>

    </tbody>
  </table></li><li class="count-fig-snd">
  <table   class="form-table">
  <tbody>

     <tr class="">
       <th><label for="ybat_cnt_day_clr">Countdown  Background</label></th>
       <td><input type="text"  value="#7D1935" class="yoobar_hx_colors"></td>
     </tr>
     <tr>
      <th><label for="ybat_sqr_count_clr">Count Color</label></th>
      <td><input type="text" value="#3E00FF" class="yoobar_hx_colors"></td>
    </tr>
  <tr>
      <th><label for="tbar_cnt_all_color">Text Color</label></th>
      <td><input type="text" value="#B61919" class="yoobar_hx_colors"></td>
    </tr>


    <tr>
      <th><label for="select_animation">Animation</label></th>
      <td>
      <select>
        <option value="smooth" selected>smooth</option>
        <option value="ticks">Ticks</option>
      </select>

    </tr>
  <tr>
      <th><label for="tbar_cnt_ti_day">Text "Days "</label></th>
      <td><input type="text"  value="Days"></td>
    </tr>
  <tr>
      <th><label for="tbar_cnt_ti_hrs">Text "Hours "</label></th>
      <td><input type="text" value="Hours"></td>
    </tr>
  <tr>
      <th><label for="tbar_cnt_ti_mnts">Text "Minutes "</label></th>
      <td><input type="text"  value="Minutes" ></td>
    </tr>
  <tr>
      <th><label for="tbar_cnt_ti_sncd">Text "Seconds "</label></th>
      <td><input type="text" value="Seconds" ></td>
    </tr>
    </tbody>
  </table></li></ul>';

    }


}
if (class_exists('YoobarCountdownMeta'))
{
    new YoobarCountdownMeta;
};


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
class Yoo_galllery_data
{

    public function __construct()
    {
        add_action('admin_menu', array(
            $this,
            'yoobars__gallery_add_metabox'
        ));

    }

    public function yoobars__gallery_add_metabox()
    {

        add_meta_box('yoobarcustom_gallery', 'Logo Slideshow (Premium)', array(
            $this,
            'yoobars__gallery_metabox_callback'
        ) , 'yoo_bar', 'normal', 'default');

    }

    function yoobars__gallery_metabox_callback($post)
    {

        echo "<p><em>To select a multi image, hold down the 'Ctrl' button and then click on the image. Choose at least 10 images, otherwise there will be no scrolling</em></p><ul class='metaProlinkList'>
        <li><a class='metaProlink' href='https://yoobar.dipashi.com/logo-slideshow/' target='_blank'>Frontend Demo</a></li>
        <li>           
     <a id='yvideo-staticbar_8' video-url='https://www.youtube.com/watch?v=lya0gTPKz6g'><span title='Video Documentation' id='yoobardocside' class='dashicons dashicons-video-alt3'></span></a></li>
        <li><a class='metaProlink' href='https://sharabindu.com/plugins/yoo-bar/' target='_blank'>Get Pro</a></li>
        </ul>";

        ?>
	<div id="gallery_wrapper">
		<div id="img_box_container">

            <div class="gallery_single_row">
            <div class="gallery_area image_container">
            <img class="gallery_img_img" src='<?php echo YOO_BAR_URL ?>/assets/admin/img/1.jpg' height="55" width="55"></div> 
            <div class="gallery_area"> 
                <span class="button remove" title="Remove"><i class="dashicons dashicons-trash"></i></span>
            </div>
            <div class="clear"></div>
            </div>
            <div class="gallery_single_row">
            <div class="gallery_area image_container">
            <img class="gallery_img_img" src='<?php echo YOO_BAR_URL ?>/assets/admin/img/2.jpg' height="55" width="55"></div> 
            <div class="gallery_area"> 
                <span class="button remove" title="Remove"><i class="dashicons dashicons-trash"></i></span>
            </div>
            <div class="clear"></div>
            </div>
            <div class="gallery_single_row">
            <div class="gallery_area image_container">
            <img class="gallery_img_img" src='<?php echo YOO_BAR_URL ?>/assets/admin/img/3.jpg' height="55" width="55"></div> 
            <div class="gallery_area"> 
                <span class="button remove" title="Remove"><i class="dashicons dashicons-trash"></i></span>
            </div>
            <div class="clear"></div>
            </div>
		</div>

		<div id="add_gallery_single_row">
		  <input class="button add" type="button" value="+" title="Add image"/>
		</div>
      
	</div>
    <strong>
    <label for="Ygallery_image_height" style="margin:10px  5px">Image Height</label></strong>
    <input type="text"  value="100">
   <strong> <label for="Ygallery_image_bg" style="margin:10px  5px">Wrapper Background</label></strong>
    <input type="text" name="Ygallery_image_bg" value="#FF6B6B" id="Ygallery_image_bg" class="yoobar_colors">
	<?php
    }

}

if (class_exists('Yoo_galllery_data'))
{
    new Yoo_galllery_data;
};


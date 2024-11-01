<?php
/**
 * The file that defines the bulk print admin area
 *
 * public-facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com/plugins/yoo-bar/
 * @since      2.0.6
 *
 * @package    yoo-bar
 * @subpackage yoo-bar/admin
 */

class YooHow_to_use
{

    public function __construct()
    {

        add_action('admin_menu', array(
            $this,
            'admin_menu_define'
        ));

        add_action('admin_head', array(
            $this,
            'my_custom_admin_head'
        ));
    }

    function my_custom_admin_head()
    {
        echo '    ';
    }

    function elfi__settting_func()
    {

        return;
    }

    public function admin_menu_define()
    {

        add_submenu_page('edit.php?post_type=yoo_bar', __('Getting Started', 'yoo-bar') , __('Getting Started <span class="dashicons dashicons-controls-forward"></span>', 'yoo-bar') , 'manage_options', 'home', array( $this, 'how_to_use'));
 

    }

    function how_to_use()
    {

?>

    <div class="yoobaradmin__codewrap">
       <div class="yooba_wp_admin">
          <ul class="yoobaradmin__nav_bar">
             <li><a href="https://wordpress.org/support/plugin/yoo-bar/" target="_blank"><?php echo esc_html__('Support', 'yoo-bar') ?></a></li>
             <li><a href="https://yoobar.dipashi.com/docs/introduction/" target="_blank"><?php echo esc_html__('Docs', 'yoo-bar') ?></a></li>
             <li><a href="https://sharabindu.com/plugins/yoo-bar/" target="_blank"><?php echo esc_html__('Get Premium', 'yoo-bar') ?></a></li>

             <li><a href="https://yoobar.dipashi.com" target="_blank"><?php echo esc_html__('Demo', 'yoo-bar') ?></a></li>

          </ul>
       </div>
       <div class="yoobar_tirmoof" >
          <div class="yoobar_howku" style="background:url(<?php echo YOO_BAR_URL . '/assets/admin/img/banner.jpg' ?>);background-size:cover;width:100%;">
             <ul  class="yoobaradmin__hdaer_cnt">
                <li> <img src=" <?php echo YOO_BAR_URL . '/assets/admin/img/logo.png' ?>" alt="elfi logo"></li>
                <li  class="yoobaradmin__fd_cnt">
                   <h3><?php echo esc_html__('Version:', 'yoo-bar') . ' ' . YOO_BAR_VERSION; ?> </h3>
                   <small><?php echo esc_html__('A House of Notification Bar', 'yoo-bar') ?></small>
                </li>
             </ul>
             <ul class="thsnlot">
                <li><?php echo esc_html__('Thanks a lot ', 'yoo-bar') ?></li>
                <li><?php echo esc_html__('for choosing YooBar ', 'yoo-bar') ?></li>
             </ul>
          </div>
          <div class="yoobar-feature">

                <li class="yoobar_start">
                   <img class='yoo_dcs_img dfdf' src=" <?php echo YOO_BAR_URL . '/assets/admin/img/start.svg' ?>"> 
                   <h3 class="yoobar-feature-title"><li><?php echo esc_html__('How to start', 'yoo-bar') ?></h3>
                   <p class="yoobar_feat_tite"><?php echo esc_html__('To create a new bar, click the Add Bar, then fill/write the content box  choose display and location and then click Publish button. Now look at the frontend', 'yoo-bar') ?></p><img class='yoo_dcs_img' src=" <?php echo YOO_BAR_URL . '/assets/admin/img/add-bar-min.png' ?>"> 
                   <div>
                      <a class="ydocsbutn" href="<?php echo admin_url('post-new.php?post_type=yoo_bar') ?> "><?php echo esc_html__('Add Bar', 'yoo-bar') ?></a>
                   </div>
                </li>
          </div>
          <div class="yoobar-feature">

                <li class="yoobar_start">
                   <h3 class="yoobar-feature-title skfj"><li><?php echo esc_html__('Background & extra', 'yoo-bar') ?></h3>
                   <p class="yoobar_feat_tite"><?php echo esc_html__('Customize these settings to add a background color or background image,You can add sticky bar animation and hide the bar from top or footer loaction', 'yoo-bar') ?></p><img class='yoo_dcs_img' src=" <?php echo YOO_BAR_URL . '/assets/admin/img/backgro.png' ?>"> 
                </li>
          </div>
          <div class="yoobar-feature">

                <li class="yoobar_start">
                   <h3 class="yoobar-feature-title skfj"><li><?php echo esc_html__('Display Settings', 'yoo-bar') ?></h3>
                   <p class="yoobar_feat_tite"><?php echo esc_html__('From these settings, content must be selected. First select a content from the left side, then select a content from the right side, if any side choose "none", a column will be displayed.', 'yoo-bar') ?></p><img class='yoo_dcs_img' src=" <?php echo YOO_BAR_URL . '/assets/admin/img/DISPLAY-SETTINGS-min.png' ?>"> 
                </li>
          </div>
          <div class="yoobar-feature">

                <li class="yoobar_start">
                   <h3 class="yoobar-feature-title skfj"><li><?php echo esc_html__('Loaction Settings', 'yoo-bar') ?></h3>
                   <p class="yoobar_feat_tite"><?php echo esc_html__('Where you want to display your created bar, you have to do it from these settings, if you want to see it on all pages of the entire site, then click "Entire Site", if you want to see it on a specific page, post, product, custom post, then from the dropdown Select, you can also display the bar based on the post type.', 'yoo-bar') ?></p><img class='yoo_dcs_img' src=" <?php echo YOO_BAR_URL . '/assets/admin/img/location-settings-min.png' ?>"> 
                </li>
          </div>
          <div class="yoobar-feature">
             <ul>
                <li><img src=" <?php echo YOO_BAR_URL . '/assets/admin/img/docsimage.jpg' ?>"></li>
                <li class="yoobar_start">
                   <img class='yoo_dcs_img' src=" <?php echo YOO_BAR_URL . '/assets/admin/img/docs.svg' ?>"> 
                   <h3 class="yoobar-feature-title"><?php echo esc_html__('Plugin Docs', 'yoo-bar') ?></h3>
                   <p class="yoobar_feat_tite"><?php echo esc_html__('We have created full-proof documentation for you. It will help you to understand how our plugin works.', 'yoo-bar') ?></p>
                   <div>
                      <a class="ydocsbutn" href="https://yoobar.dipashi.com/docs/introduction" target="_blank"><?php echo esc_html__('Documentation', 'yoo-bar') ?></a>
                   </div>
                </li>
             </ul>
          </div>
          <div class="yoobar-feature">
             <ul>
                <li class="yoobar_start">
                   <img class='yoo_dcs_img' src=" <?php echo YOO_BAR_URL . '/assets/admin/img/tutorial.svg' ?>"> 
                   <h3 class="yoobar-feature-title"><?php echo esc_html__('Video Tutorials', 'yoo-bar') ?></h3>
                   <p class="yoobar_feat_tite">
                      <?php echo esc_html__('We\'ve created video tutorials for each section to make the plugin easier to use', 'yoo-bar') ?>
                   </p>
                </li>
                <li><iframe width="580" height="350" src="https://www.youtube.com/embed/yad6v0WcYeU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></li>
             </ul>
          </div>
          <div class="yoobar-feature">
             <div style="text-align:center">
                <a class="ydocsbutn" href="<?php echo admin_url('edit.php?post_type=yoo_bar&page=tutorial'); ?>" style="background:#5e3bc4"><?php echo esc_html__('See The videos', 'yoo-bar') ?></a>
             </div>
          </div>
          <div class="yoobar-feature">
             <div id="yooshado">
                <ul>
                   <li>
                      <svg width="200" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                         <path d="M21,14a1,1,0,0,0-1,1v4a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V15a1,1,0,0,0-2,0v4a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V15A1,1,0,0,0,21,14Zm-9.71,1.71a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l4-4a1,1,0,0,0-1.42-1.42L13,12.59V3a1,1,0,0,0-2,0v9.59l-2.29-2.3a1,1,0,1,0-1.42,1.42Z"  fill="#ca0e4e"/>
                      </svg>
                   </li>
                   <li class="yoobar_start7">
                      <h3 class="yoobar-feature-title"><?php echo esc_html__('Import Demo Data?', 'yoo-bar') ?></h3>
                      <p class="yoobar_feat_tite"><?php echo esc_html__('You can import demo data if you want, you will get sample data inside the plugin folder.', 'yoo-bar') ?> yoo-bar > Sample data > yoobarfree.xml
                         import data: Go to now <i class="dashicons-before dashicons-admin-tools"></i> <strong> Tools > import > WordPress > run importer > click choose file and select yoobarfree.xml file</strong>
                      </p>
                      <a class="ydocsbutn" href="https://yoobar.dipashi.com/docs/import-demo-data/" target="_blank"><?php echo esc_html__('Read Documentation', 'yoo-bar') ?></a>
                   </li>
                </ul>
             </div>
          </div>
          <div class="yoobar-feature">
             <ul>
                <li class="yoobar_start fswr">
                   <img class='yoo_dcs_img' src=" <?php echo YOO_BAR_URL . '/assets/admin/img/question.svg' ?>"> 
                   <h3 class="yoobar-feature-title">FAQ</h3>
                   <p class="yoobar_feat_tite"><?php echo esc_html__('Frequently Asked Questions', 'yoo-bar') ?></p>
                   <div class="yoofaqdes">
                      <h4><?php echo esc_html__('Will this plugin work on all themes?', 'yoo-bar') ?></h4>
                      <p><?php echo esc_html__('Yes, it will work on all kinds of themes. Use it to bring colorful moments to your site. And don’t forget to check out our premium features.', 'yoo-bar') ?></p>
                   </div>
                   <div class="yoofaqdes">
                      <h4><?php echo esc_html__('Is there any support available for the free users?', 'yoo-bar') ?></h4>
                      <p><?php echo esc_html__('Both the free and pro versions bring great support from us. However Pro users will get priority support.', 'yoo-bar') ?></p>
                   </div>
                </li>
             </ul>
          </div>
          <div class="yoobar-feature">
             <ul>
                <li class="yoobar_start">
                   <h3 class="yoobar-feature-title"><?php echo esc_html__('Missing Any Features', 'yoo-bar') ?></h3>
                   <p style="width:90%"><?php echo esc_html__('Do you need any features that we don\'t have in our plugin? Let us know Feel free to do a request from here', 'yoo-bar') ?></p>
                   <a class="ydocsbutn" href="https://sharabindu.com/what-features-want-to-see/" target="_blank" style="background: #e2498a"><?php echo esc_html__('Request Feature', 'yoo-bar') ?></a>
                </li>
                <li><img src=" <?php echo YOO_BAR_URL . '/assets/admin/img/missing.jpg' ?>"></li>
             </ul>
          </div>
          <div class="yoobar-feature">
             <ul>
                <li class="yoobar_start" style="text-align: center;">
                   <img class='yoo_dcs_img' src=" <?php echo YOO_BAR_URL . '/assets/admin/img/support.svg' ?>"> 
                   <h3 class="yoobar-feature-title"><?php echo esc_html__('Support', 'yoo-bar') ?></h3>
                   <p class="yoobar_feat_tite"><?php echo esc_html__('Feeling like consulting an expert? Get our live chat support. We are always ready to help you.', 'yoo-bar') ?></p>
                   <div>
                      <a class="ydocsbutn" href="https://wordpress.org/support/plugin/yoo-bar/" target="_blank"><?php echo esc_html__('Get Support', 'yoo-bar') ?></a>
                   </div>
                </li>
             </ul>
          </div>
          <div class="yoobar-feature">
             <div id="yooshado">
                <ul>
                   <li><img src=" <?php echo YOO_BAR_URL . '/assets/admin/img/review.svg' ?>"></li>
                   <li class="yoobar_start7">
                      <h3 class="yoobar-feature-title"><?php echo esc_html__('Happy with Our Plugin?', 'yoo-bar') ?></h3>
                      <p class="yoobar_feat_tite"><?php echo esc_html__('We are really grateful that you have chosen our plugin. If you like our plugin, please share your happiness by giving us a 5star rating in WordPress Org. It will delight us and will not take more than 2 minutes.', 'yoo-bar') ?></p>
                      <a class="ydocsbutn" href="https://wordpress.org/support/plugin/yoo-bar/reviews/#new-post" target="_blank">Give us 5*</a>
                   </li>
                </ul>
             </div>
          </div>
       </div>
    </div>


    <?php
    }

}

if (class_exists('YooHow_to_use'))
{
    new YooHow_to_use;
};


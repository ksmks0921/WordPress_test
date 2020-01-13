<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

class UT_Admin_Video {
    
    /**
     * Slug
     * @var string
     */
    private $key = 'unite-video-tutorials';    
    
     /**
     * Theme Data
     * @var array
     */
    private $theme = array(); 
    
    /**
     * Home Title
     * @var string
     */
    protected $title = '';
    
    /**
     * Extra Message
     * @bolean
     */
    private $all_good = true;
        
    /**
     * Constructor
     * @since     1.0.0
     * @version   1.0.0
     */
    public function __construct() {
        
        $this->title = esc_html__( 'Video Tutorials', 'unite-admin' );
        $this->hooks();        
            
    }
    
     /**
     * Initiate our hooks
     * @since     1.0.0
     * @version   1.0.0
     */
    public function hooks() {
        
        $this->theme = wp_get_theme();
        
        /* add menu item */
        add_action( 'admin_menu', array( $this, 'add_menu_item' ) );
        
    }
    
    /**
     * Add to menu
     *
     * @since     4.2.3
     * @version   1.0.0
     */
    public function add_menu_item() {
        
        $this->options_page = add_submenu_page(
            'unite-welcome-page', 
            $this->title, 
            $this->title, 
            'manage_options', 
            $this->key, 
            array( $this , 'admin_page_display' ) 
        );
        
    }
    
    /**
     * Admin page markup
     * @since    1.0
     * @version  1.0.0
     */
    public function admin_page_display() { 
        
         /* current user */
        $user_id      = get_current_user_id();
        $current_user = wp_get_current_user();
        $avatar       = get_avatar( $user_id, 160 );
    
        ?>
        
        <div id="ut-admin-wrap" class="clearfix">
            
            <div id="ut-ui-admin-header">
                    
                <div class="grid-10 medium-grid-15 tablet-grid-20 hide-on-mobile grid-parent">
                            
                    <div class="ut-admin-branding">
                        <a href="http://www.unitedthemes.com" target="_blank"><img src="<?php echo THEME_WEB_ROOT; ?>/unite-custom/admin/assets/img/icons/theme_icon.png" alt="UnitedThemes"><span class="version-number">Version <?php echo UT_THEME_VERSION; ?></span></a>
                    </div>
                
                </div>                                                
                
                <div class="grid-90 medium-grid-85 tablet-grid-80 mobile-grid-100 grid-parent">
                
                    <div class="ut-admin-header-title">
                        
                        <?php $theme = wp_get_theme(); ?>
                        
                        <h1><?php esc_html_e( 'Video Tutorials.', 'unite-admin' ); ?></h1>
                    
                    </div>
                
                </div>
                
            </div>
            
                
            <div class="ut-dashboard-nav-bg grid-10 medium-grid-15 hide-on-tablet hide-on-mobile grid-parent">
                    
                <ul class="ut-dashboard-nav">
                    
                    <li>
                        <div class="ut-dashboard-avatar">
                            <?php echo $avatar; ?>
                        </div>
                        
                        <span class="ut-hello-admin">
                            <?php echo sprintf( __('Howdy, %1$s', 'unite'), $current_user->display_name ); ?>
                        </span>                                            
                    </li>
                    
                    <li>
                        <a href="<?php echo get_admin_url(); ?>admin.php?page=<?php echo apply_filters( 'ut_theme_options_page', 'unite-theme-options' ); ?>"><div class="ut-dashboard-theme-option"><img alt="Theme Options" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/theme-options.png"></div><span>Theme Options</span></a>
                    </li>

                    <li>
                        <a href="<?php echo get_admin_url(); ?>admin.php?page=unite-theme-info"><div class="ut-dashboard-server-health"><img alt="Server Health" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/server-health.png"></div><span>Server Health</span></a>
                    </li>
                    
                    <li>
                        <a href="<?php echo get_admin_url(); ?>admin.php?page=<?php echo apply_filters( 'ut_demo_importer_page', 'unite-demo-importer' ); ?>"><div class="ut-dashboard-demo-importer"><img alt="Demo Installer" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/demo-importer.png"></div><span>Demo Installer</span></a>
                    </li>
                    
                    <li>
                        <a target="_blank" href="http://helpdesk.unitedthemes.com/"><div class="ut-theme-support"><img alt="Theme Support" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/theme-support.png"></div><span>Theme Support</span></a>
                    </li>
                    
                </ul>
                
            </div>
                
            <div class="ut-option-holder grid-90 medium-grid-85 tablet-grid-100 mobile-grid-100">
            
                <div id="ut-dashboard-content">
                
                    <div class="grid-70 prefix-15 medium-grid-100 tablet-grid-100 mobile-grid-100">
                        
                        <div class="ut-dashboard-hero">
                        
                            <h1><?php esc_html_e( 'Video Tutorials' , 'unite-admin' ); ?></h1>
                   
                            <div class="hide-on-mobile"><?php esc_html_e( 'In future you will find all available video tutorials inside this admin page.', 'unite-admin' ); ?></div>
                        
                        </div>
                    
                    </div>
                    
                    <div class="grid-33 medium-grid-100 tablet-grid-100 mobile-grid-100">
                        
                        <div class="ut-dashboard-widget">
                            
                            <div class="ut-widget-hero">
                            
                                <h3>One Click Demo Installer</h3>
                            
                            </div>
                            
                            <?php echo do_shortcode('[ut_united_video url="https://youtu.be/z_8ePTj5ido" poster="' . THEME_WEB_ROOT . '/unite/core/admin/assets/img/tutorials/' . 'onelick-cover.jpg"]'); ?>
                        
                        </div>
                        
                    </div>
                    
                    <div class="grid-33 medium-grid-100 tablet-grid-100 mobile-grid-100">
                        
                         <div class="ut-dashboard-widget">
                            
                            <div class="ut-widget-hero">
                            
                                <h3>How to link Visual Composer sections</h3>
                            
                            </div>
                            
                            <?php echo do_shortcode('[ut_united_video url="https://youtu.be/NAU7eXFsyiw" poster="' . THEME_WEB_ROOT . '/unite/core/admin/assets/img/tutorials/' . 'onelick-cover.jpg"]'); ?>
                        
                        </div>                        
                    
                    </div>
                    
                    
                </div>
        
            </div>
            
        </div>

        
    <?php /* end admin page display */
    
    }
    
}

new UT_Admin_Video();
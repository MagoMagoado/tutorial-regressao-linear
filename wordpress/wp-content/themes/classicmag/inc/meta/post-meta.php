<?php
/**
* Sidebar Metabox.
*
* @package Classicmag
*/
if( !function_exists( 'classicmag_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function classicmag_sanitize_sidebar_option_meta( $input ){

        $metabox_options = array( 'left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists('classicmag_sanitize_meta_pagination') ):

    /** Sanitize Enable Disable Checkbox **/
    function classicmag_sanitize_meta_pagination( $input ) {

        $valid_keys = array('global-layout','no-navigation','norma-navigation','ajax-next-post-load');
        if ( in_array( $input , $valid_keys ) ) {
            return $input;
        }
        return '';

    }

endif;

if( !function_exists( 'classicmag_sanitize_post_layout_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function classicmag_sanitize_post_layout_option_meta( $input ){

        $metabox_options = array( 'global-layout','layout-1','layout-2' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;


if( !function_exists( 'classicmag_sanitize_header_overlay_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function classicmag_sanitize_header_overlay_option_meta( $input ){

        $metabox_options = array( 'global-layout','enable-overlay' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;

add_action( 'add_meta_boxes', 'classicmag_metabox' );

if( ! function_exists( 'classicmag_metabox' ) ):


    function  classicmag_metabox() {
        
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'classicmag' ),
            'classicmag_post_metafield_callback',
            'post', 
            'normal', 
            'high'
        );
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'classicmag' ),
            'classicmag_post_metafield_callback',
            'page',
            'normal', 
            'high'
        ); 
    }

endif;

$classicmag_page_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'classicmag' ),
    'layout-2' => esc_html__( 'Banner Layout', 'classicmag' ),
);

$classicmag_post_sidebar_fields = array(
    'right-sidebar' => array(
                    'id'        => 'post-left-sidebar',
                    'value' => 'right-sidebar',
                    'label' => esc_html__( 'Right sidebar', 'classicmag' ),
                ),
    'left-sidebar' => array(
                    'id'        => 'post-right-sidebar',
                    'value'     => 'left-sidebar',
                    'label'     => esc_html__( 'Left sidebar', 'classicmag' ),
                ),
    'no-sidebar' => array(
                    'id'        => 'post-no-sidebar',
                    'value'     => 'no-sidebar',
                    'label'     => esc_html__( 'No sidebar', 'classicmag' ),
                ),
);

$classicmag_post_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'classicmag' ),
    'layout-2' => esc_html__( 'Banner Layout', 'classicmag' ),
);

$classicmag_header_overlay_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'classicmag' ),
    'enable-overlay' => esc_html__( 'Enable Header Overlay', 'classicmag' ),
);


/**
 * Callback function for post option.
*/
if( ! function_exists( 'classicmag_post_metafield_callback' ) ):
    
    function classicmag_post_metafield_callback() {
        global $post, $classicmag_post_sidebar_fields, $classicmag_post_layout_options,  $classicmag_page_layout_options, $classicmag_header_overlay_options;
        $post_type = get_post_type($post->ID);
        wp_nonce_field( basename( __FILE__ ), 'classicmag_post_meta_nonce' ); ?>
        
        <div class="metabox-main-block">

            <div class="metabox-navbar">
                <ul>

                    <li>
                        <a id="metabox-navbar-appearance"  class="metabox-navbar-active" href="javascript:void(0)">

                            <?php esc_html_e('Appearance Settings', 'classicmag'); ?>

                        </a>
                    </li>

                    <?php if ($post_type != 'page') { ?>
                        <li>
                            <a id="metabox-navbar-general" href="javascript:void(0)">

                                <?php esc_html_e('General Settings', 'classicmag'); ?>

                            </a>
                        </li>
                    <?php } ?>


                    <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ): ?>
                        <li>
                            <a id="twp-tab-booster" href="javascript:void(0)">

                                <?php esc_html_e('Booster Extension Settings', 'classicmag'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="twp-tab-content">

                <div id="metabox-navbar-general-content" class="metabox-content-wrap">

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Sidebar Layout','classicmag'); ?></h3>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <?php
                            $classicmag_post_sidebar = esc_html( get_post_meta( $post->ID, 'classicmag_post_sidebar_option', true ) ); 
                            if( $classicmag_post_sidebar == '' ){ $classicmag_post_sidebar = 'no-sidebar'; }

                            foreach ( $classicmag_post_sidebar_fields as $classicmag_post_sidebar_field) { ?>

                                <label class="description">

                                    <input type="radio" name="classicmag_post_sidebar_option" value="<?php echo esc_attr( $classicmag_post_sidebar_field['value'] ); ?>" <?php if( $classicmag_post_sidebar_field['value'] == $classicmag_post_sidebar ){ echo "checked='checked'";} if( empty( $classicmag_post_sidebar ) && $classicmag_post_sidebar_field['value']=='right-sidebar' ){ echo "checked='checked'"; } ?>/>&nbsp;<?php echo esc_html( $classicmag_post_sidebar_field['label'] ); ?>

                                </label>

                            <?php } ?>

                        </div>

                    </div>

                </div>


                <div id="metabox-navbar-appearance-content" class="metabox-content-wrap metabox-content-wrap-active">

                    <?php if( $post_type == 'page' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Banner Layout','classicmag'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $classicmag_page_layout = esc_html( get_post_meta( $post->ID, 'classicmag_page_layout', true ) ); 
                                if( $classicmag_page_layout == '' ){ $classicmag_page_layout = 'layout-1'; }

                                foreach ( $classicmag_page_layout_options as $key => $classicmag_page_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="classicmag_page_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $classicmag_page_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $classicmag_page_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','classicmag'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                <?php
                                $classicmag_ed_header_overlay = esc_attr( get_post_meta( $post->ID, 'classicmag_ed_header_overlay', true ) ); ?>

                                <input type="checkbox" id="classicmag-header-overlay" name="classicmag_ed_header_overlay" value="1" <?php if( $classicmag_ed_header_overlay ){ echo "checked='checked'";} ?>/>

                                <label for="classicmag-header-overlay"><?php esc_html_e( 'Enable Header Overlay','classicmag' ); ?></label>

                            </div>

                        </div>

                    <?php endif; ?>

                    <?php if( $post_type == 'post' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Title Layout','classicmag'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $classicmag_post_layout = esc_html( get_post_meta( $post->ID, 'classicmag_post_layout', true ) ); 

                                foreach ( $classicmag_post_layout_options as $key => $classicmag_post_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="classicmag_post_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $classicmag_post_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $classicmag_post_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','classicmag'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $classicmag_header_overlay = esc_html( get_post_meta( $post->ID, 'classicmag_header_overlay', true ) ); 
                                if( $classicmag_header_overlay == '' ){ $classicmag_header_overlay = 'global-layout'; }

                                foreach ( $classicmag_header_overlay_options as $key => $classicmag_header_overlay_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="classicmag_header_overlay" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $classicmag_header_overlay ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $classicmag_header_overlay_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                    <?php endif; ?>


                </div>

                <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ):

                    
                    $classicmag_ed_post_views = esc_html( get_post_meta( $post->ID, 'classicmag_ed_post_views', true ) );
                    $classicmag_ed_post_read_time = esc_html( get_post_meta( $post->ID, 'classicmag_ed_post_read_time', true ) );
                    $classicmag_ed_post_like_dislike = esc_html( get_post_meta( $post->ID, 'classicmag_ed_post_like_dislike', true ) );
                    $classicmag_ed_post_author_box = esc_html( get_post_meta( $post->ID, 'classicmag_ed_post_author_box', true ) );
                    $classicmag_ed_post_social_share = esc_html( get_post_meta( $post->ID, 'classicmag_ed_post_social_share', true ) );
                    $classicmag_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'classicmag_ed_post_reaction', true ) );
                    $classicmag_ed_post_rating = esc_html( get_post_meta( $post->ID, 'classicmag_ed_post_rating', true ) );
                    ?>

                    <div id="twp-tab-booster-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Booster Extension Plugin Content','classicmag'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="classicmag-ed-post-views" name="classicmag_ed_post_views" value="1" <?php if( $classicmag_ed_post_views ){ echo "checked='checked'";} ?>/>
                                    <label for="classicmag-ed-post-views"><?php esc_html_e( 'Disable Post Views','classicmag' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="classicmag-ed-post-read-time" name="classicmag_ed_post_read_time" value="1" <?php if( $classicmag_ed_post_read_time ){ echo "checked='checked'";} ?>/>
                                    <label for="classicmag-ed-post-read-time"><?php esc_html_e( 'Disable Post Read Time','classicmag' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="classicmag-ed-post-like-dislike" name="classicmag_ed_post_like_dislike" value="1" <?php if( $classicmag_ed_post_like_dislike ){ echo "checked='checked'";} ?>/>
                                    <label for="classicmag-ed-post-like-dislike"><?php esc_html_e( 'Disable Post Like Dislike','classicmag' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="classicmag-ed-post-author-box" name="classicmag_ed_post_author_box" value="1" <?php if( $classicmag_ed_post_author_box ){ echo "checked='checked'";} ?>/>
                                    <label for="classicmag-ed-post-author-box"><?php esc_html_e( 'Disable Post Author Box','classicmag' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="classicmag-ed-post-social-share" name="classicmag_ed_post_social_share" value="1" <?php if( $classicmag_ed_post_social_share ){ echo "checked='checked'";} ?>/>
                                    <label for="classicmag-ed-post-social-share"><?php esc_html_e( 'Disable Post Social Share','classicmag' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="classicmag-ed-post-reaction" name="classicmag_ed_post_reaction" value="1" <?php if( $classicmag_ed_post_reaction ){ echo "checked='checked'";} ?>/>
                                    <label for="classicmag-ed-post-reaction"><?php esc_html_e( 'Disable Post Reaction','classicmag' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="classicmag-ed-post-rating" name="classicmag_ed_post_rating" value="1" <?php if( $classicmag_ed_post_rating ){ echo "checked='checked'";} ?>/>
                                    <label for="classicmag-ed-post-rating"><?php esc_html_e( 'Disable Post Rating','classicmag' ); ?></label>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>
                
            </div>

        </div>  
            
    <?php }
endif;

// Save metabox value.
add_action( 'save_post', 'classicmag_save_post_meta' );

if( ! function_exists( 'classicmag_save_post_meta' ) ):

    function classicmag_save_post_meta( $post_id ) {

        global $post, $classicmag_post_sidebar_fields, $classicmag_post_layout_options, $classicmag_header_overlay_options,  $classicmag_page_layout_options;

        if ( !isset( $_POST[ 'classicmag_post_meta_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['classicmag_post_meta_nonce'] ) ), basename( __FILE__ ) ) ){

            return;

        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){

            return;

        }
            
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  

            if ( !current_user_can( 'edit_page', $post_id ) ){  

                return $post_id;

            }

        }elseif( !current_user_can( 'edit_post', $post_id ) ) {

            return $post_id;

        }


        foreach ( $classicmag_post_sidebar_fields as $classicmag_post_sidebar_field ) {  
            

                $old = esc_html( get_post_meta( $post_id, 'classicmag_post_sidebar_option', true ) ); 
                $new = isset( $_POST['classicmag_post_sidebar_option'] ) ? classicmag_sanitize_sidebar_option_meta( wp_unslash( $_POST['classicmag_post_sidebar_option'] ) ) : '';

                if ( $new && $new != $old ){

                    update_post_meta ( $post_id, 'classicmag_post_sidebar_option', $new );

                }elseif( '' == $new && $old ) {

                    delete_post_meta( $post_id,'classicmag_post_sidebar_option', $old );

                }

            
        }

        $twp_disable_ajax_load_next_post_old = esc_html( get_post_meta( $post_id, 'twp_disable_ajax_load_next_post', true ) ); 
        $twp_disable_ajax_load_next_post_new = isset( $_POST['twp_disable_ajax_load_next_post'] ) ? classicmag_sanitize_meta_pagination( wp_unslash( $_POST['twp_disable_ajax_load_next_post'] ) ) : '';

        if( $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_new != $twp_disable_ajax_load_next_post_old ){

            update_post_meta ( $post_id, 'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_new );

        }elseif( '' == $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_old ) {

            delete_post_meta( $post_id,'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_old );

        }


        foreach ( $classicmag_post_layout_options as $classicmag_post_layout_option ) {  
            
            $classicmag_post_layout_old = esc_html( get_post_meta( $post_id, 'classicmag_post_layout', true ) ); 
            $classicmag_post_layout_new = isset( $_POST['classicmag_post_layout'] ) ? classicmag_sanitize_post_layout_option_meta( wp_unslash( $_POST['classicmag_post_layout'] ) ) : '';

            if ( $classicmag_post_layout_new && $classicmag_post_layout_new != $classicmag_post_layout_old ){

                update_post_meta ( $post_id, 'classicmag_post_layout', $classicmag_post_layout_new );

            }elseif( '' == $classicmag_post_layout_new && $classicmag_post_layout_old ) {

                delete_post_meta( $post_id,'classicmag_post_layout', $classicmag_post_layout_old );

            }
            
        }



        foreach ( $classicmag_header_overlay_options as $classicmag_header_overlay_option ) {  
            
            $classicmag_header_overlay_old = esc_html( get_post_meta( $post_id, 'classicmag_header_overlay', true ) ); 
            $classicmag_header_overlay_new = isset( $_POST['classicmag_header_overlay'] ) ? classicmag_sanitize_header_overlay_option_meta( wp_unslash( $_POST['classicmag_header_overlay'] ) ) : '';

            if ( $classicmag_header_overlay_new && $classicmag_header_overlay_new != $classicmag_header_overlay_old ){

                update_post_meta ( $post_id, 'classicmag_header_overlay', $classicmag_header_overlay_new );

            }elseif( '' == $classicmag_header_overlay_new && $classicmag_header_overlay_old ) {

                delete_post_meta( $post_id,'classicmag_header_overlay', $classicmag_header_overlay_old );

            }
            
        }


        $classicmag_ed_post_views_old = esc_html( get_post_meta( $post_id, 'classicmag_ed_post_views', true ) ); 
        $classicmag_ed_post_views_new = isset( $_POST['classicmag_ed_post_views'] ) ? absint( wp_unslash( $_POST['classicmag_ed_post_views'] ) ) : '';

        if ( $classicmag_ed_post_views_new && $classicmag_ed_post_views_new != $classicmag_ed_post_views_old ){

            update_post_meta ( $post_id, 'classicmag_ed_post_views', $classicmag_ed_post_views_new );

        }elseif( '' == $classicmag_ed_post_views_new && $classicmag_ed_post_views_old ) {

            delete_post_meta( $post_id,'classicmag_ed_post_views', $classicmag_ed_post_views_old );

        }



        $classicmag_ed_post_read_time_old = esc_html( get_post_meta( $post_id, 'classicmag_ed_post_read_time', true ) ); 
        $classicmag_ed_post_read_time_new = isset( $_POST['classicmag_ed_post_read_time'] ) ? absint( wp_unslash( $_POST['classicmag_ed_post_read_time'] ) ) : '';

        if ( $classicmag_ed_post_read_time_new && $classicmag_ed_post_read_time_new != $classicmag_ed_post_read_time_old ){

            update_post_meta ( $post_id, 'classicmag_ed_post_read_time', $classicmag_ed_post_read_time_new );

        }elseif( '' == $classicmag_ed_post_read_time_new && $classicmag_ed_post_read_time_old ) {

            delete_post_meta( $post_id,'classicmag_ed_post_read_time', $classicmag_ed_post_read_time_old );

        }



        $classicmag_ed_post_like_dislike_old = esc_html( get_post_meta( $post_id, 'classicmag_ed_post_like_dislike', true ) ); 
        $classicmag_ed_post_like_dislike_new = isset( $_POST['classicmag_ed_post_like_dislike'] ) ? absint( wp_unslash( $_POST['classicmag_ed_post_like_dislike'] ) ) : '';

        if ( $classicmag_ed_post_like_dislike_new && $classicmag_ed_post_like_dislike_new != $classicmag_ed_post_like_dislike_old ){

            update_post_meta ( $post_id, 'classicmag_ed_post_like_dislike', $classicmag_ed_post_like_dislike_new );

        }elseif( '' == $classicmag_ed_post_like_dislike_new && $classicmag_ed_post_like_dislike_old ) {

            delete_post_meta( $post_id,'classicmag_ed_post_like_dislike', $classicmag_ed_post_like_dislike_old );

        }



        $classicmag_ed_post_author_box_old = esc_html( get_post_meta( $post_id, 'classicmag_ed_post_author_box', true ) ); 
        $classicmag_ed_post_author_box_new = isset( $_POST['classicmag_ed_post_author_box'] ) ? absint( wp_unslash( $_POST['classicmag_ed_post_author_box'] ) ) : '';

        if ( $classicmag_ed_post_author_box_new && $classicmag_ed_post_author_box_new != $classicmag_ed_post_author_box_old ){

            update_post_meta ( $post_id, 'classicmag_ed_post_author_box', $classicmag_ed_post_author_box_new );

        }elseif( '' == $classicmag_ed_post_author_box_new && $classicmag_ed_post_author_box_old ) {

            delete_post_meta( $post_id,'classicmag_ed_post_author_box', $classicmag_ed_post_author_box_old );

        }



        $classicmag_ed_post_social_share_old = esc_html( get_post_meta( $post_id, 'classicmag_ed_post_social_share', true ) ); 
        $classicmag_ed_post_social_share_new = isset( $_POST['classicmag_ed_post_social_share'] ) ? absint( wp_unslash( $_POST['classicmag_ed_post_social_share'] ) ) : '';

        if ( $classicmag_ed_post_social_share_new && $classicmag_ed_post_social_share_new != $classicmag_ed_post_social_share_old ){

            update_post_meta ( $post_id, 'classicmag_ed_post_social_share', $classicmag_ed_post_social_share_new );

        }elseif( '' == $classicmag_ed_post_social_share_new && $classicmag_ed_post_social_share_old ) {

            delete_post_meta( $post_id,'classicmag_ed_post_social_share', $classicmag_ed_post_social_share_old );

        }



        $classicmag_ed_post_reaction_old = esc_html( get_post_meta( $post_id, 'classicmag_ed_post_reaction', true ) ); 
        $classicmag_ed_post_reaction_new = isset( $_POST['classicmag_ed_post_reaction'] ) ? absint( wp_unslash( $_POST['classicmag_ed_post_reaction'] ) ) : '';

        if ( $classicmag_ed_post_reaction_new && $classicmag_ed_post_reaction_new != $classicmag_ed_post_reaction_old ){

            update_post_meta ( $post_id, 'classicmag_ed_post_reaction', $classicmag_ed_post_reaction_new );

        }elseif( '' == $classicmag_ed_post_reaction_new && $classicmag_ed_post_reaction_old ) {

            delete_post_meta( $post_id,'classicmag_ed_post_reaction', $classicmag_ed_post_reaction_old );

        }



        $classicmag_ed_post_rating_old = esc_html( get_post_meta( $post_id, 'classicmag_ed_post_rating', true ) ); 
        $classicmag_ed_post_rating_new = isset( $_POST['classicmag_ed_post_rating'] ) ? absint( wp_unslash( $_POST['classicmag_ed_post_rating'] ) ) : '';

        if ( $classicmag_ed_post_rating_new && $classicmag_ed_post_rating_new != $classicmag_ed_post_rating_old ){

            update_post_meta ( $post_id, 'classicmag_ed_post_rating', $classicmag_ed_post_rating_new );

        }elseif( '' == $classicmag_ed_post_rating_new && $classicmag_ed_post_rating_old ) {

            delete_post_meta( $post_id,'classicmag_ed_post_rating', $classicmag_ed_post_rating_old );

        }

        foreach ( $classicmag_page_layout_options as $classicmag_post_layout_option ) {  
        
            $classicmag_page_layout_old = sanitize_text_field( get_post_meta( $post_id, 'classicmag_page_layout', true ) ); 
            $classicmag_page_layout_new = isset( $_POST['classicmag_page_layout'] ) ? classicmag_sanitize_post_layout_option_meta( wp_unslash( $_POST['classicmag_page_layout'] ) ) : '';

            if ( $classicmag_page_layout_new && $classicmag_page_layout_new != $classicmag_page_layout_old ){

                update_post_meta ( $post_id, 'classicmag_page_layout', $classicmag_page_layout_new );

            }elseif( '' == $classicmag_page_layout_new && $classicmag_page_layout_old ) {

                delete_post_meta( $post_id,'classicmag_page_layout', $classicmag_page_layout_old );

            }
            
        }

        $classicmag_ed_header_overlay_old = absint( get_post_meta( $post_id, 'classicmag_ed_header_overlay', true ) ); 
        $classicmag_ed_header_overlay_new = isset( $_POST['classicmag_ed_header_overlay'] ) ? absint( wp_unslash( $_POST['classicmag_ed_header_overlay'] ) ) : '';

        if ( $classicmag_ed_header_overlay_new && $classicmag_ed_header_overlay_new != $classicmag_ed_header_overlay_old ){

            update_post_meta ( $post_id, 'classicmag_ed_header_overlay', $classicmag_ed_header_overlay_new );

        }elseif( '' == $classicmag_ed_header_overlay_new && $classicmag_ed_header_overlay_old ) {

            delete_post_meta( $post_id,'classicmag_ed_header_overlay', $classicmag_ed_header_overlay_old );

        }

    }

endif;   
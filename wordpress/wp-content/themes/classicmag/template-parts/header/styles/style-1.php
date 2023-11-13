<?php

$is_sticky = classicmag_get_option('enable_sticky_menu');

$enable_header_date = classicmag_get_option('enable_header_date');
$enable_header_time = classicmag_get_option('enable_header_time');



?>
<div class="site-branding-center">
    <div class="wrapper">
        <div class="header-component-center">
            <?php if ($enable_header_date) :
                $date_format = classicmag_get_option('todays_date_format', 'l ,  j  F Y');
                ?>
                <div class="site-header-component header-component-date">
                    <div class="header-component-icon">
                        <?php classicmag_theme_svg('calendar'); ?>
                    </div>
                    <div class="theme-display-date">
                        <?php echo date_i18n($date_format, current_time('timestamp')); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($enable_header_time) : ?>
                <div class="site-header-component header-component-time">
                    <div class="header-component-icon">
                        <?php classicmag_theme_svg('clock'); ?>
                    </div>
                    <div class="theme-display-clock"></div>
                </div>
            <?php endif; ?>
        </div>

        <div class="header-component-bottom">
            <?php get_template_part('template-parts/header/site-branding'); ?>
    
            <button id="theme-toggle-offcanvas-button" class="hide-on-desktop theme-button theme-button-transparent theme-button-offcanvas" aria-expanded="false" aria-controls="theme-offcanvas-navigation">
                <span class="screen-reader-text"><?php _e('Menu', 'classicmag'); ?></span>
                <span class="toggle-icon"><?php classicmag_theme_svg('menu'); ?></span>
            </button>
        </div>
    </div>
</div>


<div class="masthead-main-navigation <?php echo ($is_sticky) ? 'has-sticky-header' : ''; ?>">
    <div class="wrapper">
        <div class="site-header-wrapper">
            <div class="site-header-center">
                <div id="site-navigation" class="main-navigation theme-primary-menu">
                    <?php
                    if (has_nav_menu('primary-menu')) {
                        ?>
                        <nav class="primary-menu-wrapper"
                             aria-label="<?php echo esc_attr_x('Primary', 'menu', 'classicmag'); ?>">
                            <ul class="primary-menu reset-list-style">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'primary-menu'
                                    )
                                );
                                ?>
                            </ul>
                        </nav><!-- .primary-menu-wrapper -->
                        <?php
                    } else { ?>
                        <nav class="primary-menu-wrapper"
                             aria-label="<?php echo esc_attr_x('Primary', 'menu', 'classicmag'); ?>">
                            <ul class="primary-menu reset-list-style">
                                <?php
                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                    )
                                );

                                ?>
                            </ul>
                        </nav><!-- .primary-menu-wrapper -->

                    <?php } ?>
                </div><!-- .main-navigation -->
            </div>
        </div>
    </div>

</div>
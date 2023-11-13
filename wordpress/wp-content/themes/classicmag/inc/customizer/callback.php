<?php

if (!function_exists('classicmag_is_top_bar_enabled')) :
    /**
     * Check if top bar is enabled
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function classicmag_is_top_bar_enabled($control)
    {

        if ($control->manager->get_setting('classicmag_options[enable_top_bar]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('classicmag_is_todays_date_enabled')) :
    /**
     * Check if Todays Date is enabled
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function classicmag_is_todays_date_enabled($control)
    {

        if ($control->manager->get_setting('classicmag_options[enable_header_date]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('classicmag_is_show_preloader')) :
    /**
     * Check if top bar is enabled
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function classicmag_is_show_preloader($control)
    {

        if ($control->manager->get_setting('classicmag_options[show_preloader]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('classicmag_is_dark_mode_enabled')) :
    /**
     * Check if Dark mode is enabled
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function classicmag_is_dark_mode_enabled($control)
    {

        if ($control->manager->get_setting('classicmag_options[enable_dark_mode]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('classicmag_shop_select_product_from')) :
    /**
     * Check if author Posts is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function classicmag_shop_select_product_from($control)
    {
        if ($control->manager->get_setting('classicmag_options[shop_select_product_from]')->value() === 'custom') {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('classicmag_is_progressbar_enabled')) :
    /**
     * Check if progressbar is enabled
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function classicmag_is_progressbar_enabled($control)
    {

        if ($control->manager->get_setting('classicmag_options[show_progressbar]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('classicmag_is_related_posts_enabled')) :
    /**
     * Check if related Posts is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function classicmag_is_related_posts_enabled($control)
    {
        if ($control->manager->get_setting('classicmag_options[show_related_posts]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('classicmag_is_author_posts_enabled')) :
    /**
     * Check if author Posts is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function classicmag_is_author_posts_enabled($control)
    {
        if ($control->manager->get_setting('classicmag_options[show_author_posts]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;
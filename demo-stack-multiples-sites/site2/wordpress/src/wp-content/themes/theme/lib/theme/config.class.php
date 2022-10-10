<?php

$themeConfigDefault = array(
    'prefix' => 'theme',
    'admin_bar' => true,
    'output_buffer' => false,
    'ajax' => true,
    'remove_emoji' => true,
    'remove_recent_comments_style' => true,
    'enable_svg_upload' => true,
    'json_api' => false,
    'clean_header' => true,
    'disable_comments' => true,
    'disable_search' => false,
    'custom_login_logo' => false,
    'auto_robots.txt' => true,
    'disable_cf7_auto_p' => true,
    'admin_slug' => false,
    'revoke_user_access' => [],

    # Default post thumbnail size
    /*
    'image_post_thumbnail'         => array(
        #width / height / crop
        '200',
        '200',
        true
    ),
    */

    # Image sizes
    'image_sizes' => array(#name / width / height / crop
    ),

    # Navigation menus
    'nav_menus' => array(
        'primary_navigation' => 'Primary Navigation',
        //'footer_navigation' => 'Footer Navigation',
    ),

    # Active menu classes
    # Example: ['my-custom-class', 'active-page', 'foo']
    'active_menu_classes' => array(),

    # Widget areas
    # Example: [ area_id => area_name ]
    'widgets' => array(),

    # Remove dashboard common widget
    'clean_dashboard' => true,

    # Enable custom dashboard widgets
    'custom_welcome_dashboard' => true,

    # Custom widgets
    'custom_widgets_support' => true,
    'custom_widgets_news' => false,
    'use_fly_images' => true,
);

/**
 * Class Config - manipulate with configs
 */
class Config
{

    public static $config = false;
    public static $scripts = false;

    public function __construct($defaultConfig = false) {

        if ($defaultConfig) {
            self::$config = $defaultConfig;
        }

        # Load config.file.php
        if (file_exists(get_template_directory() . '/lib/config.file.php')) {
            include get_template_directory() . '/lib/config.file.php';
            if (isset($themeConfig)) {
                self::$config = self::array_merge_recursive_ex(self::$config, $themeConfig);
            }
            if (isset($themeScripts)) {
                self::$scripts = $themeScripts;
            }
        }

    }

    public static function array_merge_recursive_ex(array $array1, array $array2) {
        $merged = $array1;

        foreach ($array2 as $key => & $value) {
            if (is_array($value) && isset($merged[$key]) && is_array($merged[$key])) {
                $merged[$key] = self::array_merge_recursive_ex($merged[$key], $value);
            } else if (is_numeric($key)) {
                if (!in_array($value, $merged)) {
                    $merged[] = $value;
                }
            } else {
                $merged[$key] = $value;
            }
        }

        return $merged;
    }

    public static function array_merge_recursive2($paArray1, $paArray2) {
        if (!is_array($paArray1) or !is_array($paArray2)) {
            return $paArray2;
        }
        foreach ($paArray2 AS $sKey2 => $sValue2) {
            $paArray1[$sKey2] = self::array_merge_recursive2(@$paArray1[$sKey2], $sValue2);
        }

        return $paArray1;
    }

    public static function debug() {
        debugP(self::$config);
    }

    public static function get($key = false) {
        if (isset(self::$config[$key])) {
            return self::$config[$key];
        } else {
            return false;
        }
    }

    public static function get_script($key) {
        if (isset(self::$scripts[$key])) {
            return self::$scripts[$key];
        } else {
            return false;
        }
    }

    public static function get_scripts($key = false) {
        if (isset(self::$scripts[$key])) {
            return self::$scripts[$key];
        }

        return false;
    }
}

new Config($themeConfigDefault);

if (isset($_GET['zonemedia_debug'])) {
    Config::debug();

    /**
     * @todo pridat viac informacii koli debugu
     */
}
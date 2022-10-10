<?php

/**
 * Class Images - Image manipulation class
 */
Class Images
{

    /**
     * Get image url for image by ID
     *
     * @param mixed $id
     * @param string $size
     * @param null $crop
     *
     * @return string|bool
     */
    public static function get($id = false, $size = 'post-thumbnail', $crop = null) {
        $image = false;

        if (!$id) {
            return $image;
        }

        if ($image_data = wp_get_attachment_image_src($id, $size)) {
            if (!isset($image_data[0])) {
                return $image;
            }

            $image = $image_data[0];

            if (strpos($image, ".svg") !== false) {
                return $image;
            }
        }

        if (function_exists('fly_get_attachment_image_src') && $size !== 'post-thumbnail' && !empty(fly_get_image_size($size))) {
            if ($image_data = fly_get_attachment_image_src($id, $size, $crop)) {
                $image = isset($image_data['src']) ? $image_data['src'] : $image_data[0];
            }
        } else {
            $image_data = wp_get_attachment_image_src($id, $size, false);
            if ($image_data) {
                $image = isset($image_data['url']) ? $image_data['url'] : $image_data[0];
            }
        }

        return $image;
    }

    /**
     * Returns post thumbnail id
     */
    public static function thumbnail_id($id = false) {
        return get_post_thumbnail_id($id);
    }

    /**
     * Get image array
     *
     * @param int $attachment_id
     * @param string $size
     * @param null $crop
     *
     * @return array
     */
    public static function src($attachment_id = 0, $size = '', $crop = null) {
        return fly_get_attachment_image_src($attachment_id, $size, $crop);
    }

    /**
     * Get a dynamically generated image HTML
     *
     * @param integer $attachment_id
     * @param mixed $size
     * @param boolean $crop
     * @param array $attr
     *
     * @return string
     */
    public static function image($attachment_id = 0, $size = '', $crop = null, $attr = array()) {
        return fly_get_attachment_image($attachment_id, $size, $crop, $attr);
    }

    public static function alt($attachment_id = 0) {
        return get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
    }
}

new Images();
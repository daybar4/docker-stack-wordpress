<?php

/**
 * Pagination
 */

/**
 * Creates pagination
 *
 * @param mixed $pages
 * @param int $range
 * @global int $paged
 * @global object $wp_query
 *
 */
function zm_pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo '<div class="mtz al_center">';

        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
            echo "<a href='" . get_pagenum_link(1) . "' class='dinblock vmid gutter'><span class=\"x16 blue2\">" . __('First', 'eye') . "</span></a>";
        }

        if ($paged > 1) {
            echo "<a href='" . get_pagenum_link($paged - 1) . "' class='dinblock vmid gutter'><span class=\"x16 blue2\">" . __('Previous', 'eye') . "</span></a>";
        }

        echo '<ul class="pagination dinblock vmid">';
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? "<li class='active'><a href='#'>" . $i . "</a></li>" : "<li class='waves-effect'><a href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
            }
        }
        echo '</ul>';

        if ($paged < $pages) {
            echo "<a href='" . get_pagenum_link($paged + 1) . "' class='dinblock vmid gutter'><span class=\"x16 blue2\">" . __('Next', 'eye') . "</span></a>";
        }
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
            echo "<a href='" . get_pagenum_link($pages) . "' class='dinblock vmid gutter'><span class=\"x16 blue2\">" . __('Last', 'eye') . "</span></a>";
        }

        echo "</div>\n";
    }
}
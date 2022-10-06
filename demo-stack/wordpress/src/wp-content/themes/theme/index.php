<?php
/**
 * Index.php file
 */

get_template_part('templates/single/hero-news');
get_template_part('templates/builder/breadcrumbs');

?>
<section class="news_list common_module_padding">
    <div class="inner_wrapper">
        <ul class="row">
            <?php
            $i = 1;
            while (have_posts()) : the_post();

                get_template_part('templates/single/content-loop');

                /**
                 * if ($i == 5) {
                 * get_template_part('templates/single/loop-large');
                 * } else {
                 * get_template_part('templates/single/content-loop');
                 * }
                 */
                $i++;
            endwhile;
            ?>
        </ul>
        <div class="row">
            <div class="col_xl_12">
                <?php
                zm_pagination();
                ?>
            </div>
        </div>
    </div>
</section>

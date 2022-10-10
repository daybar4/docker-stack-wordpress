<?php
get_template_part('templates/general/page-header');

//get_template_part('templates/builder/breadcrumbs');
get_template_part('templates/single/single-page-header');
?>
    <div class="news_detail_module common_module_padding">
        <div class="inner_wrapper">
            <div class="row">
                <div class="col_xl_12">
                    <h1 class="x34 bold xfont5 mgbot10"><?php the_title() ?></h1>
                    <p class="x12 mgbot15">
                        <?php
                        echo get_the_date() . ' - ' . get_the_time();
                        ?>
                    </p>
                    <div class="user_content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

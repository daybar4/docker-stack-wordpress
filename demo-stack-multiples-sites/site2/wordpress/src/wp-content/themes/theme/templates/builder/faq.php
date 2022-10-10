<?php
if ( ! $x['faq'] ) {
	return;
}
?>
<section class="faqs_list common_module_padding">
    <div class="inner_wrapper">
        <div class="row">
            <div class="col_xl_12">
                <div class="faqs">
                    <ul class="faq_list">
						<?php
						foreach ( $x['faq'] as $faq ) {
							?>
                            <li>

                                <button class="faq_question" aria-expanded="false">
                                    <span class="x16 xfont3 bold"><?php echo $faq['question'] ?></span>
                                </button>
                                <div class="faq_answer user_content x16">
									<?php echo $faq['answer']; ?>
									<?php
									if ( $faq['cta_links'] ) {
										foreach ( $faq['cta_links'] as $cta ) {
											if ( $cta['cta_link'] ) {
												echo zm_link( $cta['cta_link'], 'common_link x16 link_color01 dblock mgtop20' );
											}
										}
									}
									?>
                                </div>
                            </li>
						<?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
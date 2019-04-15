<?php
/*
 * Default Page Template
 */

if (have_posts()) :
while (have_posts()) : the_post();

  /* flexible_content is name of ACF field group - update accordingly */
  get_acf_flex_modules('flexible_content');

endwhile;
endif;

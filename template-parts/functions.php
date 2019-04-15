<?php
/*
 * ACF Flexible Content Function
 * Display layouts automatically using seperate template parts
 *
 * Note: flexible_content is the name of the ACF filed group. Update this according to the use type per project
 */
function get_acf_flex_modules( $fieldGroups, $page = NULL ) {

  global $post;

  $id = ( is_home() ? get_option('page_for_posts') : $post->ID );
	$id = ( $page ? $page : $id);

  /* Path to modules */
  $path = 'template-parts/modules/';
	$error = 'template-parts/modules/module--error';

  /* Build ACF flexible content loop */
  if ( have_rows('flexible_content', $id) ):
    while ( have_rows('flexible_content', $id) ) : the_row('flexible_content', $id);

    /* Create module paths */
    $module_path = $path . 'module--' . get_row_layout();
		$check_file = __DIR__ . '/../' . $module_path . '.php';

    /* If exists, display module */
    if( file_exists($check_file) ):
      get_template_part($module_path);
    else:
      get_template_part($error);
    endif;

    endwhile;
  else:

    /* If modules don't exist, show error */
    get_template_part($error);

  endif;

}

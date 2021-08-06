<?php
/**
 * Various changes to WordPress functions
 *
 * @package Siggen
 * @since   Siggen 1.0
 */

/**
 * Filter for body classes
 */
require get_template_directory() . '/inc/filters/body-class.php';

/**
 * Filter for the end of excerpts
 */
require get_template_directory() . '/inc/filters/excerpt-more.php';

/**
 * Filter for the post thumbnail html
 */
require get_template_directory() . '/inc/filters/post-thumbnail-html.php';

/**
 * Filter for the post title
 */
require get_template_directory() . '/inc/filters/post-title.php';

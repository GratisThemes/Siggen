<?php
/**
 * Template for displaying comments
 *
 * @package Siggen
 * @since   Siggen 1.0
 */

?>

<?php
if ( post_password_required() ) {
  return;
}

$siggen_comments_number = get_comments_number();
?>

<?php if ( 0 < $siggen_comments_number ) : ?>
  <div id="comments" class="comments-area">
    <h3 class="comments-title">
      <?php
      $siggen_comments_number = get_comments_number();

      printf(
        /* translators: %1$s: Comment count, %2$s: Article title. */
        esc_html( _nx( '%1$s throught on "%2$s"', '%1$s throughts on "%2$s"', $siggen_comments_number, 'comments title', 'siggen' ) ),
        esc_html( number_format_i18n( $siggen_comments_number ) ),
        esc_html( get_the_title() )
      );
      ?>
    </h3><!-- #comments-title -->

    <ol class="comment-list">
      <?php
      wp_list_comments(
        array(
          'style'       => 'ol',
          'short_ping'  => true,
          'avatar_size' => 50,
        )
      );
      ?>
    </ol><!-- .comment-list -->

  </div><!-- #comments .comments-area -->
<?php endif; ?>

<?php
the_comments_navigation(
  array(
    'prev_text' => '<i class="fa fa-long-arrow-alt-left"></i>' . __( 'Older comments', 'siggen' ),
    'next_text' => __( 'Newer comments', 'siggen' ) . '<i class="fa fa-long-arrow-alt-right"></i>',
  )
);
?>

<?php
comment_form(
  array(
    'class_form'         => 'comment-form',
    'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
    'title_reply_after'  => '</h3>',
  )
);
?>

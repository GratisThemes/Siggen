<?php
/**
 * Template for displaying comments
 *
 * @package Siggen
 * @since 1.0.0
 */
?>

<?php if ( post_password_required() ) return; ?>

<div id="comments" class="comments-area">
  
  <h3 class="comments-title">
    
    <?php
    $siggen_comments_number = get_comments_number();

    if ( $siggen_comments_number ) {
      printf(
        _nx(
          '%1$s thought on &ldquo;%2$s&rdquo;',
          '%1$s thoughts on &ldquo;%2$s&rdquo;',
          $siggen_comments_number,
          'comments title',
          'siggen'
        ),
        number_format_i18n( $siggen_comments_number ),
        get_the_title()
      );
    }
    ?>

  </h3><!-- #comments-title -->

  <ol class="comment-list">
    
    <?php
    wp_list_comments( array(
      'style'       => 'ol',
      'short_ping'  => true,
      'avatar_size' => 42,
    ) );
    ?>

  </ol><!-- .comment-list -->

  <?php
  the_comments_navigation( array(
    'prev_text'  =>  __( 'Older comments', 'siggen' ) . '<span class="screen-reader-text">' . __( 'Older comments', 'siggen' ) . '</span>',
    'next_text'  =>  __( 'Newer comments', 'siggen' ) . '<span class="screen-reader-text">' . __( 'Newer comments', 'siggen' ) . '</span>',
  ) );
  ?>

  <?php
  comment_form( array(
    'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
    'title_reply_after'  => '</h2>',
  ) );
  ?>

</div><!-- #comments .comments-area -->
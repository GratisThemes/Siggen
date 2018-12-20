<?php
/**
 * Template for displaying entry footers
 *
 * @package Siggen
 * @since 1.0.0
 */
?>
<footer class="entry-footer">
  <?php
  if ( has_tag() && get_theme_mod( 'entry_meta_tags', true) ) : ?>
    <div class="post-tags">
      <?php the_tags('', ', '); ?>
      <span class="screen-reader-text"><?php _e( 'tags', 'siggen' ); ?></span>
    </div><!-- .post-tags -->
  <?php endif; ?>

  <?php if ( get_theme_mod( 'author_bio', true ) ): ?>
    <div class="author-bio">
      <?php echo get_avatar( get_the_author_meta( 'user_email' ), '50' ); ?>

      <div>
        <?php
        printf(
          '<span>' . __( 'Author: %1$s', 'siggen' ) . '</span>',
          sprintf(
            '<a href="%1$s">%2$s</a>',
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            get_the_author()
          )
        );
        ?>

        <p><?php the_author_meta( 'description' ); ?></p>
      </div>
    </div><!-- .author-bio -->
  <?php endif; ?>

  <?php
  the_post_navigation( array(
    'next_text' => '<span class="screen-reader-text">' . __( 'Next post:', 'siggen' ) . '</span> ' .
      '<span class="post-title">' . __( 'Next', 'siggen' ) . '</span>',
    'prev_text' => '<span class="meta-nav" aria-hidden="true"></span> ' .
      '<span class="screen-reader-text">' . __( 'Previous post:', 'siggen' ) . '</span> ' .
      '<span class="post-title"> ' . __( 'Previous', 'siggen' ) . '</span>',
  ) );
  ?>
</footer><!-- .entry-footer -->
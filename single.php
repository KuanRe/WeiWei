<?php get_header(); ?>
<title><?php echo get_the_title(); ?></title>
<style>
body
{
    background-image: url('<?php 
if ( has_post_thumbnail() ) {
  echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) );
} else {
  echo esc_url( get_theme_mod('mytheme_bc') );
}
?>');
}
</style>

<div class='head'>
<h1><?php echo get_the_title(); ?></h1>
<p> — <?php echo get_the_date('Y.n.j'); ?> — </p>
<span><?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?></span>
<?php get_template_part('nav'); ?>
<?php
$categories = get_the_category();
if ( ! empty( $categories ) ) {
    foreach ( $categories as $cat ) {
        echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" class="navb hi">' . esc_html( $cat->name ) . '</a>';
    }
}
?>
</div>
<div class='bcd'><?php the_content(); ?></div>
<div class='comt'>
    <?php if (comments_open() || get_comments_number()) : ?>
    <?php comments_template(); ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
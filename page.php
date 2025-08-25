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
<?php get_template_part('nav'); ?>
</div>
<div class='bcd'><?php the_content(); ?></div>






<?php get_footer(); ?>
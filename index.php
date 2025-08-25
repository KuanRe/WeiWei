<?php get_header(); ?>
<style>
body
{
    background-image: url('<?php echo get_theme_mod('mytheme_bc'); ?>');
}
</style>
<title><?php echo get_bloginfo('name'); ?></title>


<div class='bcd'>
  <h1><small>欢迎来到</small>👋<br><?php echo get_bloginfo('name'); ?></h1>
  <h2><?php echo get_bloginfo('description'); ?></h2>
  <?php get_template_part('nav'); ?>
  <div class="homepage">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url('/') ); ?>">
      <input type="search" class="search-field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="搜索你想找到的" />
    </form>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <a href="<?php the_permalink(); ?>"><li><?php the_title(); ?></li></a>
    <span class="det">
        <?php
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            $links = array();
            foreach ( $categories as $cat ) {
                $links[] = '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a>';
            }
            echo implode( ' · ', $links );
        }
        ?>
        · <?php comments_number( '0 评', '1 评', '% 评' ); ?>
        · <?php echo get_the_date(); ?>
    </span>
    <p><?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?></p>
    <?php
    $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    if ( $thumb_url ) {
        echo '<img class="hoi" src="' . esc_url( $thumb_url ) . '" alt="">';
    }
    ?>
<?php endwhile; endif; ?>



  </div>
</div>
<?php get_footer(); ?>
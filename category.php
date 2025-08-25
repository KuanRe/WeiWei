<?php get_header(); ?>
<title><?php echo get_bloginfo('name'); ?></title>
<style>
body
{
    background-image: url('<?php echo get_theme_mod('mytheme_bc'); ?>');
}
</style>

<div class='bcd'>
<h1><small><?php echo get_bloginfo('name'); ?></small>🔍<br>属于“<?php echo single_cat_title( '', false ); ?>”的文章</h1>
<h2><?php echo strip_tags( term_description() ); ?></h2>
<?php get_template_part('nav'); ?>


    <div class="homepage">
<?php
$cat_id = get_queried_object_id();
$query = new WP_Query(array(
    'cat' => $cat_id,
    'posts_per_page' => -1
));

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post(); ?>
<a href="<?php the_permalink(); ?>"><li><?php the_title(); ?></li></a>
<?php
$type = get_post_type();
if ($type === 'post') {
    $parts = array();
    // 评论数
    $cnt = get_comments_number();
    $parts[] = $cnt . ' 条评论';
    // 日期
    $parts[] = get_the_date();
    echo '<span class="det">' . implode(' · ', $parts) . '</span>';
} elseif ($type === 'page') {
    echo '<span class="det">' . get_the_date() . '</span>';
}
?>
<p><?php echo wp_strip_all_tags(get_the_excerpt(), true); ?></p>
<?php
    endwhile;
    wp_reset_postdata();
else : ?>
<p>该分类下没有文章</p>
<?php endif; ?>



    </div>
</div>
<?php get_footer(); ?>
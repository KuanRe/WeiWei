<?php get_header(); ?>
<title><?php echo get_bloginfo('name'); ?></title>
<style>
body
{
    background-image: url('<?php echo get_theme_mod('mytheme_bc'); ?>');
}
</style>




<div class='bcd'>
<h1><small><?php echo get_bloginfo('name'); ?></small>🔍<br>搜索“<?php echo esc_html( get_search_query() ); ?>”的结果</h1>
<h2><?php echo strip_tags( term_description() ); ?></h2>
<?php get_template_part('nav'); ?>
<div class="homepage">
    
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url('/') ); ?>">
<input type="search" class="search-field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="搜索你想找到的" />
</form>

<?php
$query = new WP_Query(array(
    's' => get_search_query(),
    'posts_per_page' => -1
));

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post(); ?>
<a href="<?php the_permalink(); ?>"><li><?php the_title(); ?></li></a>
<?php
$type = get_post_type();
if ($type === 'post') {
    // 分类链接
    $parts = array();
    $cats = get_the_category();
    if (!empty($cats)) {
        $links = array();
        foreach ($cats as $cat) {
            $links[] = '<a href="' . esc_url(get_category_link($cat->term_id)) . '">' . esc_html($cat->name) . '</a>';
        }
        $parts[] = implode(' · ', $links);
    }
    // 评论数
    $cnt = get_comments_number();
    $parts[] = $cnt . ' 评';
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
<p>没有找到与“<?php echo esc_html(get_search_query()); ?>”相关的内容</p>
<?php endif; ?>


</div>
</div>


<?php get_footer(); ?>
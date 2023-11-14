<?php
function wp_practice_theme_setup () {
// add_theme_support('post-thumbnails');
}

add_action('init', 'poltheme_setup');

?>
<!-- POST FILTER -->
<?php
add_action('wp_ajax_filter_posts', 'filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');

function filter_posts() {
    $selectedCategory = $_POST['category'];
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
    );

    if (!empty($selectedCategory)) {
        $args['category_name'] = $selectedCategory;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
<article id="post-<?php the_ID(); ?>" class="post fadeIn">
    <a href="<?php the_permalink(); ?>" class="post__link">
        <div class="post__img">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="post__wrap">
            <div class="post__categories">
                <?php
            $categories = get_the_category();
            if ($categories) {
                foreach ($categories as $category) {
                    echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a> ';
                }
            }
            ?>
            </div>
            <h3 class="post__title">
                <?php the_title(); ?>
            </h3>
            <div class="post__content">
                <?php the_excerpt(); // O utilizza 'the_content()' se vuoi visualizzare il contenuto completo. ?>
            </div>
        </div>
    </a>
</article>
<?php
endwhile;
wp_reset_postdata();
else :
echo 'Nessun post trovato.';
endif;

wp_die();
}
?>
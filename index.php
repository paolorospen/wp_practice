<?php
get_header(); ?>
<?php
$rootDir = get_template_directory_uri();
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main class="main">
    <div class="kv">
        <div class="kv__lead" data-splitting="words">
            Lorem ipsum dolor sit amet<br class="pc_contents">consectetur adipisicing <br class="pc_contents">elit.
            Ipsam natus eveniet <br class="pc_contents">labore culpa quidem modi!<br class="pc_contents">
            Obcaecati fugiat nihil <br class="pc_contents">fuga corrupti nisi ipsum <br class="pc_contents">ab, impedit
            facere autem <br class="pc_contents">nesciunt ipsa voluptas consectetur<br class="pc_contents">
            exercitationem maiores neque, laboriosam quia perspiciatis<br class="pc_contents">
            mollitia.Excepturi,maiores quibusdam.<br class="pc_contents"> Lorem ipsum dolor sit amet
        </div>
        <h1 class="kv__single">Lorem</h1>

    </div>
    <form action="<?php echo esc_url(home_url('/')); ?>" method="GET">
        <label for="category-filter">ALL</label>
        <select name="category_filter" id="category-filter">
            <option value="">Tutte le categorie</option>
            <?php
        $categories = get_categories();
        foreach ($categories as $category) {
            echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
        }
        ?>
        </select>
        <input type="submit" value="Filtra">
    </form>
    <div id="posts-container" class="posts__container">
        <?php
$category_filter = isset($_GET['category_filter']) ? $_GET['category_filter'] : '';

$args = array(
    'posts_per_page' => -1, // Mostra tutti i post
);

if (!empty($category_filter)) {
    $args['category_name'] = $category_filter;
}

$custom_query = new WP_Query($args);

if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) :
        $custom_query->the_post();
        ?>

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
        <?php endwhile;

    the_posts_pagination();
else :
    // Se non ci sono post, puoi inserire qui un messaggio di fallback.
endif;
?>
    </div>

    <div style="height: 1000px"></div>
</main>
<?php get_footer(); ?>
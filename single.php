<article id="post-<?php the_ID(); ?>" class="post">
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
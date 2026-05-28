<?php
/**
 * Blog archive — mosaic grid
 * Layout: 1 big (top-left) + 2 small below + 3 right column
 *
 * @package pachaexp
 */

get_header();

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$blog_query = new WP_Query( array(
    'post_type'      => 'blog',
    'posts_per_page' => 12,
    'paged'          => $paged,
) );

$posts_arr = [];
if ( $blog_query->have_posts() ) {
    while ( $blog_query->have_posts() ) {
        $blog_query->the_post();
        $posts_arr[] = [
            'title'     => get_the_title(),
            'permalink' => get_permalink(),
            'thumb'     => get_the_post_thumbnail_url( get_the_ID(), 'large' ),
            'date'      => get_the_date( 'M j, Y' ),
            'cat'       => wp_strip_all_tags( get_the_category_list( ', ' ) ),
            'excerpt'   => wp_trim_words( get_the_excerpt(), 18, '…' ),
        ];
    }
    wp_reset_postdata();
}

$fallback = get_template_directory_uri() . '/img/fondo-footer.jpg';
?>


<!-- ===== BLOG GRID ===== -->
<section class="py-2 bg-gray-50">
    <div class="container px-4 md:px-6">

        <?php if ( ! empty( $posts_arr ) ) : ?>

        <!-- ────────────────────────────────────────────────────
             MOSAIC BLOCK  (6 posts)
             Col 1+2        Col 3
             [ Post 0     ] [ Post 3 ]
             [ Post 0     ] [ Post 4 ]
             [ Post1][Post2][ Post 5 ]
        ──────────────────────────────────────────────────── -->
        <?php $mosaic = array_slice( $posts_arr, 0, 6 ); ?>
        <div class="bm-grid mb-8">

            <!-- Post 0 — BIG (col 1-2, row 1-2) -->
            <?php $p = $mosaic[0] ?? null; if ( $p ) : ?>
            <a href="<?php echo esc_url( $p['permalink'] ); ?>"
               style="grid-column:1/3; grid-row:1/3;"
               class="blog-card group">
                <img src="<?php echo esc_url( $p['thumb'] ?: $fallback ); ?>"
                     alt="<?php echo esc_attr( $p['title'] ); ?>"
                     class="blog-card__img">
                <div>
                    <h2 class="blog-card__title text-xl md:text-2xl"><?php echo esc_html( $p['title'] ); ?></h2>
                </div>
            </a>
            <?php endif; ?>

            <!-- Post 1 — bottom-left (col 1, row 3) -->
            <?php $p = $mosaic[1] ?? null; if ( $p ) : ?>
            <a href="<?php echo esc_url( $p['permalink'] ); ?>"
               style="grid-column:1/2; grid-row:3/4;"
               class="blog-card group">
                <img src="<?php echo esc_url( $p['thumb'] ?: $fallback ); ?>"
                     alt="<?php echo esc_attr( $p['title'] ); ?>"
                     class="blog-card__img">
                <div>
                    <h3 class="blog-card__title blog-card__title--sm"><?php echo esc_html( $p['title'] ); ?></h3>
                </div>
            </a>
            <?php endif; ?>

            <!-- Post 2 — bottom-center (col 2, row 3) -->
            <?php $p = $mosaic[2] ?? null; if ( $p ) : ?>
            <a href="<?php echo esc_url( $p['permalink'] ); ?>"
               style="grid-column:2/3; grid-row:3/4;"
               class="blog-card group">
                <img src="<?php echo esc_url( $p['thumb'] ?: $fallback ); ?>"
                     alt="<?php echo esc_attr( $p['title'] ); ?>"
                     class="blog-card__img">
                <div>
                    <h3 class="blog-card__title blog-card__title--sm"><?php echo esc_html( $p['title'] ); ?></h3>
                </div>
            </a>
            <?php endif; ?>

            <!-- Post 3 — right col top (col 3, row 1) -->
            <?php $p = $mosaic[3] ?? null; if ( $p ) : ?>
            <a href="<?php echo esc_url( $p['permalink'] ); ?>"
               style="grid-column:3/4; grid-row:1/2;"
               class="blog-card group">
                <img src="<?php echo esc_url( $p['thumb'] ?: $fallback ); ?>"
                     alt="<?php echo esc_attr( $p['title'] ); ?>"
                     class="blog-card__img">
                <div>
                    <h3 class="blog-card__title blog-card__title--sm"><?php echo esc_html( $p['title'] ); ?></h3>
                </div>
            </a>
            <?php endif; ?>

            <!-- Post 4 — right col middle (col 3, row 2) -->
            <?php $p = $mosaic[4] ?? null; if ( $p ) : ?>
            <a href="<?php echo esc_url( $p['permalink'] ); ?>"
               style="grid-column:3/4; grid-row:2/3;"
               class="blog-card group">
                <img src="<?php echo esc_url( $p['thumb'] ?: $fallback ); ?>"
                     alt="<?php echo esc_attr( $p['title'] ); ?>"
                     class="blog-card__img">
                <div>
                    <h3 class="blog-card__title blog-card__title--sm"><?php echo esc_html( $p['title'] ); ?></h3>
                </div>
            </a>
            <?php endif; ?>

            <!-- Post 5 — right col bottom (col 3, row 3) -->
            <?php $p = $mosaic[5] ?? null; if ( $p ) : ?>
            <a href="<?php echo esc_url( $p['permalink'] ); ?>"
               style="grid-column:3/4; grid-row:3/4;"
               class="blog-card group">
                <img src="<?php echo esc_url( $p['thumb'] ?: $fallback ); ?>"
                     alt="<?php echo esc_attr( $p['title'] ); ?>"
                     class="blog-card__img">
                <div>
                    <h3 class="blog-card__title blog-card__title--sm"><?php echo esc_html( $p['title'] ); ?></h3>
                </div>
            </a>
            <?php endif; ?>

        </div><!-- /bm-grid -->

        <!-- ─── REMAINING POSTS + SIDEBAR ─── -->
        <?php $remaining = array_slice( $posts_arr, 6 ); ?>
        <div class="flex flex-col lg:flex-row gap-10 mt-8">

            <!-- Posts: 2 columnas -->
            <main class="w-full lg:w-[65%]">

                <?php if ( ! empty( $remaining ) ) : ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <?php foreach ( $remaining as $p ) : ?>
                    <a href="<?php echo esc_url( $p['permalink'] ); ?>" class="blog-card-v group">
                        <div class="blog-card-v__thumb">
                            <img src="<?php echo esc_url( $p['thumb'] ?: $fallback ); ?>"
                                 alt="<?php echo esc_attr( $p['title'] ); ?>"
                                 class="blog-card-v__img">
                            <?php if ( $p['cat'] ) : ?>
                            <span class="blog-card-v__cat"><?php echo esc_html( $p['cat'] ); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="blog-card-v__body">
                            <h3 class="blog-card-v__title"><?php echo esc_html( $p['title'] ); ?></h3>
                            <p class="blog-card-v__excerpt"><?php echo esc_html( $p['excerpt'] ); ?></p>
                            <div class="blog-card-v__footer">
                                <span class="blog-card-v__date"><?php echo esc_html( $p['date'] ); ?></span>
                                <span class="blog-card-v__read">Read more →</span>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <!-- Paginación -->
                <?php if ( $blog_query->max_num_pages > 1 ) : ?>
                <div class="blog-pagination mt-12 flex justify-center gap-2 flex-wrap">
                    <?php echo paginate_links( [
                        'total'     => $blog_query->max_num_pages,
                        'current'   => $paged,
                        'prev_text' => '← Prev',
                        'next_text' => 'Next →',
                        'type'      => 'list',
                    ] ); ?>
                </div>
                <?php endif; ?>

            </main>

            <!-- Sidebar: más vistos -->
            <aside class="w-full lg:w-[35%]">
                <div class="blog-sidebar__card">
                    <h3 class="blog-sidebar__heading">Most Viewed</h3>
                    <ul class="blog-sidebar__list mt-4">
                        <?php
                        $most_viewed = new WP_Query( [
                            'post_type'      => 'blog',
                            'posts_per_page' => 6,
                            'post_status'    => 'publish',
                            'meta_key'       => '_post_views_count',
                            'orderby'        => 'meta_value_num',
                            'order'          => 'DESC',
                        ] );
                        if ( $most_viewed->have_posts() ) :
                            while ( $most_viewed->have_posts() ) : $most_viewed->the_post();
                                $mv_thumb  = get_the_post_thumbnail_url( null, 'thumbnail' );
                                $mv_views  = pachaexp_get_post_views( get_the_ID() );
                        ?>
                        <li class="blog-sidebar__item">
                            <?php if ( $mv_thumb ) : ?>
                            <a href="<?php the_permalink(); ?>" class="blog-sidebar__thumb-link">
                                <img src="<?php echo esc_url( $mv_thumb ); ?>"
                                     alt="<?php the_title_attribute(); ?>"
                                     class="blog-sidebar__thumb">
                            </a>
                            <?php endif; ?>
                            <div class="blog-sidebar__item-body">
                                <a href="<?php the_permalink(); ?>" class="blog-sidebar__item-title">
                                    <?php the_title(); ?>
                                </a>
                                <span class="blog-sidebar__item-views">
                                    <svg class="inline w-3 h-3 mb-0.5 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <?php echo number_format( $mv_views ); ?> views
                                </span>
                            </div>
                        </li>
                        <?php endwhile; wp_reset_postdata();
                        else : ?>
                        <li class="text-xs text-gray-400 py-2">No views recorded yet.</li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Recent Articles -->
                <div class="blog-sidebar__card mt-6">
                    <h3 class="blog-sidebar__heading">Recent Articles</h3>
                    <ul class="blog-sidebar__list mt-4">
                        <?php
                        $recent = new WP_Query( [
                            'post_type'      => 'blog',
                            'posts_per_page' => 5,
                            'post_status'    => 'publish',
                        ] );
                        while ( $recent->have_posts() ) : $recent->the_post();
                            $r_thumb = get_the_post_thumbnail_url( null, 'thumbnail' );
                        ?>
                        <li class="blog-sidebar__item">
                            <?php if ( $r_thumb ) : ?>
                            <a href="<?php the_permalink(); ?>" class="blog-sidebar__thumb-link">
                                <img src="<?php echo esc_url( $r_thumb ); ?>"
                                     alt="<?php the_title_attribute(); ?>"
                                     class="blog-sidebar__thumb">
                            </a>
                            <?php endif; ?>
                            <div class="blog-sidebar__item-body">
                                <a href="<?php the_permalink(); ?>" class="blog-sidebar__item-title">
                                    <?php the_title(); ?>
                                </a>
                                <time class="blog-sidebar__item-date"><?php echo get_the_date( 'M j, Y' ); ?></time>
                            </div>
                        </li>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </ul>
                </div>

                <!-- Categories -->
                <div class="blog-sidebar__card mt-6">
                    <h3 class="blog-sidebar__heading">Categories Tours</h3>
                    <ul class="blog-sidebar__cats mt-4">
                        <?php
                        $cats = get_categories( ['hide_empty' => true] );
                        foreach ( $cats as $c ) :
                        ?>
                        <li>
                            <a href="<?php echo esc_url( get_category_link( $c->term_id ) ); ?>" class="blog-sidebar__cat-link">
                                <span><?php echo esc_html( $c->name ); ?></span>
                                <span class="blog-sidebar__cat-count"><?php echo intval( $c->count ); ?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </aside>

        </div><!-- /flex row -->

        <?php else : ?>
        <div class="text-center py-24 text-gray-400">
            <p class="text-lg font-medium">No posts were found.</p>
        </div>
        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>

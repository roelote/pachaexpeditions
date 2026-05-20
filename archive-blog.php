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

        <!-- ─── REMAINING POSTS (cards) ─── -->
        <?php $remaining = array_slice( $posts_arr, 6 ); ?>
        <?php if ( ! empty( $remaining ) ) : ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-2">
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

        <!-- ─── PAGINATION ─── -->
        <?php if ( $blog_query->max_num_pages > 1 ) : ?>
        <div class="blog-pagination mt-12 flex justify-center gap-2 flex-wrap">
            <?php
            echo paginate_links( array(
                'total'     => $blog_query->max_num_pages,
                'current'   => $paged,
                'prev_text' => '← Prev',
                'next_text' => 'Next →',
                'type'      => 'list',
            ) );
            ?>
        </div>
        <?php endif; ?>

        <?php else : ?>
        <div class="text-center py-24 text-gray-400">
            <p class="text-lg font-medium">No posts were found.</p>
        </div>
        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>

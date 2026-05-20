<?php
/**
 * Archive page — categories, tags, dates
 *
 * @package pachaexp
 */

get_header();

$posts_arr = [];
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        $posts_arr[] = [
            'id'        => get_the_ID(),
            'title'     => get_the_title(),
            'permalink' => get_permalink(),
            'thumb'     => get_the_post_thumbnail_url( get_the_ID(), 'large' ),
            'date'      => get_the_date( 'M j, Y' ),
            'cat'       => wp_strip_all_tags( get_the_category_list( ', ' ) ),
            'excerpt'   => wp_trim_words( get_the_excerpt(), 16, '…' ),
        ];
    }
}

$fallback = get_template_directory_uri() . '/img/fondo-footer.jpg';
?>



<!-- ===== ARCHIVE GRID ===== -->
<section class="py-12 bg-gray-50">
    <div class="container px-4 md:px-6">

        <?php if ( ! empty( $posts_arr ) ) : ?>

        <!-- Featured mosaic (first 6 posts) -->
        <?php $mosaic = array_slice( $posts_arr, 0, 6 ); ?>
        <?php if ( ! empty( $mosaic ) ) : ?>
        <?php
        $slots = [
            ['col'=>'1/3','row'=>'1/3'],
            ['col'=>'1/2','row'=>'3/4'],
            ['col'=>'2/3','row'=>'3/4'],
            ['col'=>'3/4','row'=>'1/2'],
            ['col'=>'3/4','row'=>'2/3'],
            ['col'=>'3/4','row'=>'3/4'],
        ];
        ?>
        <div class="bm-grid mb-8">
            <?php foreach ( $mosaic as $i => $p ) :
                $slot = $slots[ $i ] ?? ['col'=>'auto','row'=>'auto'];
            ?>
            <a href="<?php echo esc_url( $p['permalink'] ); ?>"
               style="grid-column:<?php echo $slot['col']; ?>; grid-row:<?php echo $slot['row']; ?>;"
               class="blog-card group">
                <img src="<?php echo esc_url( $p['thumb'] ?: $fallback ); ?>"
                     alt="<?php echo esc_attr( $p['title'] ); ?>"
                     class="blog-card__img">
                <div class="blog-card__overlay">
                    <?php if ( $p['cat'] ) : ?>
                    <span class="blog-card__cat"><?php echo esc_html( $p['cat'] ); ?></span>
                    <?php endif; ?>
                    <<?php echo $i === 0 ? 'h2' : 'h3'; ?> class="blog-card__title <?php echo $i > 0 ? 'blog-card__title--sm' : ''; ?>">
                        <?php echo esc_html( $p['title'] ); ?>
                    </<?php echo $i === 0 ? 'h2' : 'h3'; ?>>
                    <p class="blog-card__date"><?php echo esc_html( $p['date'] ); ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <?php $remaining = array_slice( $posts_arr, 6 ); ?>

        <!-- Rest of posts -->
        <?php if ( ! empty( $remaining ) ) : ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
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

        <!-- Pagination -->
        <div class="blog-pagination mt-12 flex justify-center gap-2 flex-wrap">
            <?php
            echo paginate_links( array(
                'total'     => $GLOBALS['wp_query']->max_num_pages,
                'current'   => max( 1, get_query_var( 'paged' ) ),
                'prev_text' => '← Prev',
                'next_text' => 'Next →',
                'type'      => 'list',
            ) );
            ?>
        </div>

        <?php else : ?>
        <div class="text-center py-24 text-gray-400">
            <p class="text-lg font-medium">No posts found in this archive.</p>
        </div>
        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>

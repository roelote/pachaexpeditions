<?php
/**
 * The template for displaying all pages
 *
 * @package pachaexp
 */

get_header();
while ( have_posts() ) : the_post();
?>

<?php if ( has_post_thumbnail() ) : ?>
<!-- Hero con imagen destacada -->
<section class="page-hero relative overflow-hidden" style="height: 550px;">
    <div class="absolute inset-0"
         style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( null, 'full' ) ); ?>');
                background-size:cover; background-position:center;"></div>
    <div class="absolute inset-0" style="background:linear-gradient(to bottom,rgba(0,0,0,.25) 0%,rgba(0,0,0,.58) 100%);"></div>
    <div class="relative z-10 container h-full flex flex-col justify-end pb-10 px-5 xl:px-4">
        <?php if ( function_exists( 'yoast_breadcrumb' ) ) yoast_breadcrumb( '<nav class="breadcrumb-nav page-breadcrumb mb-3" aria-label="breadcrumb">', '</nav>' ); ?>
        <h1 class="text-3xl md:text-4xl font-bold text-white leading-tight"><?php the_title(); ?></h1>
    </div>
</section>

<?php else : ?>
<!-- Cabecera simple sin imagen -->
<section class="page-hero-simple">
    <div class="container px-5 xl:px-4 pt-7 pb-6">
        <?php if ( function_exists( 'yoast_breadcrumb' ) ) yoast_breadcrumb( '<nav class="breadcrumb-nav mb-3" aria-label="breadcrumb">', '</nav>' ); ?>
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mt-1 pb-3 page-title-line"><?php the_title(); ?></h1>
    </div>
</section>
<?php endif; ?>

<!-- Contenido de la página -->
<section class="py-8 px-3 xl:px-0 bg-gray-50">
    <div class="container px-4 xl:px-4">
        <div class="flex flex-col lg:flex-row gap-10">

            <!-- ── Contenido principal ── -->
            <main id="primary" class="page-main w-full lg:w-[65%]">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-10 page-content">
                    <?php
                    the_content();
                    wp_link_pages( array(
                        'before' => '<div class="page-links text-sm font-semibold text-gray-600 mt-8">' . esc_html__( 'Pages:', 'pachaexp' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>
            </main>

            <!-- ── Sidebar ── -->
            <aside class="w-full lg:w-[35%] flex flex-col gap-6">

                <!-- Browse Categories -->
                <div class="blog-sidebar__card">
                    <h3 class="blog-sidebar__heading">Browse Categories</h3>
                    <ul class="blog-sidebar__cats mt-4">
                        <?php
                        $all_cats = get_categories( ['hide_empty' => true] );
                        foreach ( $all_cats as $c ) :
                        ?>
                        <li>
                            <a href="<?php echo esc_url( get_category_link( $c->term_id ) ); ?>"
                               class="blog-sidebar__cat-link">
                                <span><?php echo esc_html( $c->name ); ?></span>
                                <span class="blog-sidebar__cat-count"><?php echo intval( $c->count ); ?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Recent Posts -->
                <div class="blog-sidebar__card">
                    <h3 class="blog-sidebar__heading">Recent Articles</h3>
                    <ul class="blog-sidebar__list mt-4">
                        <?php
                        $recent = new WP_Query([
                            'post_type'      => 'blog',
                            'posts_per_page' => 5,
                            'post_status'    => 'publish',
                        ]);
                        if ( ! $recent->have_posts() ) {
                            $recent = new WP_Query([
                                'posts_per_page' => 5,
                                'post_status'    => 'publish',
                            ]);
                        }
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

            </aside>

        </div>
    </div>
</section>

<?php
endwhile;
get_footer();

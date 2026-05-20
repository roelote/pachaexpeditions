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
<section class="py-10 md:py-14">
    <div class="container px-5 xl:px-4">
        <div class="max-w-7xl mx-auto">
            <main id="primary" class="page-main">
                <?php
                the_content();
                wp_link_pages( array(
                    'before' => '<div class="page-links text-sm font-semibold text-gray-600 mt-8">' . esc_html__( 'Pages:', 'pachaexp' ),
                    'after'  => '</div>',
                ) );
                ?>
            </main>
        </div>
    </div>
</section>

<?php
endwhile;
get_footer();

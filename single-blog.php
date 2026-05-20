<?php
/**
 * Template for single blog post
 * @package pachaexp
 */

get_header();

while ( have_posts() ) :
    the_post();

    $thumb_id  = get_post_thumbnail_id();
    $thumb_url = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'full' ) : '';
    $category  = get_the_category();
    $cat_name  = ! empty( $category ) ? $category[0]->name : '';
    $cat_link  = ! empty( $category ) ? get_category_link( $category[0]->term_id ) : '#';
?>

<!-- ══ HERO IMAGE ══════════════════════════════════════════════════ -->
<?php if ( $thumb_url ) : ?>
<div class="container px-4 xl:px-4 pt-2">
    <div class="blog-hero">
        <img src="<?php echo esc_url( $thumb_url ); ?>"
             alt="<?php the_title_attribute(); ?>"
             class="blog-hero__img">
        <!-- Overlay degradado -->
        <div class="blog-hero__overlay"></div>
        <!-- Categoría chip -->
        <?php if ( $cat_name ) : ?>
        <a href="<?php echo esc_url( $cat_link ); ?>" class="blog-hero__cat">
            <?php echo esc_html( $cat_name ); ?>
        </a>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

<!-- ══ CONTENIDO ═══════════════════════════════════════════════════ -->
<section class="container px-4 xl:px-4 py-10">

    <!-- Breadcrumb -->
    <?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
    <div class="breadcrumb-wrap mb-6">
        <?php yoast_breadcrumb( '<nav class="breadcrumb-nav" aria-label="breadcrumb">', '</nav>' ); ?>
    </div>
    <?php endif; ?>

    <div class="flex flex-col xl:flex-row gap-12">

        <!-- ── Artículo principal ────────────────────────────── -->
        <article class="blog-article w-full xl:w-[68%]">

            <!-- Meta: categoría + fecha + tiempo de lectura -->
            <div class="blog-article__meta">
                <?php if ( $cat_name ) : ?>
                <a href="<?php echo esc_url( $cat_link ); ?>" class="blog-article__cat-pill">
                    <?php echo esc_html( $cat_name ); ?>
                </a>
                <?php endif; ?>
                <span class="blog-article__sep">·</span>
                <time class="blog-article__date" datetime="<?php echo get_the_date( 'c' ); ?>">
                    <?php echo get_the_date( 'F j, Y' ); ?>
                </time>
                <span class="blog-article__sep">·</span>
                <span class="blog-article__read">
                    <?php
                    $words   = str_word_count( strip_tags( get_the_content() ) );
                    $minutes = max( 1, ceil( $words / 200 ) );
                    echo $minutes . ' min read';
                    ?>
                </span>
            </div>

            <!-- Título -->
            <h1 class="blog-article__title"><?php the_title(); ?></h1>

            <!-- Autor -->
            <div class="blog-article__author">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 36, '', '', ['class' => 'blog-article__avatar'] ); ?>
                <span>By <strong><?php the_author(); ?></strong></span>
            </div>

            <!-- Separador -->
            <hr class="blog-article__divider">

            <!-- Aside: tip destacado (ACF opcional) -->
            <?php
            $aside_text = function_exists('get_field') ? get_field('blog_aside_tip') : '';
            if ( $aside_text ) :
            ?>
            <div class="blog-aside blog-aside--info mb-6">
                <svg class="blog-aside__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20A10 10 0 0012 2z"/>
                </svg>
                <div class="blog-aside__body">
                    <span class="blog-aside__title">Travel Tip</span>
                    <p><?php echo wp_kses_post( $aside_tip ); ?></p>
                </div>
            </div>
            <?php endif; ?>

            <!-- Cuerpo del post -->
            <div class="blog-content">
                <?php the_content(); ?>
            </div>

            <!-- Tags -->
            <?php
            $tags = get_the_tags();
            if ( $tags ) :
            ?>
            <div class="blog-article__tags">
                <svg class="w-4 h-4 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                </svg>
                <?php foreach ( $tags as $tag ) : ?>
                <a href="<?php echo get_tag_link( $tag->term_id ); ?>" class="blog-article__tag">
                    <?php echo esc_html( $tag->name ); ?>
                </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <!-- Navegación prev/next -->
            <nav class="blog-article__nav">
                <div class="blog-article__nav-prev">
                    <?php
                    $prev = get_previous_post();
                    if ( $prev ) :
                    ?>
                    <a href="<?php echo get_permalink( $prev ); ?>">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        <span><?php echo esc_html( get_the_title( $prev ) ); ?></span>
                    </a>
                    <?php endif; ?>
                </div>
                <div class="blog-article__nav-next">
                    <?php
                    $next = get_next_post();
                    if ( $next ) :
                    ?>
                    <a href="<?php echo get_permalink( $next ); ?>">
                        <span><?php echo esc_html( get_the_title( $next ) ); ?></span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <?php endif; ?>
                </div>
            </nav>

        </article>

        <!-- ── Sidebar ──────────────────────────────────────── -->
        <aside class="blog-sidebar w-full xl:w-[32%]">

            <!-- Posts recientes -->
            <div class="blog-sidebar__card">
                <h3 class="blog-sidebar__heading">Recent Articles</h3>
                <ul class="blog-sidebar__list">
                    <?php
                    $recent = new WP_Query([
                        'post_type'      => 'blog',
                        'posts_per_page' => 5,
                        'post__not_in'   => [ get_the_ID() ],
                        'post_status'    => 'publish',
                    ]);
                    while ( $recent->have_posts() ) :
                        $recent->the_post();
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

            <!-- Categorías -->
            <div class="blog-sidebar__card mt-6">
                <h3 class="blog-sidebar__heading">Categories</h3>
                <ul class="blog-sidebar__cats">
                    <?php
                    $cats = get_categories( ['hide_empty' => true] );
                    foreach ( $cats as $c ) :
                    ?>
                    <li>
                        <a href="<?php echo get_category_link( $c->term_id ); ?>" class="blog-sidebar__cat-link">
                            <span><?php echo esc_html( $c->name ); ?></span>
                            <span class="blog-sidebar__cat-count"><?php echo $c->count; ?></span>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </aside>

    </div>
</section>

<?php
endwhile;

get_footer();

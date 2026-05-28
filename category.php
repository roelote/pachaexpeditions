<?php
/**
 * Category archive — standard post type
 * @package pachaexp
 */

get_header();

$queried_cat = get_queried_object();
$cat_name    = $queried_cat->name ?? '';
$cat_desc    = $queried_cat->description ?? '';
$cat_count   = $queried_cat->count ?? 0;
$paged       = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$fallback    = get_template_directory_uri() . '/img/fondo-footer.jpg';

global $wp_query;
?>

<!-- ══ HERO CATEGORÍA ══════════════════════════════════════════════ -->
<div class="cat-hero">
  <div class="cat-hero__overlay"></div>
  <div class="cat-hero__body">
    <span class="cat-hero__label">Category</span>
    <h1 class="cat-hero__title"><?php echo esc_html( $cat_name ); ?></h1>
    <?php if ( $cat_desc ) : ?>
    <p class="cat-hero__desc"><?php echo esc_html( wp_strip_all_tags( $cat_desc ) ); ?></p>
    <?php endif; ?>
    <span class="cat-hero__count"><?php echo intval( $cat_count ); ?> article<?php echo $cat_count !== 1 ? 's' : ''; ?></span>
  </div>
</div>

<!-- ══ CONTENIDO ════════════════════════════════════════════════════ -->
<section class="py-12 bg-gray-50 px-4 xl:px-0">
  <div class="container">

    <!-- Breadcrumb -->
    <?php if ( function_exists('yoast_breadcrumb') ) : ?>
    <div class="breadcrumb-wrap mb-8">
      <?php yoast_breadcrumb('<nav class="breadcrumb-nav" aria-label="breadcrumb">', '</nav>'); ?>
    </div>
    <?php endif; ?>

    <div class="flex flex-col lg:flex-row gap-10">

      <!-- ── Posts grid ──────────────────────────────────────── -->
      <main class="w-full lg:w-[65%]">

        <?php if ( have_posts() ) : ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <?php while ( have_posts() ) : the_post();
            $thumb     = get_the_post_thumbnail_url( null, 'large' ) ?: $fallback;
            $cats      = get_the_category();
            $cat_label = ! empty( $cats ) ? $cats[0]->name : '';
            $excerpt   = wp_trim_words( get_the_excerpt(), 18, '…' );
          ?>
          <a href="<?php the_permalink(); ?>" class="blog-card-v group">
            <div class="blog-card-v__thumb">
              <img src="<?php echo esc_url( $thumb ); ?>"
                   alt="<?php the_title_attribute(); ?>"
                   class="blog-card-v__img">
              <?php if ( $cat_label ) : ?>
              <span class="blog-card-v__cat"><?php echo esc_html( $cat_label ); ?></span>
              <?php endif; ?>
            </div>
            <div class="blog-card-v__body">
              <h2 class="blog-card-v__title"><?php the_title(); ?></h2>
              <p class="blog-card-v__excerpt"><?php echo esc_html( $excerpt ); ?></p>
              <div class="blog-card-v__footer">
                <span class="blog-card-v__date"><?php echo get_the_date('M j, Y'); ?></span>
                <span class="blog-card-v__read">Read more →</span>
              </div>
            </div>
          </a>
          <?php endwhile; ?>
        </div>

        <!-- Paginación -->
        <?php if ( $wp_query->max_num_pages > 1 ) : ?>
        <div class="blog-pagination mt-12 flex justify-center gap-2 flex-wrap">
          <?php echo paginate_links([
            'total'     => $wp_query->max_num_pages,
            'current'   => $paged,
            'prev_text' => '← Prev',
            'next_text' => 'Next →',
            'type'      => 'list',
          ]); ?>
        </div>
        <?php endif; ?>

        <?php else : ?>
        <div class="text-center py-24 text-gray-400">
          <svg class="w-12 h-12 mx-auto mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
          </svg>
          <p class="text-lg font-medium">No posts found in this category.</p>
          <a href="<?php echo esc_url( home_url('/') ); ?>" class="inline-block mt-4 text-sm text-primary hover:underline">← Back to home</a>
        </div>
        <?php endif; ?>

      </main>

      <!-- ── Sidebar ─────────────────────────────────────────── -->
      <aside class="w-full lg:w-[35%] flex flex-col gap-6">

        <!-- Browse Categories -->
        <div class="blog-sidebar__card">
          <h3 class="blog-sidebar__heading">Browse Categories</h3>
          <ul class="blog-sidebar__cats mt-4">
            <?php
            $all_cats = get_categories( ['hide_empty' => true] );
            foreach ( $all_cats as $c ) :
              $is_active = ( $c->term_id === $queried_cat->term_id );
            ?>
            <li>
              <a href="<?php echo esc_url( get_category_link( $c->term_id ) ); ?>"
                 class="blog-sidebar__cat-link<?php echo $is_active ? ' cat-link--active' : ''; ?>">
                <span><?php echo esc_html( $c->name ); ?></span>
                <span class="blog-sidebar__cat-count"><?php echo intval( $c->count ); ?></span>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- Recent Articles -->
        <div class="blog-sidebar__card">
          <h3 class="blog-sidebar__heading">Recent Tours</h3>
          <ul class="blog-sidebar__list mt-4">
            <?php
            $recent = new WP_Query([
              'posts_per_page' => 5,
              'post_status'    => 'publish',
            ]);
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
                <a href="<?php the_permalink(); ?>" class="blog-sidebar__item-title"><?php the_title(); ?></a>
              
              </div>
            </li>
            <?php endwhile; wp_reset_postdata(); ?>
          </ul>
        </div>

      </aside>

    </div>
  </div>
</section>

<style>
/* ── Hero categoría ── */
.cat-hero {
    position: relative;
    background: #1c2130;
    padding: 72px 16px;
    overflow: hidden;
    text-align: center;
}
.cat-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse at 60% 50%, rgba(157,178,71,.18) 0%, transparent 70%);
    pointer-events: none;
}
.cat-hero__overlay {
    position: absolute;
    inset: 0;
    background: url("<?php echo esc_url( get_template_directory_uri() . '/img/fondo-footer.jpg' ); ?>") center/cover no-repeat;
    opacity: .06;
}
.cat-hero__body {
    position: relative;
    z-index: 1;
    max-width: 640px;
    margin: 0 auto;
}
.cat-hero__label {
    display: inline-block;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: #9db247;
    margin-bottom: 10px;
}
.cat-hero__title {
    font-family: 'Poppins', sans-serif;
    font-size: clamp(28px, 5vw, 48px);
    font-weight: 800;
    color: #fff;
    line-height: 1.15;
    margin: 0 0 12px;
}
.cat-hero__desc {
    font-size: 15px;
    color: rgba(255,255,255,.65);
    line-height: 1.6;
    margin: 0 0 18px;
}
.cat-hero__count {
    display: inline-block;
    background: rgba(157,178,71,.15);
    border: 1px solid rgba(157,178,71,.35);
    color: #9db247;
    font-size: 12px;
    font-weight: 600;
    padding: 4px 14px;
    border-radius: 99px;
    letter-spacing: .04em;
}

/* ── Active category in sidebar ── */
.cat-link--active {
    background: #f0f5e0 !important;
    color: #4a5419 !important;
    font-weight: 700 !important;
    border-left: 3px solid #9db247;
    padding-left: 10px;
}
.cat-link--active .blog-sidebar__cat-count {
    background: #9db247;
    color: #fff;
}
</style>

<?php get_footer(); ?>

<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pachaexp
 */

get_header();
?>


<!-- Hero Slider -->
<?php
$hero_slides = get_field( 'hero_slides', 'option' );
$hero_default = [
    [
        'hero_slide_image'    => [ 'url' => get_template_directory_uri() . '/img/hero.jpg' ],
        'hero_slide_title'    => 'Enjoy the Magic of the Andes',
        'hero_slide_subtitle' => 'Trekking & Big Adventure in Peru',
    ],
];
$slides = $hero_slides ?: $hero_default;
?>
<section class="hero-slider-wrap">
  <div class="swiper hero-swiper">
    <div class="swiper-wrapper">

      <?php foreach ( $slides as $slide ) :
        $img_url  = is_array( $slide['hero_slide_image'] ) ? $slide['hero_slide_image']['url'] : $slide['hero_slide_image'];
        $title    = $slide['hero_slide_title'] ?? '';
        $subtitle = $slide['hero_slide_subtitle'] ?? '';
      ?>
      <div class="swiper-slide hero-slide">
        <div class="hero-slide__bg" style="background-image:url('<?php echo esc_url( $img_url ); ?>');"></div>
        <div class="hero-slide__overlay"></div>
        <div class="hero-slide__content">
          <?php if ( $title ) : ?>
          <h1 class="hero-slide__title"><?php echo esc_html( $title ); ?></h1>
          <?php endif; ?>
          <?php if ( $subtitle ) : ?>
          <p class="hero-slide__subtitle"><?php echo esc_html( $subtitle ); ?></p>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>

    </div>

    <!-- Flechas -->
    <div class="swiper-button-prev hero-prev"></div>
    <div class="swiper-button-next hero-next"></div>

    <!-- Bullets -->
    <div class="swiper-pagination hero-pagination"></div>
  </div>
</section>

<style>
.hero-slider-wrap { position: relative; overflow: hidden; }
.hero-swiper { height: 600px; }
@media (min-width: 768px) { .hero-swiper { height: 700px; } }

.hero-slide {
    position: relative;
    overflow: hidden;
}
.hero-slide__bg {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    transform: scale(1.08);
    will-change: transform;
}
.swiper-slide-active .hero-slide__bg {
    animation: heroZoomOut 6.5s ease-out forwards;
}
@keyframes heroZoomOut {
    from { transform: scale(1.08); }
    to   { transform: scale(1.0); }
}
.hero-slide__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,.28) 0%, rgba(0,0,0,.52) 100%);
}
.hero-slide__content {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 0 20px;
    z-index: 2;
}
.hero-slide__title {
    font-family: 'Poppins', sans-serif;
    font-size: clamp(28px, 5vw, 58px);
    font-weight: 800;
    color: #fff;
    line-height: 1.15;
    letter-spacing: -.01em;
    text-shadow: 0 2px 18px rgba(0,0,0,.45);
    margin: 0 0 14px;
    max-width: 860px;
}
.hero-slide__subtitle {
    font-family: 'Poppins', sans-serif;
    font-size: clamp(15px, 2.2vw, 22px);
    font-weight: 500;
    color: rgba(255,255,255,.88);
    text-shadow: 0 1px 8px rgba(0,0,0,.4);
    max-width: 620px;
    margin: 0;
    line-height: 1.5;
}

/* Flechas hero */
.hero-prev, .hero-next {
    color: #fff !important;
    background: rgba(255,255,255,.15);
    border-radius: 50%;
    width: 48px !important;
    height: 48px !important;
    backdrop-filter: blur(4px);
    transition: background .2s;
}
.hero-prev:hover, .hero-next:hover { background: rgba(157,178,71,.75); }
.hero-prev::after, .hero-next::after { font-size: 16px !important; font-weight: 700; }

/* Bullets hero */
.hero-pagination .swiper-pagination-bullet {
    width: 8px; height: 8px;
    background: rgba(255,255,255,.5);
    opacity: 1;
    transition: all .25s;
}
.hero-pagination .swiper-pagination-bullet-active {
    background: #9db247;
    width: 28px;
    border-radius: 4px;
}
</style>

<!-- Intro: Come To Peru -->
<section class="py-16 bg-white px-3 xl:px-0">
  <div class="container max-w-4xl mx-auto">

    <div class="text-center mb-8">
      <span class="inline-block text-primary text-sm font-semibold tracking-widest uppercase mb-3"><?php echo esc_html( get_field( 'about_badge' ) ?: 'Come To Peru' ); ?></span>
      <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight mb-1"><?php echo esc_html( get_field( 'about_title' ) ?: 'Enjoy the Magic of the Andes.' ); ?></h2>
      <?php $about_sub = get_field( 'about_subtitle' ); if ( $about_sub === null || $about_sub === false ) { $about_sub = 'Trekking and Big Adventure.'; } ?>
      <?php if ( $about_sub ) : ?>
      <p class="text-xl font-semibold text-primary"><?php echo esc_html( $about_sub ); ?></p>
      <?php endif; ?>
    </div>

    <?php
    $about_body = get_field( 'about_body' );
    if ( $about_body === null || $about_body === false ) { $about_body = '<p><strong>Inca Trail Tours, Machu Picchu Tours, Alternative Treks:</strong> 100% Local Tourism Company. We are direct operators of our own programs. Our experience working in the Andes Mountains has led us to develop unique and personalized tour programs for you, the traveler. Live a unique and unforgettable experience and take away lasting memories of your vacation. We operate Inca Trail Tours, Machu Picchu Tours, and Alternative Treks. Enjoy a pleasant trip and get the most out of your investment. Our company offers added value on all our trips: small groups and personalized service.</p>\n<p>We are a local company with a highly professional team of certified technical Guides, passionate about their culture, Chefs specializing in traditional cuisine, and an excellent Quechua-speaking Support team, who will make your vacation an unforgettable experience. We offer a wide variety of tours so you can make the most of your visit to our region.</p>\n<p>Our programs are designed for families, friends, honeymooners, and adventurers. We are a company that does not seek to profit at the expense of others. Therefore, our prices are affordable, and our service is high-quality and personalized. We also support the local community and children, and we are a sustainable and regenerative company.</p>'; }
    if ( $about_body ) :
    ?>
    <div class="text-gray-600 text-sm leading-relaxed text-justify space-y-4 [&_strong]:text-gray-800">
      <?php echo wp_kses_post( $about_body ); ?>
    </div>
    <?php endif; ?>

    <?php
    $about_guide_name = get_field( 'about_guide_name' );
    $about_guide_unset = ( $about_guide_name === null || $about_guide_name === false );
    if ( $about_guide_unset ) { $about_guide_name = 'Javier Mendoza Zarate'; }
    if ( $about_guide_name ) :
    ?>
    <!-- Guide highlight -->
    <div class="flex items-start gap-4 bg-gray-50 rounded-2xl p-4 mt-6 border border-gray-100">
      <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
        </svg>
      </div>
      <div>
        <p class="text-sm font-bold text-gray-900"><?php echo esc_html( $about_guide_name ); ?></p>
        <?php if ( $about_role = $about_guide_unset ? 'Tour guide — 25+ years of experience' : get_field( 'about_guide_role' ) ) : ?>
        <p class="text-xs text-primary font-medium mb-1"><?php echo esc_html( $about_role ); ?></p>
        <?php endif; ?>
        <?php if ( $about_gtext = $about_guide_unset ? 'Ready to recommend an unforgettable experience. Enjoy the magic of the Andes with us. Direct operator of the Classic Inca Trail, Machu Picchu Tours, and Alternative Treks.' : get_field( 'about_guide_text' ) ) : ?>
        <p class="text-xs text-gray-500 leading-relaxed"><?php echo esc_html( $about_gtext ); ?></p>
        <?php endif; ?>
      </div>
    </div>
    <?php endif; ?>

    <?php
    $about_tags = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', (string) ( ( $about_tags_raw = get_field( 'about_tags' ) ) === null || $about_tags_raw === false ? "Inca Trail Operators\nMachu Picchu Tours\nAlternative Treks\n100% Local Company" : $about_tags_raw ) ) ) );
    if ( $about_tags ) :
    ?>
    <!-- Tags -->
    <div class="flex flex-wrap justify-center gap-2 mt-6">
      <?php foreach ( $about_tags as $about_tag ) : ?>
      <span class="text-xs font-semibold text-primary border border-primary/30 bg-primary/5 px-3 py-1.5 rounded-full"><?php echo esc_html( $about_tag ); ?></span>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

  </div>
</section>




<!-- Trust badges (fixed) -->
<section class="pb-12 bg-white px-3 xl:px-0">
  <div class="container">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
      <?php
      $trust_badges = [
        [ 'Official Operator',     '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3l7.5 3v5.5c0 4.5-3 8.2-7.5 9.5-4.5-1.3-7.5-5-7.5-9.5V6L12 3zM8.8 12.2l2.2 2.2 4.2-4.4"/>' ],
        [ 'Certified Guides',      '<circle cx="12" cy="12" r="9"/><circle cx="12" cy="10" r="3"/><path stroke-linecap="round" stroke-linejoin="round" d="M6.2 18.5c1.2-2.3 3.2-3.5 5.8-3.5s4.6 1.2 5.8 3.5"/>' ],
        [ 'Small Groups',          '<circle cx="12" cy="6.5" r="2.5"/><circle cx="5.5" cy="10.5" r="2"/><circle cx="18.5" cy="10.5" r="2"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 19v-1.5a4 4 0 018 0V19M2.5 18v-1a3 3 0 013-3M21.5 18v-1a3 3 0 00-3-3"/>' ],
        [ 'Sustainable Tourism',   '<circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M12 3c2.5 2.5 3.8 5.5 3.8 9S14.5 18.5 12 21c-2.5-2.5-3.8-5.5-3.8-9S9.5 5.5 12 3z"/>' ],
      ];
      foreach ( $trust_badges as $tb ) : ?>
      <div class="flex flex-col items-center justify-center gap-3 bg-gray-100 rounded-2xl px-4 py-6">
        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24"><?php echo $tb[1]; // static SVG markup ?></svg>
        <span class="text-xs font-bold uppercase tracking-wide text-gray-800 text-center"><?php echo esc_html( $tb[0] ); ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Inca Trail to Machu Picchu (initial section) -->
<section class="py-16 bg-white px-3 xl:px-0">
  <div class="container">

    <!-- Header -->
    <div class="text-center mb-10">
      <span class="inline-block text-primary text-sm font-semibold tracking-widest uppercase mb-2"><?php echo esc_html( get_field('inca_badge') ?: 'Inca Trail to Machu Picchu' ); ?></span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight"><?php echo esc_html( get_field('inca_title') ?: 'Best Hiking Route to Machu Picchu' ); ?></h2>
      <p class="mt-3 text-gray-500 max-w-xl mx-auto text-base"><?php echo esc_html( get_field('inca_subtitle') ?: "Enjoy one of the world's most spectacular treks with our carefully crafted Salkantay Treks to Machu Picchu. Hike through breathtaking Andean landscapes, from snow-capped mountains and glacial lakes to lush cloud forests and tropical valleys." ); ?></p>
      <div class="mt-4 flex justify-center">
        <span class="block w-14 h-1 rounded-full" style="background-color:#f97316"></span>
      </div>
    </div>

    <!-- Swiper -->
    <div class="swiper inca-swiper relative pb-12">
      <div class="swiper-wrapper">
        <?php
        $inca_tours = get_field( 'inca_tours' );
        if ( $inca_tours ) :
          foreach ( $inca_tours as $tour ) :
        ?>
        <div class="swiper-slide"><?php get_template_part( 'template-parts/tour-card', null, [ 'tour_id' => $tour->ID ] ); ?></div>
        <?php endforeach; else : ?>
        <div class="swiper-slide w-full py-12 text-center text-gray-400 text-sm col-span-3">No hay tours seleccionados. Edita la página de inicio y añade tours en la sección Inca Trail.</div>
        <?php endif; ?>
      </div><!-- /.swiper-wrapper -->

      <!-- Navigation -->
      <div class="swiper-button-prev after:text-sm after:font-bold !w-10 !h-10 bg-white shadow-md rounded-full !text-primary hover:bg-primary hover:!text-white transition-colors duration-200 -left-2 md:-left-5"></div>
      <div class="swiper-button-next after:text-sm after:font-bold !w-10 !h-10 bg-white shadow-md rounded-full !text-primary hover:bg-primary hover:!text-white transition-colors duration-200 -right-2 md:-right-5"></div>

      <!-- Pagination -->
      <div class="swiper-pagination !bottom-0"></div>
    </div><!-- /.swiper -->

  </div>
</section>

<!-- Best Salkantay Treks to Machu Picchu -->
<section class="py-16 bg-gray-50 px-3 xl:px-0">
  <div class="container">

    <!-- Header -->
    <div class="text-center mb-10">
      <span class="inline-block text-primary text-sm font-semibold tracking-widest uppercase mb-2"><?php echo esc_html( get_field('salkantay_badge') ?: 'Alternative Treks' ); ?></span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight"><?php echo esc_html( get_field('salkantay_title') ?: 'Best Salkantay Treks to Machu Picchu' ); ?></h2>
      <p class="mt-3 text-gray-500 max-w-xl mx-auto text-base"><?php echo esc_html( get_field('salkantay_subtitle') ?: 'Explore our most popular Salkantay trekking routes — breathtaking landscapes, authentic experiences, and expert guides.' ); ?></p>
      <div class="mt-4 flex justify-center">
        <span class="block w-14 h-1 rounded-full" style="background-color:#f97316"></span>
      </div>
    </div>

    <!-- Swiper -->
    <div class="swiper salkantay-swiper relative pb-12">
      <div class="swiper-wrapper">

        <?php
        $salk_tours = get_field( 'salkantay_tours' );
        if ( $salk_tours ) :
          foreach ( $salk_tours as $tour ) :
        ?>
        <div class="swiper-slide"><?php get_template_part( 'template-parts/tour-card', null, [ 'tour_id' => $tour->ID ] ); ?></div>
        <?php endforeach; else : ?>
        <div class="swiper-slide w-full py-12 text-center text-gray-400 text-sm col-span-3">No hay tours seleccionados. Edita la página de inicio y añade tours en la sección Salkantay.</div>
        <?php endif; ?>

      </div><!-- /.swiper-wrapper -->

      <!-- Navigation -->
      <div class="swiper-button-prev after:text-sm after:font-bold !w-10 !h-10 bg-white shadow-md rounded-full !text-primary hover:bg-primary hover:!text-white transition-colors duration-200 -left-2 md:-left-5"></div>
      <div class="swiper-button-next after:text-sm after:font-bold !w-10 !h-10 bg-white shadow-md rounded-full !text-primary hover:bg-primary hover:!text-white transition-colors duration-200 -right-2 md:-right-5"></div>

      <!-- Pagination -->
      <div class="swiper-pagination !bottom-0"></div>
    </div><!-- /.swiper -->

 

  </div>
</section>

<!-- Exclusive Adventures and Treks -->
<section class="py-16 bg-white px-3 xl:px-0">
  <div class="container">

    <!-- Header -->
    <div class="text-center mb-10">
      <span class="inline-block text-primary text-sm font-semibold tracking-widest uppercase mb-2"><?php echo esc_html( get_field('adventures_badge') ?: 'Pacha Expeditions' ); ?></span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight"><?php echo esc_html( get_field('adventures_title') ?: 'Exclusive Adventures & Treks' ); ?></h2>
      <p class="mt-3 text-gray-500 max-w-xl mx-auto text-base"><?php echo esc_html( get_field('adventures_subtitle') ?: 'Handpicked expeditions for those who seek the extraordinary — remote routes, immersive nature, and unforgettable high-altitude experiences.' ); ?></p>
      <div class="mt-4 flex justify-center">
        <span class="block w-14 h-1 rounded-full" style="background-color:#f97316"></span>
      </div>
    </div>

    <!-- Swiper -->
    <div class="swiper adventures-swiper relative pb-12">
      <div class="swiper-wrapper">

        <?php
        $adv_tours = get_field( 'adventures_tours' );
        if ( $adv_tours ) :
          foreach ( $adv_tours as $tour ) :
        ?>
        <div class="swiper-slide"><?php get_template_part( 'template-parts/tour-card', null, [ 'tour_id' => $tour->ID ] ); ?></div>
        <?php endforeach; else : ?>
        <div class="swiper-slide w-full py-12 text-center text-gray-400 text-sm col-span-3">No hay tours seleccionados. Edita la página de inicio y añade tours en la sección Exclusive Adventures.</div>
        <?php endif; ?>

      </div><!-- /.swiper-wrapper -->

      <!-- Navigation -->
      <div class="swiper-button-prev after:text-sm after:font-bold !w-10 !h-10 bg-white shadow-md rounded-full !text-primary hover:bg-primary hover:!text-white transition-colors duration-200 -left-2 md:-left-5"></div>
      <div class="swiper-button-next after:text-sm after:font-bold !w-10 !h-10 bg-white shadow-md rounded-full !text-primary hover:bg-primary hover:!text-white transition-colors duration-200 -right-2 md:-right-5"></div>

      <!-- Pagination -->
      <div class="swiper-pagination adventures-pagination !bottom-0"></div>
    </div><!-- /.swiper -->

  </div>
</section>


<!-- Book Your Inca Trail 2026 Banner -->
<?php
$banner_img     = get_field( 'banner_image' );
$banner_img_url = is_array( $banner_img ) ? $banner_img['url'] : ( $banner_img ?: 'https://www.pachaexpeditions.com/wp-content/uploads/2025/02/inca-trail-2025.jpg' );
$banner_title   = get_field( 'banner_title' ) ?: 'Book Your Inca Trail to Machu Picchu 2026';
$banner_body    = get_field( 'banner_body' ) ?: 'Bookings for the 2026 season are now OPEN! In 2025, tickets for the popular dates from March through September sold out within minutes. By booking the 2026 Classic Inca Trail now, you can secure your spot and guarantee that you won\'t miss out on this incredible trek. Don\'t wait any longer, BOOK NOW!';
$banner_btn     = get_field( 'banner_button_text' ) ?: 'Inca Trail Availability 2026';
$banner_url     = get_field( 'banner_button_url' ) ?: '#';
?>
<style>
.inca-banner { background-size: cover; background-position: center; background-repeat: no-repeat; }
@media (min-width: 1024px) { .inca-banner { background-attachment: fixed; } } /* fixed parallax; disabled on mobile where it is unsupported */
</style>
<section class="inca-banner relative overflow-hidden min-h-[480px] md:min-h-[600px] flex items-center" role="img" aria-label="<?php echo esc_attr( $banner_title ); ?>" style="background-image:url('<?php echo esc_url( $banner_img_url ); ?>');">
  <div class="absolute inset-0 bg-black/60"></div>
  <div class="relative z-10 py-24 px-4 text-center max-w-3xl mx-auto">
    <h2 class="text-3xl md:text-4xl font-extrabold text-white uppercase tracking-wide leading-tight mb-4">
      <?php echo esc_html( $banner_title ); ?>
    </h2>
    <p class="text-white/85 text-base md:text-lg leading-relaxed mb-8">
      <?php echo esc_html( $banner_body ); ?>
    </p>
    <a href="<?php echo esc_url( $banner_url ); ?>" class="inline-flex items-center gap-2 text-white font-bold text-sm px-8 py-3.5 rounded-full transition-all duration-200 shadow-lg hover:opacity-90 hover:shadow-xl" style="background-color:#b1393b;">
      <?php echo esc_html( $banner_btn ); ?>
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
    </a>
  </div>
</section>



<!-- Top Day Tours In Cusco -->
<section class="py-16 bg-gray-50 px-3 xl:px-0">
  <div class="container">

    <!-- Header -->
    <div class="text-center mb-10">
      <span class="inline-block text-primary text-sm font-semibold tracking-widest uppercase mb-2"><?php echo esc_html( get_field('daytours_badge') ?: 'Cusco' ); ?></span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900"><?php echo esc_html( get_field('daytours_title') ?: 'Top Day Tours In Cusco' ); ?></h2>
      <div class="mt-4 flex justify-center">
        <span class="block w-14 h-1 rounded-full" style="background-color:#f97316"></span>
      </div>
    </div>

    <!-- Grid de Day Tours -->
    <?php
    $day_tours = get_field( 'daytours_tours' );
    $columns = get_field( 'daytours_columns' ) ?: 3;
    $items_limit = get_field( 'daytours_items_limit' ) ?: 6;
    
    // Limitar el número de tours a mostrar
    if ( $day_tours && is_array( $day_tours ) ) {
      $day_tours = array_slice( $day_tours, 0, $items_limit );
    }
    
    // Definir clases de grid según el número de columnas
    $grid_classes = [
      '2' => 'grid-cols-1 md:grid-cols-2',
      '3' => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3',
      '4' => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-4'
    ];
    $grid_class = $grid_classes[ $columns ] ?? 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3';
    ?>
    
    <div class="grid <?php echo esc_attr( $grid_class ); ?> gap-6">
      <?php
      if ( $day_tours ) :
        foreach ( $day_tours as $tour ) :
      ?>
      <?php get_template_part( 'template-parts/tour-card', null, [ 'tour_id' => $tour->ID ] ); ?>
      <?php endforeach; else : ?>
      <div class="col-span-full w-full py-12 text-center text-gray-400 text-sm">No hay tours seleccionados. Edita la página de inicio y añade tours en Day Tours.</div>
      <?php endif; ?>
    </div><!-- /.grid -->

  </div>
</section>


<!-- section responsible travel -->
<?php
$rt_items = get_field( 'rt_items' );
$rt_defaults = [
  [
    'rt_item_image' => [ 'url' => get_template_directory_uri() . '/img/responsible-travel.png' ],
    'rt_item_title' => 'Responsible Travel Agency',
    'rt_item_text'  => 'Responsible travel is at the heart of all the programs we offer as a core philosophy. When you book one of our adventures, you are supporting true sustainability in protecting local communities.',
  ],
  [
    'rt_item_image' => [ 'url' => get_template_directory_uri() . '/img/bigfamily25.png' ],
    'rt_item_title' => 'Happy Group & Big Family',
    'rt_item_text'  => 'Our groups are usually small, and are generally a mixture of travelers, friends traveling together and couples, all of different ages, backgrounds and nationalities. Get ready to make many good friends.',
  ],
  [
    'rt_item_image' => [ 'url' => get_template_directory_uri() . '/img/5star-services.png' ],
    'rt_item_title' => '5 Star Services & Adventure',
    'rt_item_text'  => 'Our service is 5 stars before, during and after your trip. Pacha Expeditions is dedicated to providing excellent customer service, where adventure experiences are unique, and the memories lived, memorable and eternal.',
  ],
];
$rt_render = $rt_items ?: $rt_defaults;
?>
<section class="py-16 px-4 bg-white">
  <div class="container">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

      <?php foreach ( $rt_render as $item ) :
        $img_url = is_array( $item['rt_item_image'] ) ? $item['rt_item_image']['url'] : $item['rt_item_image'];
        $title   = $item['rt_item_title'];
        $text    = $item['rt_item_text'];
      ?>
      <div class="flex flex-col items-center text-center px-4">
        <div class="mb-6">
          <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="w-24 h-24 object-contain mx-auto">
        </div>
        <h3 class="text-xl font-bold text-primary mb-3"><?php echo esc_html( $title ); ?></h3>
        <div class="w-12 h-0.5 bg-primary mb-5 mx-auto"></div>
        <p class="text-gray-600 text-sm leading-relaxed"><?php echo esc_html( $text ); ?></p>
      </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>


<!-- Social Projects -->
<section class="py-12 md:py-16 bg-white">
  <div class="container px-4">

    <div class="text-center mx-auto mb-12">
      <span class="inline-block text-primary text-sm font-semibold tracking-widest uppercase mb-2"><?php echo esc_html( get_field( 'social_eyebrow' ) ?: 'Community Impact' ); ?></span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight"><?php echo esc_html( get_field( 'social_title' ) ?: 'These are Our Social Projects' ); ?></h2>
      <span class="mx-auto mt-4 block h-1 w-14 rounded-full" style="background-color:#f97316"></span>
      <p class="mt-4 text-sm text-gray-500 leading-relaxed mx-auto max-w-4xl">
        <?php echo esc_html( get_field( 'social_description' ) ?: 'Sustainable tourism is committed to having a low impact on the environment and the local cultural industry, while helping to generate income and employment for the local population. Our motto: "Enjoy the Magic of the Andes"' ); ?>
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
      <?php if ( have_rows( 'social_projects_cards' ) ) : ?>
        <?php while ( have_rows( 'social_projects_cards' ) ) : the_row(); ?>
          <?php $sp_img = get_sub_field( 'card_image' ); ?>
          <div class="group relative h-72 md:h-96 overflow-hidden bg-gray-800">
            <?php if ( $sp_img ) : ?>
            <img src="<?php echo esc_url( $sp_img ); ?>" alt="<?php echo esc_attr( get_sub_field( 'card_title' ) ); ?>" loading="lazy" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
            <?php endif; ?>
            <div class="absolute inset-0 bg-black/50 group-hover:bg-black/60 transition-colors"></div>
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6">
              <h3 class="text-xl md:text-2xl font-bold text-white"><?php echo esc_html( get_sub_field( 'card_title' ) ); ?></h3>
              <p class="mt-2 text-sm md:text-base text-white/90 max-w-sm"><?php echo esc_html( get_sub_field( 'card_description' ) ); ?></p>
              <?php $sp_link = get_sub_field( 'card_link' ); ?>
              <?php if ( ! empty( $sp_link['url'] ) ) : ?>
              <a href="<?php echo esc_url( $sp_link['url'] ); ?>" class="relative z-10 inline-block mt-5 px-6 py-2 rounded-full bg-primary text-white text-sm font-semibold transition-colors"<?php echo ! empty( $sp_link['target'] ) ? ' target="' . esc_attr( $sp_link['target'] ) . '" rel="noopener noreferrer"' : ''; ?>><?php esc_html_e( 'See more', 'pachaexp' ); ?></a>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php elseif ( current_user_can( 'edit_pages' ) ) : ?>
        <p class="col-span-full text-center text-sm text-gray-400">No projects added yet. Add them from the Front Page editor (Social Projects).</p>
      <?php endif; ?>
    </div>

  </div>
</section>

<!-- seccion tripadviosr -->
<section class="py-12 px-4">
  <div class="max-w-6xl mx-auto text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-2">What Our Travelers Say</h2>
    <p class="text-gray-500 mb-8">Real reviews from adventurers who explored Peru with us</p>
       

       <?php echo do_shortcode( '[trustindex no-registration=tripadvisor]' ); ?>

  </div>
</section>

<!--seccion google reviews -->
<section class="py-12 px-4 bg-gray-50">
  <div class="max-w-6xl mx-auto text-center">
    <?php echo do_shortcode( '[trustindex no-registration=google]' ); ?>
  </div>
</section>




<?php
get_footer();

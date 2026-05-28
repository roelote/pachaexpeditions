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

<!-- Enjoy the Magic of the Andes -->
<section class="py-16 bg-white px-3 xl:px-0">
  <div class="container">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-stretch">

      <!-- Col 1: Text -->
      <div>
        <span class="inline-block text-primary text-sm font-semibold tracking-widest uppercase mb-3">Come To Peru</span>
        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight mb-1">Enjoy the Magic of the Andes.</h2>
        <p class="text-xl font-semibold text-primary mb-5">Trekking and Big Adventure.</p>

        <p class="text-gray-600 text-sm leading-relaxed mb-4 text-justify">
          <strong class="text-gray-800">Inca Trail Tours, Machu Picchu Tours, Alternative Treks:</strong> 100% Local Tourism Company. We are direct operators of our own programs. Our experience working in the Andes Mountains has led us to develop unique and personalized tour programs for you, the traveler. Live a unique and unforgettable experience and take away lasting memories of your vacation. We operate Inca Trail Tours, Machu Picchu Tours, and Alternative Treks. Enjoy a pleasant trip and get the most out of your investment. Our company offers added value on all our trips: small groups and personalized service.
        </p>

        <!-- Guide highlight -->
        <div class="flex items-start gap-4 bg-gray-50 rounded-2xl p-4 mb-5 border border-gray-100">
          <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
          </div>
          <div>
            <p class="text-sm font-bold text-gray-900">Javier Mendoza Zarate</p>
            <p class="text-xs text-primary font-medium mb-1">Tour guide — 25+ years of experience</p>
            <p class="text-xs text-gray-500 leading-relaxed">Ready to recommend an unforgettable experience. Enjoy the magic of the Andes with us. Direct operator of the Classic Inca Trail, Machu Picchu Tours, and Alternative Treks.</p>
          </div>
        </div>

        <p class="text-gray-600 text-sm leading-relaxed mb-4 text-justify">
          We are a local company with a highly professional team of certified technical Guides, passionate about their culture, Chefs specializing in traditional cuisine, and an excellent Quechua-speaking Support team, who will make your vacation an unforgettable experience. We offer a wide variety of tours so you can make the most of your visit to our region.
        </p>

        <p class="text-gray-600 text-sm leading-relaxed mb-5 text-justify">
          Our programs are designed for families, friends, honeymooners, and adventurers. We are a company that does not seek to profit at the expense of others. Therefore, our prices are affordable, and our service is high-quality and personalized. We also support the local community and children, and we are a sustainable and regenerative company.
        </p>

        <!-- Tags -->
        <div class="flex flex-wrap gap-2">
          <span class="text-xs font-semibold text-primary border border-primary/30 bg-primary/5 px-3 py-1.5 rounded-full">Inca Trail Operators</span>
          <span class="text-xs font-semibold text-primary border border-primary/30 bg-primary/5 px-3 py-1.5 rounded-full">Machu Picchu Tours</span>
          <span class="text-xs font-semibold text-primary border border-primary/30 bg-primary/5 px-3 py-1.5 rounded-full">Alternative Treks</span>
          <span class="text-xs font-semibold text-primary border border-primary/30 bg-primary/5 px-3 py-1.5 rounded-full">100% Local Company</span>
        </div>
      </div>

      <!-- Col 2: 2x2 Cards grid -->
      <div class="grid grid-cols-2 gap-4" style="grid-template-rows: 400px 400px;">

        <!-- Card: Classic Inca Trail 4D -->
        <a href="#" class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 block h-full">
          <img src="https://www.pachaexpeditions.com/wp-content/uploads/2025/02/inca-trail-2025.jpg" alt="Classic Inca Trail 4 Days" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
          <div class="absolute bottom-0 left-0 right-0 p-4">
            <span class="inline-block bg-primary text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full mb-1">4 Days / 3 Nights</span>
            <h3 class="text-white font-bold text-sm leading-tight">Classic Inca Trail 4 Days</h3>
            <p class="text-white/80 text-[11px] mt-0.5">The legendary route to the Sun Gate</p>
          </div>
        </a>

        <!-- Card: Short Inca Trail 2D -->
        <a href="#" class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 block h-full">
          <img src="https://www.pachaexpeditions.com/wp-content/uploads/2022/02/inca-trail-02.jpg" alt="Short Inca Trail 2 Days" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
          <div class="absolute bottom-0 left-0 right-0 p-4">
            <span class="inline-block bg-amber-500 text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full mb-1">2 Days / 1 Night</span>
            <h3 class="text-white font-bold text-sm leading-tight">Short Inca Trail 2 Days</h3>
            <p class="text-white/80 text-[11px] mt-0.5">Machu Picchu via the Inca Trail</p>
          </div>
        </a>

        <!-- Card: Choquequirao Trek 4D -->
        <a href="#" class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 block h-full">
          <img src="https://www.pachaexpeditions.com/wp-content/uploads/2022/02/choquequirao-trek-4-dias-310x340.jpg" alt="Choquequirao Trek 4 Days" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
          <div class="absolute bottom-0 left-0 right-0 p-4">
            <span class="inline-block bg-emerald-600 text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full mb-1">4 Days / 3 Nights</span>
            <h3 class="text-white font-bold text-sm leading-tight">Choquequirao Trek 4 Days</h3>
            <p class="text-white/80 text-[11px] mt-0.5">The lost citadel of the Incas</p>
          </div>
        </a>

        <!-- Card: Premium Inca Trail 5D -->
        <a href="#" class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 block h-full">
          <img src="https://www.pachaexpeditions.com/wp-content/uploads/2025/02/inca-trail-premiun.jpg" alt="Premium Inca Trail 5 Days" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
          <div class="absolute bottom-0 left-0 right-0 p-4">
            <span class="inline-block bg-gray-900 text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full mb-1">5 Days / 4 Nights</span>
            <h3 class="text-white font-bold text-sm leading-tight">Premium Inca Trail 5 Days</h3>
            <p class="text-white/80 text-[11px] mt-0.5">Luxury camping & exclusive service</p>
          </div>
        </a>

      </div>
    </div>
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
        <span class="block w-14 h-1 rounded-full bg-primary"></span>
      </div>
    </div>

    <!-- Swiper -->
    <div class="swiper salkantay-swiper relative pb-12">
      <div class="swiper-wrapper">

        <?php
        $salk_tours = get_field( 'salkantay_tours' );
        if ( $salk_tours ) :
          foreach ( $salk_tours as $tour ) :
            $tour_id    = $tour->ID;
            $tour_img   = get_the_post_thumbnail_url( $tour_id, 'large' ) ?: 'https://via.placeholder.com/800x400?text=No+Image';
            $tour_title = get_the_title( $tour_id );
            $raw_desc   = get_field( 'tour_description', $tour_id );
            if ( ! $raw_desc ) {
              $raw_desc = get_post_field( 'post_excerpt', $tour_id );
            }
            if ( ! $raw_desc ) {
              $raw_desc = wp_trim_words( strip_tags( get_post_field( 'post_content', $tour_id ) ), 22, '...' );
            }
            $tour_desc  = $raw_desc;
            $tour_badge = get_field( 'tour_badge_label', $tour_id ) ?: 'Best Seller';
            $tour_sec   = get_field( 'tour_secondary_badge', $tour_id );
            $tour_dur   = get_field( 'tour_duration', $tour_id );
            $tour_price = get_field( 'price', $tour_id );
            $tour_link  = get_permalink( $tour_id );
        ?>
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-md overflow-hidden group hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
            <div class="relative overflow-hidden">
              <img src="<?php echo esc_url( $tour_img ); ?>" alt="<?php echo esc_attr( $tour_title ); ?>" class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
              <div class="absolute top-0 left-0 right-0 bg-[#b1393b] text-white text-xs font-bold tracking-widest uppercase text-center py-1.5 z-10"><?php echo esc_html( $tour_badge ); ?></div>
              <?php if ( $tour_sec ) : ?>
              <span class="absolute top-8 left-3 bg-gray-900 text-white text-xs font-bold px-3 py-1 rounded-full shadow"><?php echo esc_html( $tour_sec ); ?></span>
              <?php endif; ?>
            </div>
            <div class="p-5 flex flex-col flex-1">
              <?php if ( $tour_dur ) : ?>
              <div class="flex items-center gap-2 mb-2 flex-wrap">
                <span class="flex items-center gap-1 text-xs text-gray-500 bg-gray-100 px-2.5 py-1 rounded-full font-medium">
                  <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                  <?php echo esc_html( $tour_dur ); ?>
                </span>
              </div>
              <?php endif; ?>
              <h3 class="text-base font-bold text-gray-900 mb-1 leading-snug"><?php echo esc_html( $tour_title ); ?></h3>
              <p class="text-sm text-gray-500 mb-4 flex-1 leading-relaxed"><?php echo esc_html( $tour_desc ); ?></p>
              <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-100">
                <div>
                  <span class="text-xs text-gray-400">From</span>
                  <p class="text-xl font-extrabold text-primary leading-none"><?php echo esc_html( $tour_price ); ?> <span class="text-xs font-normal text-gray-400">/ person</span></p>
                </div>
                <a href="<?php echo esc_url( $tour_link ); ?>" class="bg-primary hover:bg-primary-dark text-white text-sm font-semibold px-5 py-2.5 rounded-full transition-colors duration-200 shadow-sm">Book Now</a>
              </div>
            </div>
          </div>
        </div>
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
        <span class="block w-14 h-1 rounded-full bg-primary"></span>
      </div>
    </div>

    <!-- Swiper -->
    <div class="swiper adventures-swiper relative pb-12">
      <div class="swiper-wrapper">

        <?php
        $adv_tours = get_field( 'adventures_tours' );
        if ( $adv_tours ) :
          foreach ( $adv_tours as $tour ) :
            $tour_id    = $tour->ID;
            $tour_img   = get_the_post_thumbnail_url( $tour_id, 'large' ) ?: 'https://via.placeholder.com/800x400?text=No+Image';
            $tour_title = get_the_title( $tour_id );
            $raw_desc   = get_field( 'tour_description', $tour_id );
            if ( ! $raw_desc ) {
              $raw_desc = get_post_field( 'post_excerpt', $tour_id );
            }
            if ( ! $raw_desc ) {
              $raw_desc = wp_trim_words( strip_tags( get_post_field( 'post_content', $tour_id ) ), 22, '...' );
            }
            $tour_desc  = $raw_desc;
            $tour_badge = get_field( 'tour_badge_label', $tour_id ) ?: 'Special Offers';
            $tour_sec   = get_field( 'tour_secondary_badge', $tour_id );
            $tour_dur   = get_field( 'tour_duration', $tour_id );
            $tour_price = get_field( 'price', $tour_id );
            $tour_link  = get_permalink( $tour_id );
        ?>
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-md overflow-hidden group hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
            <div class="relative overflow-hidden">
              <img src="<?php echo esc_url( $tour_img ); ?>" alt="<?php echo esc_attr( $tour_title ); ?>" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
              <div class="absolute top-0 left-0 right-0 bg-[#b1393b] text-white text-xs font-bold tracking-widest uppercase text-center py-1.5 z-10"><?php echo esc_html( $tour_badge ); ?></div>
              <?php if ( $tour_sec ) : ?>
              <span class="absolute top-8 left-3 bg-gray-900 text-white text-xs font-bold px-3 py-1 rounded-full shadow"><?php echo esc_html( $tour_sec ); ?></span>
              <?php endif; ?>
            </div>
            <div class="p-5 flex flex-col flex-1">
              <?php if ( $tour_dur ) : ?>
              <div class="flex items-center gap-2 mb-2 flex-wrap">
                <span class="flex items-center gap-1 text-xs text-gray-500 bg-gray-100 px-2.5 py-1 rounded-full font-medium">
                  <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                  <?php echo esc_html( $tour_dur ); ?>
                </span>
              </div>
              <?php endif; ?>
              <h3 class="text-base font-bold text-gray-900 mb-1 leading-snug"><?php echo esc_html( $tour_title ); ?></h3>
              <p class="text-sm text-gray-500 mb-4 flex-1 leading-relaxed"><?php echo esc_html( $tour_desc ); ?></p>
              <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-100">
                <div>
                  <span class="text-xs text-gray-400">From</span>
                  <p class="text-xl font-extrabold text-primary leading-none"><?php echo esc_html( $tour_price ); ?> <span class="text-xs font-normal text-gray-400">/ person</span></p>
                </div>
                <a href="<?php echo esc_url( $tour_link ); ?>" class="bg-primary hover:bg-primary-dark text-white text-sm font-semibold px-5 py-2.5 rounded-full transition-colors duration-200 shadow-sm">Book Now</a>
              </div>
            </div>
          </div>
        </div>
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
<section class="relative overflow-hidden">
  <img src="<?php echo esc_url( $banner_img_url ); ?>" alt="<?php echo esc_attr( $banner_title ); ?>" class="absolute inset-0 w-full h-full object-cover object-center">
  <div class="absolute inset-0 bg-black/60"></div>
  <div class="relative z-10 py-16 px-4 text-center max-w-3xl mx-auto">
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
        <span class="block w-14 h-1 rounded-full bg-primary"></span>
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
          $tour_id    = $tour->ID;
          $tour_img   = get_the_post_thumbnail_url( $tour_id, 'large' ) ?: 'https://via.placeholder.com/800x400?text=No+Image';
          $tour_title = get_the_title( $tour_id );
          $raw_desc   = get_field( 'tour_description', $tour_id );
          if ( ! $raw_desc ) $raw_desc = get_post_field( 'post_excerpt', $tour_id );
          if ( ! $raw_desc ) $raw_desc = wp_trim_words( strip_tags( get_post_field( 'post_content', $tour_id ) ), 18, '...' );
          $tour_badge = get_field( 'tour_badge_label', $tour_id ) ?: 'Special Offer';
          $tour_price = get_field( 'price', $tour_id );
          $tour_link  = get_permalink( $tour_id );
      ?>
      <a href="<?php echo esc_url( $tour_link ); ?>" class="group block bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
        <div class="relative overflow-hidden">
          <img src="<?php echo esc_url( $tour_img ); ?>" alt="<?php echo esc_attr( $tour_title ); ?>" class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
          <div class="absolute top-0 left-0 right-0 bg-[#b1393b] text-white text-xs font-bold tracking-widest uppercase text-center py-1.5 z-10"><?php echo esc_html( $tour_badge ); ?></div>
        </div>
        <div class="p-4">
          <h3 class="font-bold text-gray-900 text-sm mb-1"><?php echo esc_html( $tour_title ); ?></h3>
          <p class="text-xs text-gray-500 mb-3 leading-relaxed"><?php echo esc_html( $raw_desc ); ?></p>
          <div class="flex items-center justify-between">
            <p class="text-primary font-extrabold text-base"><?php echo esc_html( $tour_price ); ?> <span class="text-xs font-normal text-gray-400">/ person</span></p>
            <span class="text-xs text-primary font-semibold">Book Now →</span>
          </div>
        </div>
      </a>
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


<!-- seccion tripadviosr -->
<section class="py-12 px-4">
  <div class="max-w-6xl mx-auto text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-2">What Our Travelers Say</h2>
    <p class="text-gray-500 mb-8">Real reviews from adventurers who explored Peru with us</p>
       

       <?php echo do_shortcode( '[trustindex no-registration=tripadvisor]' ); ?>

  </div>
</section>


	<main id="primary" class="site-main">

		<?php
	  //	while ( have_posts() ) :
			//the_post();

			// get_template_part( 'template-parts/content', 'page' );

		// endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();

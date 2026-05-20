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


<section>
    <img src="<?php echo get_template_directory_uri(); ?>/img/hero.jpg" class="w-full h-[700px] object-cover"  alt="Hero Image">
</section>

<!-- Enjoy the Magic of the Andes -->
<section class="py-16 bg-white">
  <div class="container">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-stretch">

      <!-- Col 1: Text -->
      <div>
        <span class="inline-block text-primary text-sm font-semibold tracking-widest uppercase mb-3">Come To Peru</span>
        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight mb-1">Enjoy the Magic of the Andes.</h2>
        <p class="text-xl font-semibold text-primary mb-5">Trekking and Big Adventure.</p>

        <p class="text-gray-600 text-sm leading-relaxed mb-4">
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

        <p class="text-gray-600 text-sm leading-relaxed mb-4">
          We are a local company with a highly professional team of certified technical Guides, passionate about their culture, Chefs specializing in traditional cuisine, and an excellent Quechua-speaking Support team, who will make your vacation an unforgettable experience. We offer a wide variety of tours so you can make the most of your visit to our region.
        </p>

        <p class="text-gray-600 text-sm leading-relaxed mb-5">
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
      <div class="grid grid-cols-2 gap-4" style="grid-template-rows: 330px 330px;">

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
<section class="py-16 bg-gray-50">
  <div class="container">

    <!-- Header -->
    <div class="text-center mb-10">
      <span class="inline-block text-primary text-sm font-semibold tracking-widest uppercase mb-2">Alternative Treks</span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight">Best Salkantay Treks to Machu Picchu</h2>
      <p class="mt-3 text-gray-500 max-w-xl mx-auto text-base">Explore our most popular Salkantay trekking routes — breathtaking landscapes, authentic experiences, and expert guides.</p>
      <div class="mt-4 flex justify-center">
        <span class="block w-14 h-1 rounded-full bg-primary"></span>
      </div>
    </div>

    <!-- Swiper -->
    <div class="swiper salkantay-swiper relative pb-12">
      <div class="swiper-wrapper">

        <!-- Card 1 -->
        <div class="swiper-slide">
          <div class="bg-white rounded-2xl shadow-md overflow-hidden group hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
            <div class="relative overflow-hidden">
              <img src="https://www.pachaexpeditions.com/wp-content/uploads/2021/09/salkantayhikingperu--1900x710.jpg" alt="Salkantay Trek 5 Days" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-500">
              <span class="absolute top-3 left-3 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full shadow">Best Seller</span>
             
            </div>
            <div class="p-5 flex flex-col flex-1">
              <div class="flex items-center gap-2 mb-2 flex-wrap">
                <span class="flex items-center gap-1 text-xs text-gray-500 bg-gray-100 px-2.5 py-1 rounded-full font-medium">
                  <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                  5 Days / 4 Nights
                </span>
               
              </div>
              <h3 class="text-base font-bold text-gray-900 mb-1 leading-snug">Salkantay Trek 5 Days to Machu Picchu</h3>
              <p class="text-sm text-gray-500 mb-4 flex-1 leading-relaxed">Cross the stunning Salkantay Pass at 4,638m and descend through cloud forests to the iconic citadel of Machu Picchu.</p>
              <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-100">
                <div>
                  <span class="text-xs text-gray-400">From</span>
                  <p class="text-xl font-extrabold text-primary leading-none">$380 <span class="text-xs font-normal text-gray-400">/ person</span></p>
                </div>
                <a href="#" class="bg-primary hover:bg-primary-dark text-white text-sm font-semibold px-5 py-2.5 rounded-full transition-colors duration-200 shadow-sm">Book Now</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="swiper-slide">
          <div class="bg-white rounded-2xl shadow-md overflow-hidden group hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
            <div class="relative overflow-hidden">
              <img src="https://www.pachaexpeditions.com/wp-content/uploads/2021/09/salkantayhikingperu--1900x710.jpg" alt="Salkantay Trek 7 Days" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-500">
              <span class="absolute top-3 left-3 bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow">Recommended</span>
             
            </div>
            <div class="p-5 flex flex-col flex-1">
              <div class="flex items-center gap-2 mb-2 flex-wrap">
                <span class="flex items-center gap-1 text-xs text-gray-500 bg-gray-100 px-2.5 py-1 rounded-full font-medium">
                  <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                  7 Days / 6 Nights
                </span>
               
              </div>
              <h3 class="text-base font-bold text-gray-900 mb-1 leading-snug">Salkantay Trek 7 Days Extended Route</h3>
              <p class="text-sm text-gray-500 mb-4 flex-1 leading-relaxed">The ultimate Salkantay adventure — includes the Humantay Lake, Sacred Valley, and a full-day guided tour of Machu Picchu.</p>
              <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-100">
                <div>
                  <span class="text-xs text-gray-400">From</span>
                  <p class="text-xl font-extrabold text-primary leading-none">$520 <span class="text-xs font-normal text-gray-400">/ person</span></p>
                </div>
                <a href="#" class="bg-primary hover:bg-primary-dark text-white text-sm font-semibold px-5 py-2.5 rounded-full transition-colors duration-200 shadow-sm">Book Now</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="swiper-slide">
          <div class="bg-white rounded-2xl shadow-md overflow-hidden group hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
            <div class="relative overflow-hidden">
              <img src="https://www.pachaexpeditions.com/wp-content/uploads/2021/09/salkantayhikingperu--1900x710.jpg" alt="Humantay Lake Day Trip" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-500">
             
            </div>
            <div class="p-5 flex flex-col flex-1">
              <div class="flex items-center gap-2 mb-2 flex-wrap">
                <span class="flex items-center gap-1 text-xs text-gray-500 bg-gray-100 px-2.5 py-1 rounded-full font-medium">
                  <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                  1 Day
                </span>
                
              </div>
              <h3 class="text-base font-bold text-gray-900 mb-1 leading-snug">Humantay Lake Day Trip from Cusco</h3>
              <p class="text-sm text-gray-500 mb-4 flex-1 leading-relaxed">A stunning turquoise glacial lake nestled at 4,200m in the Salkantay mountain range — perfect for a one-day escape from Cusco.</p>
              <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-100">
                <div>
                  <span class="text-xs text-gray-400">From</span>
                  <p class="text-xl font-extrabold text-primary leading-none">$65 <span class="text-xs font-normal text-gray-400">/ person</span></p>
                </div>
                <a href="#" class="bg-primary hover:bg-primary-dark text-white text-sm font-semibold px-5 py-2.5 rounded-full transition-colors duration-200 shadow-sm">Book Now</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 4 (extra para loop) -->
        <div class="swiper-slide">
          <div class="bg-white rounded-2xl shadow-md overflow-hidden group hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
            <div class="relative overflow-hidden">
              <img src="https://www.pachaexpeditions.com/wp-content/uploads/2021/09/salkantayhikingperu--1900x710.jpg" alt="Salkantay Luxury Trek" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-500">
              <span class="absolute top-3 left-3 bg-gray-900 text-white text-xs font-bold px-3 py-1 rounded-full shadow">Luxury</span>
             
            </div>
            <div class="p-5 flex flex-col flex-1">
              <div class="flex items-center gap-2 mb-2 flex-wrap">
                <span class="flex items-center gap-1 text-xs text-gray-500 bg-gray-100 px-2.5 py-1 rounded-full font-medium">
                  <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                  5 Days / 4 Nights
                </span>
                
              </div>
              <h3 class="text-base font-bold text-gray-900 mb-1 leading-snug">Salkantay Luxury Trek — Lodge to Lodge</h3>
              <p class="text-sm text-gray-500 mb-4 flex-1 leading-relaxed">Experience Salkantay in comfort — private mountain lodges, gourmet meals, and hot showers after every trekking day.</p>
              <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-100">
                <div>
                  <span class="text-xs text-gray-400">From</span>
                  <p class="text-xl font-extrabold text-primary leading-none">$850 <span class="text-xs font-normal text-gray-400">/ person</span></p>
                </div>
                <a href="#" class="bg-primary hover:bg-primary-dark text-white text-sm font-semibold px-5 py-2.5 rounded-full transition-colors duration-200 shadow-sm">Book Now</a>
              </div>
            </div>
          </div>
        </div>

      </div><!-- /.swiper-wrapper -->

      <!-- Navigation -->
      <div class="swiper-button-prev after:text-sm after:font-bold !w-10 !h-10 bg-white shadow-md rounded-full !text-primary hover:bg-primary hover:!text-white transition-colors duration-200 -left-2 md:-left-5"></div>
      <div class="swiper-button-next after:text-sm after:font-bold !w-10 !h-10 bg-white shadow-md rounded-full !text-primary hover:bg-primary hover:!text-white transition-colors duration-200 -right-2 md:-right-5"></div>

      <!-- Pagination -->
      <div class="swiper-pagination !bottom-0"></div>
    </div><!-- /.swiper -->

    <!-- CTA -->
    <div class="text-center mt-6">
      <a href="#" class="inline-flex items-center gap-2 border-2 border-primary text-primary hover:bg-primary hover:text-white font-semibold px-7 py-3 rounded-full transition-colors duration-200 text-sm tracking-wide">
        View All Salkantay Treks
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
      </a>
    </div>

  </div>
</section>

<!-- Exclusive Adventures and Treks -->
<section class="py-16 bg-white">
  <div class="container">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-10">
      <div>
        <span class="inline-block text-primary text-sm font-semibold tracking-widest uppercase mb-2">Pacha Expeditions</span>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight">Exclusive Adventures & Treks</h2>
        <p class="mt-3 text-gray-500 max-w-xl text-base">Handpicked expeditions for those who seek the extraordinary — remote routes, immersive nature, and unforgettable high-altitude experiences.</p>
        <div class="mt-4">
          <span class="block w-14 h-1 rounded-full bg-primary"></span>
        </div>
      </div>
      <a href="#" class="inline-flex items-center gap-2 border-2 border-primary text-primary hover:bg-primary hover:text-white font-semibold px-7 py-3 rounded-full transition-colors duration-200 text-sm tracking-wide self-start md:self-auto whitespace-nowrap">
        View All Adventures
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
      </a>
    </div>

    <!-- Swiper -->
    <div class="swiper adventures-swiper relative pb-12">
      <div class="swiper-wrapper">

        <!-- Card 1: Ausangate Trek -->
        <div class="swiper-slide">
          <div class="bg-white rounded-2xl shadow-md overflow-hidden group hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
            <div class="relative overflow-hidden">
              <img src="https://www.pachaexpeditions.com/wp-content/uploads/2022/02/ausangate-trek-5-days.jpg" alt="Ausangate Trek 5 Days" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
            
             
             
            </div>
            <div class="p-5 flex flex-col flex-1">
              <div class="flex items-center gap-2 mb-2 flex-wrap">
                <span class="flex items-center gap-1 text-xs text-gray-500 bg-gray-100 px-2.5 py-1 rounded-full font-medium">
                  <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                  5 Days / 4 Nights
                </span>
            
              </div>
              <h3 class="text-base font-bold text-gray-900 mb-1 leading-snug">Ausangate Trek 5 Days — Rainbow Mountain</h3>
              <p class="text-sm text-gray-500 mb-4 flex-1 leading-relaxed">Circumnavigate the sacred Ausangate glacier at 5,200m and witness the breathtaking Vinicunca Rainbow Mountain on this remote Andean expedition.</p>
              <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-100">
                <div>
                  <span class="text-xs text-gray-400">From</span>
                  <p class="text-xl font-extrabold text-primary leading-none">$480 <span class="text-xs font-normal text-gray-400">/ person</span></p>
                </div>
                <a href="#" class="bg-primary hover:bg-primary-dark text-white text-sm font-semibold px-5 py-2.5 rounded-full transition-colors duration-200 shadow-sm">Book Now</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 2: Amazon Jungle Expedition -->
        <div class="swiper-slide">
          <div class="bg-white rounded-2xl shadow-md overflow-hidden group hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
            <div class="relative overflow-hidden">
              <img src="https://www.pachaexpeditions.com/wp-content/uploads/2022/02/amazon-jungle-expedition.jpg" alt="Amazon Jungle Expedition 4 Days" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
            
             
              
            </div>
            <div class="p-5 flex flex-col flex-1">
              <div class="flex items-center gap-2 mb-2 flex-wrap">
                <span class="flex items-center gap-1 text-xs text-gray-500 bg-gray-100 px-2.5 py-1 rounded-full font-medium">
                  <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                  4 Days / 3 Nights
                </span>
      
              </div>
              <h3 class="text-base font-bold text-gray-900 mb-1 leading-snug">Amazon Jungle Expedition — Manu Reserve</h3>
              <p class="text-sm text-gray-500 mb-4 flex-1 leading-relaxed">Venture deep into the Manu Biosphere Reserve — home to jaguars, macaws, and giant river otters — on this immersive jungle expedition led by expert naturalist guides.</p>
              <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-100">
                <div>
                  <span class="text-xs text-gray-400">From</span>
                  <p class="text-xl font-extrabold text-primary leading-none">$320 <span class="text-xs font-normal text-gray-400">/ person</span></p>
                </div>
                <a href="#" class="bg-primary hover:bg-primary-dark text-white text-sm font-semibold px-5 py-2.5 rounded-full transition-colors duration-200 shadow-sm">Book Now</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 3: Choquequirao + Inca Trail Circuit -->
        <div class="swiper-slide">
          <div class="bg-white rounded-2xl shadow-md overflow-hidden group hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
            <div class="relative overflow-hidden">
              <img src="https://www.pachaexpeditions.com/wp-content/uploads/2022/02/choquequirao-trek-4-dias-310x340.jpg" alt="Choquequirao to Machu Picchu Circuit" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
            
            
            </div>
            <div class="p-5 flex flex-col flex-1">
              <div class="flex items-center gap-2 mb-2 flex-wrap">
                <span class="flex items-center gap-1 text-xs text-gray-500 bg-gray-100 px-2.5 py-1 rounded-full font-medium">
                  <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                  8 Days / 7 Nights
                </span>
             
              </div>
              <h3 class="text-base font-bold text-gray-900 mb-1 leading-snug">Choquequirao to Machu Picchu Circuit</h3>
              <p class="text-sm text-gray-500 mb-4 flex-1 leading-relaxed">The ultimate Inca circuit — trek from the "lost city" of Choquequirao through dramatic canyons and cloud forests, finishing with the sunrise at Machu Picchu.</p>
              <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-100">
                <div>
                  <span class="text-xs text-gray-400">From</span>
                  <p class="text-xl font-extrabold text-primary leading-none">$750 <span class="text-xs font-normal text-gray-400">/ person</span></p>
                </div>
                <a href="#" class="bg-primary hover:bg-primary-dark text-white text-sm font-semibold px-5 py-2.5 rounded-full transition-colors duration-200 shadow-sm">Book Now</a>
              </div>
            </div>
          </div>
        </div>

         <!-- Card 3: Choquequirao + Inca Trail Circuit -->
        <div class="swiper-slide">
          <div class="bg-white rounded-2xl shadow-md overflow-hidden group hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
            <div class="relative overflow-hidden">
              <img src="https://www.pachaexpeditions.com/wp-content/uploads/2022/02/choquequirao-trek-4-dias-310x340.jpg" alt="Choquequirao to Machu Picchu Circuit" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
       
             
            
            </div>
            <div class="p-5 flex flex-col flex-1">
              <div class="flex items-center gap-2 mb-2 flex-wrap">
                <span class="flex items-center gap-1 text-xs text-gray-500 bg-gray-100 px-2.5 py-1 rounded-full font-medium">
                  <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                  8 Days / 7 Nights
                </span>
               
              </div>
              <h3 class="text-base font-bold text-gray-900 mb-1 leading-snug">Choquequirao to Machu Picchu Circuit</h3>
              <p class="text-sm text-gray-500 mb-4 flex-1 leading-relaxed">The ultimate Inca circuit — trek from the "lost city" of Choquequirao through dramatic canyons and cloud forests, finishing with the sunrise at Machu Picchu.</p>
              <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-100">
                <div>
                  <span class="text-xs text-gray-400">From</span>
                  <p class="text-xl font-extrabold text-primary leading-none">$750 <span class="text-xs font-normal text-gray-400">/ person</span></p>
                </div>
                <a href="#" class="bg-primary hover:bg-primary-dark text-white text-sm font-semibold px-5 py-2.5 rounded-full transition-colors duration-200 shadow-sm">Book Now</a>
              </div>
            </div>
          </div>
        </div>


      </div><!-- /.swiper-wrapper -->

      <!-- Navigation -->
      <div class="swiper-button-prev after:text-sm after:font-bold !w-10 !h-10 bg-white shadow-md rounded-full !text-primary hover:bg-primary hover:!text-white transition-colors duration-200 -left-2 md:-left-5"></div>
      <div class="swiper-button-next after:text-sm after:font-bold !w-10 !h-10 bg-white shadow-md rounded-full !text-primary hover:bg-primary hover:!text-white transition-colors duration-200 -right-2 md:-right-5"></div>

      <!-- Pagination -->
      <div class="swiper-pagination adventures-pagination !bottom-0"></div>
    </div><!-- /.swiper -->

  </div>
</section>

<!-- Top Day Tours In Cusco -->
<section class="py-16 bg-gray-50">
  <div class="container">

    <!-- Header -->
    <div class="text-center mb-10">
      <span class="inline-block text-primary text-sm font-semibold tracking-widest uppercase mb-2">Cusco</span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Top Day Tours In Cusco</h2>
      <div class="mt-4 flex justify-center">
        <span class="block w-14 h-1 rounded-full bg-primary"></span>
      </div>
    </div>

    <!-- Swiper -->
    <div class="swiper daytours-swiper relative pb-12">
      <div class="swiper-wrapper">

        <!-- Card 1 -->
        <div class="swiper-slide">
          <a href="#" class="group block bg-white rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
            <div class="relative overflow-hidden">
              <img src="https://www.pachaexpeditions.com/wp-content/uploads/2021/09/salkantayhikingperu--1900x710.jpg" alt="Rainbow Mountain Day Trip" class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
              <span class="absolute top-3 left-3 bg-primary text-white text-[11px] font-bold px-3 py-1 rounded-full">1 Day</span>
            </div>
            <div class="p-4">
              <h3 class="font-bold text-gray-900 text-sm mb-1">Rainbow Mountain Day Trip</h3>
              <p class="text-xs text-gray-500 mb-3 leading-relaxed">Vinicunca — the colorful mountain at 5,200m above Cusco.</p>
              <div class="flex items-center justify-between">
                <p class="text-primary font-extrabold text-base">$45 <span class="text-xs font-normal text-gray-400">/ person</span></p>
                <span class="text-xs text-primary font-semibold">Book Now →</span>
              </div>
            </div>
          </a>
        </div>

        <!-- Card 2 -->
        <div class="swiper-slide">
          <a href="#" class="group block bg-white rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
            <div class="relative overflow-hidden">
              <img src="https://www.pachaexpeditions.com/wp-content/uploads/2021/09/salkantayhikingperu--1900x710.jpg" alt="Machu Picchu Day Trip" class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
              <span class="absolute top-3 left-3 bg-amber-500 text-white text-[11px] font-bold px-3 py-1 rounded-full">1 Day</span>
            </div>
            <div class="p-4">
              <h3 class="font-bold text-gray-900 text-sm mb-1">Machu Picchu Full Day Tour</h3>
              <p class="text-xs text-gray-500 mb-3 leading-relaxed">Train to Aguas Calientes + guided tour of the iconic citadel.</p>
              <div class="flex items-center justify-between">
                <p class="text-primary font-extrabold text-base">$120 <span class="text-xs font-normal text-gray-400">/ person</span></p>
                <span class="text-xs text-primary font-semibold">Book Now →</span>
              </div>
            </div>
          </a>
        </div>

        <!-- Card 3 -->
        <div class="swiper-slide">
          <a href="#" class="group block bg-white rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
            <div class="relative overflow-hidden">
              <img src="https://www.pachaexpeditions.com/wp-content/uploads/2021/09/salkantayhikingperu--1900x710.jpg" alt="Sacred Valley Tour" class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
              <span class="absolute top-3 left-3 bg-emerald-600 text-white text-[11px] font-bold px-3 py-1 rounded-full">1 Day</span>
            </div>
            <div class="p-4">
              <h3 class="font-bold text-gray-900 text-sm mb-1">Sacred Valley Full Day Tour</h3>
              <p class="text-xs text-gray-500 mb-3 leading-relaxed">Pisac market, Ollantaytambo ruins and traditional lunch included.</p>
              <div class="flex items-center justify-between">
                <p class="text-primary font-extrabold text-base">$55 <span class="text-xs font-normal text-gray-400">/ person</span></p>
                <span class="text-xs text-primary font-semibold">Book Now →</span>
              </div>
            </div>
          </a>
        </div>

        <!-- Card 4 -->
        <div class="swiper-slide">
          <a href="#" class="group block bg-white rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
            <div class="relative overflow-hidden">
              <img src="https://www.pachaexpeditions.com/wp-content/uploads/2021/09/salkantayhikingperu--1900x710.jpg" alt="Humantay Lake Day Trip" class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
              <span class="absolute top-3 left-3 bg-primary text-white text-[11px] font-bold px-3 py-1 rounded-full">1 Day</span>
            </div>
            <div class="p-4">
              <h3 class="font-bold text-gray-900 text-sm mb-1">Humantay Lake Day Trip</h3>
              <p class="text-xs text-gray-500 mb-3 leading-relaxed">Stunning turquoise glacial lake at 4,200m in the Salkantay range.</p>
              <div class="flex items-center justify-between">
                <p class="text-primary font-extrabold text-base">$65 <span class="text-xs font-normal text-gray-400">/ person</span></p>
                <span class="text-xs text-primary font-semibold">Book Now →</span>
              </div>
            </div>
          </a>
        </div>

      </div><!-- /.swiper-wrapper -->

      <div class="swiper-button-prev after:text-sm after:font-bold !w-10 !h-10 bg-white shadow-md rounded-full !text-primary hover:bg-primary hover:!text-white transition-colors duration-200 -left-2 md:-left-5"></div>
      <div class="swiper-button-next after:text-sm after:font-bold !w-10 !h-10 bg-white shadow-md rounded-full !text-primary hover:bg-primary hover:!text-white transition-colors duration-200 -right-2 md:-right-5"></div>
      <div class="swiper-pagination !bottom-0"></div>
    </div><!-- /.swiper -->

  </div>
</section>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();

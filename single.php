<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pachaexp
 */

get_header();
?>

<?php
$gallery = get_field('gallery');
if ( $gallery ) :
    $total  = count( $gallery );
    $main   = $gallery[0];
    $side   = array_slice( $gallery, 1, 3 );
    $hidden = array_slice( $gallery, 4 );
?>
<section>
	<div class="container">
		<div class="py-2">
		<div class="relative">

			<!-- MÓVIL: solo foto principal -->
			<a href="<?php echo esc_url( $main['url'] ); ?>"
			   data-fancybox="gallery-tours"
			   data-caption="<?php echo esc_attr( $main['caption'] ); ?>"
			   class="md:hidden relative overflow-hidden rounded-2xl block group h-[280px]">
				<img src="<?php echo esc_url( $main['sizes']['large'] ); ?>"
				     alt="<?php echo esc_attr( $main['alt'] ); ?>"
				     class="h-full w-full object-cover" />
				<span class="absolute bottom-4 left-4 inline-flex items-center gap-2 bg-gold text-white text-sm font-semibold px-4 py-2 rounded-xl shadow-lg pointer-events-none">
					<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
						<rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
					</svg>
					See Gallery &middot; <?php echo $total; ?> photos
				</span>
				<?php foreach ( array_slice( $gallery, 1 ) as $img ) : ?>
				<a href="<?php echo esc_url( $img['url'] ); ?>"
				   data-fancybox="gallery-tours"
				   data-caption="<?php echo esc_attr( $img['caption'] ); ?>"
				   class="hidden"></a>
				<?php endforeach; ?>
			</a>

			<!-- DESKTOP: grid completo -->
			<div class="hidden md:grid h-[540px] grid-cols-[1fr_320px] grid-rows-3 gap-3">
				<!-- Foto principal -->
				<a href="<?php echo esc_url( $main['url'] ); ?>"
				   data-fancybox="gallery-tours"
				   data-caption="<?php echo esc_attr( $main['caption'] ); ?>"
				   class="relative row-span-3 overflow-hidden rounded-2xl block group">
					<img src="<?php echo esc_url( $main['sizes']['large'] ); ?>"
					     alt="<?php echo esc_attr( $main['alt'] ); ?>"
					     class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
					<span class="absolute bottom-4 left-4 inline-flex items-center gap-2 bg-gold text-white text-sm font-semibold px-4 py-2 rounded-xl shadow-lg pointer-events-none">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
						</svg>
						See Gallery &middot; <?php echo $total; ?> photos
					</span>
				</a>
				<!-- Fotos laterales (2, 3, 4) -->
				<?php foreach ( $side as $i => $img ) :
					$extra = ( $i === 2 && $total > 4 ) ? $total - 4 : 0;
				?>
				<a href="<?php echo esc_url( $img['url'] ); ?>"
				   data-fancybox="gallery-tours"
				   data-caption="<?php echo esc_attr( $img['caption'] ); ?>"
				   class="relative overflow-hidden rounded-2xl block">
					<img src="<?php echo esc_url( $img['sizes']['medium_large'] ); ?>"
					     alt="<?php echo esc_attr( $img['alt'] ); ?>"
					     class="h-full w-full object-cover" />
					<?php if ( $extra > 0 ) : ?>
					<div class="absolute inset-0 bg-black/50 flex items-center justify-center pointer-events-none">
						<span class="text-white text-2xl font-bold">+<?php echo $extra; ?> fotos</span>
					</div>
					<?php endif; ?>
				</a>
				<?php endforeach; ?>

				<!-- Imágenes extra solo para FancyBox -->
				<?php foreach ( $hidden as $img ) : ?>
				<a href="<?php echo esc_url( $img['url'] ); ?>"
				   data-fancybox="gallery-tours"
				   data-caption="<?php echo esc_attr( $img['caption'] ); ?>"
				   class="hidden"></a>
				<?php endforeach; ?>
			</div>

		</div><!-- /relative -->
		</div>
	</div>
</section>
<?php endif; ?>



<section class="px-3 xl:px-0">

		<div class="container">
				<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
				<div class="breadcrumb-wrap">
					<?php yoast_breadcrumb( '<nav class="breadcrumb-nav" aria-label="breadcrumb">', '</nav>' ); ?>
				</div>
				<?php endif; ?>


			<div class="flex flex-col md:flex-row justify-between gap-10 mt-6 xl:mt-1">
				<div class="w-full md:w-1/2 xl:w-[70%] self-start">

					<main id="primary" class="tours-main">

						<?php
						while (have_posts()) :
							the_post();

							get_template_part('template-parts/content', get_post_type());

						endwhile; // End of the loop.
						?>

					</main><!-- #main -->


				</div>
				<div class="w-full md:w-1/2 xl:w-[30%]" style="align-self:stretch;">
					<div id="tour-sticky-col" style="position:sticky;">

						<!-- card de price bookw now, enquire y whatsapp -->
						<div class="rounded-2xl overflow-hidden shadow-xl border border-gray-100">

								<!-- Banner Flash Sale -->
								<div class="relative px-5 py-4 text-center overflow-hidden bg-primary">
									<span class="absolute left-4 top-2 text-white/30 text-2xl select-none" aria-hidden="true">✦</span>
									<span class="absolute right-5 bottom-2 text-white/20 text-xl select-none" aria-hidden="true">✦</span>
									<p class="text-[10px] font-bold tracking-[0.25em] uppercase text-white/75 mb-1">FLASH SALE</p>
									<p class="text-white font-semibold text-sm leading-snug">
										Get
										<span class="inline-block bg-gold text-white font-extrabold px-3 py-0.5 rounded-full text-sm mx-1">
											7% OFF
										</span>
										for the <?php echo get_the_title(); ?>
									</p>
								</div>

								<div class="bg-white px-6 py-6">

									<!-- Precio -->
									<?php $price = get_field('price') ?: get_field('from_price'); ?>
									<?php if ( $price ) : ?>
									<div class="text-center mb-3">
										<p class="text-[10px] font-bold tracking-[0.22em] text-gray-400 uppercase mb-2">FROM</p>
										<div class="flex items-end justify-center gap-1 leading-none">
											<span class="text-xl font-bold text-gray-600 pb-1">$</span>
											<span class="text-5xl font-extrabold text-gray-900">
												<?php echo esc_html( number_format( (float) $price ) ); ?>
											</span>
											<span class="text-base font-semibold text-gray-400 pb-1.5">USD</span>
										</div>
									</div>
									<div class="flex justify-center mb-4">
										<span class="border border-gray-200 text-gray-500 text-xs font-medium px-4 py-1 rounded-full">
											Per Person
										</span>
									</div>
									<?php endif; ?>

									<!-- Door to Door -->
									<div class="flex items-center justify-center gap-1.5 text-sm font-semibold text-primary mb-5">
										<svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
											<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
										</svg>
										Door to Door Service!
									</div>

									<!-- Book Now -->
									<?php $booking_url = get_field('booking_url', 'option'); ?>
									<a href="<?php echo esc_url( $booking_url ); ?>?tour=t<?php echo esc_attr( get_the_ID() ); ?>"
									target="_blank"
									class="flex items-center justify-center gap-2 w-full bg-primary hover:bg-primary-dark text-white font-bold text-sm uppercase tracking-wider py-3.5 rounded-xl transition-colors duration-200 shadow-sm mb-5">
										<svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2"
												d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
										</svg>
										Book Now
									</a>

									<!-- Asistencia -->
									<div class="border-t border-gray-100 pt-5">
										<p class="text-center text-[10px] font-bold tracking-[0.18em] text-gray-400 uppercase mb-3">
											You need assistance?
										</p>
										<div class="grid grid-cols-2 gap-3">

											<!-- Inquire -->
											<button type="button" onclick="document.getElementById('inquire-modal').style.display='flex'"
											class="flex items-center justify-center gap-1.5 border border-gray-200 hover:border-primary hover:text-primary text-gray-600 text-sm font-semibold py-2.5 rounded-xl transition-colors duration-200 w-full cursor-pointer bg-white">
												<svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
														d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
												</svg>
												Inquire
											</button>

											<!-- WhatsApp -->
											<a href="https://wa.me/51984387050?text=<?php echo urlencode('Hi! I am interested in: ' . get_the_title()); ?>"
											target="_blank" rel="noopener noreferrer"
											class="flex items-center justify-center gap-1.5 bg-[#25D366] hover:bg-[#1ebe5d] text-white text-sm font-semibold py-2.5 rounded-xl transition-colors duration-200">
												<svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
													<path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
													<path d="M12 0C5.373 0 0 5.373 0 12c0 2.117.553 4.103 1.522 5.828L.057 23.857a.5.5 0 00.606.597l6.086-1.456A11.944 11.944 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.804 9.804 0 01-5.031-1.387l-.36-.214-3.733.893.942-3.617-.234-.373A9.823 9.823 0 012.182 12C2.182 6.56 6.56 2.182 12 2.182S21.818 6.56 21.818 12 17.44 21.818 12 21.818z"/>
												</svg>
												WhatsApp
											</a>

										</div>
									</div>

								</div>
							</div><!-- /card -->

							<!-- details tour -->
						<?php
						$pacha_icon_map = [
							'tour_type'       => [ 'label' => 'Tour Type',       'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12M8 12h12M8 17h12M4 7h.01M4 12h.01M4 17h.01"/></svg>' ],
							'duration'        => [ 'label' => 'Duration',        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 3"/></svg>' ],
							'activities'      => [ 'label' => 'Activities',      'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>' ],
							'group_size'      => [ 'label' => 'Group Size',      'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-5.477-3.682M9 20H4v-2a4 4 0 015.477-3.682M15 7a4 4 0 11-8 0 4 4 0 018 0zM21 12a3 3 0 11-6 0 3 3 0 016 0zM3 12a3 3 0 116 0 3 3 0 01-6 0z"/></svg>' ],
							'difficulty'      => [ 'label' => 'Difficulty',      'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>' ],
							'accommodation'   => [ 'label' => 'Accommodation',   'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M5 10v9a1 1 0 001 1h4v-5h4v5h4a1 1 0 001-1v-9"/></svg>' ],
							'languages'       => [ 'label' => 'Tour Language',   'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/></svg>' ],
							'hiking_distance' => [ 'label' => 'Hiking Distance', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>' ],
							'max_altitude'    => [ 'label' => 'Max Altitude',    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3l7 18 4-9 9-4L5 3z"/></svg>' ],
							'meals'           => [ 'label' => 'Meals',           'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6h11M10 21a1 1 0 100-2 1 1 0 000 2zm7 0a1 1 0 100-2 1 1 0 000 2z"/></svg>' ],
							'location'        => [ 'label' => 'Location',        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>' ],
							'transport'       => [ 'label' => 'Transport',       'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 17l-1 4H5l-1-4M17 17l1 4h2l1-4M3 9h18l-1 8H4L3 9zM3 9l1-5h16l1 5M9 13h6M7 13h.01M17 13h.01"/></svg>' ],
							'season'          => [ 'label' => 'Best Season',     'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l-.707-.707M6.343 6.343l-.707-.707M12 7a5 5 0 100 10A5 5 0 0012 7z"/></svg>' ],
							'min_age'         => [ 'label' => 'Min Age',         'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>' ],
							'fitness'         => [ 'label' => 'Fitness Level',   'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>' ],
						];

						$pacha_details = get_field('tour_details_items');
						if ( $pacha_details ) :
							$pacha_count = count( $pacha_details );
							$pacha_last_row_start = floor( ( $pacha_count - 1 ) / 2 ) * 2;
						?>
						<div class="mt-6 rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
							<div class="bg-primary px-5 py-3">
								<h3 class="text-white font-bold text-sm tracking-wide uppercase">Trip Details</h3>
							</div>
							<div class="bg-white px-4 py-2">
								<div class="grid grid-cols-2">
									<?php foreach ( $pacha_details as $i => $row ) :
										$icon_key  = $row['detail_icon'] ?? '';
										$icon_data = $pacha_icon_map[ $icon_key ] ?? [ 'label' => ucwords( str_replace( '_', ' ', $icon_key ) ), 'icon' => '' ];
										$value     = ! empty( $row['detail_value'] ) ? esc_html( $row['detail_value'] ) : '&mdash;';
										$is_right  = $i % 2 === 1;
										$last_row  = $i >= $pacha_last_row_start;
									?>
									<div class="flex items-start gap-3 py-3
										<?php echo $is_right ? 'border-l border-gray-100 pl-4' : 'pr-2'; ?>
										<?php echo $last_row ? '' : 'border-b border-gray-100'; ?>">
										<div class="text-primary flex-shrink-0 mt-0.5"><?php echo $icon_data['icon']; ?></div>
										<div class="min-w-0">
											<p class="text-[10px] font-semibold tracking-wide text-gray-400 uppercase leading-tight"><?php echo esc_html( $icon_data['label'] ); ?></p>
											<p class="text-sm font-bold text-gray-800 leading-snug mt-0.5"><?php echo $value; ?></p>
										</div>
									</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						<?php endif; ?>

					</div><!-- /tour-sticky-col -->
				</div>
			</div>
		</div>

</section>

<!-- Inquire Modal -->
<div id="inquire-modal" class="fixed inset-0 z-50 items-center justify-center p-4" style="display:none">
	<!-- Backdrop -->
	<div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="document.getElementById('inquire-modal').style.display='none'"></div>

	<!-- Modal box -->
	<div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-lg p-8 z-10 max-h-[90vh] overflow-y-auto">

		<!-- Close button -->
		<button type="button"
			onclick="document.getElementById('inquire-modal').style.display='none'"
			class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 transition-colors"
			aria-label="Close">
			<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
			</svg>
		</button>

		<h2 class="text-xl font-bold text-gray-800 mb-1">Inquire about this tour</h2>
		<p class="text-sm text-gray-500 mb-6"><?php the_title(); ?></p>

		<?php echo do_shortcode('[contact-form-7 id="78daa9c" title="Contact Us"]'); ?>

	</div>
</div>

<script>
(function () {
    var nav = document.querySelector('nav.sticky, nav[class*="sticky"]');
    var col = document.getElementById('tour-sticky-col');
    if (!col) return;

    function applyTop() {
        var navH = nav ? nav.offsetHeight : 0;
        col.style.top = (navH + 1) + 'px';
    }

    applyTop();
    window.addEventListener('resize', applyTop);
})();
</script>

<?php
/* ═══════════════════════════════════════════════════════
   TOURS RELACIONADOS — misma categoría, excluye el actual
═══════════════════════════════════════════════════════ */
$pacha_cats = get_the_category();
if ( ! empty( $pacha_cats ) ) :
    $pacha_cat_ids = wp_list_pluck( $pacha_cats, 'term_id' );
    $related_q = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'post__not_in'   => [ get_the_ID() ],
        'category__in'   => $pacha_cat_ids,
        'post_status'    => 'publish',
        'orderby'        => 'rand',
    ]);
    if ( $related_q->have_posts() ) :
?>
<section class="py-14 bg-gray-50 px-3 xl:px-0">
    <div class="container">

        <div class="text-center mb-10">
            <span class="inline-block text-primary text-sm font-semibold tracking-widest uppercase mb-2">You May Also Like</span>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">Related Tours</h2>
            <p class="text-gray-500 text-sm mt-2">More tours in the same category</p>
            <div class="mt-4 flex justify-center">
                <span class="block w-12 h-1 rounded-full bg-primary"></span>
            </div>
        </div>

        <div class="swiper related-tours-swiper relative pb-12">
            <div class="swiper-wrapper">
                <?php while ( $related_q->have_posts() ) : $related_q->the_post();
                    $rt_img   = get_the_post_thumbnail_url( null, 'large' ) ?: get_template_directory_uri() . '/img/fondo-footer.jpg';
                    $rt_price = get_field('price') ?: get_field('from_price');
                    $rt_dur   = get_field('duration');
                    $rt_cats  = get_the_category();
                    $rt_cat   = ! empty( $rt_cats ) ? $rt_cats[0]->name : '';
                ?>
                <div class="swiper-slide h-auto">
                    <a href="<?php the_permalink(); ?>"
                       class="group flex flex-col rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 bg-white h-full">
                        <div class="relative overflow-hidden h-52 flex-shrink-0">
                            <img src="<?php echo esc_url( $rt_img ); ?>"
                                 alt="<?php the_title_attribute(); ?>"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/55 via-black/10 to-transparent"></div>
                            <?php if ( $rt_cat ) : ?>
                            <span class="absolute top-3 left-3 bg-primary text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wide">
                                <?php echo esc_html( $rt_cat ); ?>
                            </span>
                            <?php endif; ?>
                        </div>
                        <div class="p-4 flex flex-col flex-1">
                            <h3 class="text-gray-900 font-bold text-sm leading-snug mb-2 group-hover:text-primary transition-colors duration-200 line-clamp-2">
                                <?php the_title(); ?>
                            </h3>
                            <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-100">
                                <?php if ( $rt_dur ) : ?>
                                <span class="text-xs text-gray-500 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                        <circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 3"/>
                                    </svg>
                                    <?php echo esc_html( $rt_dur ); ?>
                                </span>
                                <?php endif; ?>
                                <?php if ( $rt_price ) : ?>
                                <span class="text-primary font-extrabold text-sm">
                                    From $<?php echo number_format( (float) $rt_price ); ?>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <div class="swiper-button-prev pacha-related-prev"></div>
            <div class="swiper-button-next pacha-related-next"></div>
            <div class="swiper-pagination pacha-related-pagination"></div>
        </div>

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Swiper !== 'undefined') {
        new Swiper('.related-tours-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: false,
            navigation: {
                prevEl: '.pacha-related-prev',
                nextEl: '.pacha-related-next',
            },
            pagination: {
                el: '.pacha-related-pagination',
                clickable: true,
            },
            breakpoints: {
                640:  { slidesPerView: 2, spaceBetween: 20 },
                1024: { slidesPerView: 3, spaceBetween: 24 },
                1280: { slidesPerView: 4, spaceBetween: 24 },
            },
        });
    }
});
</script>

<style>
.related-tours-swiper .swiper-button-prev,
.related-tours-swiper .swiper-button-next {
    color: #fff !important;
    background: #9db247;
    border-radius: 50%;
    width: 40px !important;
    height: 40px !important;
    top: 40%;
    box-shadow: 0 2px 10px rgba(0,0,0,.2);
    transition: background .2s;
}
.related-tours-swiper .swiper-button-prev:hover,
.related-tours-swiper .swiper-button-next:hover { background: #8aa03d; }
.related-tours-swiper .swiper-button-prev::after,
.related-tours-swiper .swiper-button-next::after { font-size: 14px !important; font-weight: 700; }
.related-tours-swiper .swiper-pagination-bullet { background: #9db247; opacity: .4; }
.related-tours-swiper .swiper-pagination-bullet-active { opacity: 1; }
.line-clamp-2 { display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; }
</style>

    <?php endif; endif; ?>


<?php
/* ═══════════════════════════════════════════════════════
   ÚLTIMOS BLOG POSTS
═══════════════════════════════════════════════════════ */
$pacha_blog_q = new WP_Query([
    'post_type'      => 'blog',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);
if ( $pacha_blog_q->have_posts() ) :
?>
<section class="py-14 bg-white px-3 xl:px-0">
    <div class="container">

        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-10">
            <div>
                <span class="inline-block text-primary text-sm font-semibold tracking-widest uppercase mb-2">From Our Journal</span>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">Latest Blog Posts</h2>
            </div>
            <a href="<?php echo esc_url( get_post_type_archive_link('blog') ?: home_url('/blog/') ); ?>"
               class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:underline flex-shrink-0">
                View all articles
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php while ( $pacha_blog_q->have_posts() ) : $pacha_blog_q->the_post();
            $pb_thumb   = get_the_post_thumbnail_url( null, 'large' ) ?: get_template_directory_uri() . '/img/fondo-footer.jpg';
            $pb_cats    = get_the_category();
            $pb_cat     = ! empty( $pb_cats ) ? $pb_cats[0]->name : '';
            $pb_words   = str_word_count( strip_tags( get_the_content() ) );
            $pb_minutes = max( 1, ceil( $pb_words / 200 ) );
            $pb_excerpt = wp_trim_words( get_the_excerpt(), 18, '…' );
        ?>
            <a href="<?php the_permalink(); ?>"
               class="group flex flex-col rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300 bg-white">

                <!-- Imagen -->
                <div class="relative overflow-hidden h-52 flex-shrink-0">
                    <img src="<?php echo esc_url( $pb_thumb ); ?>"
                         alt="<?php the_title_attribute(); ?>"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    <?php if ( $pb_cat ) : ?>
                    <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm text-primary text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wide shadow-sm">
                        <?php echo esc_html( $pb_cat ); ?>
                    </span>
                    <?php endif; ?>
                </div>

                <!-- Body -->
                <div class="p-5 flex flex-col flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <time class="text-xs text-gray-400"><?php echo get_the_date('M j, Y'); ?></time>
                        <span class="text-gray-200">|</span>
                        <span class="text-xs text-gray-400"><?php echo $pb_minutes; ?> min read</span>
                    </div>
                    <h3 class="text-gray-900 font-bold text-base leading-snug mb-2 group-hover:text-primary transition-colors duration-200 line-clamp-2">
                        <?php the_title(); ?>
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed flex-1 line-clamp-3">
                        <?php echo esc_html( $pb_excerpt ); ?>
                    </p>
                    <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-100">
                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-primary">
                            Read more
                            <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                        <span class="flex items-center gap-1 text-xs text-gray-400">
                            <svg class="w-3.5 h-3.5 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <?php echo number_format( function_exists('pachaexp_get_post_views') ? pachaexp_get_post_views( get_the_ID() ) : 0 ); ?> views
                        </span>
                    </div>
                </div>

            </a>
        <?php endwhile; wp_reset_postdata(); ?>
        </div>

    </div>
</section>

<style>
.line-clamp-3 { display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; }
</style>

<?php endif; ?>

<?php
get_footer();

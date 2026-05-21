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


			<div class="flex flex-col md:flex-row justify-between items-start gap-10 mt-6 xl:mt-1">
				<div class="w-full md:w-1/2 xl:w-[70%]">

					<main id="primary" class="tours-main">

						<?php
						while (have_posts()) :
							the_post();

							get_template_part('template-parts/content', get_post_type());

						endwhile; // End of the loop.
						?>

					</main><!-- #main -->


				</div>
				<div class="w-full md:w-1/2 xl:w-[30%]">
						
							<!-- card de price bookw now, enquire y whatsapp -->
							<div class="rounded-2xl overflow-hidden shadow-xl border border-gray-100">

								<!-- Banner Flash Sale -->
								<div class="relative px-5 py-4 text-center overflow-hidden bg-primary">
									<span class="absolute left-4 top-2 text-white/30 text-2xl select-none" aria-hidden="true">✦</span>
									<span class="absolute right-5 bottom-2 text-white/20 text-xl select-none" aria-hidden="true">✦</span>
									<p class="text-[10px] font-bold tracking-[0.25em] uppercase text-white/75 mb-1">FLASH SALE</p>
									<p class="text-white font-semibold text-sm leading-snug">
										Get
										<span class="inline-block bg-gold text-[#3a2800] font-extrabold px-3 py-0.5 rounded-full text-sm mx-1">
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
									<a href="<?php echo esc_url( get_field('book_now_url') ?: '#booking' ); ?>"
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
											<a href="mailto:info@pachaexpeditions.com"
											class="flex items-center justify-center gap-1.5 border border-gray-200 hover:border-primary hover:text-primary text-gray-600 text-sm font-semibold py-2.5 rounded-xl transition-colors duration-200">
												<svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
														d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
												</svg>
												Inquire
											</a>

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
						

				</div>
			</div>
		</div>

</section>


<?php
get_footer();

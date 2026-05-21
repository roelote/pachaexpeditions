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
				<div class="w-full w-1/2 xl:w-[30%]">

				<!-- seccion mapa -->
				<?php
				$mapa = get_field( 'mapa_imagen' );
				if ( $mapa ) :
					$src = is_array( $mapa ) ? $mapa['url'] : $mapa;
					$alt = is_array( $mapa ) ? $mapa['alt'] : 'Route map';
				?>
				<div class="mb-6">
					<h3 class="flex items-center gap-2 text-[15px] font-semibold text-gray-800 mb-3">
						<svg class="w-4 h-4 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
						</svg>
						Route Map
					</h3>
					<a href="<?php echo esc_url( $src ); ?>"
					   data-fancybox="mapa"
					   class="block overflow-hidden rounded-xl shadow-md border border-gray-100 group relative">
						<img src="<?php echo esc_url( $src ); ?>"
						     alt="<?php echo esc_attr( $alt ); ?>"
						     class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105">
						<div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300 flex items-center justify-center">
							<span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-white/90 text-gray-800 text-xs font-semibold px-3 py-1.5 rounded-full flex items-center gap-1.5">
								<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
								</svg>
								Ver mapa
							</span>
						</div>
					</a>
				</div>
				<?php endif; ?>

				</div>
			</div>
		</div>

</section>


<?php
get_footer();

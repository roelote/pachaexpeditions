<?php
/**
 * Tour card (shared by Salkantay, Exclusive Adventures and Day Tours sections).
 *
 * Usage: get_template_part( 'template-parts/tour-card', null, [ 'tour_id' => $id ] );
 */

$tour_id = isset( $args['tour_id'] ) ? (int) $args['tour_id'] : 0;
if ( ! $tour_id ) {
  return;
}

$tour_img   = get_the_post_thumbnail_url( $tour_id, 'large' ) ?: 'https://via.placeholder.com/800x400?text=No+Image';
$tour_title = get_the_title( $tour_id );
$tour_desc  = get_field( 'tour_description', $tour_id );
if ( ! $tour_desc ) {
  $tour_desc = get_post_field( 'post_excerpt', $tour_id );
}
if ( ! $tour_desc ) {
  $tour_desc = wp_trim_words( strip_tags( get_post_field( 'post_content', $tour_id ) ), 22, '...' );
}
$tour_badge = get_field( 'tour_badge_label', $tour_id ) ?: 'Special Offer';
$tour_dur   = get_field( 'tour_duration', $tour_id );
$tour_price = get_field( 'price', $tour_id );
$tour_link  = get_permalink( $tour_id );

// Category (first post category) and difficulty / duration (from Trip Details)
$card_cats = get_the_category( $tour_id );
$card_cat  = ! empty( $card_cats ) ? $card_cats[0]->name : $tour_badge;
$card_diff = '';
$card_dur  = '';
$card_details = get_field( 'tour_details_items', $tour_id );
if ( $card_details ) {
  foreach ( $card_details as $row ) {
    $key = $row['detail_icon'] ?? '';
    if ( $key === 'difficulty' && ! $card_diff && ! empty( $row['detail_value'] ) ) {
      $card_diff = $row['detail_value'];
    } elseif ( $key === 'duration' && ! $card_dur && ! empty( $row['detail_value'] ) ) {
      $card_dur = $row['detail_value'];
    }
  }
}
if ( ! $card_dur ) {
  $card_dur = $tour_dur;
}
?>
<article class="bg-white rounded-3xl border border-gray-100 shadow-md hover:shadow-xl transition-shadow duration-300 p-4 group flex flex-col h-full">
  <a href="<?php echo esc_url( $tour_link ); ?>" class="relative block overflow-hidden rounded-2xl" aria-label="<?php echo esc_attr( $tour_title ); ?>">
    <img src="<?php echo esc_url( $tour_img ); ?>" alt="<?php echo esc_attr( $tour_title ); ?>" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
  </a>

  <!-- Category + difficulty row -->
  <div class="flex items-center justify-between gap-3 mt-4">
    <span class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wide text-primary">
      <span class="w-9 h-9 rounded-lg bg-primary/10 flex items-center justify-center shrink-0">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 20l5-9 4 6 3-4 6 7H3zM15 8a2 2 0 100-4 2 2 0 000 4z"/></svg>
      </span>
      <?php echo esc_html( $card_cat ); ?>
    </span>
    <?php if ( $card_diff ) : ?>
    <span class="flex items-center gap-2 text-xs text-gray-700 pl-3 border-l border-gray-200 leading-tight">
      <svg class="w-6 h-6 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 17a8 8 0 1116 0M12 17l3.5-5"/></svg>
      <span><strong class="text-gray-900">Difficulty:</strong> <?php echo esc_html( $card_diff ); ?></span>
    </span>
    <?php endif; ?>
  </div>

  <h3 class="text-xl font-extrabold text-gray-900 mt-3 mb-2 leading-snug">
    <a href="<?php echo esc_url( $tour_link ); ?>" class="hover:text-primary transition-colors"><?php echo esc_html( $tour_title ); ?></a>
  </h3>
  <p class="text-sm text-gray-500 mb-4 leading-relaxed line-clamp-3"><?php echo esc_html( $tour_desc ); ?></p>

  <!-- Rating / duration + price -->
  <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-100 mt-auto">
    <div class="flex flex-col justify-center gap-3 text-xs text-gray-600">
      <p class="flex items-center gap-1.5">
        <svg class="w-4 h-4 text-primary shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15l-5.9 3.1 1.1-6.6L.4 6.9l6.6-1L10 0l3 5.9 6.6 1-4.8 4.7 1.1 6.6z"/></svg>
        <strong class="text-gray-900">Rated Tour</strong>
        <span class="text-yellow-400 tracking-tighter">★★★★★</span>
      </p>
      <?php if ( $card_dur ) : ?>
      <p class="flex items-center gap-1.5">
        <svg class="w-4 h-4 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        <span><strong class="text-gray-900">Duration:</strong> <?php echo esc_html( $card_dur ); ?></span>
      </p>
      <?php endif; ?>
    </div>
    <div class="pl-4 border-l border-gray-100">
      <p class="text-xs text-gray-500">Price, From</p>
      <p class="text-3xl font-extrabold text-gray-900 leading-tight"><?php echo esc_html( $tour_price ); ?></p>
      <p class="text-xs text-gray-400">per person</p>
    </div>
  </div>

  <!-- Actions -->
  <div class="grid grid-cols-2 gap-3 mt-4">
    <a href="https://wa.me/51984387050?text=<?php echo rawurlencode( 'Hi! I am interested in: ' . $tour_title ); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between gap-2 border-2 border-primary text-primary hover:bg-primary hover:text-white font-bold text-sm px-4 py-3 rounded-xl transition-colors duration-200">
      Contact us
      <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 9l3 3-3 3"/></svg>
    </a>
    <a href="<?php echo esc_url( $tour_link ); ?>" class="flex items-center justify-between gap-2 bg-primary hover:bg-primary-dark text-white font-bold text-sm px-4 py-3 rounded-xl transition-colors duration-200 shadow-sm">
      View Itinerary
      <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.5 12S6 5 12 5s9.5 7 9.5 7-3.5 7-9.5 7S2.5 12 2.5 12z"/></svg>
    </a>
  </div>
</article>

<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pachaexp
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


	<!-- Top banner -->
  <div class="bg-primary text-white text-center text-sm py-2 px-4 tracking-wide">
    This week only: save on all 2026 Inca Trail departures—book now!
  </div>

  <!-- Main header -->
  <header class="bg-white border-b border-gray-100 shadow-sm px-3 xl:px-0">
    <div class="container ">

      <!-- Top row: Logo + contact info -->
      <div class="flex items-center justify-between py-3">

        <!-- Logo -->
        <div class="flex items-center gap-2">
          <?php the_custom_logo(); ?>
        </div>

        <!-- Right side: links + contacts (oculto en móvil) -->
        <div class="hidden md:flex flex-col items-end gap-5">

          <!-- Row 1: quick links + social icons + TripAdvisor -->
          <div class="flex items-center gap-3">
            <!-- Quick links -->
            <?php
            $ql_items = function_exists('get_field') ? get_field('header_quick_links', 'option') : [];
            if ( empty( $ql_items ) ) {
                $ql_items = [
                    [ 'ql_label' => 'Circuits', 'ql_url' => '#' ],
                    [ 'ql_label' => 'FAQs',     'ql_url' => '#' ],
                    [ 'ql_label' => 'Contact',  'ql_url' => '#' ],
                ];
            }
            ?>
            <div class="flex items-center gap-3 text-sm text-gray-500">
              <?php foreach ( $ql_items as $i => $ql ) : ?>
              <a href="<?php echo esc_url( $ql['ql_url'] ); ?>" class="hover:text-primary transition-colors duration-200 font-medium">
                <?php echo esc_html( $ql['ql_label'] ); ?>
              </a>
              <?php if ( $i < count( $ql_items ) - 1 ) : ?>
              <span class="text-gray-300">|</span>
              <?php endif; ?>
              <?php endforeach; ?>
            </div>

            <!-- Social icons -->
            <div class="flex items-center gap-0.5 pr-3">
              <!-- Facebook -->
              <a href="#" aria-label="Facebook" class="social-icon fb">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.793-4.697 4.533-4.697 1.313 0 2.686.235 2.686.235v2.97h-1.513c-1.491 0-1.956.93-1.956 1.874v2.25h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/>
                </svg>
              </a>
              <!-- Instagram -->
              <a href="#" aria-label="Instagram" class="social-icon ig">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
              </a>
              <!-- YouTube -->
              <a href="#" aria-label="YouTube" class="social-icon yt">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
              </a>
              <!-- TikTok -->
              <a href="#" aria-label="TikTok" class="social-icon tk">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                </svg>
              </a>
              <!-- Pinterest -->
              <a href="#" aria-label="Pinterest" class="social-icon pi">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 0C5.373 0 0 5.373 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 01.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.632-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0z"/>
                </svg>
              </a>
            </div>

            <!-- TripAdvisor -->
            <a href="#" class="flex items-center gap-2 bg-[#34E0A1] hover:bg-[#28c98a] text-white text-xs font-bold px-4 py-2 rounded-full transition-colors duration-200 tracking-wide shadow-sm">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zm0 2c4.97 0 9 4.03 9 9s-4.03 9-9 9-9-4.03-9-9 4.03-9 9-9zm-3.5 6a3.5 3.5 0 100 7 3.5 3.5 0 000-7zm7 0a3.5 3.5 0 100 7 3.5 3.5 0 000-7zm-7 1.5a2 2 0 110 4 2 2 0 010-4zm7 0a2 2 0 110 4 2 2 0 010-4zm-7 .75a1.25 1.25 0 100 2.5 1.25 1.25 0 000-2.5zm7 0a1.25 1.25 0 100 2.5 1.25 1.25 0 000-2.5z"/>
              </svg>
              TripAdvisor
            </a>

            
          </div>

          <!-- Row 2: Contact info -->
          <div class="flex items-center gap-4 text-sm text-gray-600">
            <!-- WhatsApp -->
            <a href="https://wa.me/51984387050" class="flex items-center gap-1.5 hover:text-green-600 transition-colors duration-200">
              <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                <path d="M12 0C5.373 0 0 5.373 0 12c0 2.117.553 4.103 1.522 5.828L.057 23.857a.5.5 0 00.606.597l6.086-1.456A11.944 11.944 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.804 9.804 0 01-5.031-1.387l-.36-.214-3.733.893.942-3.617-.234-.373A9.823 9.823 0 012.182 12C2.182 6.56 6.56 2.182 12 2.182S21.818 6.56 21.818 12 17.44 21.818 12 21.818z"/>
              </svg>
              +51 984 387 050
            </a>
            <span class="text-gray-200">|</span>
            <!-- Email -->
            <a href="mailto:info@pachaexpeditions.com" class="flex items-center gap-1.5 hover:text-primary transition-colors duration-200">
              <svg class="w-4 h-4 mt-1 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
              </svg>
              <span>+51 984 387 050</span>
            </a>
            <span class="text-gray-200">|</span>
            <!-- Email -->
            <a href="mailto:info@pachaexpeditions.com" class="flex items-center gap-1.5 hover:text-primary transition-colors duration-200">
              <svg class="w-4 h-4 mt-1 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
              </svg>
              <span>info@pachaexpeditions.com</span>
            </a>

          </div>

          

        </div>

        <!-- Hamburger: solo en móvil, pegado a la derecha -->
        <button id="mob-open-btn"
                class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors flex-shrink-0"
                aria-label="Abrir menú">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>

      </div>
    </div>

  </header>

  <!-- Navigation bar -->
  <nav class="sticky top-0 z-40 border-t border-gray-100 bg-white/95 backdrop-blur-sm shadow-sm">
    <div class="container flex items-center justify-between md:justify-center">

      <!-- Desktop menu -->
      <?php
      wp_nav_menu( array(
        'theme_location' => 'menu-1',
        'container'      => false,
        'menu_class'     => 'nav-desktop hidden md:flex items-center gap-x-0.5',
        'fallback_cb'    => false,
        'walker'         => new Pacha_Nav_Walker(),
        'depth'          => 3,
      ) );
      ?>

    </div>
  </nav>

  <!-- ═══════════════════════════════════════════
       MOBILE SIDEBAR
  ═══════════════════════════════════════════ -->

  <!-- Overlay backdrop -->
  <div id="mob-overlay"
       class="mob-overlay fixed inset-0 bg-black/50 z-[90] opacity-0 pointer-events-none transition-opacity duration-300"
       aria-hidden="true"></div>

  <!-- Sidebar panel -->
  <aside id="mob-sidebar"
         class="mob-sidebar fixed top-0 left-0 h-full w-full z-[100] flex flex-col bg-white shadow-2xl translate-x-[-100%] transition-transform duration-300 ease-in-out md:hidden"
         aria-label="Menú de navegación">

    <!-- Sidebar header -->
    <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100 bg-gray-50 flex-shrink-0">
      <?php the_custom_logo(); ?>
      <button id="mob-close-btn"
              style="min-width:44px; min-height:44px; position:relative; z-index:10; background:#fff; border:2px solid #e5e7eb; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#374151; cursor:pointer;"
              aria-label="Cerrar menú">
        <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>

    <!-- Scrollable menu -->
    <div class="flex-1 overflow-y-auto overscroll-contain">
      <?php
      wp_nav_menu( array(
        'theme_location' => 'menu-1',
        'container'      => false,
        'menu_class'     => 'nav-mobile',
        'fallback_cb'    => false,
        'depth'          => 3,
      ) );
      ?>
    </div>

    <!-- Sidebar footer: contact chips -->
    <div class="px-5 py-4 border-t border-gray-100 bg-gray-50 space-y-2">
      <a href="https://wa.me/51984387050"
         class="flex items-center gap-3 px-4 py-2.5 rounded-xl bg-green-50 text-green-700 text-sm font-semibold">
        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
          <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.117.553 4.103 1.522 5.828L.057 23.857a.5.5 0 00.606.597l6.086-1.456A11.944 11.944 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.804 9.804 0 01-5.031-1.387l-.36-.214-3.733.893.942-3.617-.234-.373A9.823 9.823 0 012.182 12C2.182 6.56 6.56 2.182 12 2.182S21.818 6.56 21.818 12 17.44 21.818 12 21.818z"/>
        </svg>
        +51 984 387 050
      </a>
      <a href="mailto:info@pachaexpeditions.com"
         class="flex items-center gap-3 px-4 py-2.5 rounded-xl bg-primary/10 text-primary text-sm font-semibold">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
        </svg>
        info@pachaexpeditions.com
      </a>
    </div>

  </aside>

  <script>
  (function () {
    var openBtn  = document.getElementById('mob-open-btn');
    var closeBtn = document.getElementById('mob-close-btn');
    var sidebar  = document.getElementById('mob-sidebar');
    var overlay  = document.getElementById('mob-overlay');

    function openSidebar() {
      sidebar.classList.remove('translate-x-[-100%]');
      sidebar.classList.add('translate-x-0');
      overlay.classList.remove('opacity-0', 'pointer-events-none');
      overlay.classList.add('opacity-100');
      document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
      sidebar.classList.add('translate-x-[-100%]');
      sidebar.classList.remove('translate-x-0');
      overlay.classList.add('opacity-0', 'pointer-events-none');
      overlay.classList.remove('opacity-100');
      document.body.style.overflow = '';
    }

    if (openBtn)  openBtn.addEventListener('click', openSidebar);
    if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
    if (overlay)  overlay.addEventListener('click', closeSidebar);

    /* Cerrar con ESC */
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeSidebar();
    });

    /* Accordion: click en padre abre/cierra sub-menú */
    if (sidebar) {
      sidebar.querySelectorAll('.nav-mobile .menu-item-has-children > a').forEach(function (link) {
        link.addEventListener('click', function (e) {
          var sub = link.parentElement.querySelector('.sub-menu');
          if (!sub) return;
          e.preventDefault();
          var isOpen = sub.classList.toggle('mob-open');
          link.classList.toggle('mob-active', isOpen);
        });
      });
    }
  })();
  </script>


<?php
/**
 * pachaexp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pachaexp
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pachaexp_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on pachaexp, use a find and replace
		* to change 'pachaexp' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'pachaexp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Gutenberg: bloques wide y full-width en todos los post types
	add_theme_support( 'align-wide' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'pachaexp' ),
			'menu-2' => esc_html__( 'Footer', 'pachaexpeditions' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'pachaexp_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Gutenberg editor styles
	add_theme_support( 'editor-styles' );
	add_editor_style( 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' );
	add_editor_style( 'editor-style.css' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'pachaexp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pachaexp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pachaexp_content_width', 1200 );
}
add_action( 'after_setup_theme', 'pachaexp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pachaexp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'pachaexp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'pachaexp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'pachaexp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pachaexp_scripts() {

// Google Fonts — Poppins
	wp_enqueue_style(
		'pachaexp-fonts',
		'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'pachaexp-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'pachaexp-tailwind', get_template_directory_uri() . '/src/output.css', array(), _S_VERSION );
	wp_enqueue_style( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.css', array(), '5' );

	wp_enqueue_script( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.umd.js', array(), '5', true );
	wp_add_inline_script( 'fancybox', 'document.addEventListener("DOMContentLoaded", function(){ Fancybox.bind("[data-fancybox]", {}); });' );

	// Swiper JS
	wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11' );
	wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11', true );
	wp_add_inline_script( 'swiper', '
		document.addEventListener("DOMContentLoaded", function(){
			new Swiper(".salkantay-swiper", {
				slidesPerView: 1,
				spaceBetween: 24,
				loop: true,
				pagination: { el: ".salkantay-swiper .swiper-pagination", clickable: true },
				navigation: { nextEl: ".salkantay-swiper .swiper-button-next", prevEl: ".salkantay-swiper .swiper-button-prev" },
				breakpoints: {
					768:  { slidesPerView: 2 },
					1024: { slidesPerView: 3 }
				}
			});
			new Swiper(".adventures-swiper", {
				slidesPerView: 1,
				spaceBetween: 24,
				loop: false,
				pagination: { el: ".adventures-swiper .swiper-pagination", clickable: true, dynamicBullets: true },
				navigation: { nextEl: ".adventures-swiper .swiper-button-next", prevEl: ".adventures-swiper .swiper-button-prev" },
				breakpoints: {
					768:  { slidesPerView: 2 },
					1024: { slidesPerView: 3 }
				}
			});
			new Swiper(".marcas-swiper", {
				slidesPerView: 3,
				spaceBetween: 32,
				loop: true,
				autoplay: { delay: 2500, disableOnInteraction: false },
				breakpoints: {
					640:  { slidesPerView: 4 },
					1024: { slidesPerView: 6 }
				}
			});
		});
	' );
}
add_action( 'wp_enqueue_scripts', 'pachaexp_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function register_acf_block_types()
{
	// register block menu tours
	acf_register_block_type(array(
		'name'              => 'menu-tours',
		'title'             => __('Menu Tours PE', 'pachaexpeditions'),
		'description'       => __('A custom menu tours block.', 'pachaexpeditions'),
		'render_template'   => 'template-parts/block/menu-tours.php',
		'category'          => 'formatting',
		'icon'              => 'format-gallery',
		'keywords'          => array('menu tours', 'tour'),
	));


}
// Check if function exists and hook into setup.
if (function_exists('acf_register_block_type')) {
	add_action('acf/init', 'register_acf_block_types');
}



/* Quitar <p> y <br/> de Contact Form 7 */
add_filter('wpcf7_autop_or_not', '__return_false');


add_action('acf/input/admin_footer', 'pachaexp_tour_details_unique_select');
function pachaexp_tour_details_unique_select() {
	?>
	<script>
	(function($){
		function syncDetailIcons() {
			var $selects = $('[data-name="detail_icon"] select');
			if ( ! $selects.length ) return;

			var taken = [];
			$selects.each(function(){
				var v = $(this).val();
				if ( v ) taken.push(v);
			});

			$selects.each(function(){
				var $s   = $(this);
				var mine = $s.val();
				$s.find('option').each(function(){
					var v = $(this).val();
					$(this).prop('disabled', v && v !== mine && taken.indexOf(v) !== -1);
				});
			});
		}

		$(document).on('change', '[data-name="detail_icon"] select', syncDetailIcons);

		/* fila añadida al repeater */
		$(document).on('acf/fields/repeater/append', syncDetailIcons);

		/* fila eliminada — pequeño delay para que el DOM se actualice */
		$(document).on('acf/fields/repeater/remove', function(){
			setTimeout(syncDetailIcons, 100);
		});

		acf.addAction('ready', syncDetailIcons);
	})(jQuery);
	</script>
	<?php
}

/* ================================================
   WALKER NAV MENU — 3 niveles
   Nivel 0: top bar  → <li>
   Nivel 1: dropdown → .nav-dropdown (hover)
   Nivel 2: flyout   → .nav-flyout   (hover, sale a la derecha)
   ================================================ */
class Pacha_Nav_Walker extends Walker_Nav_Menu {

    private $svg_down  = '<svg class="nav-arrow-down w-3 h-3 mt-0.5 opacity-55 flex-shrink-0 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>';
    private $svg_right = '<svg class="w-3 h-3 opacity-50 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>';

    /* Abre el contenedor de sub-items */
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( $depth === 0 ) {
            // Nivel 2: panel dropdown bajo el item de nivel 1
            $output .= '<div class="nav-dropdown hidden absolute top-full left-0 min-w-[230px] bg-white shadow-xl border-t-[3px] border-primary rounded-b-lg z-50 py-1.5">';
        } elseif ( $depth === 1 ) {
            // Nivel 3: flyout a la derecha del item de nivel 2
            $output .= '<div class="nav-flyout hidden absolute top-0 left-full min-w-[210px] bg-white shadow-xl border-l-[3px] border-primary/70 rounded-r-lg z-50 py-1.5">';
        }
    }

    /* Cierra el contenedor de sub-items */
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</div>';
    }

    /* Abre cada item */
    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item         = $data_object;
        $has_children = in_array( 'menu-item-has-children', (array) $item->classes );
        $url          = esc_url( $item->url );
        $title        = esc_html( $item->title );

        if ( $depth === 0 ) {
            /* ── Nivel 1 (top bar) ── */
            $li_class = 'relative' . ( $has_children ? ' nav-has-dd' : '' );
            $output .= '<li class="' . $li_class . '">';

            if ( $has_children ) {
                $output .= '<a href="' . $url . '" class="nav-link flex items-center gap-1.5 px-4 py-3.5 text-[15px] font-semibold text-gray-800 hover:text-primary transition-colors duration-200 capitalize tracking-wide">'
                         . $title . $this->svg_down
                         . '</a>';
            } else {
                $output .= '<a href="' . $url . '" class="nav-link block px-4 py-3.5 text-[15px] font-semibold text-gray-800 hover:text-primary transition-colors duration-200 capitalize tracking-wide">'
                         . $title
                         . '</a>';
            }

        } elseif ( $depth === 1 ) {
            /* ── Nivel 2 (dentro del dropdown) ── */
            $div_class = 'relative' . ( $has_children ? ' nav-has-fly' : '' );
            $output .= '<div class="' . $div_class . '">';

            if ( $has_children ) {
                $output .= '<a href="' . $url . '" class="flex items-center justify-between gap-2 px-4 py-2.5 text-[13px] text-gray-700 hover:bg-primary/5 hover:text-primary transition-all duration-150">'
                         . '<span class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary flex-shrink-0"></span>' . $title . '</span>'
                         . $this->svg_right
                         . '</a>';
            } else {
                $output .= '<a href="' . $url . '" class="flex items-center gap-2 px-4 py-2.5 text-[13px] text-gray-700 hover:bg-primary/5 hover:text-primary hover:pl-5 transition-all duration-150">'
                         . '<span class="w-1.5 h-1.5 rounded-full bg-primary flex-shrink-0"></span>'
                         . $title
                         . '</a>';
            }

        } elseif ( $depth === 2 ) {
            /* ── Nivel 3 (flyout) ── */
            $output .= '<div>';
            $output .= '<a href="' . $url . '" class="flex items-center gap-2 px-4 py-2.5 text-[12px] text-gray-600 hover:bg-primary/5 hover:text-primary hover:pl-5 transition-all duration-150">'
                     . '<span class="w-1 h-1 rounded-full bg-primary/60 flex-shrink-0"></span>'
                     . $title
                     . '</a>';
        }
    }

    /* Cierra cada item */
    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
        if ( $depth === 0 ) {
            $output .= '</li>';
        } else {
            $output .= '</div>';
        }
    }
}


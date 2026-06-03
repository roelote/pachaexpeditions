<?php
/**
 * Footer
 * @package pachaexp
 */
?>


<!-- marcas -->
<section class="py-10 bg-gray-50 border-y border-gray-100">
  <div class="container px-4 xl:px-0">
    <div class="swiper marcas-swiper">
      <div class="swiper-wrapper items-center">

        <?php
        $marcas = [
          [ 'file' => 'aatc.jpeg',              'alt' => 'AATC' ],
          [ 'file' => 'agencia-registrada.jpeg', 'alt' => 'Agencia Registrada' ],
          [ 'file' => 'asta.jpeg',               'alt' => 'ASTA' ],
          [ 'file' => 'caltur.jpeg',             'alt' => 'Caltur' ],
          [ 'file' => 'gercetur.jpeg',           'alt' => 'Gercetur' ],
          [ 'file' => 'peru.jpeg',               'alt' => 'Peru' ],
          [ 'file' => 'promperu.jpeg',           'alt' => 'PromPerú' ],
          [ 'file' => 'sernap.jpeg',             'alt' => 'Sernanp' ],
        ];
        foreach ( $marcas as $marca ) : ?>
        <div class="swiper-slide flex items-center justify-center">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/img/marcas/' . $marca['file'] ); ?>"
               alt="<?php echo esc_attr( $marca['alt'] ); ?>"
               class="h-14 w-auto object-contain mx-auto grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
        </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</section>


<div class="h-36 bg-contain bg-center fondo-footer opacity-80"></div>

<footer style="background:#1c2130; color:#9ca3af;">

    <!-- Imagen de paisaje decorativa -->

    <!-- Cuerpo principal del footer -->
    <div class="container px-5 xl:px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-10">

            <!-- Col 1: Logo + about -->
            <div class="xl:col-span-1">
                <?php the_custom_logo(); ?>
                <p class="mt-4 text-sm text-gray-400 leading-relaxed">
                    Local tour operator based in Cusco, Peru. Licensed by the Ministry of Tourism. Specialists in Inca Trail, Salkantay, Machu Picchu &amp; alternative treks.
                </p>
              
            </div>

            <!-- Col 2: Contact -->
            <div>
                <h4 class="footer-heading">Contact Us</h4>
                <ul class="space-y-3 mt-4">
                    <li class="footer-item">
                        <svg class="footer-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Urb. Vista Alegre H-3, San Sebastián, Cusco</span>
                    </li>
                    <li class="footer-item">
                        <svg class="footer-icon" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.117.553 4.103 1.522 5.828L.057 23.857a.5.5 0 00.606.597l6.086-1.456A11.944 11.944 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.804 9.804 0 01-5.031-1.387l-.36-.214-3.733.893.942-3.617-.234-.373A9.823 9.823 0 012.182 12C2.182 6.56 6.56 2.182 12 2.182S21.818 6.56 21.818 12 17.44 21.818 12 21.818z"/></svg>
                        <a href="https://wa.me/51984387050" class="hover:text-primary transition-colors">+51 984 387 050 (24h)</a>
                    </li>
                    <li class="footer-item">
                        <svg class="footer-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <a href="tel:+51984739250" class="hover:text-primary transition-colors">+51 984 739 250</a>
                    </li>
                    <li class="footer-item">
                        <svg class="footer-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <a href="mailto:info@pachaexpeditions.com" class="hover:text-primary transition-colors">info@pachaexpeditions.com</a>
                    </li>
                    <li class="footer-item text-gray-500 text-xs">
                        <svg class="footer-icon opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/></svg>
                        Argentina: Ricardo Birn +54 935 1681 6262
                    </li>
                </ul>
            </div>

            <!-- Col 3: Useful links (wp_nav_menu) -->
            <div>
                <h4 class="footer-heading">Useful Information</h4>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-2',
                    'container'      => false,
                    'menu_class'     => 'footer-nav mt-4',
                    'fallback_cb'    => false,
                ) );
                ?>
            </div>

            <!-- Col 4: Payments -->
            <div>
                <h4 class="footer-heading">Our Responsibility</h4>
                <div class="mt-4 space-y-4">
                  
                    <div>

                      <!-- Protégeme badge -->
                <a target="_blank"
                   href="https://www.pachaexpeditions.com/wp-content/uploads/2025/03/protegeme.pdf"
                   class="inline-block mt-5">
                    <img src="https://www.pachaexpeditions.com/wp-content/uploads/2025/03/protegeme-final-e1743178374306.png"
                         alt="Protégeme"
                         class="h-14 w-auto opacity-90 hover:opacity-100 transition-opacity">
                </a>

                        <a target="_blank" href="#">
                            <img src="https://www.pachaexpeditions.com/wp-content/uploads/2025/04/logo.png"
                                 alt="Pacha Expeditions" class="h-14 w-auto opacity-90 hover:opacity-100 transition-opacity">
                        </a>
                    </div>
                    <!-- TripAdvisor chip -->
                    <a href="#"
                       class="inline-flex items-center gap-2 bg-[#34E0A1] hover:bg-[#28c98a] text-white text-xs font-bold px-4 py-2 rounded-full transition-colors shadow-sm mt-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zm0 2c4.97 0 9 4.03 9 9s-4.03 9-9 9-9-4.03-9-9 4.03-9 9-9zm-3.5 6a3.5 3.5 0 100 7 3.5 3.5 0 000-7zm7 0a3.5 3.5 0 100 7 3.5 3.5 0 000-7zm-7 1.5a2 2 0 110 4 2 2 0 010-4zm7 0a2 2 0 110 4 2 2 0 010-4zm-7 .75a1.25 1.25 0 100 2.5 1.25 1.25 0 000-2.5zm7 0a1.25 1.25 0 100 2.5 1.25 1.25 0 000-2.5z"/></svg>
                        Review us on TripAdvisor
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Línea divisora -->
    <div class="border-t border-white/10"></div>

    <!-- Bottom bar: legal -->
    <div style="background:rgba(19,23,34,0.85); padding:24px 16px;">
        <div class="container space-y-2 text-center text-xs text-gray-500">
            <p class="text-gray-300 font-semibold text-sm">Legal Information</p>
            <p>
                <strong class="text-gray-400">Business name:</strong> AGENCIA DE VIAJES Y TURISMO PACHA EXPEDITIONS E.I.R.L. &nbsp;|&nbsp;
                <strong class="text-gray-400">RUC:</strong> 20527884714
            </p>
            <p>© <?php echo date('Y'); ?> PACHA EXPEDITIONS. All Rights Reserved.
                &nbsp;·&nbsp; <a href="#" class="hover:text-primary transition-colors">Company Policy</a>
                &nbsp;·&nbsp; <a href="#" class="hover:text-primary transition-colors">Terms &amp; Conditions</a>
            </p>
            <p class="max-w-3xl mx-auto text-gray-600 leading-relaxed">
                PACHA EXPEDITIONS, tour operators licensed by the Ministry of Tourism. 100% local team — experienced guides, cooks &amp; porters — creating jobs and giving back to the Cusco community.
            </p>
        </div>
    </div>

</footer>

<!-- Estilos del footer -->
<style>
.footer-heading {
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .1em;
    color: #fff;
    padding-left: 10px;
    border-left: 3px solid #9db247;
}
.footer-item {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    font-size: 13px;
    color: #9ca3af;
    line-height: 1.5;
}
.footer-icon {
    width: 15px;
    height: 15px;
    flex-shrink: 0;
    margin-top: 2px;
    color: #9db247;
}
.footer-nav {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 2px;
}
.footer-nav li a {
    display: flex;
    align-items: center;
    gap: 7px;
    padding: 5px 0;
    font-size: 13px;
    color: #9ca3af;
    text-decoration: none;
    transition: color .2s, padding-left .2s;
}
.footer-nav li a::before {
    content: '';
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: #9db247;
    flex-shrink: 0;
    opacity: .7;
}
.footer-nav li a:hover {
    color: #9db247;
    padding-left: 4px;
}
/* Logo en el footer */
footer .custom-logo { width: 160px; filter: brightness(0) invert(1); opacity: .85; }
</style>

<!-- WhatsApp flotante -->
<a href="https://wa.me/51984387050" target="_blank" rel="noopener noreferrer" id="whatsapp-float" aria-label="Chat on WhatsApp">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
    </svg>
</a>
<style>
#whatsapp-float {
    position: fixed;
    bottom: 24px;
    left: 24px;
    z-index: 9999;
    width: 56px;
    height: 56px;
    background: #25d366;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 16px rgba(0,0,0,.25);
    transition: transform .2s, box-shadow .2s;
}
#whatsapp-float:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(0,0,0,.35);
}
#whatsapp-float svg {
    width: 30px;
    height: 30px;
}
</style>

<?php wp_footer(); ?>

</body>
</html>

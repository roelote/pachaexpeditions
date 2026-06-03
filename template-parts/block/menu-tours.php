<div id="tour-nav" class="rounded">
    <nav class="tour-nav-inner">

     <a href="#overview" class="tour-nav-link">
            <span class="tour-nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                </svg>
            </span>
            <span class="tour-nav-label">Overview</span>
        </a>

        <a href="#itinerary" class="tour-nav-link">
            <span class="tour-nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                </svg>
            </span>
            <span class="tour-nav-label">Itinerary</span>
        </a>

        <a href="#includes" class="tour-nav-link">
            <span class="tour-nav-icon">
                 <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/>
                </svg>

               
            </span>
            <span class="tour-nav-label">Includes</span>
        </a>

        <a href="#price" class="tour-nav-link">
            <span class="tour-nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </span>
            <span class="tour-nav-label">Price</span>
        </a>

        <a href="#map" class="tour-nav-link">
            <span class="tour-nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </span>
            <span class="tour-nav-label">Map</span>
        </a>

        <a href="#faqs" class="tour-nav-link">
            <span class="tour-nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </span>
            <span class="tour-nav-label">FAQs</span>
        </a>

    </nav>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var siteNav = document.querySelector('header + nav') || document.querySelector('nav.border-t');
    var tourNav = document.getElementById('tour-nav');

    // Solo se necesita calcular el offset una vez (load + resize)
    // En móvil el nav principal no tiene items visibles → top:0 es correcto (CSS)
    // En desktop sticky debajo del nav principal
    function applyNavOffset() {
        if (!tourNav) return;
        var navH = (window.innerWidth >= 768 && siteNav) ? siteNav.offsetHeight : 0;
        tourNav.style.top = navH + 'px';
        document.documentElement.style.setProperty('--header-h', navH + 'px');
    }

    window.addEventListener('load', applyNavOffset);
    window.addEventListener('resize', applyNavOffset);

    // ── Active link tracking ──
    var links   = document.querySelectorAll('#tour-nav .tour-nav-link');
    var container = document.querySelector('#tour-nav .tour-nav-inner');
    if (!links.length) return;

    var targets = [];
    links.forEach(function (link) {
        var el = document.getElementById(link.getAttribute('href').replace('#', ''));
        if (el) targets.push(el);
    });
    if (!targets.length) return;

    function scrollNavToActive(activeLink) {
        if (!container || !activeLink) return;
        var scrollTo = activeLink.offsetLeft - (container.offsetWidth / 2) + (activeLink.offsetWidth / 2);
        container.scrollTo({ left: scrollTo, behavior: 'smooth' });
    }

    function setActive(id) {
        var activeLink = null;
        links.forEach(function (l) {
            var match = l.getAttribute('href').replace('#', '') === id;
            l.classList.toggle('is-active', match);
            if (match) activeLink = l;
        });
        scrollNavToActive(activeLink);
    }

    function totalOffset() {
        var siteNavH = (siteNav) ? siteNav.offsetHeight : 0;
        var tourNavH = tourNav ? tourNav.offsetHeight : 52;
        return siteNavH + tourNavH;
    }

    function updateActive() {
        var offset = totalOffset();
        var activeId = targets[0].getAttribute('id');
        targets.forEach(function (el) {
            if (el.getBoundingClientRect().top <= offset + 16) activeId = el.getAttribute('id');
        });
        setActive(activeId);
    }

    setActive(targets[0].getAttribute('id'));
    window.addEventListener('scroll', updateActive, { passive: true });

    // Click con scroll suave
    links.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            var target = document.getElementById(this.getAttribute('href').replace('#', ''));
            if (!target) return;
            window.scrollTo({ top: target.getBoundingClientRect().top + window.pageYOffset - totalOffset() - 8, behavior: 'smooth' });
            setActive(this.getAttribute('href').replace('#', ''));
        });
    });
});
</script>

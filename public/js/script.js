document.addEventListener('DOMContentLoaded', () => {
    // Indikator loading: muncul saat pindah halaman supaya pengunjung tahu halamannya sedang dimuat.
    const pageLoader = document.getElementById('page-loader');
    if (pageLoader) {
        document.addEventListener('click', (event) => {
            const link = event.target.closest('a[href]');
            if (!link || event.defaultPrevented || event.button !== 0) return;
            if (event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;
            if (link.target === '_blank' || link.hasAttribute('download')) return;

            const url = new URL(link.href, window.location.href);
            const samePage = url.pathname === window.location.pathname && url.search === window.location.search;
            if (url.origin !== window.location.origin || samePage) return;

            pageLoader.classList.add('active');
            document.body.classList.add('is-loading');
        });

        // Tombol Back/Forward membawa halaman dari cache browser: pastikan bar tidak tersangkut.
        window.addEventListener('pageshow', () => {
            pageLoader.classList.remove('active');
            document.body.classList.remove('is-loading');
        });
    }

    const toggle = document.getElementById('menuToggle');
    const menu = document.getElementById('sidebarMenu');

    if (toggle && menu) {
        toggle.addEventListener('click', () => {
            const isOpen = menu.classList.toggle('open');
            toggle.setAttribute('aria-expanded', String(isOpen));
        });
    }

    initTypewriter();
    initScrollButtons();
});

function initScrollButtons() {
    document.querySelectorAll('.scroll-row').forEach((scrollRow) => {
        const track = scrollRow.querySelector('[data-scroll-row]');
        const leftBtn = scrollRow.querySelector('[data-scroll-dir="left"]');
        const rightBtn = scrollRow.querySelector('[data-scroll-dir="right"]');
        if (!track) return;

        const scrollAmount = parseFloat(scrollRow.dataset.scrollAmount || '0.8');

        const updateButtons = () => {
            const maxScroll = track.scrollWidth - track.clientWidth;
            if (leftBtn) leftBtn.hidden = track.scrollLeft <= 1;
            if (rightBtn) rightBtn.hidden = track.scrollLeft >= maxScroll - 1;
        };

        leftBtn?.addEventListener('click', () => {
            track.scrollBy({ left: -track.clientWidth * scrollAmount, behavior: 'smooth' });
        });

        rightBtn?.addEventListener('click', () => {
            track.scrollBy({ left: track.clientWidth * scrollAmount, behavior: 'smooth' });
        });

        track.addEventListener('scroll', updateButtons);
        window.addEventListener('resize', updateButtons);
        updateButtons();
    });
}

function initTypewriter() {
    const el = document.getElementById('typewriter');
    if (!el) return;

    const roles = (el.dataset.roles || '').split('|').map((r) => r.trim()).filter(Boolean);
    if (!roles.length) return;

    const typeSpeed = 90;
    const deleteSpeed = 45;
    const holdTime = 1400;

    let roleIndex = 0;
    let charIndex = 0;
    let deleting = false;

    function tick() {
        const currentRole = roles[roleIndex];

        if (deleting) {
            charIndex--;
            el.textContent = currentRole.slice(0, charIndex);

            if (charIndex === 0) {
                deleting = false;
                roleIndex = (roleIndex + 1) % roles.length;
            }
        } else {
            charIndex++;
            el.textContent = currentRole.slice(0, charIndex);

            if (charIndex === currentRole.length) {
                deleting = true;
                setTimeout(tick, holdTime);
                return;
            }
        }

        setTimeout(tick, deleting ? deleteSpeed : typeSpeed);
    }

    tick();
}

import './hero-3d.js';

/* ==========================================================================
   SCROLL REVEAL
   Elements with class="reveal" fade/slide in once they enter the viewport.
   Lightweight -- uses the native IntersectionObserver, no extra library.
   ========================================================================== */
document.addEventListener('DOMContentLoaded', () => {
  const revealEls = document.querySelectorAll('.reveal');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target); // animate once, then stop watching
      }
    });
  }, { threshold: 0.15 });

  revealEls.forEach((el) => observer.observe(el));

  /* ========================================================================
     NAVBAR: shrink padding + highlight active section on scroll
     ======================================================================== */
  const navbar = document.querySelector('.site-navbar');
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.site-navbar .nav-link');

  window.addEventListener('scroll', () => {
    if (navbar) {
      navbar.classList.toggle('py-2', window.scrollY > 40);
      navbar.classList.toggle('py-3', window.scrollY <= 40);
    }

    let current = '';
    sections.forEach((section) => {
      const top = section.offsetTop - 120;
      if (window.scrollY >= top) current = section.getAttribute('id');
    });

    navLinks.forEach((link) => {
      link.classList.toggle('active', link.getAttribute('href') === `#${current}`);
    });
  });

  /* ========================================================================
     MOBILE MENU: close automatically after a link is tapped
     ======================================================================== */
  const mobileMenu = document.getElementById('mainNav');
  document.querySelectorAll('#mainNav .nav-link').forEach((link) => {
    link.addEventListener('click', () => {
      if (mobileMenu.classList.contains('show')) {
        bootstrap.Collapse.getOrCreateInstance(mobileMenu).hide();
      }
    });
  });

  /* ========================================================================
     SUBTLE 3D TILT on glass cards (mouse-follow effect)
     Small rotation only -- stays elegant, not game-y.
     ======================================================================== */
  document.querySelectorAll('.glass-card').forEach((card) => {
    card.addEventListener('mousemove', (e) => {
      const rect = card.getBoundingClientRect();
      const x = (e.clientX - rect.left) / rect.width - 0.5;
      const y = (e.clientY - rect.top) / rect.height - 0.5;
      card.style.setProperty('--rx', `${x * 4}deg`);
      card.style.setProperty('--ry', `${y * -4}deg`);
      card.classList.add('tilt-3d');
    });

    card.addEventListener('mouseleave', () => {
      card.style.setProperty('--rx', '0deg');
      card.style.setProperty('--ry', '0deg');
    });
  });
});

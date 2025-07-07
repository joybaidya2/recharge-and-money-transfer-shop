  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  const navLinks = document.getElementById('nav-links');

  if (navLinks && mobileMenu) {
    mobileMenu.innerHTML = navLinks.innerHTML;
  }

  menuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
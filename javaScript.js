  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  const navLinks = document.getElementById('nav-links');

  if (navLinks && mobileMenu) {
    mobileMenu.innerHTML = navLinks.innerHTML;
  }

  menuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });

  function initialiseConfirmOnDelete() {
  document.querySelectorAll("a.confirm-delete-btn").forEach((element) => {
    element.addEventListener("click", (e) => {
      const hasConfirmed = window.confirm("Do you want to delete?");
      if (hasConfirmed) {
        return true;
      }
      e.preventDefault();
      return false;
    });
  });
}

initialiseConfirmOnDelete();
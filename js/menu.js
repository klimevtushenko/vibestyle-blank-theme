const menuRefs = {
  menuBtn: document.querySelector('[data-burger-btn]'),
  menu: document.querySelector('[data-mobile-menu]'),
};

const toggleMobileMenu = () => {
  if (window.innerWidth >= 1280) {
    //to do: десь тут треба дописати напевно закриття меню при ресайзі
    return;
  }

  if (!menuRefs.menu.classList.contains('menu-open')) {
    openMenu();
  } else {
    closeMenu();
  }
};

const openMenu = () => {
  menuRefs.menuBtn.classList.add('burger-active');
  menuRefs.menu.classList.add('menu-open');
  toggleScrolling();
};

const closeMenu = () => {
  menuRefs.menuBtn.classList.remove('burger-active');
  toggleScrolling();
  menuRefs.menu.classList.remove('menu-open');
};

const toggleScrolling = () => {
  document.body.classList.toggle('is-menu-open');
};

menuRefs.menuBtn.addEventListener('click', toggleMobileMenu);

menuRefs.menu.addEventListener('click', (e) => {
  if (!e.target.matches('a')) return;
  toggleMobileMenu();
});

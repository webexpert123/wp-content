// sidebar menu toggle function
let hamburIcon = document.getElementById('hamburIcon');
let asideMenu = document.getElementById("asideMenu");
let menuClicked = false;

hamburIcon.addEventListener("click", () => {
    menuClicked = !menuClicked;
    asideMenu.style.display = menuClicked ? "flex" : "none";
});
document.addEventListener("click", (event) => {
    if (!hamburIcon.contains(event.target) && !asideMenu.contains(event.target)) {
        asideMenu.style.display = "none";
        menuClicked = false;
    }
});
/**
   * Apply .scrolled class to the body as the page is scrolled down
   */
function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('.header-main');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);



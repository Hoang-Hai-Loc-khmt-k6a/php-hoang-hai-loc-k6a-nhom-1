let lastScrollTop = 0;
const header = document.getElementById("header");

window.addEventListener("scroll", function () {
    let scrollTop = window.scrollY;
    if (scrollTop > lastScrollTop) {
        // Cuộn xuống
        header.classList.remove("show");
        header.classList.add("hide");
    } else {
        // Cuộn lên
        header.classList.remove("hide");
        header.classList.add("show");
    }
    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
}, false);

function showMenu(menuElement) {
    clearTimeout(menuElement.timer); // Clear previous timer (if any)
    menuElement.style.display = 'block'; // Display menu immediately
    menuElement.style.opacity = '1'; // Set opacity to 1 immediately
}

function hideMenu(menuElement) {
    menuElement.timer = setTimeout(() => {
        menuElement.style.opacity = '0'; // Fade out menu
        setTimeout(() => {
            menuElement.style.display = 'none'; // Hide menu after fade out
        }, 500); // Wait 500ms for fade out transition
    }, 500); // Wait 500ms before starting fade out
}

const submenus = document.querySelectorAll('.submenu');
const subSubmenus = document.querySelectorAll('.sub-submenu');

submenus.forEach(submenu => {
    submenu.parentNode.addEventListener('mouseover', () => showMenu(submenu));
    submenu.parentNode.addEventListener('mouseout', () => hideMenu(submenu));
    submenu.addEventListener('mouseover', () => clearTimeout(submenu.timer));
});

subSubmenus.forEach(subsubmenu => {
    subsubmenu.parentNode.addEventListener('mouseover', () => showMenu(subsubmenu));
    subsubmenu.parentNode.addEventListener('mouseout', () => hideMenu(subsubmenu));
    subsubmenu.addEventListener('mouseover', () => clearTimeout(subsubmenu.timer));
});

let currentBannerIndex = 0;
const banners = document.querySelectorAll('.banner');

function showBanner(index) {
    banners.forEach((banner, i) => {
        banner.style.opacity = (i === index) ? '1' : '0';
    });
}

function nextBanner() {
    currentBannerIndex = (currentBannerIndex + 1) % banners.length;
    showBanner(currentBannerIndex);
}

setInterval(nextBanner, 5000);

document.addEventListener('DOMContentLoaded', () => {
    showBanner(currentBannerIndex);
});
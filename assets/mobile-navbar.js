// --------- Mobile Navbar Class ---------
class MobileNavbar {
    constructor(mobileMenu, navList, navLinks) {
        this.mobileMenu = document.querySelector(mobileMenu);
        this.navList = document.querySelector(navList);
        this.navLinks = document.querySelectorAll(navLinks);
        this.activeClass = "active";
        this.handleClick = this.handleClick.bind(this);
    }

    animateLinks() {
        this.navLinks.forEach((link, index) => {
            link.style.animation
                ? (link.style.animation = "")
                : (link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`);
        });
    }

    handleClick() {
        this.navList.classList.toggle(this.activeClass);
        this.mobileMenu.classList.toggle(this.activeClass);
        this.animateLinks();
    }

    addClickEvent() {
        this.mobileMenu.addEventListener("click", this.handleClick);
    }

    init() {
        if (this.mobileMenu) {
            this.addClickEvent();
        }
        return this;
    }
}

const mobileNavbar = new MobileNavbar(
    ".mobile-menu",
    ".nav-list",
    ".nav-list li",
);

mobileNavbar.init();

// --------- Calendar and Form Functions ---------
function openCalendar(service) {
    document.getElementById('serviceType').textContent = service;
    document.getElementById('serviceTypeInput').value = service;
    document.getElementById('calendar').style.display = 'block';
}

function openForm() {
    const selectedDate = document.getElementById('dateInput').value;
    if (selectedDate) {
        document.getElementById('selectedDate').value = selectedDate;
        document.getElementById('reservationForm').style.display = 'block';
    }
}

function closeForm() {
    document.getElementById('reservationForm').style.display = 'none';
}

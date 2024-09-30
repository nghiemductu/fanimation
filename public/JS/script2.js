// Sign-In Modal Script

document.addEventListener('DOMContentLoaded', function () {
    const isLoggedIn = false; // Simulate login status
    const headerLinks = document.querySelectorAll('.header-icons a, .header-mobile a');

    headerLinks.forEach(element => {
        element.addEventListener('click', function (event) {
            const isModalAction = element.hasAttribute('data-bs-dismiss');
            if (!isLoggedIn && !isModalAction) {
                event.preventDefault();
                const signInModal = new bootstrap.Modal(document.getElementById('signInModal'), {
                    backdrop: 'static',
                    keyboard: true
                });
                signInModal.show();
            }
        });
    });
});

// Notification-bar text change
document.addEventListener("DOMContentLoaded", function() {
    const notificationText = document.getElementById("notification-text");
    const messages = ["FREE SHIPPING FOR ADICLUB MEMBERS AND ALL ORDERS IN APP","EASY RETURN"];
    let index = 0;

    setInterval(function() {
        index = (index + 1) % messages.length;
        notificationText.textContent = messages[index];
    }, 2000);
});

// Scroll change
let lastScrollTop = 0;
const notificationBar = document.querySelector('.notification-bar');
const header = document.querySelector('.header');
const mobileHeader = document.querySelector('.header-mobile');

window.addEventListener('scroll', function () {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
        notificationBar.style.top = '-45px';
        header.style.top = '-5rem';
        mobileHeader.style.top = '-3.5rem';
    } else {
        notificationBar.style.top = '0';
        header.style.top = '2.5rem';
        mobileHeader.style.top = '2.8rem';
    }

    lastScrollTop = scrollTop;
});

// Video pause button
const video = document.getElementById('video');
const toggleButton = document.getElementById('toggleButton');
const icon = toggleButton.querySelector('i');

toggleButton.addEventListener('click', () => {
    if (video.paused) {
        video.play();
        icon.classList.remove('fa-play');
        icon.classList.add('fa-pause');
    } else {
        video.pause();
        icon.classList.remove('fa-pause');
        icon.classList.add('fa-play');
    }
});

// Video 2 pause button
const video2 = document.getElementById('video-2');
const toggleButton2 = document.getElementById('toggleButton2');
const icon2 = toggleButton2.querySelector('.video2-icon');

toggleButton2.addEventListener('click', () => {
    if (video2.paused) {
        video2.play();
        icon2.classList.remove('fa-play');
        icon2.classList.add('fa-pause');
    } else {
        video2.pause();
        icon2.classList.remove('fa-pause');
        icon2.classList.add('fa-play');
    }
});

// Image heart toggle
document.addEventListener('DOMContentLoaded', function() {
    const heartIcons = document.querySelectorAll('.image-icon i');

    heartIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            this.classList.toggle('fa-regular');
            this.classList.toggle('fa-solid');
        });
    });
});

// Slider tab-container
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tab-container button');
    const slideSets = document.querySelectorAll('.slider-wrapper .image-list');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');

            slideSets.forEach(slideSet => {
                slideSet.style.display = 'none';
            });

            const target = tab.getAttribute('data-target');
            document.querySelector(`.slider-wrapper .${target}`).style.display = 'flex';
        });
    });
});

// Preloader
var loader = document.getElementById("preloader");

window.addEventListener("load", function() {
    loader.style.display = "none";
});

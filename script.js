"use strict";

const header = document.querySelector('header');
const menu = document.querySelector("#menu-btn");
const userBtn = document.querySelector("#user-btn");
const leftArrow = document.querySelector('.left-arrow .bxs-left-arrow');
const rightArrow = document.querySelector('.right-arrow .bxs-right-arrow');
const slider = document.querySelector('.slider');

function fixedNavbar() {
    header.classList.toggle('scroll', window.scrollY > 0);
}

function scrollRight() {
    if (slider.scrollWidth - slider.clientWidth === slider.scrollLeft) {
        slider.scrollTo({
            left: 0,
            behavior: "smooth"
        });
    } else {
        slider.scrollBy({
            left: window.innerWidth,
            behavior: "smooth"
        });
    }
}

function scrollLeft() {
    slider.scrollBy({
        left: -window.innerWidth,
        behavior: "smooth"
    });
}

function resetTimer() {
    clearInterval(timerId);
    timerId = setInterval(scrollRight, 7000);
}

fixedNavbar();
window.addEventListener('scroll', fixedNavbar);
menu.addEventListener('click', function () {
    document.querySelector(".navbar").classList.toggle('active');
});

userBtn.addEventListener('click', function () {
    document.querySelector(".user-box").classList.toggle('active');
});

let timerId = setInterval(scrollRight, 7000);

slider.addEventListener('click', function (e) {
    if (e.target === leftArrow) {
        scrollLeft();
        resetTimer();
    } else if (e.target === rightArrow) {
        scrollRight();
        resetTimer();
    }
});

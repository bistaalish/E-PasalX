// Add this to your JavaScript file

import Swiper from 'swiper/bundle';

document.addEventListener('DOMContentLoaded', function() {
    // Initialize Swiper for each product card
    const productCards = document.querySelectorAll('.product-card');
    productCards.forEach(card => {
        const swiper = new Swiper(card.querySelector('.swiper-container'), {
            loop:true,
            navigation: {
                nextEl: card.querySelector('.swiper-button-next'),
                prevEl: card.querySelector('.swiper-button-prev'),
            },
        });
    });
});

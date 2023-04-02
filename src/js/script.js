'use strict';

const slider = tns({
    container: '.carousel__inner',
    controls: false,
    autoplay: false,
    navPosition: 'bottom',
    responsive: {
        768: {
            nav: false
        }
    }
});

document.querySelector('.prev')
        .addEventListener('click', () => slider.goTo('prev'));
document.querySelector('.next')
        .addEventListener('click', () => slider.goTo('next'));
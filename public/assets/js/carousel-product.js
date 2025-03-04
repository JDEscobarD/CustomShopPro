const thumbnails = document.querySelectorAll('.thumbnail-carousel .thumbnail');
const carousel = document.querySelector('#carouselProduct');

function updateActiveThumbnail(index) {
    thumbnails.forEach((thumbnail, i) => {
        if (i === index) {
            thumbnail.classList.add('active');
        } else {
            thumbnail.classList.remove('active');
        }
    });
}

thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener('click', () => {
        const carouselInstance = bootstrap.Carousel.getInstance(carousel);
        carouselInstance.to(index);
    });
});

carousel.addEventListener('slid.bs.carousel', (event) => {
    const activeIndex = event.to;
    updateActiveThumbnail(activeIndex);
});

updateActiveThumbnail(0);
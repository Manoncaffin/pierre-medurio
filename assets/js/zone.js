const leftZone = document.querySelector('.left-zone');
const rightZone = document.querySelector('.right-zone');
const prevArrow = document.querySelector('.custom-prev');
const nextArrow = document.querySelector('.custom-next');

leftZone.addEventListener('mouseenter', () => {
  prevArrow.style.opacity = '1';
});
leftZone.addEventListener('mouseleave', () => {
  prevArrow.style.opacity = '0';
});

rightZone.addEventListener('mouseenter', () => {
  nextArrow.style.opacity = '1';
});
rightZone.addEventListener('mouseleave', () => {
  nextArrow.style.opacity = '0';
});

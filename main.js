const hamburger = document.getElementById('hamburger');
const mainNav = document.getElementById('mainNav');

hamburger.addEventListener('click', () => {
    console.log("hell")
  mainNav.classList.toggle('active');
});
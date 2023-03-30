var header      = document.querySelector("header");
window.onscroll = function() {myFunction()};

function myFunction() {
  if (document.body.scrollTop > 70 || document.documentElement.scrollTop > 70) 
  { header.classList.add('show'); } else { header.classList.remove('show'); }
}
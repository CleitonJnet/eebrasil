AOS.init();

var prevScrollpos = window.pageYOffset;
var header = document.querySelector("header")
var menu = document.querySelector("header nav ul")

window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    header.classList.add('show');
    header.classList.remove('hide');
  } else {
    header.classList.remove('show');
    header.classList.add('hide');
    menu.classList.remove('show-menu');
  }
  prevScrollpos = currentScrollPos;
}

function show_menu() {
  menu.classList.toggle('show-menu');
}

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

// =======================================

let time = 10000,
  currentImageIndexGMain = 0,
  currentImageIndexGAux1 = 0,
  currentImageIndexGAux2 = 0,
  currentImageIndexGAux3 = 0,
  currentImageIndexGAux4 = 0,
  galleryMain = document.querySelectorAll(".galleryMain img"),
  galleryAux1 = document.querySelectorAll(".galleryAux1 img"),
  galleryAux2 = document.querySelectorAll(".galleryAux2 img"),
  galleryAux3 = document.querySelectorAll(".galleryAux3 img"),
  galleryAux4 = document.querySelectorAll(".galleryAux4 img"),
  maxGalleryMain = galleryMain.length,
  maxGalleryAux1 = galleryAux1.length,
  maxGalleryAux2 = galleryAux2.length,
  maxGalleryAux3 = galleryAux3.length,
  maxGalleryAux4 = galleryAux4.length;

function nextImageGMain() {
  galleryMain[currentImageIndexGMain].classList.remove("selected")
  galleryAux1[currentImageIndexGAux1].classList.remove("selected")
  galleryAux2[currentImageIndexGAux2].classList.remove("selected")
  galleryAux3[currentImageIndexGAux3].classList.remove("selected")
  galleryAux4[currentImageIndexGAux4].classList.remove("selected")

  currentImageIndexGMain++
  currentImageIndexGAux1++
  currentImageIndexGAux2++
  currentImageIndexGAux3++
  currentImageIndexGAux4++


  if (currentImageIndexGMain >= maxGalleryMain)
    currentImageIndexGMain = 0

  if (currentImageIndexGAux1 >= maxGalleryAux1)
    currentImageIndexGAux1 = 0

  if (currentImageIndexGAux2 >= maxGalleryAux2)
    currentImageIndexGAux2 = 0

  if (currentImageIndexGAux3 >= maxGalleryAux3)
    currentImageIndexGAux3 = 0

  if (currentImageIndexGAux4 >= maxGalleryAux4)
    currentImageIndexGAux4 = 0


    galleryMain[currentImageIndexGMain].classList.add("selected")
    galleryAux1[currentImageIndexGAux1].classList.add("selected")
    galleryAux2[currentImageIndexGAux2].classList.add("selected")
    galleryAux3[currentImageIndexGAux3].classList.add("selected")
    galleryAux4[currentImageIndexGAux4].classList.add("selected")
}

function start() { setInterval(() => {
  nextImageGMain() }, time);
}

window.addEventListener("load", start)


// ===============================


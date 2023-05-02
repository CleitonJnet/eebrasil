var header          = document.querySelector("header")
var btn_search      = document.querySelector("#btn-search")
var section_search  = document.querySelector("#section-search")
var input_search    = document.querySelector(".input-search")
var search_content  = document.querySelector(".search-content")

window.onscroll     = function() {myFunction()}

function myFunction() {
  if (document.body.scrollTop > 70 || document.documentElement.scrollTop > 70)
  { header.classList.add('show') } else { header.classList.remove('show') }
}

btn_search.addEventListener("click", function () {
  section_search.classList.toggle('active')
  input_search.focus()
  input_search.value = ''
  if (input_search.value.length >= 1)
  { search_content.style.display = 'block' }else{ search_content.style.display = 'none' }
})

document.onkeydown = function(e) {
  if (e.key === 'AltGraph') {
    section_search.classList.toggle('active')
    input_search.focus()
    input_search.value = ''
  }

  if(e.key === 'Escape') { input_search.value = '' }
}

input_search.onkeyup = function() {
  if (input_search.value.length >= 1)
  { search_content.style.display = 'block' }else{ search_content.style.display = 'none' }
}


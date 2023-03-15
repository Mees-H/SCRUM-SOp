let dropdown = document.getElementById("dropdown");
let content = document.getElementById("content");


function showContent(){
  if (content.classList.contains("d-none")) {
      content.classList.remove("d-none");
  }
  else {
      content.classList.add("d-none");
  }
}

dropdown.addEventListener("focusin", showContent);
dropdown.addEventListener("focusout", function() {
  setTimeout(showContent, 100)});


function FilterWords() {
    var input, filter, div, a, curra, i, txtValue;
    input = document.getElementById('dropdown');
    filter = input.value.toUpperCase();
    div = document.getElementById('content');
    a = div.getElementsByTagName('a');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < a.length; i++) {
      curra = a[i];
      txtValue = curra.textContent || curra.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
  }


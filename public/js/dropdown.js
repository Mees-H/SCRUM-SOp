let dropdown = document.getElementById("dropdown");
let content = document.getElementById("content");

const listItems = content.querySelectorAll(".searchitem");

let activeIndex = -1;

dropdown.addEventListener("keydown", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    
    // Remove the "active" class from the previously active item
    if (activeIndex >= 0) {
      listItems[activeIndex].classList.remove("active");
    }
    
    // Move to the next list item
    activeIndex = (activeIndex + 1) % listItems.length;
    const activeItem = listItems[activeIndex];
    activeItem.classList.add("active");
    activeItem.setAttribute("tabindex", "0");
    activeItem.focus();
  }
});

function showContent(){
  if (content.classList.contains("d-none")) {
      content.classList.remove("d-none");
  }
}

dropdown.addEventListener("focusin", showContent);

dropdown.addEventListener("focusout", function(event) {
  setTimeout(function() {
    if (!content.contains(document.activeElement)) {
      content.classList.add("d-none");
    }
  }, 100);
});

function FilterWords() {
    let input, filter, div, a, curra, i, txtValue;
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


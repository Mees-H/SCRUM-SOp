function selectPicture(button) {
    if (button.classList.contains('selected')) {
        button.classList.remove('selected');
        button.parentElement.style.border = "2px solid transparent";
        button.previousElementSibling.disabled = true;
    } else {
        button.classList.add('selected');
        button.parentElement.style.border = "2px solid #db3838";
        button.previousElementSibling.disabled = false;
    }
}

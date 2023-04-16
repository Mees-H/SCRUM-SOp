let items = document.getElementsByClassName('imageContainer')
for (let i = 0; i < items.length; i++) {
    let item = items[i];
    console.log(item);
    item.addEventListener('click', function (e) {

        let target = e.target;
        while(!target.classList.contains('imageContainer')){
            target = target.parentElement;
        }

        console.log(target)

        if (target.classList.contains('selected')) {
            target.classList.remove('selected');
            target.classList.add('unselected');
        } else if(target.classList.contains('unselected')){
            target.classList.add('selected');
            target.classList.remove('unselected');
        }
    });
}

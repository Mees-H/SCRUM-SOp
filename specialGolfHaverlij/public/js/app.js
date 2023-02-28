function getRowNumber(button) {
    console.log(button.id.slice(-1));
    return button.id.slice(-1);
}

function removeRow(button) {

    $.ajax({
        type: "POST",
        url: "../php/removeRow.php" ,
        data: { data: getRowNumber(button) },
        success : function() { 
            // function below reloads current page
            location.reload();
        }
    });
}



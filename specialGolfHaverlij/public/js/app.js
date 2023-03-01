function getRowNumber(button) {
    var trainingen = document.getElementsByClassName("deleteTraining");
    //for loop through the list of buttons
    //if statement that checks if the button is the same as the button in the list
    //return the index + 1
    for (let i = 0; i < trainingen.length; i++) {
        if (trainingen[i] == button) {
            return i;
        }
    }
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



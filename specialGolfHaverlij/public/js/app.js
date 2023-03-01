function getRowNumber(button) {
    var trainingen = document.getElementsByClassName("deleteTraining");
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
            location.reload();
        }
    });
}



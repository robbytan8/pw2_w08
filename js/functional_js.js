function sumTwoNumber() {
    var value1 = Number(document.getElementById("input2").value);
    var value2 = parseInt(document.getElementById("input3").value);
    window.alert("Sum number: " + (value1 + value2));
}

function sendToUpdate(id) {
    window.location = "?navito=ucategory&c=udt&tod=" + id;
}

function sendToDelete(id) {
    var confirmation = window.confirm("Are you sure want to delete?");
    if (confirmation) {
        window.location = "?navito=category&c=rem&tod=" + id;
    }
}
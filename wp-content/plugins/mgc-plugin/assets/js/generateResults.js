function generateResults(data) {
    var outputContainer = document.getElementById("output-container");

    // creating 1st Head Row
    for (i = 0; i < data.length; i++) {

        var tbl = document.createElement("div");
        tbl.setAttribute("class", "divTable");
        var tblBody = document.createElement("div");
        tblBody.setAttribute("class", "divTableBody");

        var cellRowHeading = document.createElement("div");
        cellRowHeading.setAttribute("class", "divTableHeading");
        var cellHeadingText = document.createTextNode(data[i].post_title);

        // adding the 1st row to the end of the output container
        cellRowHeading.appendChild(cellHeadingText);
        outputContainer.appendChild(cellRowHeading);
    }

    // creating 2nd Row
    for (i = 0; i < data.length; i++) {
        var row = document.createElement("div");
        row.setAttribute("class", "divTableRow");

        //create  2 coloms
        for (var j = 0; j < 2; j++) {
            // Create a cell element and a text node, making the text
            // node the contents of the cell
            var cell = document.createElement("div");
            cell.setAttribute("class", "divTableCell");
            var cellText = document.createTextNode(data[i].post_title);
            cell.appendChild(cellText);
            row.appendChild(cell);
        }

        // add the row to the end of the table body
        tblBody.appendChild(row);
        // put the divBody in the divTable
        tbl.appendChild(tblBody);
        // appends 2nd row to output container
        outputContainer.appendChild(tbl);
    }
}

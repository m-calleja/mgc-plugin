function outputResults(data) {
    var outputContainer = document.getElementById("output-container");

    for (i = 0; i < data.length; i++) {

        // creating 1st Head Row
        var tbl = document.createElement("div");
        tbl.setAttribute("class", "divTable");
        var tblBody = document.createElement("div");
        tblBody.setAttribute("class", "divTableBody");

        var cellHeading = document.createElement("div");
        cellHeading.setAttribute("class", "divTableHeadingRow");
        var cellHeadingText = document.createTextNode(data[i].post_title);
        cellHeading.appendChild(cellHeadingText);
        outputContainer.appendChild(cellHeading);
    }


    // creating 2nd Row
    for (i = 0; i < data.length; i++) {
        var row = document.createElement("div");
        row.setAttribute("class", "divTableRow");

        //create  2 coloms
        for (var j = 0; j < 2; j++) {
            // Create a cell element and a text node, make the text
            // node the contents of the cell, and put the cell at
            // the end of the table row
            var cell = document.createElement("div");
            cell.setAttribute("class", "divTableCell");
            //var cellText = document.createTextNode("cell in row "  + "value :" + data[i].ID +", column "+j);
            var cellText = document.createTextNode(data[i].post_title);
            cell.appendChild(cellText);
            row.appendChild(cell);
        }

        //}
        // add the row to the end of the table body
        tblBody.appendChild(row);
        // put the divBody in the divTable
        tbl.appendChild(tblBody);
        //// appends divTable into divBody
        outputContainer.appendChild(tbl);
        // sets the border attribute of tbl to 2;
    }

}



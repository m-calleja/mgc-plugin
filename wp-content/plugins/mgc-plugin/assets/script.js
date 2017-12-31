
function generate_table() {
    var generateOutputBtn = document.getElementById("generate-output-btn");
    var outputContainer = document.getElementById("output-container");

    if(generateOutputBtn) {
        var routeRequest = new XMLHttpRequest();
        routeRequest.open('GET',  data.siteURL + '/wp-json/mgc-plugin/categories/1');
        routeRequest.onload = function() {
            if (routeRequest.status >= 200 && routeRequest.status < 400) {
                var data = JSON.parse(routeRequest.responseText);
                console.log(data);
                createHTML(data);
                generateOutputBtn.remove();
            } else {
                console.log("We connected to the server, but it returned an error.");
            }
        };
        routeRequest.onerror = function() {
            console.log("Connection error");
        };
        routeRequest.send();
    }


    function createHTML(data) {
        var ourHTMLString = "";

        for(i = 0; i < data.length; i++) {
            //ourHTMLString += '<h2>' + data[i].post_title + '</h2>';
            //ourHTMLString += data[i].post_content;
            //generate  div table

            //var body = document.getElementsByTagName("body")[0];
            // creates a <table> element and a <tbody> element
            var tbl     = document.createElement("div");
            tbl.setAttribute("class", "divTable");
            var tblBody = document.createElement("div");
            tblBody.setAttribute("class", "divTableBody");

            var cellHeading = document.createElement("div");
            cellHeading.setAttribute("class", "divTableHeading");
            var cellHeadingText = document.createTextNode(data[i].post_title);
            cellHeading.appendChild(cellHeadingText);
            outputContainer.appendChild(cellHeading);
            //ourHTMLString += data[i].ID;
        }
            for(i = 0; i < data.length; i++) {
                // creating all cells
                //for (var x = 0; x < 2; x++) {
                    // creates a table row
                    var row = document.createElement("div");
                    row.setAttribute("class", "divTableRow");

                    //create coloms with loop
                    for (var j = 0; j < 2; j++) {
                        // Create a cell element and a text node, make the text
                        // node the contents of the cell, and put the cell at
                        // the end of the table row
                        var cell = document.createElement("div");
                        cell.setAttribute("class", "divTableCell");
                        //var cellText = document.createTextNode("cell in row "  + "value :" + data[i].ID +", column "+j);
                        var cellText = document.createTextNode( data[i].post_title );
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
                tbl.setAttribute("border", "5");
        }
    }
}

//Add info form

function add_info() {
var addBtn = document.getElementById("add-button");

if(addBtn) {
        var postData = {
            "title": document.getElementById("add-info-title").value,
            "content": document.getElementById("add-info-content").value,
            "status" : "publish"
        };
        var createPost = new XMLHttpRequest();
        createPost.open("POST" , data.siteURL + '/wp-json/wp/v2/posts');
        createPost.setRequestHeader("X-WP-Nonce" , data.nonce);
        createPost.setRequestHeader("Content-Type" , "application/json;charset=UTF-8");
        createPost.send(JSON.stringify(postData));
        createPost.onreadystatechange = function() {
        if(createPost.readyState == 4) {

            if(createPost.status == 201) {
                document.getElementById("add-info-title").value = "";
                document.getElementById("add-info-content").value = "";

                var alertBox = document.getElementById("alert-message");
                var successAlert = document.createElement('div');
                successAlert.textContent = "Success! Your info has been posted";
                successAlert.setAttribute('class', 'alert alert-success');
                alertBox.appendChild(successAlert);

            } else {
                alert("Error - try again");
            }
        }
    }

}}


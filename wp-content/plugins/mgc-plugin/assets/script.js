const URL = "http://localhost/custom/wp-json/mgc-plugin/author/1";

function generate_table() {


    var generateOutputBtn = document.getElementById("generate-output-btn");
    var outputContainer = document.getElementById("output-container");

    if(generateOutputBtn) {
        var ourRequest = new XMLHttpRequest();
        ourRequest.open('GET', URL);
        ourRequest.onload = function() {
            if (ourRequest.status >= 200 && ourRequest.status < 400) {
                var data = JSON.parse(ourRequest.responseText);
                console.log(data);
                createHTML(data);
                generateOutputBtn.remove();
            } else {
                console.log("We connected to the server, but it returned an error.");
            }
        };

        ourRequest.onerror = function() {
            console.log("Connection error");
        };
        ourRequest.send();
    }


    function createHTML(data) {
        var ourHTMLString = "";

        for(i = 0; i < data.length; i++) {
            //ourHTMLString += '<h2>' + data[i].post_title + '</h2>';
            //ourHTMLString += data[i].post_content;
            ourHTMLString += data[i].ID;
            outputContainer.innerHTML = ourHTMLString;




            //generate table
                // get the reference for the body
                //var body = document.getElementsByTagName("body")[0];
                // creates a <table> element and a <tbody> element
                var tbl     = document.createElement("table");
                var tblBody = document.createElement("tbody");

                // creating all cells
                for (var x = 0; x < 2; x++) {
                    // creates a table row
                    var row = document.createElement("tr");

                    for (var j = 0; j < 2; j++) {
                        // Create a <td> element and a text node, make the text
                        // node the contents of the <td>, and put the <td> at
                        // the end of the table row
                        var cell = document.createElement("td");
                        var cellText = document.createTextNode("cell in row "+ x + "value :" + data[i].ID +", column "+j);
                        cell.appendChild(cellText);
                        row.appendChild(cell);
                    }

                    // add the row to the end of the table body
                    tblBody.appendChild(row);
                }

                // put the <tbody> in the <table>
                tbl.appendChild(tblBody);
                //// appends <table> into <body>
                outputContainer.appendChild(tbl);
                // sets the border attribute of tbl to 2;
                tbl.setAttribute("border", "2");
            //outputContainer.innerHTML = tbl;



        }

        //outputContainer.innerHTML = ourHTMLString;


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
        createPost.open("POST" , data.siteURL + 'wp-json/wp/v2/posts');
        createPost.setRequestHeader("X-WP-Nonce" , data.nonce);
        createPost.setRequestHeader("Content-Type" , "application/json;charset=UTF-8");
        createPost.send(JSON.stringify(postData));
        createPost.inreadystatechange = function() {
        if(createPost.readyState == 4) {
            if(createPost.status == 201) {
                document.getElementById("add-info-title").value = "";
                document.getElementById("add-info-content").value = "";
            } else {
                alert("Error - try again");
            }
        }
    }

}}


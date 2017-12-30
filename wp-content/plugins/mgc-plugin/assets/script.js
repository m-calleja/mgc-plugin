const URL = "http://localhost/custom/wp-json/wp/v2/posts";

function generate_table() {


    var generateOutputBtn = document.getElementById("generate-output-btn");
    var outputContainer = document.getElementById("output-container");

    if(generateOutputBtn) {
        var ourRequest = new XMLHttpRequest();
        ourRequest.open('GET', data.siteURL + 'wp-json/wp/v2/posts');
        ourRequest.onload = function() {
            if (ourRequest.status >= 200 && ourRequest.status < 400) {
                var data = JSON.parse(ourRequest.responseText);
                //console.log(data);
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
            ourHTMLString += '<h2>' + data[i].title.rendered + '</h2>';
            ourHTMLString += data[i].content.rendered;
        }

        outputContainer.innerHTML = ourHTMLString;

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


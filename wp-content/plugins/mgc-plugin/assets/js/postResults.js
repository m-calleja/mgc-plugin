//Quick Add Client Custom Post

function postResults() {

    var addBtn = document.getElementById("add-button");

    if (addBtn) {
        var postData = {
            "title": document.getElementById("add-info-title").value,
            "content": document.getElementById("add-info-content").value,
            "status": "publish"
        };
        var createPost = new XMLHttpRequest();
        createPost.open("POST", data.siteURL + '/wp-json/wp/v2/client-posts-api');
        createPost.setRequestHeader("X-WP-Nonce", data.nonce);
        createPost.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        createPost.send(JSON.stringify(postData));
        createPost.onreadystatechange = function () {
            if (createPost.readyState == 4) {

                if (createPost.status == 201) {
                    document.getElementById("add-info-title").value = "";
                    document.getElementById("add-info-content").value = "";
                    alert("Success - you have posted!");
                    return true;
                } else {
                    alert("Error - something went wrong - try again");
                }
            }
        }

    }
}

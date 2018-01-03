
/* GET METHOD */
function fetchResults() {

    var generateOutputBtn = document.getElementById("generate-output-btn");

    if (generateOutputBtn) {
        var routeRequest = new XMLHttpRequest();
        routeRequest.open('GET', data.siteURL + '/wp-json/mgc-plugin/v1/client-posts-api/');
        routeRequest.onload = function () {
            if (routeRequest.status >= 200 && routeRequest.status < 400) {
                var data = JSON.parse(routeRequest.responseText);
                console.log(data);
                outputResults(data);
                generateOutputBtn.remove();
            } else {
                console.log("We connected to the server, but it returned an error.");
            }
        };
        routeRequest.onerror = function () {
            console.log("Connection error");
        };
        routeRequest.send();
    }

}
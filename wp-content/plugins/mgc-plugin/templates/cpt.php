<div class="container-fluid">
    <h1> Post the Information Required</h1>
    <h5> For the sake of the example we are going to print only the title from the post 'title' and 'content' stored'
        through this form
        post form</h5>
    <h6><i>This input form uses JS to POST to the registered rest route
            -<span> <b>/mgc-plugin/client-posts-api</b></span> </i></h6>

    <div class="add-info">
        <h3>Quick Add Post</h3>
        <input type="text" id="add-info-title" name="title" placeholder="Title">
        <textarea name="content" id="add-info-content" placeholder="Content"></textarea>
        <button type="button" class="btn btn-success" id="add-button" onclick="postResults()">Create Post</button>
    </div>
    <button type="button" class="btn btn-default" id="generate-output-btn" value="Generate results"
            onclick="fetchResults()">Generate results
    </button>
    <div id="output-container" class="container"></div>
</div>
<h1> Post the Information Required</h1>
<h5> For the sake of the example we are going to print only the title from the title and content stored from the post form</h5>

    <div id="alert-message"></div>
    <div class="add-info">
        <h3>Quick Add Post</h3>
        <input type="text" id="add-info-title" name="title" placeholder="Title">
        <textarea name="content" id="add-info-content" placeholder="Content"></textarea>
        <button type="button" class="btn btn-success" id="add-button" onclick="add_info()">Create Post</button>
    </div>
    <button type="button" class="btn btn-default" id="generate-output-btn" value="Generate results" onclick="generate_table()">Generate results</button>
    <div id="output-container" class="container"></div>

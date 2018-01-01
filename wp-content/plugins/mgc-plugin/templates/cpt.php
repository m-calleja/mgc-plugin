<h1> Post the Information Required</h1>

<?php if(current_user_can('client')) : ?>
    <!--	<div class="alert alert-success is-hidden">-->
    <!--		<strong>Success!</strong> Your info has been posted</a>.-->
    <!--	</div>-->
    <div id="alert-message"></div>
    <div class="add-info">
        <h3>Quick Add Post</h3>
        <input type="text" id="add-info-title" name="title" placeholder="Title">
        <textarea name="content" id="add-info-content" placeholder="Content"></textarea>
        <button type="button" class="btn btn-success" id="add-button" onclick="add_info()">Create Post</button>
    </div>
    <button type="button" class="btn btn-default" id="generate-output-btn" value="Generate results" onclick="generate_table()">Generate results</button>
    <div id="output-container"></div>
    <p>Default Content</p>
<?php endif; ?>
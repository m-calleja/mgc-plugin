<h1> THIS IS THE PAGE</h1>
<?php if(current_user_can('administrator')) : ?>
<div class="add-info">
	<h3>Quick Add Post</h3>
	<input type="text" id="add-info-title" name="title" placeholder="Title">
	<textarea name="content" id="add-info-content" placeholder="Content"></textarea>
	<button type="button" id="add-button" onclick="add_info()">Create Post</button>
</div>
<button type="button" id="generate-output-btn" value="Generate results" onclick="generate_table()">Generate results</button>
<!--<button id="generate-output-btn"> Load the input data</button>-->
<div id="output-container"></div>
<?php endif; ?>
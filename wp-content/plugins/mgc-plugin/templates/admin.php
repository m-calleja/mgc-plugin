
<div class="wrap">
    <h1>WP created posts</h1>
    <form method="post" action="options.php">
        <?php
            settings_fields('mgc_plugin_group');
            do_settings_sections('mgc_plugin');
            submit_button();
        ?>
    </form>
</div>




<?php
/**
 * Trigger this file on Plugin uninstall
 * @package MgcPlugin
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
//delete CPT
//delete all the plugin data from DB

//Clear Database stored data
//$books = get_posts( array('post_type' => 'book', 'numberposts' => -1));
//
//foreach($books as $book) {
//    wp_delete_post($book->ID, true);
//}


//Access the database via SQL
global $wpdb;
$wpdb->query("DELETE FROM wp_posts WHERE post_type ='book'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp-posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp-posts)");
<?php
function registerTaxonomiesPage() {  
    // Add tag metabox to page
    register_taxonomy_for_object_type('post_tag', 'page'); 
    // Add category metabox to page
    // register_taxonomy_for_object_type('category', 'page');  
}
add_action( 'init', 'registerTaxonomiesPage' );
?>
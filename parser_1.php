<?php
echo "Scripta se izvrsava (prijenos iz joomle u wordpress)!!!!";
ini_set('max_execution_time', 0);

$link = mysql_connect('', '', '');
mysql_set_charset('utf8', $link);
$baza = mysql_select_db('', $link);

$starevijesti = mysql_query('SELECT * FROM jl96y_k2_categories  WHERE id=14');
if(!$starevijesti = mysql_query('SELECT * FROM jl96y_k2_categories  WHERE id=14')) {
	die(mysql_error());
};

include_once("wp-load.php");
include_once("wp-admin/includes/taxonomy.php");
require_once('wp-admin/includes/image.php');

$upload_dir = wp_upload_dir();


while ($stara = mysql_fetch_array($starevijesti)) {
    $kategorija = term_exists($stara['alias'], 'kategorije-clanka');
    if (!$kategorija) {
        wp_create_category($stara['alias']);
    }
    $category_id = get_cat_ID($stara['alias']);

 //hrvatski
//iz joomle
$starevijesti = mysql_query('SELECT * FROM jl96y_k2_items WHERE id=1616');
if(!$starevijesti = mysql_query('SELECT * FROM jl96y_k2_items WHERE id=1616')) {
	die(mysql_error());
};

while ($stara = mysql_fetch_array($starevijesti)) {
    $kategorija = term_exists($staraText['catid'], 'kategorije-clanka');
    if (!$kategorija) {
        wp_create_category($stara['catid']);
    }
    $category_id = get_cat_ID($stara['catid']);


	 $thetitle = $stara['title'];
	 $thecontent = $stara['fulltext'];
	 $thealias = $stara['alias'];
	 $theposttype = $stara['post_type'];
	 $publish = $stara['publish_up'];
	 $postgmt =  $stara['created'];
	 $post_status = $stara['publish'];
	 

	    $postpost = array(
	        'post_title' => $thetitle,
	        'post_name' => $thealias,
	    	'post_type' => 'clanak', 
	    	'post_modified' => $publish,
	    	'post_date' => $postgmt,	
	    	'post_date_gmt' => $postgmt,
	    	'post_modified_gmt' => $postgmt,
	    	'post_status' => 'publish',
	    	'post_type' => 'clanak',
	    	
	    			
	    );

	    $post_id = wp_insert_post($postpost);
	    add_post_meta($post_id, 'naziv', $thetitle);
	    add_post_meta($post_id, 'text', $thecontent);
	    add_post_meta($post_id, 'post_type', $theposttype);
	    add_post_meta($post_id, 'post_modified', $publish);
	    add_post_meta($post_id, 'post_modified_gmt', $publish);
	    add_post_meta($post_id, 'post_date', $publish);
	    add_post_meta($post_id, 'post_date_gmt', $publish);
	    add_post_meta($post_id, 'created', $postgmt);
	    add_post_meta($post_id, 'publish', $post_status);
	    add_post_meta($post_id, 'post_type', 'clanak');
	    
	    
	
	    echo "<pre>";var_dump($publish);echo"</pre>";
	    
	  
	    global $wpdb;
	    $wpdb->update( $wpdb->prefix.'icl_translations', array( 'trid' => $post_id, 'language_code' => 'hr', 'source_language_code' => '' ), array( 'element_id' => $post_id ) ); 


    } 
}

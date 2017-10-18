<?php
ini_set('max_execution_time', 0);

$link = mysql_connect('', '', '');
mysql_set_charset('utf8', $link);
$baza = mysql_select_db('', $link);



$starevijesti = mysql_query('SELECT * FROM jl96y_k2_categories');
if(!$starevijesti = mysql_query('SELECT * FROM jl96y_k2_categories')) {
die(mysql_error());
};


include_once("wp-load.php");
include_once("wp-admin/includes/taxonomy.php");
require_once('wp-admin/includes/image.php');

$upload_dir = wp_upload_dir();

while ($stara = mysql_fetch_array($starevijesti)) {
    $kategorija = term_exists($stara['alias'], 'category');
    if (!$kategorija) {
        wp_create_category($stara['alias']);
    }
    $category_id = get_cat_ID($stara['alias']);



 //hrvatski
//iz joomle
$starevijestiText = mysql_query('SELECT * FROM jl96y_k2_items');
if(!$starevijestiText = mysql_query('SELECT * FROM jl96y_k2_items')) {
die(mysql_error());
};

while ($staraText = mysql_fetch_array($starevijestiText)) {
    $kategorijaText = term_exists($staraText['catid'], 'category');
    if (!$kategorijaText) {
        wp_create_category($staraText['catid']);
    }
    $category_id = get_cat_ID($staraText['catid']);


 $thetitle = $staraText['title'];
 $thecontent = $staraText['fulltext'];

    $post = array(
        'post_content' => $thetitle,
        'post_date' => $stara['datum'],
        'post_date_gmt	'  => $stara['datum2'],
        'post_excerpt' => $stara['opis_kratki'],
        'post_status' => 'publish',
        'post_category' => array($category_id),
        'post_type' => 'post'
    );

    echo "<p>".$stara['datum'].$stara['naslov']."</p>";
    $stari_id = $stara['ID'];
    $post_id = wp_insert_post($post);
    add_post_meta($post_id, 'wpcf-stari-id', $stari_id);

    global $wpdb;
    $wpdb->update( $wpdb->prefix.'icl_translations', array( 'trid' => $post_id, 'language_code' => 'hr', 'source_language_code' => '' ), array( 'element_id' => $post_id ) ); 

 //engleski
 $enthecontent = $stara['opis_detaljni_lven'];

    $enpost = array(
        'post_content' => $enthecontent,
        'post_date' => $stara['datum'],
        'post_date_gmt'  => $stara['datum2'],
        'post_excerpt' => $stara['opis_kratki_lven'],
        'post_title' => $stara['naslov_lven'],
        'post_status' => 'publish',
        'post_category' => array($category_id),
        'post_type' => 'post'
    );

    echo "<p>".$stara['datum'].$stara['naslov_lven']."</p>";
    $stari_id = $stara['ID'];
    $enpost_id = wp_insert_post($enpost);
    add_post_meta($enpost_id, 'wpcf-stari-id', $stari_id);

    $wpdb->update( $wpdb->prefix.'icl_translations', array( 'trid' => $post_id, 'language_code' => 'en', 'source_language_code' => 'hr' ), array( 'element_id' => $enpost_id ) ); 

 //njemački
 $dethecontent = $stara['opis_detaljni_lvde'];

    $depost = array(
        'post_content' => $dethecontent,
        'post_date' => $stara['datum'],
        'post_date_gmt'  => $stara['datum2'],
        'post_excerpt' => $stara['opis_kratki_lvde'],
        'post_title' => $stara['naslov_lvde'],
        'post_status' => 'publish',
        'post_category' => array($category_id),
        'post_type' => 'post'
    );

    echo "<p>".$stara['datum'].$stara['naslov_lvde']."</p>";
    $stari_id = $stara['ID'];
    $depost_id = wp_insert_post($depost);
    add_post_meta($depost_id, 'wpcf-stari-id', $stari_id);

    $wpdb->update( $wpdb->prefix.'icl_translations', array( 'trid' => $post_id, 'language_code' => 'de', 'source_language_code' => 'hr' ), array( 'element_id' => $depost_id ) ); 

 //talijanski
 $itthecontent = $stara['opis_detaljni_lvit'];

    $itpost = array(
        'post_content' => $tithecontent,
        'post_date' => $stara['datum'],
        'post_date_gmt'  => $stara['datum2'],
        'post_excerpt' => $stara['opis_kratki_lvit'],
        'post_title' => $stara['naslov_lvit'],
        'post_status' => 'publish',
        'post_category' => array($category_id),
        'post_type' => 'post'
    );

    echo "<p>".$stara['datum'].$stara['naslov_lvit']."</p>";
    $stari_id = $stara['ID'];
    $itpost_id = wp_insert_post($itpost);
    add_post_meta($itpost_id, 'wpcf-stari-id', $stari_id);

    $wpdb->update( $wpdb->prefix.'icl_translations', array( 'trid' => $post_id, 'language_code' => 'it', 'source_language_code' => 'hr' ), array( 'element_id' => $itpost_id ) ); 

 //slovenski
 $slthecontent = $stara['opis_detaljni_lvsi'];

    $slpost = array(
        'post_content' => $slthecontent,
        'post_date' => $stara['datum'],
        'post_date_gmt'  => $stara['datum2'],
        'post_excerpt' => $stara['opis_kratki_lvsi'],
        'post_title' => $stara['naslov_lvsi'],
        'post_status' => 'publish',
        'post_category' => array($category_id),
        'post_type' => 'post'
    );

    echo "<p>".$stara['datum'].$stara['naslov_lvsi']."</p>";
    $stari_id = $stara['ID'];
    $slpost_id = wp_insert_post($slpost);
    add_post_meta($slpost_id, 'wpcf-stari-id', $stari_id);

    $wpdb->update( $wpdb->prefix.'icl_translations', array( 'trid' => $post_id, 'language_code' => 'sl', 'source_language_code' => 'hr' ), array( 'element_id' => $slpost_id ) ); 

 //nizozemski
 $nlthecontent = $stara['opis_detaljni_lvhl'];

    $nlpost = array(
        'post_content' => $nlthecontent,
        'post_date' => $stara['datum'],
        'post_date_gmt'  => $stara['datum2'],
        'post_excerpt' => $stara['opis_kratki_lvhl'],
        'post_title' => $stara['naslov_lvhl'],
        'post_status' => 'publish',
        'post_category' => array($category_id),
        'post_type' => 'post'
    );

    echo "<p>".$stara['datum'].$stara['naslov_lvhl']."</p>";
    $stari_id = $stara['ID'];
    $nlpost_id = wp_insert_post($nlpost);
    add_post_meta($nlpost_id, 'wpcf-stari-id', $stari_id);

    $wpdb->update( $wpdb->prefix.'icl_translations', array( 'trid' => $post_id, 'language_code' => 'nl', 'source_language_code' => 'hr' ), array( 'element_id' => $nlpost_id ) ); 

    $slike = array();
    $image_url = $stara['imgPath'];
    if ($image_url != "") {
        $slike[] = '.app/upl_images/' . $image_url;
    }

//    $stareslike = mysql_query('SELECT * FROM poi_vijestislike WHERE prikaz = "da" AND idvijesti = ' . $stari_id);
//    while ($staraslika = mysql_fetch_array($stareslike)) {
//        $slike[] = 'slikeparse/' . $staraslika['imeslike'];
//    }

    $prva = true;
    foreach ($slike as $slika) {
        $image_url = $slika;
        $image_data = file_get_contents($image_url);
        $filename = basename($image_url);
        if (wp_mkdir_p($upload_dir['path'])) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }

        file_put_contents($file, $image_data);


        $wp_filetype = wp_check_filetype($filename, null);
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => sanitize_file_name($filename),
            'post_content' => '',
            'post_status' => 'inherit'
        );

        $attach_id = wp_insert_attachment($attachment, $file, $post_id);
        $attach_data = wp_generate_attachment_metadata($attach_id, $file);
        wp_update_attachment_metadata($attach_id, $attach_data);

        if ($prva) {
            $prva = false;
            set_post_thumbnail($post_id, $attach_id);
        }
    }
}

<?php
function wdp_db_create() {
        global $wpdb;

		$collate = '';

		if ( $wpdb->has_cap( 'collation' ) ) {
			$collate = $wpdb->get_charset_collate();
		}
        /*Comment the insert query if you don't want default data to be populated*/
		$tables = "
        CREATE TABLE {$wpdb->prefix}trans_products_main
        (id int(10) NOT NULL AUTO_INCREMENT,
        product_name char(50) DEFAULT NULL,
        validity datetime DEFAULT NULL,
        PRIMARY KEY (id),
        UNIQUE(product_name))$collate;
        CREATE TABLE {$wpdb->prefix}trans_sellers_main
        (id int(10) NOT NULL AUTO_INCREMENT,
        seller_name char(50) DEFAULT NULL,
        seller_email varchar(50) DEFAULT NULL,
        active int(0) DEFAULT 0,
        PRIMARY KEY (id),
        UNIQUE(seller_email))$collate;
        CREATE TABLE {$wpdb->prefix}trans_listing_main 
        (id int(10) NOT NULL AUTO_INCREMENT,
        product_id int(10) DEFAULT NULL,
        description_long varchar(500) DEFAULT NULL,
        description_short varchar(150) DEFAULT NULL,
        country char(20) DEFAULT NULL,
        seller_id int(10) DEFAULT NULL,
        pub_date datetime DEFAULT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (seller_id) REFERENCES {$wpdb->prefix}trans_sellers_main(id),
        FOREIGN KEY (product_id) REFERENCES {$wpdb->prefix}trans_products_main(id))$collate;
        ";
    	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $tables );
}
function insert_into_custom_table(){
        global $wpdb;

		$collate = '';

		if ( $wpdb->has_cap( 'collation' ) ) {
			$collate = $wpdb->get_charset_collate();
		}
        /*Comment the insert query if you don't want default data to be populated*/
		$q = "
        INSERT INTO {$wpdb->prefix}trans_products_main VALUES (1,'oil','2018-03-05 19:50:00'),(2,'gas','2018-03-05 19:45:04'),(3,'cocoa','2018-03-05 19:45:09')";
        $wpdb->query($q);
        $q = "INSERT INTO {$wpdb->prefix}trans_sellers_main VALUES (1,'himanshu PANDEY','hpandey90@ufl.edu',1),(2,'himanshu PANDEY','hpandey90@gmail.com',1),(3,'test me','jashd@kasda.com',0),(4,'asjkad alskal','askdak@gmail.com',0),(5,'asdma','nkaka@masd.com',0),(6,'asdka','djhcsjj@jkasd.com',0)";
        $wpdb->query($q);
        $q = "INSERT INTO {$wpdb->prefix}trans_listing_main VALUES (1,1,'this is a long desc for prduct 1 this is a long desc for prduct 1this is a long desc for prduct 1this is a long desc for prduct 1this is a long desc for prduct 1this is a long desc for prduct 1this is a long desc for prduct 1this is a long desc for prduct 1','this is a short desc for product 1','USA',2,'2018-03-03 03:42:50'),(2,2,'this is a long desc for prduct 2 this is a long desc for prduct this is a long desc for prduct this is a long desc for prduct this is a long desc for prduct 1this is a long desc for prduct 1this is a long desc for prduct this is a long desc for prduct 2','this is a short desc for product 2','USA',2,'2018-03-03 03:42:50'),(3,2,'this is a long desc for prduct 2 this is a long desc for prduct this is a long desc for prduct this is a long desc for prduct this is a long desc for prduct 1this is a long desc for prduct 1this is a long desc for prduct this is a long desc for prduct 2','this is a short desc for product 2','USA',1,'2018-03-03 03:42:50'),(4,1,'this is a long desc for prduct 1 this is a long desc for prduct 1this is a long desc for prduct 1this is a long desc for prduct 1this is a long desc for prduct 1this is a long desc for prduct 1this is a long desc for prduct 1this is a long desc for prduct 1','this is a short desc for product 1','USA',1,'2018-03-03 03:42:50')";
        $wpdb->query($q);
    	/*require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $tables );*/
}
//register_activation_hook( __FILE__, 'wdp_db_create' );
?>
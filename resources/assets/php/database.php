<?php

// References: https://github.com/PHP-on-Couch/PHP-on-Couch/blob/master/examples/01_databases.php

require 'vendor/autoload.php';

$couchDsn = "http://localhost:5984/";
$couchDB = "business";

//Import required libraries
use \PHPOnCouch\CouchClient;
use \PHPOnCouch\Exceptions\CouchException;

$client = new CouchClient($couchDsn,$couchDB);

try {
	$databases = $client->listDatabases();
} catch ( Exception $e) {
	echo "Some error happened during the request. This is certainly because your couch_dsn ($couchDsn) does not point to a CouchDB server...\n";
	exit(1);
}

// Check if 'business' database exist
if(! in_array($couchDB, $databases)) {
	echo "Database $couchDB not exist. Please create a database named 'database' in Fauxton\n";
	exit(1);
}

?>
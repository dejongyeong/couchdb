<?php

require 'vendor/autoload.php';

// Import required libraries
use \PHPOnCouch\CouchClient;
use \PHPOnCouch\Exceptions\CouchException;

// Connector to CouchDB Server
try {
    $client = new CouchClient('http://localhost:5984', 'business');
} catch(CouchException $ex) {
    echo "<span class='text-danger'>ERROR: Can't create connection to CouchDB</span>";
    exit(1);
}


?>
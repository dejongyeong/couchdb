<?php

require 'vendor/autoload.php';

// Import required libraries
use \PHPOnCouch\CouchClient;
use \PHPOnCouch\Exceptions\CouchException;

// Connector to CouchDB Server
$client = new CouchClient('http://localhost:5984', 'business');


?>
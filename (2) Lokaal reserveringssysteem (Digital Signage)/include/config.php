<?php

$db_hostname = 'rdbms.strato.de';
$db_username = 'dbu613699';
$db_password = '7fHgf3tZyRLxY5FsEnvbUuTbwHbN4Gfyjm9CeNexzKmgdhSJZCaX4x8Yu7q8wJ99rEWCCB';
$db_database = 'dbs2000118';

$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    //echo "Connected!";
}
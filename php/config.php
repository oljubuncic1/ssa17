<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'orhan321');
   define('DB_DATABASE', 'ssa17');
   $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $db->set_charset("utf8");

   if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>
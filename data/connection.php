<?php 

define("HOST", "localhost");
define("DBNAME", "seleksi_beasiswa");
define("USERNAME", "root");
define("PASSWORD", "");

define("DB", new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USERNAME, PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]));
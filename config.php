<?php
$config = Setting::singleton();
 
$config->set('controllersFolder', 'app/controllers/');
$config->set('modelsFolder', 'app/models/');
$config->set('viewsFolder', 'app/views/');
 
$config->set('dbhost', 'localhost');
$config->set('dbname', 'machine_mvc');
$config->set('dbuser', 'root');
$config->set('dbpass', '');
?>
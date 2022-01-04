<?php
require './app/configs/routes.php';
require './app/configs/database.php';
require './app/configs/app.php';

require './app/core/Route.php';
require './app/App.php';

if(!empty($config['database'])){
    $db_config=array_filter($config['database']);
    if(!empty($db_config)){
        require './app/core/Connection.php';
        require './app/core/Database.php';

    }
}
require './app/core/Model.php';

require './app/core/Controller.php';
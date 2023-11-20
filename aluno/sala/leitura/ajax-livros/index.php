<?php

$actions = [
    "refresh_page" => Readfy\Pdf\refresh\Refresh::class,
    "statics" =>  Readfy\Pdf\statitics\Statitics::class,
];

require_once(__DIR__.'/../vendor/autoload.php');

function core($actions){

    if (empty($_REQUEST['action']) || !array_key_exists($_REQUEST['action'], $actions)){
        echo json_encode(
            [
                "status" => "error"
            ]
        );
        exit;
    }

   
    $action = $_REQUEST['action'];
    $data_action = (object) $_REQUEST;
    $app = new $actions[$action]($data_action);
    $app->run();


}
core($actions);
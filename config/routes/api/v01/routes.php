<?php
$api_uri_version = "0.1";
$api_path_version = "v01";
$api_base_uri = "/api/{$api_uri_version}";
$api_controllers_path = "Sample\\Controller\\Api\\{$api_path_version}";

//Get all
$app->get(
    "{$api_base_uri}/things",
    "{$api_controllers_path}\\ThingController::index"
);

//Remove
$app->delete(
    "{$api_base_uri}/things/{thing_id}",
    "{$api_controllers_path}\\ThingController::remove"
);
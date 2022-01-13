<?php 

require 'config.php';
require ROOT_PATH . 'model/trip/TripManager.php';
require ROOT_PATH . 'model/trip/Trip.php';

/**
 * Show all Trips
 *
 * @return void
 * 
 */
function tripsView() 
{
    $db = db();
    $tripManager = new TripManager($db);

    $trips = $tripManager->getList();
    
    include_once ROOT_PATH . 'view/trip/trips.php';
}
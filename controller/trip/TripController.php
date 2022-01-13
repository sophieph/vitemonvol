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

function trip() {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $db = db();
        $tripManager = new TripManager($db);

        $trip = $tripManager->get($id);
        include_once ROOT_PATH . 'view/trip/trip-view.php';
    } else {
        include_once ROOT_PATH . 'view/layoutParts/error404.php';

    }
    
}
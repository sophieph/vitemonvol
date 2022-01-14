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

        session_start();
        if (!empty($_SESSION)) {
            $userId = $_SESSION['id'];

            $db = db();
            $bookingManager = new BookingManager($db); 

            $bookingExists = $bookingManager->exists($userId, $id);

        } 

        $maximumTravellers = $trip['maximumTravellers'];

        $db = db();
        $bookingManager = new BookingManager($db); 
        $countBooking = count($bookingManager->getBookingTrip($trip['id']));

        include_once ROOT_PATH . 'view/trip/trip-view.php';
    } else {
        include_once ROOT_PATH . 'view/layoutParts/error404.php';

    }
    
}
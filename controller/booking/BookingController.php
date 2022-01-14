<?php 

require 'config.php';
require ROOT_PATH . 'model/booking/BookingManager.php';
require ROOT_PATH . 'model/booking/Booking.php';
// require ROOT_PATH . 'model/trip/Trip.php';

/**
 * Booking
 *
 * @return void
 * 
 * Booking of member logged in
 */
function booking()
{
    session_start();

    if (isset($_SESSION['user'])) {
        $id = $_SESSION['id'];

        $db = db();
        $bookingManager = new BookingManager($db); 
        $tripManager = new TripManager($db);
        $bookings = $bookingManager->get($id);

        $trips = $tripManager->getList();

    }
    include_once ROOT_PATH . 'view/user/booking.php';
}

function addBooking() {
    if (isset($_GET['id']) && isset($_GET['tripId'])) {
        $id = $_GET['id'];
        $tripId = $_GET['tripId'];

        $db = db();
        $bookingManager = new BookingManager($db); 

        $bookingExists = $bookingManager->exists($userId, $id);
        if ($bookingExists) {
            echo 'Vous avez déjà réservé ce voyage.';
        } else {
            $response = $bookingManager->add($id, $tripId);
        }

        echo $response;
    }  else if (isset($_GET['id'])) {
        include_once ROOT_PATH . 'view/layoutParts/error404.php';
    }
}
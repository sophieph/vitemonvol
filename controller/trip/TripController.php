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

    // $trips = new Trip([
    //     'name' => 'name',
    //     'description' => 'Description',
    //     'maximumTravellers' => '4'
    // ]);
    
    include_once ROOT_PATH . 'view/trip/trips.php';
}
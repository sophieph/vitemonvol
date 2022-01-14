<?php 
require 'config.php';
require  ROOT_PATH . 'controller/controller.php';
require  ROOT_PATH . 'controller/admin/AdminController.php';
require  ROOT_PATH . 'controller/user/UserController.php';
require  ROOT_PATH . 'controller/trip/TripController.php';
require  ROOT_PATH . 'controller/booking/BookingController.php';


try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'homepage') {
            homepage();
        } else if ($_GET['action'] == 'logoff') { // log off
            logoff();
        } else if ($_GET['action'] == 'signin') { // login view
            signinView();
        } else if ($_GET['action'] == 'signinC') { // login as a member
            signin();
        } else if ($_GET['action'] == 'signup') { // Sign up
            signupView();
        } else if ($_GET['action'] == 'signupC') { // Sign up as a member
            signup();
        } else if ($_GET['action'] == 'account') { // Account for member
            account();
        } else if ($_GET['action'] == 'booking') { // Account for member
            booking();
        } else if ($_GET['action'] == 'editUser') { // modify info for member
            editUser();
        } else if ($_GET['action'] == 'trips') { // liste des voyages
            tripsView();
        } else if ($_GET['action'] == 'trip') { // infos du voyage
            trip();
        } else if ($_GET['action'] == 'add-booking') { // infos du voyage
            addBooking();
        } else if ($_GET['action'] == 'admin') { // Admin view
            adminView();
        } else if ($_GET['action'] == 'adminc') { // Admin sign in
            admin();
        } else if ($_GET['action'] == 'board') { // dashboard for admin
            board();
        } else if ($_GET['action'] == 'admin-trips') { // admin : trips
            adminTripsView();
        } else if ($_GET['action'] == 'admin-add-trip') { // admin : add trips
            adminAddTrip();
        } else if ($_GET['action'] == 'admin-edit-trip') { // admin : edit trip
            adminEditTrip();
        } else if ($_GET['action'] == 'admin-delete-trip') { // admin : edit trip
            adminDeleteTrip();
        }  else if ($_GET['action'] == 'admin-users') { // admin : users
            adminUsersView();
        } else if ($_GET['action'] == 'admin-edit-user') { // admin : edit user
            adminEditUser();
        } else if ($_GET['action'] == 'admin-bookings') { // admin : bookings
            adminBookingsView();
        } 
    } else {
        homePage();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
<?php 
require 'config.php';
require  ROOT_PATH . 'controller/controller.php';
require  ROOT_PATH . 'controller/admin/AdminController.php';
require  ROOT_PATH . 'controller/user/UserController.php';
require  ROOT_PATH . 'controller/trip/TripController.php';

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
        } else if ($_GET['action'] == 'edit-user') { // modify info for member
            editUser();
        } else if ($_GET['action'] == 'trips') { // modify info for member
            tripsView();
        } else if ($_GET['action'] == 'admin') { // Admin view
            adminView();
        } else if ($_GET['action'] == 'adminc') { // Admin sign in
            admin();
        } else if ($_GET['action'] == 'board') { // dashboard for admin
            board();
        }
    } else {
        homePage();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
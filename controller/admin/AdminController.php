<?php 

require 'config.php';
// require ROOT_PATH . 'model/user/UserManager.php';

/**
 * Signin
 *
 * @return void
 * 
 * admin connection form
 */
function adminView() 
{
    include_once ROOT_PATH . 'view/admin/sign-in.php';
}

/**
 * AdminController
 *
 * @return void
 * 
 * admin connection
 */
function admin()
{
    $db = db();
    $userManager = new UserManager($db);

    $email = $_GET['email'];
    $pass = $_GET['pass'];

    if (isset($email) && !empty($email) && isset($pass) && !empty($pass)) {

        if ($userManager->exists($email)) {
            $admin = $userManager->get($email);
            $password_hashed = $admin->getPassword();
            if (password_verify($pass, $password_hashed)) {
            
                /* verify if it is an admin */
                if ($userManager->admin($email)) { 
                    $response = true;
                    session_start();
                    $_SESSION['infos'] = $admin;
                    $_SESSION['user'] = 'admin';
                    $_SESSION['email'] = $admin->getEmail();
                    $_SESSION['name'] = $admin->getName();
                } else {
                    $response = "Vous n'avez pas accès.";
                }
            } else { 
                $response = "Mot de passe incorrect.";
            }
        } else {
            $response = "Vous n'avez pas accès.";
        }
    }
    echo $response;
}


/**
 * Board
 *
 * @return void
 * 
 * dashboard for admin
 * 
 */
function board()
{
    include_once ROOT_PATH . 'view/admin/board.php';
}

/**
 * AdminTripsView
 *
 * @return void
 * 
 * admin trips view
 */
function adminTripsView() 
{

    $db = db();
    $tripManager = new TripManager($db);

    $trips = $tripManager->getList();


    include_once ROOT_PATH . 'view/admin/trip/trips.php';
}




/**
 * AdminAddTrip
 *
 * @return void
 * 
 * admin trips view
 */
function adminAddTrip() 
{

    $db = db();
    $tripManager = new TripManager($db);
    
    if (isset($_GET['name']) && !empty($_GET['name'])
        && isset($_GET['date']) && !empty($_GET['date'])
        && isset($_GET['maximumTravellers']) && !empty($_GET['maximumTravellers'])
        && isset($_GET['description']) && !empty($_GET['description'])
        && isset($_GET['price']) && !empty($_GET['price'])
    ) {
        $nameProduct = $_GET['name'];
        $dateProduct = $_GET['date'];
        $maximumTravellers = $_GET['maximumTravellers'];
        $description = $_GET['description'];
        $price = $_GET['price'];
        // $response = $nameProduct . " " . $dateProduct . " " . $maximumTravellers . " "  . $description . " "  . $price;

        $trip = new Trip(
            [
            'name' => $nameProduct,
            'date' => $dateProduct,
            'maximumTravellers' => $maximumTravellers,
            'description' => $description,
            'price' => $price
            ]
        );
    } else {
        return false;
    }

    if (isset($trip)) {
        $tripManager->add($trip);
        $response = "Le circuit a été ajouté à l'inventaire.";
    }

    echo $response;
}

function adminEditTrip() {
    $db = db();
    $tripManager = new TripManager($db); 

    if (isset($_GET['id']) && !empty($_GET['id']) 
        && isset($_GET['name']) && !empty($_GET['name']) 
        && isset($_GET['description']) && !empty($_GET['description']) 
        && isset($_GET['date']) && !empty($_GET['date'])   
        && isset($_GET['price']) && !empty($_GET['price'])
    ) {
            $id = $_GET['id'];
            $name = $_GET['name'];
            $description = $_GET['description'];
            $date = $_GET['date'];
            $price = $_GET['price'];
            $maximumTravellers = $_GET['maximumTravellers'];

            $trip = new Trip(
                [
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'date' => $date,
                'price' => $price,
                'maximumTravellers' => $maximumTravellers
                ]
            );
            var_dump($trip);

            $tripManager->edit($trip);

    } else if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $trip = $tripManager->get($id);
            include_once ROOT_PATH . 'view/admin/trip/trip-view.php';
    } 

    echo $response;
}

function adminDeleteTrip() {
    $db = db();
    $tripManager = new TripManager($db);
        
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        try {
            $tripManager->delete($_GET['id']);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    adminTripsView();
    
    // include_once ROOT_PATH . 'view/admin/adminListProduct.php';
}


/**
 * AdminUsersView
 *
 * @return void
 * 
 * admin users view
 */
function adminUsersView() 
{

    $db = db();
    $userManager = new UserManager($db);

    $users = $userManager->getList();


    include_once ROOT_PATH . 'view/admin/user/users.php';
}


function adminEditUser() {
    $db = db();
    $userManager = new UserManager($db);

    if (isset($_GET['id']) && isset($_GET['isAdmin'])) {
        $id = $_GET['id'];
        $isAdmin = $_GET['isAdmin'];

        $id = $userManager->getId($id)->getId();
        
        $user = new User(
            [
            'id' => $id,
            'isAdmin' => $isAdmin,
            ]
        );

        $userManager->editRole($user);

        $user = $userManager->get($id);

        $response = $user->getName();
        echo $response;
    }  else if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $user = $userManager->getId($id);
        include_once ROOT_PATH . 'view/admin/user/user-view.php';
    }
}
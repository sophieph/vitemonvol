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
            $password_hashed = $admin->password();
            if (password_verify($pass, $password_hashed)) {
            
                /* verify if it is an admin */
                if ($userManager->admin($email)) { 
                    $response = true;

                    session_start();
                    $_SESSION['infos'] = $admin;
                    $_SESSION['user'] = $admin->isAdmin();
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

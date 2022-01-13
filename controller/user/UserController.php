<?php 

require 'config.php';
require ROOT_PATH . 'model/user/UserManager.php';
require ROOT_PATH . 'model/user/User.php';


/**
 * Signin
 *
 * @return void
 * 
 * form connection 
 */
function signinView() 
{
    include_once ROOT_PATH . 'view/user/sign-in.php';
}

/**
 * SigninController
 *
 * @return void
 * 
 * Log in 
 */
function signin() 
{
    $db = db();
    $userManager = new UserManager($db);

    $email = $_GET['email'];
    $pass = $_GET['pass'];

    if (isset($email) && !empty($email) && isset($pass) && !empty($pass)) {

        if ($userManager->exists($email)) {

            $user = $userManager->get($email);
            $password_hashed = $user->password();
            if (password_verify($pass, $password_hashed)) {

                $response = true;
                session_start();
                $_SESSION['infos'] = $user;
                $_SESSION['user'] = $user->isAdmin();
                $_SESSION['id'] = $user->getId();
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
                
            } else { 
                $response = "Mot de passe incorrect";
            }

        } else {
            $response = '<a href="index.php?action=signup">Inscrivez-vous</a> pour vous connecter.';
        }    
    }
    echo $response;
}

/**
 * Signup
 *
 * @return void
 * 
 * Subscribers form
 */
function signupView() 
{
    include_once ROOT_PATH . 'view/user/sign-up.php';
}

/**
 * SignupController
 *
 * @return void
 * 
 * Form to subscribe as a member
 */
function signup() 
{
    $db = db();
    $userManager = new UserManager($db);

    $name = $_GET['name'];
    $email = $_GET['email'];
    $pass = $_GET['pass1'];
    $isAdmin = $_GET['isAdmin'];

    if (isset($name) && !empty($name)&& isset($email) && !empty($email) && isset($pass) && !empty($pass) && isset($isAdmin)) {
        $options = [
            'cost' => 12,
        ];
        $hashed_password = password_hash($pass, PASSWORD_BCRYPT, $options);
        $user = new User([
            'name' => $name,
            'email' => $email,
            'password' => $hashed_password,
            'isAdmin' => intval($isAdmin)
            ]);


        if ($userManager->exists($user->email())) {
            $response = "Le mail existe déjà. Utilisez un autre mail.";
        } else {
            $userManager->add($user);
            $response = 'Vous êtes inscrit. <a href="index.php?action=signin">Connectez-vous</a> !';
        }  
        
    }

    echo $response;

}

/**
 * Logoff
 *
 * @return void
 * 
 * log the member off
 */
function logoff()
{
    include_once ROOT_PATH . 'view/user/logoff.php';
}



/**
 * Account
 *
 * @return void
 * 
 * Account of member logged in
 */
function account()
{
    include_once ROOT_PATH . 'view/user/account.php';
}

/**
 * Edit
 *
 * @return void
 * 
 * edit info of a member
 */
function editUser()
{
    $db = db();
    $userManager = new UserManager($db);

    if (isset($_GET['email']) && isset($_GET['name'])) {

        $email = $_GET['email'];
        $name = $_GET['name'];

        $id = $userManager->get($email)->getId();
        
        $user = new User(
            [
            'id' => $id,
            'name' => $name,
            ]
        );

        $userManager->edit($user);

        $user = $userManager->get($email);
        session_start();
        $_SESSION['infos'] = $user;

        $response = $user->getName();

        echo $response;
    } 
}
<?php 

/**
 * Db
 *
 * @return void
 * 
 * connection to the database
 */
function db()
{
    try {
        $db = new PDO('mysql:host=127.0.0.1:3306;dbname=vitemonvol;charset=utf8', 'root', 'root');
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }

    return $db;
}

/**
 * HomePage
 *
 * @return void
 */
function homepage() 
{
    include_once ROOT_PATH . 'view/main/homepage.php';
}

function errorPage() {
    include_once ROOT_PATH . 'view/layoutParts/error404.php';

}



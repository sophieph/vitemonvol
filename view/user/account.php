<?php 
session_start();
ob_start(); ?>

<?php 
if (!(isset($_SESSION['user']))) { 
    http_response_code(404);
    include_once ROOT_PATH . 'view/layoutParts/error404.php';
}
?>

<?php
if(isset($_SESSION['user'])){
    $user = $_SESSION['infos'];
} ?>
<section id="wrapper">

    <div class="member">

        <div class="menu">
            <ul>
                <li><a href="?action=account">Mes informations</a></li>
                <li><a href="?action=booking">Mes voyages</a></li>
            </ul>
        </div>

        
        <div class="info">
        <p id="f"></p>
        <h2>Mes informations</h2>

        <ul>
            <li><b>Nom</b> : <?= $user->getName(); ?></li>
            <li><b>Email</b> : <?= $user->getEmail(); ?></li>
            
        </ul>
        
        <h3>Modifier mes informations</h3>
            <form action="" class="form-sign-up" id="edit_member" >
                <input type="hidden" name="email" id="email" value="<?= $user->getEmail(); ?>">
                <label for="name">Nom</label> <br>
                <input type="text" name="name" id="name" value="<?= $user->getName(); ?>" ><br>
                
                <input type="submit" id="modify" onclick="editUser()">
            </form>

            
        </div>
    </div>


    
    

</section>

<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/layout.php'; ?>

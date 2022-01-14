<?php 
session_start();
ob_start(); ?>


<section id="wrapper">

<?php 
    if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') { 
    ?>
    <div class="admin">
        <ul>
            <li> <a href="?action=admin-trips">Gérer les circuits</a></li>
            <li> <a href="?action=admin-bookings">Gérer les réservations</a></li>
            <li> <a href="?action=admin-users">Gérer les utilisateurs</a></li>
        </ul>
    </div>

    <?php 
        } else {
            http_response_code(404);
            include_once ROOT_PATH . 'view/layoutParts/error404.php';
        }
        ?>
</section>



<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/admin_layout.php'; ?>

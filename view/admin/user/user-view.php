<?php 
session_start();
ob_start(); 
?>

<section id="wrapper">

<?php 
if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') { 
    ?>

    <div class="admin-list">

        <h3> Utilisateur : <b>
            <?php 
                $role = 'utilisateur';
                if ($user->isAdmin()) {
                    $role = 'admin';
                }
            ?>
        <?php echo $user->getName(); ?></b> </h3>
        
        <p><b>Email</b> : <?php echo $user->getEmail(); ?></p>
        <p><b>Role </b> : <?php echo $role; ?></p>
        
        <h3>Modifier le role de l'utilisateur</h3>

        <?php
        include_once 'view/admin/layoutParts/form-edit-user.php';
        ?>

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

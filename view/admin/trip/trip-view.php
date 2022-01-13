<?php 
session_start();
ob_start(); 
?>

<section id="wrapper">

<?php 
if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') { 
    ?>

    <div class="admin-list">

        <h3> Circuit : <b>
        <?php echo $trip['name']; ?></b> </h3>
        
        <p><b>Nom du circuit </b> : <?php echo $trip['name']; ?></p>
        <p><b>Description </b> : <?php echo $trip['Description']; ?></p>
        <p><b>Prix </b> : <?php echo $trip['price']; ?>&euro;</p>
        <p><b>Date du circuit </b> : <?php echo $trip['date']; ?></p>
        <p><b>Nombre de voyageurs max :</b> <?php echo $trip['maximumTravellers']; ?></p>
        
        
        <h3>Modifier le circuit</h3>

        <?php
        include_once 'view/admin/layoutParts/form-edit-trip.php';
        ?>

        <p class="admin-hover"> <a href="?action=admin-delete-trip&id=<?php echo $trip['id']; ?>">Supprimer le circuit </a></p>

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

<?php 
session_start();
ob_start(); 
?>

<section id="wrapper">

<?php 
if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') { 
    ?>
    <div class="admin-list">
        <h3> Liste : <b>Circuits</b> </h3>

        
        <?php 
        if ($trips) {
            ?>
        <table class="admin-list-table">
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Date</th>
                <th>Voyageurs Max</th>
                <th>Voyageurs actuels</th>
                <th>Images</th>
                <th>Modifier</th>
                <th></th>
                
            </tr> 
            <?php
            foreach($trips as $trip) {
                ?>

                <tr>
                    <td><?php echo $trip['id']?></td>
                    <td><?php echo $trip['name']?></td>
                    <td><?php echo $trip['date']?></td>
                    <td><?php echo $trip['maximumTravellers']?></td>
                    <td></td>
                    <td><?php echo $trip['date']?></td>
                    <td><a href="?action=admin-edit-trip&id=<?php echo $trip['id']; ?>">Modifier</a></td>
                </tr>

                <?php 
            }
            ?>
        </table>
        <?php 
        } else {
            echo 'Aucun circuit en cours';
        }
        ?>

        <h3>Ajouter un trip</h3>
        <?php
            include_once 'view/admin/layoutParts/form-trip.php';
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
<?php 
session_start();
ob_start(); 
?>

<section id="wrapper">

<?php 
if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') { 
    ?>
    <div class="admin-list">
        <h3> Liste : <b>Réservations</b> </h3>

        
        <?php 
        if ($bookings) {
            ?>

            <table class="admin-list-table" style="margin-bottom:50px;">
                <tr>
                    <td>Voyage</td>
                    <td>Voyageurs Maximum</td>
                    <td>Voyageurs actuels</td>
                    <td>Places disponibles</td>
                </tr>
                <?php 
                    foreach ($bookingWithTravellers as $book) {
                        echo '<tr>';
                        foreach ($trips as $trip) {
                            if ($trip['id'] == $book['tripId']) {
                ?>
                    <td><?php echo $trip['name']; ?></td>
                    <td><?php echo $trip['maximumTravellers']; ?></td>
                    <td><?php echo $book['voyageursActuel']; ?></td>
                    <td><?php echo $trip['maximumTravellers'] - $book['voyageursActuel']; ?></td>
                <?php 
                        }
                    }
                    echo '<tr>';

                }

                ?>

            </table>
        <table class="admin-list-table">
            <tr>
                <th>Id</th>
                <th>Voyageur</th>
                <th>Voyage</th>
                <th>Réservé le</th>
                <th></th>
                
            </tr> 
            <?php
            foreach($bookings as $booking) {
                foreach ($trips as $trip) {
                    foreach ($users as $user) {
                        if ($booking['tripId'] == $trip['id'] && $booking['userId'] == $user['id']) {
                ?>

                <tr>
                    <td><?php echo $booking['id']?></td>
                    <td><?php echo $user['name']?></td>
                    <td><?php echo $trip['name']?></td>
                    <td><?php echo $booking['createdAt']?></td>
                    <td></td>
                </tr>

                <?php 
                        }
                    }
                }
            }
            ?>
        </table>
        <?php 
        } else {
            echo 'Aucun réservation en cours';
        }
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
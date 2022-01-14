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
            <h2>Mes réservations</h2>

            <?php 
            if (!$bookings) {
                ?>
                <p>Vous n'avez encore rien réservé.</p>
                <?php 
            } else {
                ?> 
                <ul>
                
                <?php 
                foreach ($bookings as $booking) {
                    foreach($trips as $trip) {
                        if ($trip['id'] == $booking['tripId']) {
                    ?>
                    <li>
                        <b><?php echo $trip['name']; ?></b> entre <?php echo $trip['date']; ?> - <?php echo $trip['price']; ?>&euro;
                    </li>

                    <?php
                        }
                    }
                }
                ?>
                </ul>

            <?php 
                }
                ?>
            
        </div>
    </div>


    
    

</section>



<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/layout.php'; ?>

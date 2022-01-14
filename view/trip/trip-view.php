<?php 
session_start();
ob_start(); ?>

<section id="wrapper">
    <div class="card">
        <div class="card-list">
            <div class="description">
                <h4><?php echo $trip['name']; ?></h4>
                <p><?php echo $trip['price']; ?>&euro;</p>
                <p>Date : <?php echo $trip['date']; ?></p>

                <?php if ($maximumTravellers - $countBooking !== 0 ) { ?>
                    <?php if (!$bookingExists) {?>
                        <br>
                            <button id="add-to-booking" value="<?php echo $trip['id']; ?>" onclick="return(bookTrip(<?php echo $trip['id']; ?>));">Réserver le voyage</button> 
                        <br>
                    <?php } else { ?>
                        <button style="opacity:50%;" id="add-to-bag" value="<?php echo $trip['id']; ?>" >Voyage réservé</button> 
                    <?php } ?>

                <?php } else if ($maximumTravellers == $countBooking) { ?>
                    <button style="opacity:50%;" id="add-to-bag" value="<?php echo $trip['id']; ?>" >Voyage complet </button> 
                <?php } ?>


                

                <p id="text-sign-in"> </p>

                <div class="delivery">
                    <p><?php echo $trip['description']; ?></p>
                </div>

                
            </div>
        </div>

    </div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/layout.php'; ?>

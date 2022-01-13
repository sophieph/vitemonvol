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
                <br>
                <button id="add-to-bag" value="<?php echo $trip['id']; ?>">Réserver le voyage</button> 
                <br>

                <div class="delivery">
                    <p><?php echo $trip['description']; ?></p>
                </div>

                
            </div>
        </div>

    </div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/layout.php'; ?>

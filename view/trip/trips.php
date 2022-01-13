<?php 
session_start();
ob_start(); ?>

<section id="wrapper">


    <?php
        if ($trips) {
        ?>
    <div id="catalogue">

        <ul>    
        <?php 
            foreach ($trips as $trip) {
            ?>
            <li>
                <a href="?action=trip&id=<?php echo $trip['id']; ?>">

                <p class="title-product">
                    <?php echo $trip['name']; ?>  
                    <br>
                    <b><?php echo $trip['date']; ?></b>
                    <br>
                </p>
                </a>                   
            </li>
        <?php
            }
            ?>

        </ul>
    </div>
    <?php
        } else {
            ?>
        Aucun circuit disponible pour le moment
    <?php 
        }
        ?>
</section>


<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/layout.php'; ?>

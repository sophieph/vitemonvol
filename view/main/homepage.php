<?php 
session_start();
ob_start(); ?>

<section id="main-image" style="background-image: url('<?php echo BASE_URL; ?>public/images/main-img.jpeg');">
    <div class="home">
        <h2> Rendez-vous au soleil ? <br>
        <span class="get-dressed">Venez par ici !</span></h2>
        <a href="?action=trips" class="button-shop">Nos circuits</a>
    </div>
</section>





<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/layout.php'; ?>
<?php 
session_start();
ob_start(); ?>


<div class="error">
    <p> OOPS ! THE PAGE YOU ARE <br> LOOKING FOR CAN'T BE FOUND </p>

    <button class="error404"> <a href="/vitemonvol">Go to homepage</a> </button>
</div>




<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/layout.php'; ?>
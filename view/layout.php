<?php 
    session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Vite Mon Vol !</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="<?php echo BASE_URL;?>public/css/normalize.css">
        <link rel="stylesheet" href="<?php echo BASE_URL;?>public/css/style.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


    </head>

    <body>
        <?php require_once 'layoutParts/header.php'; ?>

        <main id="content">
            <?= $content ?>
        </main>


        <?php include_once 'layoutParts/footer.php'; ?>

        <!-- script js -->
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    

        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/validation-form.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/user.js"></script>

        
        <script type="text/javascript">
        
        </script>
    </body>

</html>
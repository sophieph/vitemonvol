<?php 
session_start();
ob_start(); 
?>

<section id="wrapper">

<?php 
if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') { 
    ?>
    <div class="admin-list">
        <h3> Liste : <b>Utilisateurs</b> </h3>

        
        <?php 
        if ($users) {
            ?>
        <table class="admin-list-table">
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Role</th>
                <th></th>
                
            </tr> 
            <?php
            foreach($users as $user) {
                $role = 'utilisateur';
                if ($user['isAdmin']) {
                    $role = 'admin';
                }
                ?>

                <tr>
                    <td><?php echo $user['id'];?></td>
                    <td><?php echo $user['name'];?></td>
                    <td><?php echo $user['email'];?></td>
                    <td><?php echo $role; ?></td>
                    <td><a href="?action=admin-edit-user&id=<?php echo $user['id']; ?>">Modifier</a></td>
                </tr>

                <?php 
            }
            ?>
        </table>
        <?php 
        } else {
            echo 'Aucun utilisateur inscrit';
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
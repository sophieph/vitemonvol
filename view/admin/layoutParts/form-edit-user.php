<form action="" method="POST" class="form-product">
    <table>
        <tr>
            
        </tr>
        <tr>
            <td><input type="hidden" name="id" id="id" value="<?php echo $user->getId(); ?>"></td>
            <td></td>

            <td><label for="role">Est administrateur ?</label></td>
            <td>
                <input type="checkbox" id="isAdmin" name="isAdmin" <?php if ($user->isAdmin() == 1) { ?>checked <?php } ?> >
            </td>
        </tr>

    </table>

    <input type="submit" value="Modifier" class="button" id="button"  onclick="return(editUser());" >

    <p id="text-user"></p>


</form>
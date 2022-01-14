<form action="" method="POST" class="form-product">
    <table>
        <tr>
            <td><input type="hidden" name="id" id="id" value="<?php echo $user['id']; ?>"></td>
            <td></td>
        </tr>
        <tr>
            <td><label for="name">Nom du circuit</label></td>
            <td><input type="text" name="name" id="name" value="<?php echo $user['name']; ?>" > </td>
        </tr>

        <tr>
            <td><label for="date">Date</label></td>
            <td><input type="text" name="date" id="date" value="<?php echo $user['date']; ?>" ></td>
        </tr>

        <tr>
            <td><label for="price">Prix</label></td>
            <td><input type="text" name="price" id="price" value="<?php echo $user['price']; ?>" ></td>
        </tr>

        <tr>
        <td><label for="description">Description</label></td>
            <td><input type="text" name="description" id="description" value="<?php echo $user['description']; ?>" ></td>
        </tr>

        <td>
            <label for="maximumTravellers">Nombre voyageurs max</label>
        </td>
        <td><input type="text" name="maximumTravellers" id="maximumTravellers" value="<?php echo $user['maximumTravellers']; ?>"></td>


    </table>

    <input type="submit" value="Modifier" class="button" id="button"  onclick="return(editTrip())" >

    <p id="text-user"></p>


</form>
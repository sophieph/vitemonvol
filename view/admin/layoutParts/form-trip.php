<form action="" method="POST" class="form-product">
    <table>
        <tr>
            <td><label for="name">Nom du circuit</label></td>
            <td><input type="text" name="name" id="name" > </td>
        </tr>

        <tr>
            <td><label for="maximumTravellers">Nombre de personnes max sur le circuit</label></td>
            <td><input type="text" name="maximumTravellers" id="maximumTravellers" ></td>
        </tr>

        <tr>
            <td><label for="price">Prix du circuit </label></td>
            <td><input type="text" name="price" id="price" ></td>
        </tr>

        <tr>
            <td><label for="price">Description du circuit </label></td>
            <td><input type="text" name="description" id="description"></td>
        </tr>

        <tr>
            <td><label for="price">Date du circuit </label></td>
            <td><input type="text" name="date" id="date"></td>
        </tr>
        

    </table>

    <input type="submit" value="Ajouter" class="button" id="button" onclick="return(addTrip());">

    <p id="text-product"></p>


</form>
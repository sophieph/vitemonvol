
function bookTrip($tripId) {
    var id = id_member;
    var tripId = $tripId;

    
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            // window.location = "/vitemonvol/?action=admin-edit-user&id=" + id;
            console.log(this.responseText);
            $('#add-to-booking').css('opacity', '50%');
            $('#text-sign-in').html(this.responseText);
		} 
	};
    xhr.open("GET", "index.php?action=add-booking&id=" + id + "&tripId=" + tripId , true);
    xhr.send(null);

    return false;
}
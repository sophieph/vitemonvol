function adminC() {
    var mail = document.getElementById("email").value;
    var password = document.getElementById("pass").value;

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            if (this.responseText) {
                window.location = '/vitemonvol/?action=board';
            } else {
                document.getElementById("text").innerHTML = this.responseText;
            }
        }
	};
    xhr.open("GET", "index.php?action=adminc&email=" + mail + "&pass=" + password , true);
    xhr.send(null);

    return false;  
}

/* add a trip to database with ajax */
function addTrip() {
    var name = document.getElementById("name").value;
    var date = document.getElementById("date").value;
    var maximumTravellers = document.getElementById("maximumTravellers").value;
    var description = document.getElementById("description").value;
    var price = document.getElementById("price").value;

    console.log(name);
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            window.location = "/vitemonvol/?action=admin-trips";
		}
	};
    xhr.open("GET", "index.php?action=admin-add-trip&name=" + name + "&date=" + date + "&maximumTravellers=" + maximumTravellers + "&price=" + price + "&description=" + description  , true);
    xhr.send(null);

    return false;
}


function editTrip() {
    var id = document.getElementById("id").value;
    var name = document.getElementById("name").value;
    var description = document.getElementById("description").value;
    var date = document.getElementById("date").value;
    var price = document.getElementById("price").value;
    var maximumTravellers = document.getElementById("maximumTravellers").value;


    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            window.location = "/vitemonvol/?action=admin-edit-trip&id=" + id;
		} 
	};
    xhr.open("GET", "index.php?action=admin-edit-trip&id=" + id + "&name=" + name + "&description=" + description + "&price=" + price + "&date=" + date + "&maximumTravellers=" + maximumTravellers , true);
    xhr.send(null);

    return false;
}

function editUser() {
    var id = document.getElementById("id").value;
    var isAdmin = document.getElementById("isAdmin").checked;

    
    if (isAdmin) {
        isAdmin = 1;
    } else {
        isAdmin = 0;
    }
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            window.location = "/vitemonvol/?action=admin-edit-user&id=" + id;
		} 
	};
    xhr.open("GET", "index.php?action=admin-edit-user&id=" + id + "&isAdmin=" + isAdmin , true);
    xhr.send(null);

    return false;
}
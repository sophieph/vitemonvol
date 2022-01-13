
function editUser() {

    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            // window.location = "/vitemonvol/?action=account";
            console.log(this.responseText);
		}
        console.log(this.responseText);

	};
    xhr.open("GET", "index.php?action=editUser&name=" + name + "&email=" + email , true);
    xhr.send(null);

    return false;
}
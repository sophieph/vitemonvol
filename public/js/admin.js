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
//POST
var ajax = function () {
	var xhr = new XMLHttpRequest();
	var url = "example2.php";
	var params = 'name=David';
	
	xhr.open("POST", url, true);

	//must set this http header with a POST request
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhr.onreadystatechange = function () {
		if(xhr.readyState === 4 && xhr.status === 200) {
			document.getElementById('ajaxResponse').innerHTML = xhr.responseText;
		}
	};

	xhr.send(params); //send the request
};
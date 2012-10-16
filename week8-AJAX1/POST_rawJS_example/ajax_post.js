//POST
var ajax = function (data) {
	var xhr;
	
	try {
  		xhr = new XMLHttpRequest();
  	}
	catch(e) {
  		try {
    		xhr = new ActiveXObject("Msxml2.XMLHTTP");
    	}
  		catch(e) {
    		try {
      			xhr = new ActiveXObject("Microsoft.XMLHTTP");
      		}
    		catch (e) {
      			alert("Your browser does not support AJAX!");
      			return false;
      		}
    	}
  	}
  
	var url = "example2.php";
	var params = 'name=David';
  	xhr.open("POST", url, true);
	
	//must set http headers with a POST request
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//xhr.setRequestHeader("Content-length", params.length);
	//xhr.setRequestHeader("Connection", "close");

	xhr.onreadystatechange = function () {
		if(xhr.readyState === 4 && xhr.status === 200) {
			document.getElementById('ajaxResponse').innerHTML = xhr.responseText;
  		}
	}
	
	xhr.send(params); //send the request
}
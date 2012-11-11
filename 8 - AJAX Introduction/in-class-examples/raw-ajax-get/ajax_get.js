var ajax = function() {
	var xhr = new XMLHttpRequest();
	var url = 'request.php?name=David';	

	xhr.open('GET', url, true);

	xhr.onreadystatechange = function() {		
		if (xhr.readyState === 4 && xhr.status === 200) {
			document.getElementById('demo').innerHTML = xhr.responseText;
		} else if(xhr.status >= 400) {
			console.log('There was an error!');
		}
	};

	xhr.send(null);
};
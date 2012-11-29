var script = document.createElement('script');
script.src = "https://graph.facebook.com/cocacola?callback=myFunction";
document.getElementsByTagName('head')[0].appendChild(script);

function myFunction(data) {
	console.log(data);
	var templateString = document.getElementById('fb-page-template').innerHTML;
	var template = Handlebars.compile(templateString);
	var html = template(data);

	document.getElementById('fb-page').innerHTML = html;

}
var dQuery = function(id) {
	if ( !(this instanceof dQuery ) ) {
		return new dQuery(id);
	}

	this.el = document.getElementById(id);
};

dQuery.prototype = {
	constructor: dQuery,
	html: function(html) {
		if (html) { // Set the innerHTML
			this.el.innerHTML = html;
			return this;
		} else {
			return this.el.innerHTML;
		}

		// this refers to current instance
		$('div').on('click', function(){
			//this refer div
		});
	},
	css: function(prop, value) {
		this.el.style[prop] = value;
		return this;
	}
};
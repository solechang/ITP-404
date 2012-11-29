// application namespace
var AddressBook = {};


AddressBook.Contact = function(options) {
	this.$el = $(options.el);
	this.name = this.$el.find('h3').text();
	this.init();
};


AddressBook.Contact.prototype = {
	init: function() {
		// 'this' represents the Contact instance created.
		// it is cached in the variable 'that' for use within jQuery callbacks since 'this'
		// in jQuery callbacks represent the target DOM element
		var that = this;

		this.$el.on('click', '.favorite', function(e) {
			// in this callback function, this refers to the a.favorite element that was clicked

			that.favorite();
			that.highlight();
			e.preventDefault();
		});
	},

	favorite: function() {
		this.$el.find('.favorite').replaceWith('<span>Favorited!</span>');
		console.log(this.name + ' favorited!');
	},

	highlight: function() {
		this.$el.addClass('favorited-contact');
	}
};
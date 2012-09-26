var Accordion = function(options) {

	// this.$el = $('#accordion1')
	this.$el = $(options.sel);
	this.closeAllButFirst();
	this.bind();
};

Accordion.prototype.closeAllButFirst = function() {
	this.$el.find('.content').slideUp(0).eq(0).slideDown(0);
};

Accordion.prototype.bind = function() {
	var that = this;

	this.$el.on('click', '.label', function() {
		// this not equal this
		console.log(this, that, $(this));

		that.$el.find('.content').hide();
		$(this).next().show();

		$(this).css('color', 'red');
		this.style.color = 'red';
	});
};



// $('.nav li').css({
// 	color: 'green',
// 	fontSize: '20px'
// });

// $('.nav li').addClass('active');

$('.nav').first().hide();

$('a.list-anchor').on('click', function() {
	var $this = $(this);
	var disp = $this.next('.nav').css('display');

	if (disp === 'none') { // not displayed
		$this.next('.nav').slideDown(300);
		$this.addClass('active');
	}
	else if (disp === 'block') { // displayed
		$this.next('.nav').slideUp(300);
		$this.removeClass('active');
	}
	
	//$('.nav').toggle(300);
});

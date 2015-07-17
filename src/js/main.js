$('#auth').change(function() {
	var input = $(this).val();
	if($(this).val() == '') $(this).removeClass('invalid').addClass('validate');
});

$(document).ready(function() {
	$('.grid').isotope({
		itemSelector: '.grid-item'
	});

	// lazy load images with on unveil animation
	$('img').unveil(100, function() {
		imageEnter($(this));
	});

	$('.btn.filter').not('.disabled').click(function() {

		$(this).toggleClass('active');

		if($(this).text() == 'All') {
			$('.btn.filter').not('.all').removeClass('active');
		} else if ( $('.btn.filter.active').length == 0 ) {
			$('.btn.filter.all').addClass('active');
		} else {
			console.log('removing class');
			$('.btn.filter.all').removeClass('active');
		}

		var filters = [];
		$('.btn.filter.active').each(function() {
			filters.push($(this).attr('value'));
		});

		$('.grid').isotope({ filter: filters.join(', ') });

		filters.forEach(function(v) {
			$('img' + v).unveil(100, function() {
				imageEnter($(this));
			});
		});
	});

}); //document.ready

var imageEnter = function(el) {
	// image enter animation
	$(el).load(function() {
		TweenMax.fromTo(
			$(this),
			1,
			{ scale: 1.2, opacity: 0 },
			{ scale: 1, opacity: 1},
			reflowImages()
		);
	});
};

var reflowImages = function (el) {
	$('.grid').isotope('layout');
}

$(window).load(function() {
	// force reflow for auto-unveiled images
	$('.grid').isotope('layout');
});
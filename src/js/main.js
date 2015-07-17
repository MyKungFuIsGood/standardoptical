$('#auth').change(function() {
	var input = $(this).val();
	if($(this).val() == '') $(this).removeClass('invalid').addClass('validate');
});

$(document).ready(function() {

	// init isotope
	$('.grid').isotope({
		itemSelector: '.grid-item'
	});

	// lazy load images with on unveil animation
	$('img').unveil(100, function() {
		imageEnter($(this));
	});

	// year filters on item-list
	$('.btn.filter').not('.disabled').click(function() {
		$(this).toggleClass('active');

		if($(this).text() == 'All') {
			$('.btn.filter').not('.all').removeClass('active');
			$('.btn.filter.all').addClass('active');
		} else if ( $('.btn.filter.active').length == 0 ) {
			$('.btn.filter.all').addClass('active');
		} else {
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

	// media element player 
	$('video').mediaelementplayer({
		enableAutosize: true,
		alwaysShowControls: false,
		iPadUseNativeControls: false,
		iPhoneUseNativeControls: false,
		AndroidUseNativeControls: false,
		alwaysShowHours: false,
		showTimecodeFrameCount: false,
		features: ['playpause', 'progress', 'current', 'duration', 'tracks', 'volume', 'fullscreen']
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

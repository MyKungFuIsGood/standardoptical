$('#auth').change(function() {
	var input = $(this).val();
	if($(this).val() == '') $(this).removeClass('invalid').addClass('validate');
});




$('p').animate({
	height: '200px'
}, 2000);
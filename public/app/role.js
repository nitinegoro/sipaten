/*!
* @author Vicky Nitinrgoro <pkpvicky@gmail.com>
* @package Jquery, Bootstraps JS,
*/

jQuery(function($) {

	$(".toggle").bootstrapSwitch();

	$('.get-delete-role').click( function() {
		$('#modal-delete-role').modal('show');
		$('a#btn-delete').attr('href', base_url + '/role/delete/' + $(this).data('id'));
	});

	
});
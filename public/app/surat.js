/*!
* @author Vicky Nitinrgoro <pkpvicky@gmail.com>
* @package Jquery, Bootstraps JS,
*/

jQuery(function($) {

	$('#select-syarat').select2();

	$('.get-delete-desa').click( function() {
		$('#modal-delete-desa').modal('show');
		$('a#btn-delete').attr('href', base_url + '/desa/delete/' + $(this).data('id'));
	});

	// Delete Multiple User
	$('.get-delete-surat-multiple').click( function() {
		if( $('input[type=checkbox]').is(':checked') != '' ) 
		{
			$('#modal-delete-surat-multiple').modal('show');
		} else {
			$.notify({
				icon: 'fa fa-warning',
				message: "Tidak ada data yang dipilih."
			},{
				type: 'warning',
				allow_dismiss: false,
				delay:2000,
					placement: {
				from: "top",
					align: "center"
				},
			});	
		}
	});

	var text_editor = {
	  html : function(locale) {
	    return "<li>" +
	           "<div class='btn-group'>" +
	           "<a class='btn btn-xs' data-wysihtml5-action='change_view' title='" + locale.html.edit + "'>HTML</a>" +
	           "</div>" +
	           "</li>";
	  }
	}

	// pass in your custom templates on init
	$('#text-editor').wysihtml5({
	   customTemplates: text_editor
	});

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
});
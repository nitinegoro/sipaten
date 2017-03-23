/*!
* @author Vicky Nitinrgoro <pkpvicky@gmail.com>
* @package Jquery, Bootstraps JS,
*/

jQuery(function($) {

	$('.get-dialog').click( function() 
	{
		switch($(this).data('action'))
		{
			case 'set_pending' :
				$('#modal-dialog').modal('show').addClass('modal-warning');
				$('h4.modal-title').html('<i class="fa fa-question-circle"></i> Jadikan status pending?');
				$('span.modal-text').html("Ubah status surat ini menjadi status tertunda atau pending.");
				$('a#btn-action').attr('href', base_url + '/surat_keluar/set_verification/' + $(this).data('id') + '/pending').html('Iya');
				break;
			case 'set_aprove' :
				$('#modal-dialog').modal('show').addClass('modal-success');
				$('h4.modal-title').html('<i class="fa fa-question-circle"></i> Jadikan status approve?');
				$('span.modal-text').html("Ubah status surat ini menjadi status terverifikasi atau approve.");
				$('a#btn-action').attr('href', base_url + '/surat_keluar/set_verification/' + $(this).data('id') + '/approve').html('Iya');
				break;
			case 'delete':
				$('#modal-dialog').modal('show').addClass('modal-danger');
				$('h4.modal-title').html('<i class="fa fa-question-circle"></i> hapus?');
				$('span.modal-text').html("Hapus surat ini dari sistem.");
				$('a#btn-action').attr('href', base_url + '/surat_keluar/delete/' + $(this).data('id')).html('Hapus');
				break;
		}
	});

	// action Multiple Surat
	$('.get-delete-people-multiple').click( function() 
	{
		if( $('input[type=checkbox]').is(':checked') != '' ) 
		{
			$('#modal-delete-people-multiple').modal('show');
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
	
});


		// Enable pusher logging - don't include this in production
		Pusher.log = function(message) {
			if (window.console && window.console.log) {
				window.console.log(message);
			}
		};
		var pusher = new Pusher('1a905dd0d0ea1304adbd');
		var channel = pusher.subscribe('test_channel');
		channel.bind('my_event', function(data) {
			$.notify({
				message: data.message
			},{
				type: data.status,
				delay:81000,
					placement: {
				from: "top",
				//	align: "center"
				},
			});	
			audio.play();
/*			document.getElementById('event').innerHTML = data.message;
			alert(data.message);*/
		});

var source = base_path + "/sound/arpeggio.mp3"
var audio = document.createElement("audio");
audio.load()
audio.addEventListener("load", function() {
  audio.play();
}, true);
audio.src = source;

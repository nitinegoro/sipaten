/*!
* @author Vicky Nitinrgoro <pkpvicky@gmail.com>
* @package Jquery, Bootstraps JS, Tautocomplete, Bootstrap Notify
*/

$('input#generate-bilangan').keyup( function() 
{
     $.post( base_url + '/surat_keluar/generate_bilangan/', { angka: $(this).val() }, function(bilangan) 
     {
     	if(bilangan != false)
     		$('i#return-terbilang').html("Kurang lebih " + bilangan + " Meter Persegi");
     });
});
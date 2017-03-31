/*!
* @author Vicky Nitinrgoro <pkpvicky@gmail.com>
* @package Jquery, Bootstraps JS, Tautocomplete, Bootstrap Notify
*/
$(document).ready(function () {

	$('input#generate-bilangan').keyup( function() 
	{
	     $.post( base_url + '/surat_keluar/generate_bilangan/', { angka: $(this).val() }, function(bilangan) 
	     {
	     	if(bilangan != false)
	     		$('i#return-terbilang').html("Kurang lebih " + bilangan + " Meter Persegi");
	     });
	});

    var cari_pengikut = $("#cari-pengikut").tautocomplete({
        width: "700px",
        columns: ['NIK', 'NAMA', 'JNS KELAMIN','ALAMAT'],
        norecord: "NIK atau Nama tidak ditemukan!",
        placeholder: "Cari NIK / Nama penduduk ..",
        ajax: {
            url: base_url + "/create_surat/penduduk",
            type: "GET",
            data: function () {
                return [{ test: cari_pengikut.searchdata() }];
            },
            success: function (data) {
                            
                var filterData = [];

                var searchData = eval("/" + cari_pengikut.searchdata() + "/gi");

                $.each(data, function (i, v) {
                    if (v.nik.search(new RegExp(searchData)) != -1) {
                        filterData.push(v);
                    }
                    if (v.nama.search(new RegExp(searchData)) != -1) {
                        filterData.push(v);
                    }
                });
                return filterData;
            }
        },
        onchange: function () 
        {
            select_penduduk(cari_pengikut.id());
            alert('Ok');
            $("#cari-pengikut").val('ok');
        },
        onclick: function() {
        	alert('Ok');
        }
    });

});

function select_penduduk(param) 
{
	
}
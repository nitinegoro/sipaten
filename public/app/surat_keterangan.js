/*!
* @author Vicky Nitinrgoro <pkpvicky@gmail.com>
* @package Jquery, Bootstraps JS, Tautocomplete, Bootstrap Notify
*/

$(document).ready(function () {
    var input_cari_nik = $("#cari-nik").tautocomplete({
        width: "700px",
        columns: ['NIK', 'NAMA', 'JNS KELAMIN','ALAMAT'],
        norecord: "NIK atau Nama tidak ditemukan!",
        placeholder: "Cari NIK / Nama penduduk ..",
        ajax: {
            url: base_url + "/surat_keterangan/penduduk",
            type: "GET",
            data: function () {
                return [{ test: input_cari_nik.searchdata() }];
            },
            success: function (data) {
                            
                var filterData = [];

                var searchData = eval("/" + input_cari_nik.searchdata() + "/gi");

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
        onchange: function () {

            $("#cari-nik").attr('placeholder', input_cari_nik.text());

            $('input[name="nik"]').val(input_cari_nik.text());

            select_penduduk(input_cari_nik.id());
        }
    });


    /*!
    * Checklis Syarat Surat
    */
    $('input#log_surat_check').click( function() 
    {
        if($("#cari-nik").val() === '')
        {
            $.notify({
                title: '<strong><i class="fa fa-warning"></i> Perhatian!</strong><br>',
                message: "Mohon Masukkan NIK penduduk!"
            },{ 
                type: 'warning',
                animate: {
                    enter: 'animated bounce',
                    exit: 'animated bounceOut'
                },
                placement: {
                    from: "top",
                    align: "center"
                },
            });

            $(this).removeAttr('checked');
        } else {

        }
    });

    /*!
    * Button Save Histori
    */
    $('button#save-histori').click( function() 
    {
        if($("#cari-nik").val() === '')
        {
            $.notify({
                title: '<strong><i class="fa fa-warning"></i> Perhatian!</strong><br>',
                message: "Mohon Masukkan NIK penduduk, dan Persyaratan penerbitan surat!"
            },{ 
                type: 'warning',
                animate: {
                    enter: 'animated bounce',
                    exit: 'animated bounceOut'
                },
                placement: {
                    from: "top",
                    align: "center"
                },
            });
        } else {
            $('div#diaolo-save-history').modal('show');
        }
    });
});

function select_penduduk(param) 
{
    var category = $('input[name="kategori-surat"]').val();

    $.get( base_url + "/surat_keterangan/penduduk/" + param + '?surat=' + category, function( data ) 
    {
        $('td#data-nik').html(data.nik);
        $('td#data-nama').html(data.nama);
        $('td#data-tgl-lahir').html(data.tgl_lahir);
        $('td#data-jns-kelamin').html(data.jns_kelamin);
        $('td#data-alamat').html(data.alamat);

        $('td#data-agama').html(data.agama);
        $('td#data-status-kawin').html(data.status_kawin);
        $('td#data-kewarganegaraan').html(data.kewarganegaraan);

        $.each( data.syarat_surat, function( key, value ) 
        {
            $('input[type="checkbox"].syarat-' + value.id).attr('checked', true);
        });
    });
}



(function($) {


})(jQuery);
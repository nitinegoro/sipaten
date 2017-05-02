 <div class="row">
    <div class="col-md-12">
        <div class="box box-solid no-print">
            <div class="box-header with-border">
              	<h3 class="box-title">Pencarian Pengajuan Online</h3>
            </div>
            <form action="<?php echo current_url(); ?>" class="form-horizontal" method="get">
            <div class="box-body" style="padding-bottom: 20px;">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-2">
                        <label class="control-label">Nomor Pengajuan :</label>
                    </div>
                    <div class="col-md-6">
                        <div class="inner-addon left-addon">
                            <i class="fa fa-search"></i>
                            <input type="text" name="ID" value="<?php echo $this->input->get('ID') ?>" class="form-control" placeholder="Ex : PL-0105-03-2017" />
                        </div>                    
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo current_url(); ?>" class="btn btn-warning hvr-shadow pull-right"><i class="fa fa-times"></i> Reset</a>
                        <button type="submit" name="search" value="true" class="btn btn-warning hvr-shadow pull-left"><i class="fa fa-search"></i> Cari</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
 </div>
<?php  
/**
 * undocumented class variable
 *
 * @var string
 **/
if( $this->mode_searching  AND @$get->penduduk != NULL) :

    $mulai = new DateTime($get->waktu->mulai);
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-md-2 text-center">
                    <img src="<?php echo base_url("public/image/avatar.jpg"); ?>" alt="Gambar Pemohon" width="120">
                </div>
                <div class="col-md-4">
                    <table>
                        <tr>
                            <th>NIK </th><th width="30" class="text-center">:</th>
                            <td><?php echo $get->penduduk->nik; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap </th><th width="30" class="text-center">:</th>
                            <td><?php echo $get->penduduk->nama_lengkap; ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin </th><th width="30" class="text-center">:</th>
                            <td><?php echo $get->penduduk->jns_kelamin; ?></td>
                        </tr>
                        <tr style="vertical-align: top;">
                            <th>Alamat </th><th width="30" class="text-center">:</th>
                            <td><?php echo $get->penduduk->alamat; ?></td>
                        </tr>
                        <tr>
                            <th>Agama </th><th width="30" class="text-center">:</th>
                            <td><?php echo $get->penduduk->agama; ?></td>
                        </tr>
                        <tr>
                            <th>Pekerjaan </th><th width="30" class="text-center">:</th>
                            <td><?php echo $get->penduduk->pekerjaan; ?></td>
                        </tr>
                        <tr>
                            <th>Kewarganegaraan </th><th width="30" class="text-center">:</th>
                            <td><?php echo $get->penduduk->kewarganegaraan; ?></td>
                        </tr>
                    </table>        
                </div>
                <div class="col-md-6">
                    <table>
                        <tr>
                            <th>Nomor Pengajuan </th><th width="30" class="text-center">:</th>
                            <td><?php echo $get->ID_pelayanan; ?></td>
                        </tr>
                        <tr style="vertical-align: top;">
                            <th>Dokumen Pelayanan </th><th width="30" class="text-center">:</th>
                            <td><?php echo $get->dokumen; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal </th><th width="30" class="text-center">:</th>
                            <td><?php echo hari_ini($mulai->format('D')).", ".date_id(substr($get->waktu->mulai, 0, 10)) ?> <i><?php echo $mulai->format(' H:s A') ?></i></td>
                        </tr>
                    </table>        
                </div>
                <div class="col-md-4" style="padding-top: 20px;">
                    <button class="btn btn-app"><i class="fa fa-print"></i> Cetak</button>
                    <button class="btn btn-app"><i class="fa fa-times"></i> Tolak</button>
                    <button class="btn btn-app"><i class="fa fa-check-square-o"></i> Terima</button>
                </div>
            </div>
            <div class="box-body"> <hr>
                <div class="col-md-7">
                    <h4><i class="fa fa-angle-double-right"></i> Berkas Pemohon</h4>
                    <ul class="list-berkas">
                    <?php foreach($get->berkas as $key => $value) : ?>
                        <li>
                            <a href="">
                                <?php echo $this->rest_api->view_file( $value ) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-md-5">
                    <h4><i class="fa fa-angle-double-right"></i> Syarat Penerbitan Surat</h4>
                    <ol>
                        <?php foreach( $get->syarat as $row ) echo '<li>' . $row->nama_syarat . '</li>'; ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  else : 
    if( $this->input->get('search') == 'true') :
?>
<div class="col-md-6 col-md-offset-3">
    <div class="alert alert-warning animated shake">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong><i class="fa fa-warning"></i> Maaf!</strong> Data yang anda cari tidak ditemukan.
    </div>
</div>
<?php endif; 
endif;
/* End Get Data */  ?>
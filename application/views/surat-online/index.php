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
                        <button type="submit" class="btn btn-warning hvr-shadow pull-left"><i class="fa fa-search"></i> Cari</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
 </div>

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
                            <td></td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap </th><th width="30" class="text-center">:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin </th><th width="30" class="text-center">:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Alamat </th><th width="30" class="text-center">:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Agama </th><th width="30" class="text-center">:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Pekerjaan </th><th width="30" class="text-center">:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Kewarganegaraan </th><th width="30" class="text-center">:</th>
                            <td></td>
                        </tr>
                    </table>        
                </div>
                <div class="col-md-6">
                    <table>
                        <tr>
                            <th>Dokumen Pelayanan </th><th width="30" class="text-center">:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Tanggal </th><th width="30" class="text-center">:</th>
                            <td></td>
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

                </div>
                <div class="col-md-5">
                    <h4><i class="fa fa-angle-double-right"></i> Syarat Pengajuan</h4>
                    <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>A porro laudantium, aperiam voluptatibus!</li>
                        <li>Labore neque ex consequatur. Perferendis!</li>
                        <li>Totam incidunt excepturi adipisci quas!</li>
                        <li>Placeat, eligendi. Aspernatur, at, maxime.</li>
                        <li>Accusamus maxime placeat quas, omnis!</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
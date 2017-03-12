<div class="row">
	<div class="col-md-3">
        <div class="box box-solid">
            <div class="box-header with-border">
              	<h3 class="box-title">Statistik Kependudukan</h3>
            </div>
            <div class="box-body no-padding">
              	<ul class="nav nav-pills nav-stacked">
                	<li class="active"><a href="#">Populasi Penduduk Desa </a></li>
                	<li><a href="#">Jenis Kelamin</a></li>
                	<li><a href="#"> Status Perkawinan</a> </li>
                	<li><a href="#"> Agama</a></li>
                	<li><a href="#"> Warga Negara</a> </li>
                	<li><a href="#"> Golongan Darah</a></li>
              	</ul>
            </div>
        </div>
	</div>
	<div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body">
                <div id="chart-populasi-desa"></div>
            </div>
            <div class="box-header">
                <a href="<?php echo site_url('stats_people') ?>" class="btn btn-default btn-flat btn-sm"><i class="fa fa-print"></i> Cetak</a>
                <a href="<?php echo site_url('stats_people') ?>" class="btn btn-default btn-flat btn-sm"><i class="fa fa-download"></i> Ekspor</a>
            </div>
            <div class="box-body">
                <table class="table table-hover table-bordered col-md-12" style="margin-top: 10px;">
                    <thead class="bg-silver">
                        <tr>
                            <th rowspan="2" width="30">No. </th>
                            <th rowspan="2" class="text-center">Desa</th>
                            <th class="text-center" colspan="5">Jumlah</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th class="text-center">Laki-laki</th>
                            <th></th>
                            <th class="text-center">Perempuan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                <?php  
                /**
                 * Loop Data Desa
                 *
                 **/
                foreach($desa as $key => $value) :
                ?>
                        <tr>
                            <td><?php echo ++$key; ?>.</td>
                            <td><?php echo $value->nama_desa; ?></td>
                            <td><?php echo $this->stats_people->desa_population($value->id_desa); ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                <?php  
                endforeach;
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
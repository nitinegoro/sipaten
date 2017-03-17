<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Call Header Print (KOP)
 *
 * @author Vicky Nitinegoro <pkpvicky@gmail.com>
 **/
$this->load->view('print/header');

switch ($this->uri->segment(3)) :
	case 'desa':
?>
    <div class="content">
        <h5 class="upper text-center"><?php echo $title; ?></h5>
        <table class="table-bordered" style="width: 100%;">
        	<tr>
        		<th rowspan="2" width="30">No.</th>
        		<th rowspan="2">Desa / Kelurahan</th>
        		<th colspan="5">Jumlah</th>
        	</tr>
        	<tr>
        		<th>Semua</th>
        		<th colspan="2">Laki-laki</th>
        		<th colspan="2">Perempuan</th>
        	</tr>
                <?php  
                /**
                 * Loop Data Desa
                 *
                 **/
                $total = 0;

                $total_laki = 0;

                $total_laki_per = 0;

                $total_pr = 0;

                $total_pr_per = 0;                

                foreach($desa as $key => $value) :

                    $total += $this->stats_people->desa_population($value->id_desa);

                    $total_laki += $this->stats_people->desa_population($value->id_desa, 'laki-laki');

                    $total_laki_per += $this->stats_people->desa_population($value->id_desa, 'laki-laki', TRUE);

                    $total_pr += $this->stats_people->desa_population($value->id_desa, 'perempuan');

                    $total_pr_per += $this->stats_people->desa_population($value->id_desa, 'perempuan', TRUE);
                ?>
                <tr>
                	<td class="text-center"><?php echo ++$key; ?>.</td>
                	<td><?php echo $value->nama_desa; ?></td>
                    <td class="text-center"><?php echo $this->stats_people->desa_population($value->id_desa); ?></td>
                    <td class="text-center"><?php echo $this->stats_people->desa_population($value->id_desa, 'laki-laki'); ?></td>
                    <td class="text-center"><?php echo $this->stats_people->desa_population($value->id_desa, 'laki-laki', TRUE); ?>&#37;</td>
                    <td class="text-center"><?php echo $this->stats_people->desa_population($value->id_desa, 'perempuan'); ?></td>
                    <td class="text-center"><?php echo $this->stats_people->desa_population($value->id_desa, 'perempuan', TRUE); ?>&#37;</td>
                </tr>
                <?php  
                endforeach;
                ?>
                <tr>
                    <th colspan="2" class="text-right">Total : </th>
                    <th class="text-center"><?php echo $total; ?></th>
                    <th class="text-center"><?php echo $total_laki; ?></th>
                    <th class="text-center"><?php echo $total_laki_per; ?> %</th>
                    <th class="text-center"><?php echo $total_pr; ?></th>
                    <th class="text-center"><?php echo $total_pr_per; ?> %</th>
                </tr>
        </table>
    </div>
<?php
	break;
endswitch;

$this->load->view('print/footer');

/* End of file print-kependudukan.php */
/* Location: ./application/views/statistik/print-kependudukan.php */
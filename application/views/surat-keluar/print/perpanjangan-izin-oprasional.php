<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Call Header Print (KOP)
 *
 * @author Vicky Nitinegoro <pkpvicky@gmail.com>
 **/
$this->load->view('print/header');

$date = new DateTime($get->tanggal);

?>
    <div class="content">
        <div class="mail-heading">
            <h5 class="mail-name upper"><?php echo $get->judul_surat; ?> </h5> <br>
            <h5 class="mail-number">Nomor : <?php echo $get->kode_surat.'/<b>'.$get->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?></h5>
        </div>
        <div class="mail-content">
            <p class="indent">Berdasarkan Surat dari Pengelola <?php echo $isi->nama_lembaga; ?> Nomor : <?php echo $isi->no_surat_rek; ?> tanggal <?php echo date_id($isi->tgl_surat_rek); ?> perihal Pemohonan Rekomendasi Perpanjangan Izin Oprasional a.n :</p>
            <table style="margin-left:40px; margin-top: 10px; margin-bottom:10px;">
                <tr>
                    <td width="140">Nama Lembaga</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo strtoupper($isi->nama_lembaga); ?></strong></td>
                </tr>
                <tr>
                    <td>Nama Pengelola</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->nama_pengelola; ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>Alamat</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->alamat_lembaga.' Kec. '.$this->option->get('kecamatan').' Kab. '.$this->option->get('kabupaten'); ?></td>
                </tr>
            </table>
            <p class="indent">Dengan maksud mengajukan Permohonan Perpanjangan Izin Oprasional. Dan Pihak kami prinsipnya tidak keberatan untuk memberikan rekomendasi Perpanjangan Izin Oprasional <?php echo $isi->nama_lembaga; ?> sepanjang mematuhi dan mentaati segala peraturan dan perundang-undangan yang berlaku.</p>
            <p class="indent">Demikiaan, Surat Keterangan Baik ini dibuat untuk dapat dipergunakan sebagaimana mestinya. Atas perhatiannya diucapkan terima kasih.</p>
        </div>
        <div class="mail-footer">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 40%;"></td>
                    <td style="width: 20%;"></td>
                    <td style="width: 40%;" class="text-center">
                        <strong><?php echo ucfirst($this->option->get('kecamatan')) ?>, <?php echo date_id($get->tanggal); ?></strong><br>
                        <strong><?php echo $get->jabatan; ?></strong>
                    </td>
                </tr>
                <tr><td colspan="3" style="height: 70px;"></td></tr>
                <tr>
                    <td style="width: 40%;"></td>
                    <td style="width: 20%;"></td>
                    <td style="width: 40%;" class="text-center">
                        <span><?php echo ucfirst($get->nama); ?></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?php

$this->load->view('print/footer-surat');

/* End of file perpanjangan-izin-oprasional.php */
/* Location: ./application/views/surat-keluar/print/perpanjangan-izin-oprasional.php */
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
            <p class="indent">Berdasarkan Surat Keterangan Domisili dari Lurah / Kades <?php echo $isi->nama_desa; ?> Nomor : <?php echo $isi->no_surat_rek; ?> Tanggal <?php echo date_id($isi->tgl_surat_rek); ?> perihal Surat Keterangan Domisili a.n :</p>
            <table style="margin-left:40px; margin-top: 10px; margin-bottom:10px;">
                <tr>
                    <td width="80">Nama</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->nama_perusahaan; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->alamat_perusahaan; ?></td>
                </tr>
            </table>
            <p class="indent">Memperhatihan get tersebut diatas dan sepanjang sepengetahuan kami bahwa <?php echo $isi->nama_perusahaan; ?> memang benar beralamat di <?php echo $isi->alamat_perusahaan . ' '.ucfirst($isi->nama_desa); ?> Kecamatan <?php echo ucfirst($this->option->get('kecamatan')) ?> Kabupaten <?php echo ucfirst($this->option->get('kabupaten')) ?>.</p>
            <p class="indent">Demikiaan, Surat Keterangan Domisili ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
        </div>
        <div class="mail-footer">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 40%;"></td>
                    <td style="width: 20%;"></td>
                    <td style="width: 40%;" class="text-center">
                        <strong><?php echo ucfirst($this->option->get('kecamatan')) ?>, <?php echo date_id($get->tanggal); ?></strong><br>
                        <strong style="line-height: 20px;">a.n CAMAT <?php echo strtoupper($this->option->get('kecamatan')) ?>,</strong><br>
                        <strong><?php echo $get->jabatan; ?></strong>
                    </td>
                </tr>
                <tr><td colspan="3" style="height: 40px;"></td></tr>
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

/* End of file domisili-perusahaan.php */
/* Location: ./application/views/surat-keluar/print/domisili-perusahaan.php */
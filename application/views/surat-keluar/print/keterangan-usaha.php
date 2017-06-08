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
            <p>Yang bertanda tangan di bawah ini :</p>
            <table style="margin-left:40px; margin-top: 10px; margin-bottom:20px;">
                <tr>
                    <td width="130">NAMA</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo $isi->pejabat_lurah; ?></strong></td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo $isi->nip_pejabat_lurah; ?></strong></td>
                </tr>
                <tr>
                    <td>JABATAN</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo $isi->jabatan_pejabat_lurah; ?></strong></td>
                </tr>
            </table>
            <p>Menerangkan dengan sesungguhnya bahwa :</p>
            <table style="margin-left:40px; margin-top: 10px; margin-bottom:20px;">
                <tr>
                    <td width="130">Nama</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo $get->nama_lengkap; ?></strong></td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($get->tmp_lahir).', '.date_id($get->tgl_lahir); ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($get->agama); ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($get->pekerjaan); ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>Alamat</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->alamat.' RT.'.$get->rt.' RW.'.$get->rw.' Kelurahan '.$get->nama_desa.' Kec. '.$this->option->get('kecamatan').' Kab. '.$this->option->get('kabupaten'); ?></td>
                </tr>
            </table>
            <p>Nama tersebut diatas memang benar mempunyai usaha <strong><?php echo $isi->nama_usaha; ?></strong> yang beralamat di <?php echo $isi->alamat_usaha; ?>.</p>
            <p>Demikiaan, Surat Keterangan Usaha ini dibuat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya.</p>
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

/* End of file keterangan-usaha.php */
/* Location: ./application/views/surat-keluar/print/keterangan-usaha.php */
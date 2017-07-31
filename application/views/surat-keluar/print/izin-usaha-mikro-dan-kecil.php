<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Call Header Print (KOP)
 *
 * @author Vicky Nitinegoro <pkpvicky@gmail.com>
 **/
$this->load->view('print/header');

$date = new DateTime($get->tanggal);

if( $get->id_desa != FALSE )
{
    $desa = $this->option->get_select_desa($get->id_desa, 'nama_desa');
    $kepala = $this->option->village_prefix( $get->desa )['j'];
} else {
    $desa = @$get->desa;
    $kepala = '';
}
?>
    <div class="content">
        <div class="mail-heading" style="margin-bottom: 20px;">
            <h5 class="mail-name upper"><?php echo $get->judul_surat; ?> </h5> <br>
            <h5 class="mail-number upper">Nomor SIUP : <?php echo $get->kode_surat.'/<b>'.$get->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?></h5>
        </div>
        <div class="mail-content">
            <table>
                <tr style="vertical-align: top;">
                    <td width="60">DASAR</td>
                    <td class="text-center">:</td>
                    <td>
                        <ol style=" margin-top: -11px;">
                            <li style="padding-left: 5px;">Peraturan Presiden No. 98 Tahun 2014 tentang Perizinan Untuk Usaha Mikro dan Kecil.</li>
                            <li style="padding-left: 5px;">Peraturan Mentri Dalam Negri No. 83 Tahun 2014 tentang Pedoman Pemberian Izin Usaha Mikro dan Kecil.</li>
                            <li style="padding-left: 5px;">Peraturan Bupati Bangka Nomor 38 Tahun 2015 tentang Perubahan atas Peraturan Bupati Nomor 29 Tahun 2012 tentang Pelimpahan Sebagian Kewenangan Bupati Kepada Camat.</li>
                        </ol>
                    </td>
                </tr>
            </table>
            <p> Menyatakan dan Memberikan Izin Kepada :</p>
            <table style="margin-bottom:5px;">
                <tr>
                    <td width="170">NAMA</td>
                    <td class="text-center" width="30">:</td>
                    <td><strong><?php echo strtoupper($get->nama_lengkap); ?></strong></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->nik; ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>ALAMAT</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->alamat.' RT.'.$get->rt.' RW.'.$get->rw.' '.$kepala.' '.$get->nama_desa; ?></td>
                </tr>
                <tr>
                    <td>NOMOR TELEPON / HP</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->telepon; ?></td>
                </tr>
            </table>
            <p class="text-center" style="text-align:center;">Untuk mendirikan Usaha Mikro Kecil yang mencakup perizinan dasar berupa : <br>Menempati Lokasi / Domisili, melakukan kegiatan usaha baik produksi maupun penjualan barang dan jasa, dengan identitas :</p>
            <table style="margin-top: 5px; margin-bottom:5px;">
                <tr>
                    <td width="170">NAMA PERUSAHAAN</td>
                    <td class="text-center" width="30">:</td>
                    <td><?php echo $isi->nama_perusahaan; ?></td>
                </tr>
                <tr>
                    <td>BENTUK PERUSAHAAN</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->bentuk_perusahaan; ?></td>
                </tr>
                <tr>
                    <td>NPWP</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->npwp; ?></td>
                </tr>
                <tr>
                    <td>KEGIATAN USAHA</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->kegiatan_usaha; ?></td>
                </tr>
                <tr>
                    <td>SARANA USAHA</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->sarana_usaha; ?></td>
                </tr>
                <tr>
                    <td>ALAMAT USAHA</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->alamat_perusahaan; ?></td>
                </tr>
                <tr>
                    <td>JUMLAH MODAL USAHA</td>
                    <td class="text-center">:</td>
                    <td>Rp. <?php echo number_format($isi->jml_modal_usaha) ?>,-</td>
                </tr>
                <tr>
                    <td>NOMOR PENDAFTARAN</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->no_pendaftaran; ?></td>
                </tr>
            </table>
        </div>
        <div class="mail-footer">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 40%;"></td>
                    <td style="width: 20%;"></td>
                    <td style="width: 40%;" class="text-center">
                        <strong><?php echo ucfirst($this->option->get('kecamatan')) ?>, <?php echo date_id($get->tanggal); ?></strong><br>
                        <?php if($get->jabatan != 'CAMAT') : ?>
                        <strong>a.n. CAMAT <?php echo strtoupper($this->option->get('kecamatan')) ?></strong><br>
                        <?php endif; ?>
                        <strong><?php echo $get->jabatan; ?></strong>
                    </td>
                </tr>
                <tr><td colspan="3" style="height: 70px;"></td></tr>
                <tr>
                    <td style="width: 40%;"></td>
                    <td style="width: 20%;"></td>
                    <td style="width: 40%;" class="text-center">
                        <strong style="border-bottom: 0.2px solid #444; padding-bottom: 1.5px;"><?php echo ucfirst($get->nama); ?></strong><br>
                        <strong style=" line-height: 2px;"><?php echo ucfirst($get->pangkat); ?></strong><br>
                        <strong>NIP. <?php echo $get->nip; ?></strong>
                    </td>
                </tr>
            </table>
        </div>
        <div class="push">
            <small><strong><?php echo $this->option->get('nama_sistem') ?></strong></small> <br>
            <small>Motto : <?php echo $this->option->get('motto') ?></small> <br>
            <small>Janji pelayanan : <?php echo $this->option->get('janji_pelayanan') ?></small>
        </div>
    </div>
<?php

$this->load->view('print/footer-surat');

/* End of file domisili-perusahaan.php */
/* Location: ./application/views/surat-keluar/print/domisili-perusahaan.php */
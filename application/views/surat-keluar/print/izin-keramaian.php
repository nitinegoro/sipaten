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
            <h5 class="mail-name upper">Surat rekomendasi camat <?php echo $this->option->get('kecamatan'); ?></h5> <br>
            <h5 class="mail-number">Nomor : <?php echo $get->kode_surat.'/<b>'.$get->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?></h5>
        </div>
        <div class="mail-heading" style="margin-bottom:10px;">
            <h5 class="mail-number upper">Tentang</h5> <br>
            <h5 class="mail-number upper">izin keramaian</h5>
        </div>
        <div class="mail-content">
            <p class="indent">Memperhatikan Surat Pengantar dari Lurah <?php echo $this->option->get_select_desa($isi->desa, 'nama_desa'); ?> Kecamatan <?php echo $this->option->get('kecamatan'); ?> Nomor : <?php echo $isi->no_surat_rek; ?> tanggal <?php echo date_id($isi->tgl_surat_rek); ?>, dengan ini Camat  <?php echo $this->option->get('kecamatan'); ?> menerangkan bahwa :</p>
            <table style="margin-top: 10px; margin-bottom:10px;">
                <tr>
                    <td width="170">NAMA</td>
                    <td class="text-center" width="20">:</td>
                    <td><strong><?php echo strtoupper($get->nama_lengkap); ?></strong></td>
                </tr>
                <tr>
                    <td>TEMPAT, TANGGAL LAHIR</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($get->tmp_lahir).', '.date_id($get->tgl_lahir); ?></td>
                </tr>
                <tr>
                    <td>JENIS KELAMIN</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->jns_kelamin); ?></td>
                </tr>
                <tr>
                    <td>PEKERJAAN</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($get->pekerjaan); ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>ALAMAT</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->alamat.' RT.'.$get->rt.' RW.'.$get->rw.' Kelurahan '.$get->nama_desa.' Kec. '.$this->option->get('kecamatan').' Kab. '.$this->option->get('kabupaten'); ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>KEPERLUAN</td>
                    <td class="text-center">:</td>
                    <td>Mengurus Izin Keramaian dalam rangka <strong>"<?php echo $isi->keperluan; ?>"</strong> yang akan diselenggarakan : 
                    <table style="margin-top: 10px; margin-bottom:10px;">
                        <tr>
                            <td width="50">Hari</td>
                            <td class="text-center" width="30">:</td>
                            <td><?php echo $isi->hari; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td class="text-center">:</td>
                            <td><?php echo date_id($isi->tanggal); ?></td>
                        </tr>
                        <tr>
                            <td>Pukul</td>
                            <td class="text-center">:</td>
                            <td><?php echo $isi->waktu; ?></td>
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td class="text-center">:</td>
                            <td><?php echo $isi->tempat.' Kelurahan '.$this->option->get_select_desa($isi->desa, 'nama_desa').' Kec. '.$this->option->get('kecamatan').' Kab. '.$this->option->get('kabupaten'); ?></td>
                        </tr>
                        <tr style="vertical-align: top;">
                            <td>Hiburan</td>
                            <td class="text-center">:</td>
                            <td><?php echo $isi->hiburan ?></td>
                        </tr>
                    </table>
                    </td>
                </tr>
            </table>
            <p class="indent">Pada prinsipnya kami tidak keberatan atas penyelenggaraan kegiatan tersebut dengan ketentuan sebagai berikut :
                <ol style="margin-left: -10px;line-height: 1.5; font-size: 12px;">
                    <li style="padding-left: 5px;">Harus menjaga ketertiban dan keamanan setempat.</li>
                    <li style="padding-left: 5px;">Harus menjaga kebersihan lokasi.</li>
                    <li style="padding-left: 5px;">Melaporkan kepada Dinas/Instansi terkait sebelum maupun akan berakhirnya keramaian dimaksud.</li>
                    <li style="padding-left: 5px;">Agar berkoordinasi dengan aparat setempat.</li>
                    <li style="padding-left: 5px;">Harus mentaati peraturan perundang-undangan, peraturan daerah dan norma-norma yang berlaku.</li>
                </ol>
            </p>
        </div>
        <div class="mail-footer">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 40%;"></td>
                    <td style="width: 20%;"></td>
                    <td style="width: 40%;" class="text-center">
                        <strong><?php echo ucfirst($this->option->get('kecamatan')) ?>, <?php echo date_id($get->tanggal); ?></strong><br>
                        <strong>An. Camat <?php echo ucfirst($this->option->get('kecamatan')) ?></strong><br>
                        <strong><?php echo $get->jabatan; ?></strong>
                    </td>
                </tr>
                <tr><td colspan="3" style="height: 70px;"></td></tr>
                <tr>
                    <td style="width: 40%;"></td>
                    <td style="width: 20%;"></td>
                    <td style="width: 40%;" class="text-center">
                        <span><?php echo ucfirst($get->nama); ?></span><br>
                        <span>NIP. <?php echo $get->nip; ?></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?php

$this->load->view('print/footer-surat');

/* End of file kelakuan-baik.php */
/* Location: ./application/views/surat-keluar/print/kelakuan-baik.php */
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
            <p class="indent">
            Yang bertanda tangan di bawah ini Kepala Desa/Kelurahan : <strong><?php echo strtoupper($isi->nama_desa); ?></strong> <?php echo $this->option->get('kecamatan').' Kab. '.$this->option->get('kabupaten'); ?>, menerangkan dengan sebenarnya bahwa :
            </p>
            <table style=" margin-top: 10px; margin-bottom:10px;">
                <tr>
                    <td width="140">Nama</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo strtoupper($get->nama_lengkap); ?></strong></td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($get->tmp_lahir).', '.date_id($get->tgl_lahir); ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->jns_kelamin); ?></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->nik; ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>Alamat Tinggal</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->alamat.' RT.'.$get->rt.' RW.'.$get->rw.' Kelurahan '.$get->nama_desa.' Kec. '.$this->option->get('kecamatan').' Kab. '.$this->option->get('kabupaten'); ?></td>
                </tr>
                <tr>
                    <td>Telepon/HP</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->telepon; ?></td>
                </tr>
            </table>
            <p>Sedang / akan melakukan kegiatan usaha perdagangan/industri sebagai berikut :</p>
            <table style="margin-top: 10px; margin-bottom:10px;">
                <tr>
                    <td width="230">1. Nama Perusahaan/Perorangan</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo strtoupper($isi->nama_perusahaan); ?></strong></td>
                </tr>
                <tr  style="vertical-align: top;">
                    <td>2. Alamat</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->alamat_perusahaan.' Kelurahan '.$get->nama_desa.' Kec. '.$this->option->get('kecamatan').' Kab. '.$this->option->get('kabupaten'); ?></td>
                </tr>
                <tr>
                    <td>3. Kedudukan dalam Perusahaan</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->kedudukan; ?></td>
                </tr>
                <tr style="vertical-align: top">
                    <td>4. Bentuk Perusahaan</td>
                    <td class="text-center">:</td>
                    <td>Milik Sendiri / Sewa / Kontrak / Pinjam Pakai</td>
                </tr>
                <tr style="vertical-align: top">
                    <td>5. Bidang Usaha</td>
                    <td class="text-center">:</td>
                    <td>Milik Sendiri / Sewa / Kontrak / Pinjam Pakai</td>
                </tr>
                <tr style="vertical-align: top">
                    <td>6. Kegiatan Usaha</td>
                    <td class="text-center">:</td>
                    <td>Milik Sendiri / Sewa / Kontrak / Pinjam Pakai</td>
                </tr>
                <tr style="vertical-align: top">
                    <td>7. Jenis Barang Dagangan Utama</td>
                    <td class="text-center">:</td>
                    <td>
                        <ul style="list-style: lower-alpha; margin: 0px; margin-left: -25px;">
                            <li><?php echo $isi->jenis_barang_dagang->a; ?></li>
                            <li><?php echo $isi->jenis_barang_dagang->b; ?></li>
                            <li><?php echo $isi->jenis_barang_dagang->c; ?></li>
                        </ul>
                    </td>
                </tr>
                <tr style="vertical-align: top">
                    <td>8. Modal Usaha</td>
                    <td class="text-center">:</td>
                    <td>Rp. <?php echo number_format($isi->modal_usaha); ?>,-</td>
                </tr>
                <tr style="vertical-align: top">
                    <td>9. Jumlah Tenaga Kerja yang dibayar</td>
                    <td class="text-center">:</td>
                    <td>
                        <ul style="list-style: lower-alpha; margin: 0px; margin-left: -25px;">
                            <li>Laki-laki : <?php echo $isi->jenis_barang_dagang->a; ?> Orang</li>
                            <li>Wanita &nbsp;&nbsp;: <?php echo $isi->jenis_barang_dagang->b; ?> Orang</li>
                        </ul>
                    </td>
                </tr>
                <tr style="vertical-align: top">
                    <td>10. Pendidikan tenaga kerja yang</td>
                    <td class="text-center">:</td>
                    <td>
                        <ul style="list-style: lower-alpha; margin: 0px; margin-left: -25px;">
                            <li>Laki-laki : <?php echo $isi->jenis_barang_dagang->a; ?> Orang</li>
                            <li>Wanita &nbsp;&nbsp;: <?php echo $isi->jenis_barang_dagang->b; ?> Orang</li>
                        </ul>
                    </td>
                </tr>
                <tr style="vertical-align: top">
                    <td>11. Status Hak Atas Tanah</td>
                    <td class="text-center">:</td>
                    <td>Milik Sendiri / Sewa / Kontrak / Pinjam Pakai</td>
                </tr>
                <tr style="vertical-align: top">
                    <td>12. Bagi mereka yang tempat usahanya bukan milik sendiri</td>
                    <td class="text-center">:</td>
                    <td>
                        <ul style="list-style: lower-alpha; margin: 0px; margin-left: -25px;">
                            <li>Nama Pemilik Tanah : <?php echo $isi->nama_pemilik_tanah; ?></li>
                            <li>Alamat Pemilik Tanah : <?php echo $isi->alamat_pemilik; ?></li>
                            <li>Perjanjian Sewa / kontak : Ada / Tidak / Pinjam</li>
                            <li>Jangka waktu perjanjian sewa : <?php echo ($isi->jangka_tahun != '') ? $isi->jangka_tahun : '..........' ?> Tahun, dari tanggal <?php echo ($isi->jangka_mulai != '') ? date_id($isi->jangka_mulai) : '.....................' ?> s/d <?php echo ($isi->jangka_akhir != '') ? date_id($isi->jangka_akhir) : '.....................' ?></li>
                        </ul>
                    </td>
                </tr>
                <tr style="vertical-align: top">
                    <td>9. Bagi mereka yang tempat usahanya bukan milik sendiri</td>
                    <td class="text-center">:</td>
                    <td>
                        <ul style="list-style: lower-alpha; margin: 0px; margin-left: -25px;">
                            <li>Nama Pemilik Tanah : <?php echo $isi->nama_pemilik_tanah; ?></li>
                            <li>Alamat Pemilik Tanah : <?php echo $isi->alamat_pemilik; ?></li>
                            <li>Perjanjian Sewa / kontak : Ada / Tidak / Pinjam</li>
                            <li>Jangka waktu perjanjian sewa : <?php echo ($isi->jangka_tahun != '') ? $isi->jangka_tahun : '..........' ?> Tahun, dari tanggal <?php echo ($isi->jangka_mulai != '') ? date_id($isi->jangka_mulai) : '.....................' ?> s/d <?php echo ($isi->jangka_akhir != '') ? date_id($isi->jangka_akhir) : '.....................' ?></li>
                        </ul>
                    </td>
                </tr>
                <tr style="vertical-align: top">
                    <td>10. Keterangan lain-lain</td>
                    <td class="text-center">:</td>
                    <td>Kegiatan tersebut tidak / perlu SIG / HO</td>
                </tr>
                <tr style="vertical-align: top">
                    <td>11. Site Plan dan Gambar Situasi</td>
                    <td class="text-center">:</td>
                    <td>Lampiran</td>
                </tr>
            </table>
            <p class="indent">Atas permohonan tersebut, kami menyatakan bahwa tanah yang dimohonkan IMB benar-benar milik pemohon serta tidak terdapat suatu masalah atau tidak dalam sengketa tanah/bangunan.</p>
            <p class="indent">Demikian Surat Keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
        </div>
        <div class="mail-footer">
            <table style="width: 100%;" align="center">
                <tr>
                    <td style="width: 40%;"></td>
                    <td style="width: 20%;"></td>
                    <td style="width: 40%;" class="text-center">
                         <?php echo strtoupper($this->option->get('kecamatan')) ?>, <?php echo date_id($get->tanggal); ?> <br>
                        <strong style="line-height: 20px;">a.n CAMAT <?php echo strtoupper($this->option->get('kecamatan')) ?>,</strong><br>
                        <strong><?php echo $get->jabatan; ?></strong>
                    </td>
                </tr>
                <tr><td colspan="3" style="height: 40px;"></td></tr>
                <tr>
                    <td style="width: 40%;"><span></span></td>
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
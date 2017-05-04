<table class="table table-bordered">
    <tbody>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3">Kelurahan / Desa </td>
        </tr>
        <tr style="vertical-align: top">
            <td width="180"><strong>Desa</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->desa; ?></td>
        </tr>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3">Ketarangan Perusahaan</td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Nama Perusahaan </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->nama_perusahaan; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Alamat </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->alamat_perusahaan; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Kedudukan dalam Perusahaan </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->kedudukan; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Bentuk Perusahaan </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->bentuk_perusahaan; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Bidang Usaha </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->bidang_usaha; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Kegiatan Usaha  </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->kegiatan_usaha; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Jenis Barang Dagangan Utama  </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td>- <?php echo @$get->isi->jenis_barang_a; ?> <br>- <?php echo @$get->isi->jenis_barang_b; ?> <br> - <?php echo @$get->isi->jenis_barang_c; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Modal Usaha</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td>Rp. <?php echo @number_format($get->isi->modal_usaha); ?>.00 -</td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Jumlah tenaga kerja yang dibayar  </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->jumlah_tenaga_laki.' (Laki-laki)'; ?> <br><?php echo @$get->isi->jumlah_tenaga_perempuan.' (Perempuan)'; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Pendidikan tenaga kerja yang  </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td>
                <table class="table table-bordered">
                    <tr>
                        <td></td>
                        <td colspan="2"><strong>Laki-laki</strong></td>
                        <td colspan="2"><strong>Perempuan</strong></td>
                    </tr>
                    <tr>
                        <td width="40"><strong>SD</strong></td>
                        <td style="width:10px;" class="text-center">:</td>
                        <td></td>
                        <td width="100"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="40"><strong>SLTP</strong></td>
                        <td style="width:10px;" class="text-center">:</td>
                        <td></td>
                        <td width="100"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="40"><strong>SLTA</strong></td>
                        <td style="width:10px;" class="text-center">:</td>
                        <td></td>
                        <td width="100"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="40"><strong>D3</strong></td>
                        <td style="width:10px;" class="text-center">:</td>
                        <td></td>
                        <td width="100"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="40"><strong>S1</strong></td>
                        <td style="width:10px;" class="text-center">:</td>
                        <td></td>
                        <td width="100"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="40"><strong>S2</strong></td>
                        <td style="width:10px;" class="text-center">:</td>
                        <td></td>
                        <td width="100"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="40"><strong>S3</strong></td>
                        <td style="width:10px;" class="text-center">:</td>
                        <td></td>
                        <td width="100"></td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Nama Pemilik Tanah  </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->nama_pemilik_tanah; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Alamat Pemilik Tanah   </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->alamat_pemilik_tanah; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Jangka Waktu (Kontrak)   </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo (@$get->isi->jangka_waktu) ? $get->isi->jangka_waktu.' Tahun' : ''; ?></td>
        </tr>
    </tbody>
</table>
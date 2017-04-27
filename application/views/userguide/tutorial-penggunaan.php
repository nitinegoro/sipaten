<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('userguide/parent-navigation', $this->data);

?>
   <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body box-userguide">
            	<h4>Tutorial Penggunaan</h4>
				<p>Terkait Proses Sistem Tempayan Bekerja :</p>
				<ul class="list-userguide">
					<li><a href="<?php echo site_url('userguide/tutorial/proses-1.php') ?>">Bagaimana Membuat Surat Non Perizinan?</a></li>
					<li><a href="">Bagaimana Membuat Surat Perizinan?</a></li>
					<li><a href="">Bagaimana Saya memverifikasi sebuah Surat yang diajukan oleh Staff Pelayanan?</a></li>
					<li><a href="">Dimana Saya melihat surat yang pernah Saya ajukan atau periksa?</a></li>
					<li><a href="">Surat yang Saya ajukan terdapat kesalahan data, apa yang harus saya lakukan?</a></li>
					<li><a href="">Saya tidak mendapatkan pemberitahuan dari Petugas verifikasi?</a></li>
				</ul>
				<p>Umpan-balik terhadap Pelayanan :</p>
				<ul class="list-userguide">
					<li><a href="">Seberapa baikkah pelayan hari ini?</a></li>
					<li><a href="">Saya ingin melihat rekam jejak sebuah surat?</a></li>
					<li><a href="">Surat apa yang paling sering diajukan oleh penduduk?</a></li>
				</ul>
				<p>Laporan dan Hasil Data :</p>
				<ul class="list-userguide">
					<li><a href="">Saya ingin mencetak Surat yang keluar pada hari ini?</a></li>
					<li><a href="">Format laporan Surat Keluar yang inginkan tidak sesuai, bagaiman Saya merubahnya?</a></li>
					<li><a href="">Seberapa banyak penduduk yang melakukan transaksi kepada kami?</a></li>
				</ul>
				<p>Privasi, KIOSK (<i>Mesin Penilaian</i>) dan Pengaturan :</p>
				<ul class="list-userguide">
					<li><a href="">Saya merasa Kata Sandi saya tidak aman lagi, dimana saya menggantinya?</a></li>
					<li><a href="">Saya ingin menjadikan salah satu petugas pelayanan menjadi petugas pemeriksa.</a></li>
					<li><a href="">Bagaimana menambahkan pengguna aplikasi?</a></li>
					<li><a href="">Saya ingin memblokir salah satu fitur kepada kepada petugas pelayanan.</a></li>
					<li><a href="">Bagaimana merubah pertanyaan pada Mesin Penilaian berserta jawabannya?</a></li>
				</ul>
            </div>
        </div>
    </div>
</div>

<?php
/* End of file tutoria-penggunaan.php */
/* Location: ./application/views/userguide/tutoria-penggunaan.php */
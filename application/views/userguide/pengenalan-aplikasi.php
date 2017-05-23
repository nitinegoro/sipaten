<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('userguide/parent-navigation', $this->data);

?>
   <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body box-userguide">
            	<h4>Pengenalan Aplikasi</h4>
				<ul>
<!-- 					<li>
	<strong>Alur Sistem Informasi Tempayan</strong><br>
	<img src="<?php echo base_url("public/image/userguide/alur-tempayan.jpg"); ?>" class="img-responsive" alt="Alur Sistem Informasi tempayan">
	<i>Keterangan</i> : <br>
	<ol>
		<li>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, unde, illum? Reiciendis quo, vitae voluptas excepturi autem quaerat quia sapiente.</p>
		</li>
		<li>
			<p>Ipsam unde quae consectetur itaque animi? Aspernatur enim, distinctio sapiente cum autem facere harum ad cupiditate, modi aliquid quaerat odit.</p>
		</li>
		<li>
			<p>Maiores quidem quibusdam, est et! Deleniti quo est, sequi odio quisquam ut sint nemo provident sapiente inventore culpa consequatur itaque.</p>
		</li>
	</ol>
</li> -->
					<li>
						<strong>Tata Letak dan Menu Navigasi</strong>
						<p><strong>Tata Letak</strong> <br>Sistem Informasi Tempayan Memiliki 4 pengelempokkan tata letak.</p>
						<ol>
							<li>Header (Kepala)</li>
							<li>Navigasi (Utama)</li>
							<li>Konten</li>
							<li>Footer (Kaki)</li>
						</ol>
						<p><strong>Menu Navigasi</strong> <br>Sistem Informasi Tempayan Memiliki 2 Navigasi Menu yaitu Navigasi Utama dan Navigasi Bar.</p>
						<ol>
							<li><strong>Navigasi Utama</strong> <br>
								<p>Navigasi Utama adalah menu yang terletak pada sisi kiri Aplikasi meliputi :
								<ul>
									<li>Dashboard</li>
									<li>Surat Non Perizinan</li>
									<li>Surat Perizinan</li>
									<li>Cek Pengajuan Online</li>
									<li>Data Surat Keluar</li>
									<li>Analisa Pelayanan</li>
									<li>Master Data</li>
									<li>Statistik</li>
									<li>Pengaturan</li>
									<li>Panduan Sistem</li>
								</ul>
								</p>
							</li>
							<li><strong>Navigasi Bar</strong><br>
								<p>Navigasi Bar adalah menu yang berupa icon-icon yang teerletak disudut kanan atas Aplikasi meliputi :
									<ul>
										<li><strong class="text-orange"><i class="ion-help-circled"></i></strong> : Pengaktif panduan aplikasi</li>
										<li><strong class="text-orange"><i class="glyphicon glyphicon-user"></i></strong> : Pengaturan Login</li>
										<li><strong class="text-orange"><i class="fa fa-power-off"></i></strong> : Keluar dari Sistem</li>
									</ul>
								</p>
							</li>
						</ol>
					</li>
				</ul>
            </div>
        </div>
    </div>
</div>

<?php
/* End of file pengenalan-aplikasi.php */
/* Location: ./application/views/userguide/pengenalan-aplikasi.php */
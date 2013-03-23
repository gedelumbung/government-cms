<div id="content-center">
<div id="box-title"><?php echo $nama_sekolah; ?></div>
	<div id="box-index">+ INDEXS - <?php echo $nama_sekolah; ?></div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	
	<?php echo $dt_data_sekolah; ?>
	
	<div class="cleaner_h20"></div>
	
	<div id="dashboard-icon">
		<a href="<?php echo base_url(); ?>web/data_guru/sekolah/<?php echo $id_sekolah; ?>">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/guru-icon.png" border="0" />
		</a>
		<div class="cleaner_h0"></div>
		DATA PTK / GURU
	</div>
	
	<div id="dashboard-icon">
		<a href="<?php echo base_url(); ?>web/galeri_sekolah/sekolah/<?php echo $id_sekolah; ?>">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/galeri-icon.png" border="0" />
		</a>
		<div class="cleaner_h0"></div>
		GALERI SEKOLAH
	</div>
	
	<div id="dashboard-icon">
		<a href="<?php echo base_url(); ?>web/artikel_sekolah/sekolah/<?php echo $id_sekolah; ?>">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/artikel-icon.png" border="0" />
		</a>
		<div class="cleaner_h0"></div>
		ARTIKEL SEKOLAH
	</div>
	
	<div id="dashboard-icon">
		<a href="<?php echo base_url(); ?>web/data_siswa/sekolah/<?php echo $id_sekolah; ?>">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/siswa-icon.png" border="0" />
		</a>
		<div class="cleaner_h0"></div>
		DATA PESERTA DIDIK
	</div>
	
</div>

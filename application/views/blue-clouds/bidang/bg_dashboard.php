<div id="content-center">
<div id="box-title">BIDANG <?php echo $bidang; ?></div>
	<div id="box-index">+ INDEXS BIDANG <?php echo $bidang; ?></div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	
	<div id="dashboard-icon">
		<a href="<?php echo base_url(); ?>web/berita_dinas/get/<?php echo $id_super_bidang; ?>">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/berita-icon.png" border="0" />
		</a>
		<div class="cleaner_h0"></div>
		BERITA DINAS
	</div>
	<div id="dashboard-icon">
		<a href="<?php echo base_url(); ?>web/pengumuman_dinas/get/<?php echo $id_super_bidang; ?>">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/pengumuman-icon.png" border="0" />
		</a>
		<div class="cleaner_h0"></div>
		PENGUMUMAN
	</div>
	<div id="dashboard-icon">
		<a href="<?php echo base_url(); ?>web/agenda_dinas/get/<?php echo $id_super_bidang; ?>">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/agenda-icon.png" border="0" />
		</a>
		<div class="cleaner_h0"></div>
		AGENDA DINAS
	</div>
	<div id="dashboard-icon">
		<a href="<?php echo base_url(); ?>web/list_download_dinas/get/<?php echo $id_super_bidang; ?>">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/download-icon.png" border="0" />
		</a>
		<div class="cleaner_h0"></div>
		LIST DOWNLOAD
	</div>
	
</div>

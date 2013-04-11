<div id="content-center-large">
	<div class="cleaner_h0" style="text-align:right">
	Welcome, <strong><?php echo $this->session->userdata('nama_user_login'); ?>.</strong> | Your privilages as, <strong><?php echo $this->session->userdata('tipe_user'); ?>.</strong> | Unit Kerja : <?php echo $this->session->userdata('unit_kerja'); ?>.</strong></div>
	<div class="cleaner_h20"></div>
<div id="box-title">DASHBOARD</div>
	<div id="box-index">+ INDEXS DASHBOARD - PENGAWAS SEKOLAH</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>pengawas/berita">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/berita-icon.png" width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		BERITA PENGAWAS
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>pengawas/artikel">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/berita-icon.png" width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		ARTIKEL PENGAWAS
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>pengawas/agenda">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/agenda-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		AGENDA PENGAWAS
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>pengawas/pengumuman">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/pengumuman-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		PENGUMUMAN PENGAWAS
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>pengawas/list_download">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/download-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		LIST DOWNLOAD
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>pengawas/profil">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/profil-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		PROFIL USER
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>pengawas/password">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/maintenance-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		PASSWORD
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>auth/user_login/logout">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/delete-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		LOG OUT
	</div>
</div>

</div>
<div class="cleaner_h60"></div>
</div>
<div class="cleaner_h0"></div>
</div>


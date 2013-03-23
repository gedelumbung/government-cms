<div id="content-center-large">
	<div class="cleaner_h0" style="text-align:right">
	Welcome, <strong><?php echo $this->session->userdata('nama_user_login'); ?>.</strong> | Your privilages as, <strong><?php echo $this->session->userdata('tipe_user'); ?>.</strong> | Bidang : <?php echo $this->session->userdata('bidang'); ?>.</strong></div>
	<div class="cleaner_h20"></div>
<div id="box-title">DASHBOARD</div>
	<div id="box-index">+ INDEXS DASHBOARD - ADMIN DINAS</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>admin_dinas/berita_dinas">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/berita-icon.png" width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		BERITA DINAS
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>admin_dinas/agenda_dinas">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/agenda-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		AGENDA DINAS
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>admin_dinas/pengumuman">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/pengumuman-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		PENGUMUMAN
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>admin_dinas/list_download">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/download-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		LIST DOWNLOAD
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>admin_dinas/profil">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/profil-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		PROFIL USER
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>admin_dinas/password">
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


<div id="content-center-large">
	<div class="cleaner_h0" style="text-align:right">
	Welcome, <strong><?php echo $this->session->userdata('nama_user_login'); ?>.</strong> | Your privilages as, <strong><?php echo $this->session->userdata('tipe_user'); ?>.</strong> | Kecamatan <?php echo $this->session->userdata('kecamatan'); ?>.</strong></div>
	<div class="cleaner_h20"></div>
<div id="box-title">DASHBOARD</div>
	<div id="box-index">+ INDEXS DASHBOARD - UPTD</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>uptd/data_pegawai">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/guru-icon.png" width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		DATA PEGAWAI
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>uptd/galeri_uptd">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/galeri-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		GALERI UPTD
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>uptd/artikel_uptd">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/artikel-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		ARTIKEL UPTD
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>uptd/data_siswa">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/siswa-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		PESERTA DIDIK
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>uptd/profil">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/profil-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		PROFIL USER
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>uptd/password">
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


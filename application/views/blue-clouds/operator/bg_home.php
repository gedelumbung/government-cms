<div id="content-center-large">
	<div class="cleaner_h0" style="text-align:right">
	Welcome, <strong><?php echo $this->session->userdata('nama_user_login'); ?>.</strong> | Your privilages as, <strong><?php echo $this->session->userdata('tipe_user'); ?>.</strong> | <?php echo $this->session->userdata('nama_sekolah'); ?>.</strong></div>
	<div class="cleaner_h20"></div>
<div id="box-title">DASHBOARD</div>
	<div id="box-index">+ INDEXS DASHBOARD - OPERATOR</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>operator/data_guru">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/guru-icon.png" width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		DATA PTK / GURU
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>operator/galeri_sekolah">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/galeri-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		GALERI SEKOLAH
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>operator/artikel_sekolah">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/artikel-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		ARTIKEL SEKOLAH
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>operator/data_siswa">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/siswa-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		PESERTA DIDIK
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>operator/profil_sekolah">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/scorm-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		PROFIL SEKOLAH
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>operator/profil">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/profil-icon.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		PROFIL USER
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>operator/password">
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


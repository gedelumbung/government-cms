<div id="content-left">

<?php if($this->session->userdata("logged_in")==""){ ?>
<div id="bg-sidebar">
<div id="head-sidebar">LOGIN ADMIN DINAS / OPERATOR</div>
<div id="content-sidebar">
<?php echo form_open("auth/user_login"); ?>
<label for="username">USERNAME : </label>
<input type="text" name="username" id="username" placeholder="Masukkan username...." />
<label for="password">PASSWORD : </label>
<input type="password" name="password" id="password" placeholder="Masukkan password...." />
<label for="as">LOG IN SEBAGAI : </label>
<select name="log_as" id="as">
	<option value="">-- Pilih --</option>
	<option value="admin_dinas">Admin Dinas</option>
	<option value="operator">Operator</option>
	<option value="superadmin">Superadmin</option>
</select>
<div class="cleaner_h10"></div>	
	<input type="submit" value="LOG IN" />
	<input type="reset" value="RESET" />
</div>
<?php echo form_close(); ?>
<div class="cleaner_h10"></div>	
</div>
<?php } else { 
if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dinas") {
?>

<div id="bg-sidebar">
<div id="head-sidebar">ADMIN DINAS PANEL</div>
<table width="100%" cellpadding="3">
	<tr><td colspan="2"><div style="font-size:12px;">Welcome, <strong><?php echo $this->session->userdata('nama_user_login'); ?>.</strong></div></td></tr>
	<tr><td><div class="border-photo-profil"><img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/user-icon.png" /></div>	</td><td>
	<table>
		<tr>
		<td><div id="btn-poll">
<a href="<?php echo base_url(); ?>admin_dinas/dashboard"><div class="link-tombol" style="width:65px; text-align:center;">Dashboard</div></a>
<a href="<?php echo base_url(); ?>admin_dinas/profil"><div class="link-tombol" style="width:65px; text-align:center;">Edit Profil</div></a>
<a href="<?php echo base_url(); ?>admin_dinas/password" class="group3"><div class="link-tombol" style="width:65px; text-align:center;">Password</div></a>
<a href="<?php echo base_url(); ?>auth/user_login/logout"><div class="link-tombol" style="width:65px; text-align:center;">Log Out</div></a>
</div>
	</td>
	</tr>
	</table>
	</td></tr>
	<tr><td colspan="2"><div style="font-size:12px;">Your privilages as, <strong><?php echo $this->session->userdata('tipe_user'); ?>.</strong></div></td></tr>
	<tr><td colspan="2"><div style="font-size:12px;">Bidang : <strong><?php echo $this->session->userdata('bidang'); ?>.</strong></div></td></tr>
	<tr><td colspan="2">
	
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td colspan="2">
			<div class="cleaner_h5"></div>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<div id="btn-poll">
					<a href="<?php echo base_url(); ?>admin_dinas/berita_dinas"><div class="link-tombol" style="width:100px; text-align:center;">Berita Dinas</div></a>
					<a href="<?php echo base_url(); ?>admin_dinas/agenda_dinas"><div class="link-tombol" style="width:100px; text-align:center;">Agenda Dinas</div></a>
					
					<a href="<?php echo base_url(); ?>admin_dinas/pengumuman"><div class="link-tombol" style="width:100px; text-align:center;">Pengumuman</div></a>
					<a href="<?php echo base_url(); ?>admin_dinas/list_download"><div class="link-tombol" style="width:100px; text-align:center;">List Download</div></a>
				</div>
			</td>
		</tr>
	</table>
	</td></tr>
</table>
<div class="cleaner_h10"></div>	
</div>

<?php } else if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator") { ?>
<div id="bg-sidebar">
<div id="head-sidebar">OPERATOR SEKOLAH PANEL</div>
<table width="100%" cellpadding="3">
	<tr><td colspan="2"><div style="font-size:12px;">Welcome, <strong><?php echo $this->session->userdata('nama_user_login'); ?>.</strong></div></td></tr>
	<tr><td><div class="border-photo-profil"><img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/user-icon.png" /></div>	</td><td>
	<table>
		<tr>
		<td><div id="btn-poll">
<a href="<?php echo base_url(); ?>operator/dashboard"><div class="link-tombol" style="width:65px; text-align:center;">Dashboard</div></a>
<a href="<?php echo base_url(); ?>operator/profil"><div class="link-tombol" style="width:65px; text-align:center;">Edit Profil</div></a>
<a href="<?php echo base_url(); ?>operator/password" class="group3"><div class="link-tombol" style="width:65px; text-align:center;">Password</div></a>
<a href="<?php echo base_url(); ?>auth/user_login/logout"><div class="link-tombol" style="width:65px; text-align:center;">Log Out</div></a>
</div>
	</td>
	</tr>
	</table>
	</td></tr>
	<tr><td colspan="2"><div style="font-size:12px;">Your privilages as, <strong><?php echo $this->session->userdata('tipe_user'); ?>.</strong></div></td></tr>
	<tr><td colspan="2"><div style="font-size:12px;"><strong><?php echo $this->session->userdata('nama_sekolah'); ?>.</strong></div></td></tr>
	<tr><td colspan="2">
	
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td colspan="2">
			<div class="cleaner_h5"></div>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<div id="btn-poll">
				<a href="<?php echo base_url(); ?>operator/profil_sekolah"><div class="link-tombol" style="width:215px; text-align:center;">Profil Sekolah</div></a>
					<a href="<?php echo base_url(); ?>operator/artikel_sekolah"><div class="link-tombol" style="width:100px; text-align:center;">Artikel Sekolah</div></a>
					<a href="<?php echo base_url(); ?>operator/galeri_sekolah"><div class="link-tombol" style="width:100px; text-align:center;">Galeri Sekolah</div></a>
					
					<a href="<?php echo base_url(); ?>operator/data_guru"><div class="link-tombol" style="width:100px; text-align:center;">Data Guru</div></a>
					<a href="<?php echo base_url(); ?>operator/data_siswa"><div class="link-tombol" style="width:100px; text-align:center;">Peserta Didik</div></a>
				</div>
			</td>
		</tr>
	</table>
	</td></tr>
</table>
<div class="cleaner_h10"></div>	
</div>

<?php } else if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin") { ?>
<div id="bg-sidebar">
<div id="head-sidebar">SUPERADMIN PANEL</div>
<table width="100%" cellpadding="3">
	<tr><td colspan="2"><div style="font-size:12px;">Welcome, <strong><?php echo $this->session->userdata('nama_user_login'); ?>.</strong></div></td></tr>
	<tr><td><div class="border-photo-profil"><img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/user-icon.png" /></div>	</td><td>
	<table>
		<tr>
		<td><div id="btn-poll">
<a href="<?php echo base_url(); ?>superadmin"><div class="link-tombol" style="width:65px; text-align:center;">Dashboard</div></a>
<a href="<?php echo base_url(); ?>superadmin/profil"><div class="link-tombol" style="width:65px; text-align:center;">Edit Profil</div></a>
<a href="<?php echo base_url(); ?>superadmin/password" class="group3"><div class="link-tombol" style="width:65px; text-align:center;">Password</div></a>
<a href="<?php echo base_url(); ?>auth/user_login/logout"><div class="link-tombol" style="width:65px; text-align:center;">Log Out</div></a>
</div>
	</td>
	</tr>
	</table>
	</td></tr>
	<tr><td colspan="2"><div style="font-size:12px;">Your privilages as, <strong><?php echo $this->session->userdata('tipe_user'); ?>.</strong></div></td></tr>
</table>
<div class="cleaner_h10"></div>	
</div>

<?php } } ?>

<div class="cleaner_h20"></div>	

<div id="bg-sidebar">
<div id="head-sidebar">FOTO KEPALA DINAS</div>
<div id="content-sidebar">
<center><img src="<?php echo base_url(); ?>asset/images/<?php echo $_SESSION['site_kepala_dinas']; ?>" style="width:200px;" /></center>
<p style="text-align:center; margin:0px; padding:0px;">
<?php echo $_SESSION['nama_kepala_dinas']; ?><br>
<?php echo $_SESSION['nip_kepala_dinas']; ?>
</p>
<div class="cleaner_h10"></div>	
</div>
</div>

<div class="cleaner_h20"></div>	

<div id="bg-sidebar">
<div id="head-sidebar">BIDANG</div>
<div id="content-sidebar">
<ul>
	<?php echo $dt_bidang; ?>
</ul>
</div>
</div>

<div class="cleaner_h20"></div>	

<div id="bg-sidebar">
<div id="head-sidebar">LINK TERKAIT</div>
<div id="content-sidebar">
<ul>
	<?php echo $dt_link; ?>
</ul>
</div>
</div>

</div>
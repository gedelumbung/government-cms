
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Profil User</h1>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
				
				<div class="cleaner_h10"></div>
				<?php echo $this->session->flashdata("simpan_akun"); ?>
				<div class="cleaner_h10"></div>
					
				<?php echo form_open("superadmin/profil/simpan"); ?>
				
				<label for="nama_super_admin">Nama Super Admin</label>
				<div class="cleaner_h5"></div>
				<input type="search" id="nama_super_admin" name="nama_super_admin" placeholder="Nama Super Admin" 
				value="<?php echo $nama_super_admin; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="username_super_admin">Username Super Admin</label>
				<div class="cleaner_h5"></div>
				<input type="search" id="username_super_admin" name="username_super_admin" placeholder="Username Super Admin" 
				value="<?php echo $username_super_admin; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="username_temp" value="<?php echo $username_super_admin; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				<div class="cleaner_h20"></div>
					
			</section>
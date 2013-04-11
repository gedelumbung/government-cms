
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>User Pengawas</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("superadmin/user_pengawas/set"); ?>
				<input type="search" class="span2" id="appendedInputButton" name="by_judul" placeholder="Cari berdasarkan nama" /><input 
				type="submit" class="btn btn-primary" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
				
				<div class="cleaner_h10"></div>
				<?php echo $this->session->flashdata("simpan_akun"); ?>
				<div class="cleaner_h10"></div>
					
				<?php echo form_open("superadmin/user_pengawas/simpan"); ?>
				
				<label for="nama_user_pengawas">Nama User Pengawas</label>
				<div class="cleaner_h5"></div>
				<input type="search" id="nama_user_pengawas" name="nama_user_pengawas" placeholder="Nama User Pengawas" 
				value="<?php echo $nama_user_pengawas; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="username_user_pengawas">Username User Pengawas</label>
				<div class="cleaner_h5"></div>
				<input type="search" id="username_user_pengawas" name="username_user_pengawas" placeholder="Username User Pengawas" 
				value="<?php echo $username_user_pengawas; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="password">Password User Pengawas</label>
				<div class="cleaner_h5"></div>
				<input type="password" id="password" name="password" placeholder="Password User Pengawas"  />
				<div class="cleaner_h10"></div>
				
				<label for="unit_kerja">Unit Kerja</label>
				<div class="cleaner_h5"></div>
				<select id="unit_kerja" name="id_unit_kerja">
					<?php 
					foreach($unit_kerja->result_array() as $b)
					{
						if($b['id_super_unit_kerja']==$id_unit_kerja)
						{
					?>
						<option value="<?php echo $b['id_super_unit_kerja']; ?>" selected="selected"><?php echo $b['unit_kerja']; ?></option>
						<?php
						}
						else
						{
						?>
						<option value="<?php echo $b['id_super_unit_kerja']; ?>"><?php echo $b['unit_kerja']; ?></option>
						<?php
						}
					}
					?>
				</select>
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="username_temp" value="<?php echo $username_user_pengawas; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				<div class="cleaner_h20"></div>
					
			</section>
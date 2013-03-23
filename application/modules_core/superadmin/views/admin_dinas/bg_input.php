
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Admin Dinas</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("superadmin/admin_dinas/set"); ?>
				<input type="search" class="span2" id="appendedInputButton" name="by_judul" placeholder="Cari berdasarkan nama" /><input 
				type="submit" class="btn btn-primary" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
				
				<div class="cleaner_h10"></div>
				<?php echo $this->session->flashdata("simpan_akun"); ?>
				<div class="cleaner_h10"></div>
					
				<?php echo form_open("superadmin/admin_dinas/simpan"); ?>
				
				<label for="nama_admin_dinas">Nama Admin Dinas</label>
				<div class="cleaner_h5"></div>
				<input type="search" id="nama_admin_dinas" name="nama_admin_dinas" placeholder="Nama Admin Dinas" 
				value="<?php echo $nama_admin_dinas; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="username_admin_dinas">Username Admin Dinas</label>
				<div class="cleaner_h5"></div>
				<input type="search" id="username_admin_dinas" name="username_admin_dinas" placeholder="Username Admin Dinas" 
				value="<?php echo $username_admin_dinas; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="password">Password Admin Dinas</label>
				<div class="cleaner_h5"></div>
				<input type="password" id="password" name="password" placeholder="Password Admin Dinas"  />
				<div class="cleaner_h10"></div>
				
				<label for="bidang">Bidang</label>
				<div class="cleaner_h5"></div>
				<select id="bidang" name="id_bidang">
					<?php 
					foreach($bidang->result_array() as $b)
					{
						if($b['id_super_bidang']==$id_bidang)
						{
					?>
						<option value="<?php echo $b['id_super_bidang']; ?>" selected="selected"><?php echo $b['bidang']; ?></option>
						<?php
						}
						else
						{
						?>
						<option value="<?php echo $b['id_super_bidang']; ?>"><?php echo $b['bidang']; ?></option>
						<?php
						}
					}
					?>
				</select>
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="username_temp" value="<?php echo $username_admin_dinas; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				<div class="cleaner_h20"></div>
					
			</section>
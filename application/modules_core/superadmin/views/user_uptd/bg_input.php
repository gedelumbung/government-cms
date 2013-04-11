
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>User UPTD</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("superadmin/user_uptd/set"); ?>
				<input type="search" class="span2" id="appendedInputButton" name="by_judul" placeholder="Cari berdasarkan nama" /><input 
				type="submit" class="btn btn-primary" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
				
				<div class="cleaner_h10"></div>
				<?php echo $this->session->flashdata("simpan_akun"); ?>
				<div class="cleaner_h10"></div>
					
				<?php echo form_open("superadmin/user_uptd/simpan"); ?>
				
				<label for="nama_operator">Nama User UPTD</label>
				<div class="cleaner_h5"></div>
				<input type="search" id="nama_operator" name="nama_operator" placeholder="Nama User UPTD" 
				value="<?php echo $nama_operator; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="username">Username</label>
				<div class="cleaner_h5"></div>
				<input type="search" id="username" name="username" placeholder="Username" 
				value="<?php echo $username; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="password">Password</label>
				<div class="cleaner_h5"></div>
				<input type="password" id="password" name="password" placeholder="Password"  />
				<div class="cleaner_h10"></div>
				
				<label for="kecamatan">Kecamatan</label>
				<div class="cleaner_h5"></div>
				<select id="kecamatan" name="id_kecamatan">
					<?php 
					foreach($kecamatan->result_array() as $b)
					{
						if($b['id_super_kecamatan']==$id_kecamatan)
						{
					?>
						<option value="<?php echo $b['id_super_kecamatan']; ?>" selected="selected"><?php echo $b['kecamatan']; ?></option>
						<?php
						}
						else
						{
						?>
						<option value="<?php echo $b['id_super_kecamatan']; ?>"><?php echo $b['kecamatan']; ?></option>
						<?php
						}
					}
					?>
				</select>
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="username_temp" value="<?php echo $username; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				<div class="cleaner_h20"></div>
					
			</section>
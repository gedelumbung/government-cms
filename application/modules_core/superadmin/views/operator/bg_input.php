	<link href="<?php echo base_url(); ?>asset/admin/css/chosen.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/chosen.jquery.js"></script>
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Operator</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("superadmin/operator/set"); ?>
				<input type="search" class="span2" id="appendedInputButton" name="by_nama" placeholder="Cari berdasarkan nama" /><input 
				type="submit" class="btn btn-primary" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
				
				<?php echo $this->session->flashdata("simpan_akun"); ?>
				<div class="cleaner_h10"></div>
					
				<?php echo form_open("superadmin/operator/simpan"); ?>
				
				<label for="bidang">Sekolah</label>
				<div class="cleaner_h5"></div>
				<select id="bidang" name="id_sekolah" class="chzn-select" data-placeholder="Pilih Sekolah..." tabindex="2" style="width:90%;" >
				<option value=""></option>
					<?php 
					foreach($sekolah->result_array() as $b)
					{
						if($b['id_sekolah_profil']==$id_sekolah)
						{
					?>
						<option value="<?php echo $b['id_sekolah_profil']; ?>" selected="selected"><?php echo $b['nama_sekolah']; ?></option>
						<?php
						}
						else
						{
						?>
						<option value="<?php echo $b['id_sekolah_profil']; ?>"><?php echo $b['nama_sekolah']; ?></option>
						<?php
						}
					}
					?>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="nama_operator">Nama Operator</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="nama_operator" name="nama_operator" placeholder="Nama Operator" 
				value="<?php echo $nama_operator; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="username_admin_dinas">Username</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="username" name="username" placeholder="Username" 
				value="<?php echo $username; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="password">Password</label>
				<div class="cleaner_h5"></div>
				<input type="password" style="width:90%;" id="password" name="password" placeholder="Password"  />
				<div class="cleaner_h10"></div>
				
				<label for="email">Email</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>"  />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="username_temp" value="<?php echo $username; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<script>
					$(".chzn-select").chosen();
				</script>

				<?php echo form_close(); ?>
				<div class="cleaner_h20"></div>
					
			</section>
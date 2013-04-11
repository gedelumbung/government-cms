<div id="content-center-large">
<div id="box-title">PROFIL USER</div>
	<div id="box-index">+ INDEX PROFIL USER</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("uptd/profil/simpan"); ?>
	
	<label for="username">Username</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>" readonly="true" />
	<div class="cleaner_h20"></div>
	
	<label for="nama_uptd">Nama uptd</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="nama_operator" name="nama_operator" placeholder="Nama Operator" value="<?php echo $nama_operator; ?>" />
	<div class="cleaner_h20"></div>
	
	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
	<div class="cleaner_h20"></div>
	<input type="submit" value="SIMPAN" />
	<?php echo form_close(); ?>
	<div class="cleaner_h20"></div>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>


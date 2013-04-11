<div id="content-center-large">
<div id="box-title">PASSWORD USER</div>
	<div id="box-index">+ INDEX PASSWORD USER</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<div id="bg-sidebar-login" style="margin:0px auto;">
	<div id="head-sidebar">MANAJEMEN PASSWORD</div>
	<div id="content-sidebar-login">
	<?php echo validation_errors(); ?>
	<p><?php echo $this->session->flashdata("result_login"); ?></p>
	<?php echo form_open("uptd/password/simpan"); ?>
	<label for="username">USERNAME : </label>
	<input type="text" name="username" id="username" placeholder="Username...." value="<?php echo $username; ?>" readonly="true" />
	<label for="password_lama">PASSWORD LAMA : </label>
	<input type="password" name="password_lama" id="password_lama" placeholder="Masukkan password lama...." />
	<label for="password_baru">PASSWORD BARU : </label>
	<input type="password" name="password_baru" id="password_baru" placeholder="Masukkan password baru...." />
	<label for="ulangi_password">ULANGI PASSWORD BARU : </label>
	<input type="password" name="ulangi_password" id="ulangi_password" placeholder="Masukkan ulang password baru...." />
	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
	<div class="cleaner_h10"></div>	
		<input type="submit" value="UPDATE DATA" />
		<input type="reset" value="HAPUS" />
	</div>
	<?php echo form_close(); ?>
	<div class="cleaner_h10"></div>	
	</div>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>


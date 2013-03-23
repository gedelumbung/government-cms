<div id="content-center-large">
<div id="box-title">USER LOGIN</div>
	<div id="box-index">+ INDEXS USER LOGIN - OPERATOR & ADMIN DINAS</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	
<div id="bg-sidebar-login" style="margin:0px auto;">
<div id="head-sidebar">LOGIN ADMIN DINAS / OPERATOR</div>
<div id="content-sidebar-login">
<?php echo validation_errors(); ?>
<p><?php echo $this->session->flashdata("result_login"); ?></p>
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

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>


<div id="content-center-large">
<div id="box-title">LIST DOWNLOAD</div>
	<div id="box-index">+ INPUT/UPDATE LIST DOWNLOAD</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart("admin_dinas/list_download/simpan"); ?>
	
	<label for="judul_file">Judul File</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="judul_file" name="judul_file" placeholder="Judul File" value="<?php echo $judul_file; ?>" />
	<div class="cleaner_h20"></div>
	
	<label for="userfile">Pilih File</label>
	<div class="cleaner_h5"></div>
	<input type="file" name="userfile" id="userfile" />
	<div class="cleaner_h5"></div>
	* File yang diperbolehkan hanya dalam format <strong>.zip</strong> dan ukuran maksimal file sebesar <strong>10 MB</strong>
	<div class="cleaner_h20"></div>
	
	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
	<input type="hidden" name="nama_file" value="<?php echo $nama_file; ?>" />
	<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
	<div class="cleaner_h20"></div>
	<input type="submit" value="SIMPAN" />
	<?php echo form_close(); ?>
	<div class="cleaner_h20"></div>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>


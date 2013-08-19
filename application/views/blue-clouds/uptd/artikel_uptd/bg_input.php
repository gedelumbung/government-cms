<div id="content-center-large">
<div id="box-title">BERITA UPTD</div>
	<div id="box-index">+ INPUT/UPDATE BERITA UPTD</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart("uptd/artikel_uptd/simpan"); ?>
	
	<label for="judul">Judul</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="judul" name="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
	<div class="cleaner_h20"></div>
	
	<label for="isi">Isi</label>
	<div class="cleaner_h5"></div>
	<textarea name="isi" id="alamat" cols="50" rows="6"><?php echo $isi; ?></textarea>
	<div class="cleaner_h20"></div>
	
	<label for="userfile">Pilih Gambar</label>
	<div class="cleaner_h5"></div>
	<input type="file" name="userfile" id="userfile" />
	<div class="cleaner_h5"></div>
	* File yang diperbolehkan hanya dalam format <strong>gif,jpg,png,jpeg</strong> resolusi file gambar <strong>3000PX x 3000PX</strong> dan ukuran maksimal file sebesar <strong>3 MB</strong>
	<div class="cleaner_h20"></div>
	
	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
	<input type="hidden" name="gambar" value="<?php echo $gambar; ?>" />
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


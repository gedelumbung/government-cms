<div id="content-center-large">
<div id="box-title">PENGUMUMAN</div>
	<div id="box-index">+ INPUT/UPDATE PENGUMUMAN</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("pengawas/pengumuman/simpan"); ?>
	
	<label for="judul">Judul</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="judul" name="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
	<div class="cleaner_h20"></div>
	
	<label for="visi_misi">Isi</label>
	<div class="cleaner_h5"></div>
	<textarea name="isi" id="visi_misi" cols="50" rows="6"><?php echo $isi; ?></textarea>
	<div class="cleaner_h20"></div>
	
	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
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


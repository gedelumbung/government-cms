<div id="content-center-large">
<div id="box-title">GALERI SEKOLAH</div>
	<div id="box-index">+ INDEXS GALERI SEKOLAH | <a href="<?php echo base_url(); ?>operator/galeri_sekolah/tambah">TAMBAH FOTO</a></div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("operator/galeri_sekolah/set"); ?>
	<input type="text" name="by_judul" placeholder="Cari berdasarkan judul" />
	<input type="submit" value="FILTER" />
	<?php echo form_close(); ?>
	<div class="cleaner_h20"></div>
	<?php echo $dt_galeri_sekolah; ?>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>


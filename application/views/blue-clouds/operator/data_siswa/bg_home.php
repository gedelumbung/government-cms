<div id="content-center-large">
<div id="box-title">DATA PESERTA DIDIK</div>
	<div id="box-index">+ INDEXS DATA PESERTA DIDIK</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("operator/data_siswa/set"); ?>
	<input type="text" name="by_nama" placeholder="Cari berdasarkan nama" />
	<input type="submit" value="FILTER" />
	<?php echo form_close(); ?>
	<div class="cleaner_h20"></div>
	<?php echo $dt_data_siswa; ?>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>


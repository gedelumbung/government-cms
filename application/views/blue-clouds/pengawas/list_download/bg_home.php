<div id="content-center-large">
<div id="box-title">LIST DOWNLOAD</div>
	<div id="box-index">+ INDEXS LIST DOWNLOAD</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("admin_dinas/list_download/set"); ?>
	<input type="text" name="by_judul" placeholder="Cari berdasarkan judul" />
	<input type="submit" value="FILTER" />
	<?php echo form_close(); ?>
	<div class="cleaner_h20"></div>
	<?php echo $dt_list_download; ?>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>


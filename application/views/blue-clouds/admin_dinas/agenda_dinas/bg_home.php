<div id="content-center-large">
<div id="box-title">AGENDA DINAS</div>
	<div id="box-index">+ INDEXS AGENDA DINAS</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("admin_dinas/agenda_dinas/set"); ?>
	<input type="text" name="by_judul" placeholder="Cari berdasarkan judul" />
	<input type="submit" value="FILTER" />
	<?php echo form_close(); ?>
	<div class="cleaner_h20"></div>
	<?php echo $dt_agenda_dinas; ?>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>


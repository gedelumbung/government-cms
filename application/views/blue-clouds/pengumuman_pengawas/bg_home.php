<div id="content-center">
<div id="box-title">PENGUMUMAN TERBARU</div>
	<div id="box-index">+ INDEXS PENGUMUMAN PENGAWAS</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("web/pengumuman_pengawas/set"); ?>
	<input style="width:120px;" type="text" name="tanggal" id="datepicker" placeholder="Pilih Tanggal..." value="<?php echo $this->session->userdata("by_tanggal"); ?>" />
	<select name="id_unit_kerja">
			<option value="semua">Semua Unit Kerja</option>
		<?php foreach($dt_unit_dropdown->result_array() as $dt_bd)
		{
			if($this->session->userdata("by_id_unit_kerja")==$dt_bd["id_super_unit_kerja"])
			{
		?>
			<option value="<?php echo $dt_bd['id_super_unit_kerja']; ?>" selected="selected"><?php echo $dt_bd['unit_kerja']; ?></option>
		<?php 
			}
			else
			{
		?>
			<option value="<?php echo $dt_bd['id_super_unit_kerja']; ?>"><?php echo $dt_bd['unit_kerja']; ?></option>
		<?php } } ?>
	</select>
	<input type="submit" value="FILTER" />
	<?php echo form_close(); ?>
	<div class="cleaner_h10"></div>
	<ul>
	<?php echo $dt_index_pengumuman; ?>
	</ul>
</div>

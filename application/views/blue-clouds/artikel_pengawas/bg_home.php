<div id="content-center">
<div id="box-title">ARTIKEL PENGAWAS</div>
	<div id="box-index">+ INDEXS ARTIKEL PENGAWAS</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("web/artikel_pengawas/set"); ?>
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
	<?php echo $dt_index_artikel_pengawas; ?>

</div>

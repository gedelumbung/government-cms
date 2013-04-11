<div id="content-center">
<div id="box-title">ARTIKEL UPTD</div>
	<div id="box-index">+ INDEXS ARTIKEL UPTD</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("web/artikel_uptd/set"); ?>
	<select name="id_kecamatan">
			<option value="">Semua Kecamatan</option>
		<?php foreach($dt_kecamatan->result_array() as $dt_kd)
		{
			if($this->session->userdata("by_id_kecamatan")==$dt_kd["id_super_kecamatan"])
			{
		?>
			<option value="<?php echo $dt_kd['id_super_kecamatan']; ?>" selected="selected"><?php echo $dt_kd['kecamatan']; ?></option>
		<?php 
			}
			else
			{
		?>
			<option value="<?php echo $dt_kd['id_super_kecamatan']; ?>"><?php echo $dt_kd['kecamatan']; ?></option>
		<?php } } ?>
	</select>
	<input type="submit" value="FILTER" />
	<?php echo form_close(); ?>
	<?php echo $dt_index_artikel_uptd; ?>

</div>

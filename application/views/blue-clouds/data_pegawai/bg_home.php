<div id="content-center-large">
<div id="box-title">DATA PEGAWAI</div>
	<div id="box-index">+ INDEXS DATA PEGAWAI</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("web/data_pegawai/set"); ?>
	<select name="id_kecamatan">
			<option value="semua">Semua Kecamatan</option>
		<?php foreach($dt_kecamatan_dropdown->result_array() as $dt_kd)
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
	<div class="cleaner_h20"></div>
	<?php echo $dt_data_pegawai; ?>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>


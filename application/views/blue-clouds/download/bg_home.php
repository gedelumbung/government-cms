<div id="content-center">
<div id="box-title">DOWNLOAD TERBARU</div>
	<div id="box-index">+ INDEXS DOWNLOAD</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("web/download/set"); ?>
	<select name="id_bidang">
			<option value="semua">Semua Bidang</option>
		<?php foreach($dt_bidang_dropdown->result_array() as $dt_bd)
		{
			if($this->session->userdata("by_id_bidang")==$dt_bd["id_super_bidang"])
			{
		?>
			<option value="<?php echo $dt_bd['id_super_bidang']; ?>" selected="selected"><?php echo $dt_bd['bidang']; ?></option>
		<?php 
			}
			else
			{
		?>
			<option value="<?php echo $dt_bd['id_super_bidang']; ?>"><?php echo $dt_bd['bidang']; ?></option>
		<?php } } ?>
	</select>
	<input type="submit" value="FILTER" />
	<?php echo form_close(); ?>
	<div class="cleaner_h10"></div>
	<ul>
	<?php echo $dt_index_download; ?>
	</ul>
</div>

<div id="content-center">
<div id="box-title">BERITA DINAS TERBARU</div>
	<div id="box-index">+ INDEXS BERITA</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("web/berita/set"); ?>
	<input style="width:120px;" type="text" name="tanggal" id="datepicker" placeholder="Pilih Tanggal..." value="<?php echo $this->session->userdata("by_tanggal"); ?>" />
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
	<?php echo $dt_index_berita; ?>

</div>

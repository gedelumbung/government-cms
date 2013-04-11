<div id="content-center-large">
<div id="box-title">DATA PESERTA DIDIK</div>
	<div id="box-index">+ INDEXS DATA PESERTA DIDIK</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("uptd/data_siswa/set"); ?>
	<select name="id_jenjang_pendidikan">
		<?php foreach($dt_pendidikan_dropdown->result_array() as $dt_pd)
		{
			if($this->session->userdata("by_id_jenjang_pendidikan")==$dt_pd["id_super_jenjang_pendidikan"])
			{
		?>
			<option value="<?php echo $dt_pd['id_super_jenjang_pendidikan']; ?>" selected="selected"><?php echo $dt_pd['pendidikan']; ?></option>
		<?php 
			}
			else
			{
		?>
			<option value="<?php echo $dt_pd['id_super_jenjang_pendidikan']; ?>"><?php echo $dt_pd['pendidikan']; ?></option>
		<?php } } ?>
	</select>
	<select name="id_sekolah">
			<option value="">- Pilih Sekolah -</option>
		<?php foreach($dt_sekolah->result_array() as $dt_s)
		{
			if($this->session->userdata("by_id_sekolah")==$dt_s["id_sekolah_profil"])
			{
		?>
			<option value="<?php echo $dt_s['id_sekolah_profil']; ?>" selected="selected"><?php echo $dt_s['nama_sekolah']; ?></option>
		<?php 
			}
			else
			{
		?>
			<option value="<?php echo $dt_s['id_sekolah_profil']; ?>"><?php echo $dt_s['nama_sekolah']; ?></option>
		<?php } } ?>
	</select>
	<input type="submit" value="FILTER" />
	<?php echo form_close(); ?>
	<div class="cleaner_h20"></div>
	<?php echo $dt_data_siswa; ?>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>


<div id="content-center-large">
<div id="box-title">DATA PESERTA DIDIK</div>
	<div id="box-index">+ INPUT/UPDATE DATA PESERTA DIDIK</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("uptd/data_siswa/simpan"); ?>
	
	<label for="nama">Nama</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
	<div class="cleaner_h20"></div>
	
	<label for="nisn">NISN</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="nisn" name="nisn" placeholder="NISN" value="<?php echo $nisn; ?>" />
	<div class="cleaner_h20"></div>
	
	<label for="kelas">Kelas</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="kelas" name="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" />
	<div class="cleaner_h20"></div>
	
	<label for="jenjang">Jenjang Pendidikan</label>
	<div class="cleaner_h5"></div>
	<select data-placeholder="- Pilih -" name="id_jenjang_pendidikan" id="id_jenjang_pendidikan" class="jenjang" style="width:180px;" tabindex="2">
		<option value=""></option> 
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
	<div class="cleaner_h20"></div>
	
	<label for="nama_sekolah">Nama Sekolah</label>
	<div class="cleaner_h5"></div>
	<span class="inout">
	<select name="id_sekolah">
			<option value="">- Pilih Sekolah -</option>
		<?php foreach($dt_sekolah->result_array() as $dt_s)
		{
			if($id_sekolah==$dt_s["id_sekolah_profil"])
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
	</span>
	<div class="cleaner_h20"></div>
	
	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
	<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
	<div class="cleaner_h20"></div>
	<input type="submit" value="SIMPAN" />
	<script src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/chosen.jquery.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(".jenjang").chosen().change(function(){ 
				var id_jenjang_pendidikan = $("#id_jenjang_pendidikan").val(); 
				$.ajax({ 
				url: "<?php echo base_url(); ?>uptd/data_siswa/combo_data_kelas", 
				data: "id_jenjang_pendidikan="+id_jenjang_pendidikan, 
				cache: false, 
				success: function(msg){   
				$(".inout").html(msg); 
			} 
		})
		});
	</script>
	<?php echo form_close(); ?>
	<div class="cleaner_h20"></div>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>


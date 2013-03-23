<div id="content-center-large">
<div id="box-title">DATA PESERTA DIDIK</div>
	<div id="box-index">+ INPUT/UPDATE DATA PESERTA DIDIK</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("operator/data_siswa/simpan"); ?>
	
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
	
	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
	<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
	<input type="hidden" name="id_sekolah" value="<?php echo $this->session->userdata("id_sekolah"); ?>" />
	<input type="hidden" name="id_jenjang_pendidikan" value="<?php echo $this->session->userdata("id_jenjang_pendidikan"); ?>" />
	<input type="hidden" name="id_kecamatan" value="<?php echo $this->session->userdata("id_kecamatan"); ?>" />
	<div class="cleaner_h20"></div>
	<input type="submit" value="SIMPAN" />
	<?php echo form_close(); ?>
	<div class="cleaner_h20"></div>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>


<div id="content-center-large">
<div id="box-title">PROFIL SEKOLAH</div>
	<div id="box-index">+ INDEX PROFIL SEKOLAH</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo validation_errors(); ?>
	<?php echo $this->session->flashdata("result_login"); ?>
	<div class="cleaner_h10"></div>
	<?php echo form_open("operator/profil_sekolah/simpan"); ?>
	
	<label for="npsn">NPSN</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="npsn" name="npsn" placeholder="NPSN" value="<?php echo $npsn; ?>" />
	<div class="cleaner_h20"></div>
	
	<label for="nama_sekolah">Nama Sekolah</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="nama_sekolah" name="nama_sekolah" placeholder="Nama Sekolah" value="<?php echo $nama_sekolah; ?>" />
	<div class="cleaner_h20"></div>
	
	<label for="status_sekolah">Status Sekolah</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="status_sekolah" name="status_sekolah" placeholder="Status Sekolah" value="<?php echo $status_sekolah; ?>" />
	<div class="cleaner_h20"></div>
	
	<label for="visi_misi">Visi & Misi</label>
	<div class="cleaner_h5"></div>
	<textarea name="visi_misi" id="visi_misi" cols="50" rows="6"><?php echo $visi_misi; ?></textarea>
	<div class="cleaner_h20"></div>
	
	<label for="alamat">Alamat</label>
	<div class="cleaner_h5"></div>
	<textarea name="alamat" id="alamat" cols="50" rows="6"><?php echo $alamat; ?></textarea>
	<div class="cleaner_h20"></div>
	
	<label for="email">Email</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" />
	<div class="cleaner_h20"></div>
	
	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
	<div class="cleaner_h20"></div>
	<input type="submit" value="SIMPAN" />
	<?php echo form_close(); ?>
	<div class="cleaner_h20"></div>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>


<div id="content-center-large">
<div id="box-title">DATA PEGAWAI</div>
	<div id="box-index">+ INPUT/UPDATE DATA PEGAWAI</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("uptd/data_pegawai/simpan"); ?>
	
	<label for="nama">Nama</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
	<div class="cleaner_h20"></div>
	
	<?php $l='checked="checked"'; $p='checked="checked"';
	if($jk=="L"){ $l='checked="checked"'; $p=''; }
	else if($jk=="P"){ $l=''; $p='checked="checked"'; }
	?>
	<label>Jenis Kelamin</label>
	<div class="cleaner_h5"></div>
	<input type="radio" name="jk" value="L" id="L" <?php echo $l; ?> /><label for="L">Laki-Laki</label>
	<input type="radio" name="jk" value="P" id="P" <?php echo $p; ?> /><label for="P">Perempuan</label>
	<div class="cleaner_h20"></div>
	
	<label for="status_pns">Status PNS</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="status_pns" name="status_pns" placeholder="Status PNS" value="<?php echo $status_pns; ?>" />
	<div class="cleaner_h20"></div>
	
	<label for="golongan">Golongan</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="golongan" name="golongan" placeholder="Golongan" value="<?php echo $golongan; ?>" />
	<div class="cleaner_h20"></div>
	
	<label for="tugas">Tugas</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="tugas" name="tugas" placeholder="Tugas" value="<?php echo $tugas; ?>" />
	<div class="cleaner_h20"></div>
	
	<label for="tempat_lahir">Tempat Lahir</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
	<div class="cleaner_h20"></div>
	
	<label for="tanggal_lahir">Tanggal Lahir</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
	<div class="cleaner_h20"></div>
	
	<label for="tanggal_bertugas">Tanggal Bertugas</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="tanggal_bertugas" name="tanggal_bertugas" placeholder="Tanggal Bertugas" value="<?php echo $tanggal_bertugas; ?>" />
	<div class="cleaner_h20"></div>
	
	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
	<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
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


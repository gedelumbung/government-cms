<div id="content-center">
<div id="box-title">FORM BUKU TAMU</div>
	<div id="box-index">+ INDEXS BUKU TAMU</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo $this->session->flashdata('result_insert'); ?>
	<?php echo validation_errors(); ?>
	<div class="cleaner_h20"></div>
	<?php echo form_open("web/buku_tamu"); ?>
	
	<label for="nama" class="label">Nama Lengkap</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" />
	<div class="cleaner_h10"></div>
	
	<label for="kontak" class="label">Kontak (Nomor HP atau email)</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="kontak" name="kontak" placeholder="Masukkan kontak" />
	<div class="cleaner_h10"></div>
	
	<label for="pesan" class="label">Pesan</label>
	<div class="cleaner_h5"></div>
	<textarea id="pesan" name="pesan" placeholder="Masukkan pesan" /></textarea>
	<div class="cleaner_h10"></div>
	
	<div class="cleaner_h5"></div>
	<?php echo $dt_captcha; ?>
	<div class="cleaner_h10"></div>
	
	<label for="captcha" class="label">Kode Captcha</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="captcha" name="captcha" placeholder="Masukkan kode captcha" />
	<div class="cleaner_h10"></div>
	
	<div class="cleaner_h0"></div>	
	<input type="submit" value="KIRIM DATA" />
	<input type="reset" value="RESET" />
	
	<div class="cleaner_h20"></div>	
	<?php echo form_close(); ?>
	
	<?php echo $dt_index_buku_tamu; ?>
</div>

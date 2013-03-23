
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Album Galeri</h1>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
					
				<?php echo form_open_multipart("superadmin/foto_galeri_kegiatan/simpan"); ?>
				
				<label for="judul">Judul</label>
				<div class="cleaner_h5"></div>
				<input type="search" id="judul" style="width:90%;" name="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
				<div class="cleaner_h20"></div>
				
				<label for="userfile">Pilih File</label>
				<div class="cleaner_h5"></div>
				<input type="file" name="userfile" id="userfile" />
				<div class="cleaner_h5"></div>
				* File yang diperbolehkan hanya dalam format <strong>gif,jpg,png,jpeg</strong> resolusi file gambar <strong>3000PX x 3000PX</strong> dan ukuran maksimal file sebesar <strong>3 MB</strong>
				<div class="cleaner_h20"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="id_album" value="<?php echo $id_album; ?>" />
				<input type="hidden" name="gambar" value="<?php echo $gambar; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				<div class="cleaner_h20"></div>
					
			</section>
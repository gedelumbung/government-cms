
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Sistem</h1>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
					
				<?php echo form_open_multipart("superadmin/sistem/simpan"); ?>
				
				<label for="title">Nama Pengaturan</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="title" name="title" placeholder="Nama Pengaturan" value="<?php echo $title; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="tipe">Tipe</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tipe" name="tipe" placeholder="Tipe" value="<?php echo $tipe; ?>" readonly="true" />
				<div class="cleaner_h10"></div>
				
				<?php if($tipe=="site_kepala_dinas") { ?>	
				<label for="userfile">Pilih Gambar</label>
				<div class="cleaner_h5"></div>
				<input type="file" name="userfile" id="userfile" />
				<input type="hidden" name="gambar" value="<?php echo $content_setting; ?>" />
				<div class="cleaner_h5"></div>
				* File yang diperbolehkan hanya dalam format <strong>gif,jpg,png,jpeg</strong> resolusi file gambar <strong>800PX x 800PX</strong> 
				dan ukuran maksimal file sebesar <strong>1 MB</strong>
				<div class="cleaner_h10"></div>
				
				<?php } else { ?>
				<label for="content_setting">Isi Pengaturan</label>
				<div class="cleaner_h5"></div>
				<textarea name="content_setting" style="width:90%; height:100px;"><?php echo $content_setting; ?></textarea>
				<div class="cleaner_h10"></div>
				<?php } ?>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				<div class="cleaner_h20"></div>
					
			</section>

	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Pengumuman</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("superadmin/link/set"); ?>
				<input type="search" class="span2" id="appendedInputButton" name="by_judul" placeholder="Cari berdasarkan judul" /><input 
				type="submit" class="btn btn-primary" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
					
				<?php echo form_open("superadmin/link/simpan"); ?>
				
				<label for="nama_link">Judul Link</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="nama_link" name="nama_link" placeholder="Judul Link" value="<?php echo $nama_link; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="url">URL</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="url" name="url" placeholder="URL" value="<?php echo $url; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				<div class="cleaner_h20"></div>
					
			</section>
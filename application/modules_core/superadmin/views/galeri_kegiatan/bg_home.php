
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Album Galeri</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("superadmin/galeri_kegiatan/set"); ?>
				<input type="search" class="span2" id="appendedInputButton" name="by_nama_album" placeholder="Cari berdasarkan nama" /><input 
				type="submit" class="btn btn-primary" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>

				<?php echo $data_retrieve; ?>
			</section>

	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Kecamatan</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("superadmin/kecamatan/set"); ?>
				<input type="search" class="span2" id="appendedInputButton" name="by_nama" placeholder="Cari berdasarkan nama" /><input 
				type="submit" class="btn btn-primary" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
					
				<?php echo form_open("superadmin/kecamatan/simpan"); ?>
				
				<label for="kecamatan">Nama Kecamatan</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="kecamatan" name="kecamatan" placeholder="Nama Kecamatan" value="<?php echo $kecamatan; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				<div class="cleaner_h20"></div>
					
			</section>
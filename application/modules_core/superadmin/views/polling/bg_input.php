
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Pertanyaan Polling</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("superadmin/polling/set"); ?>
				<input type="search" class="span2" id="appendedInputButton" name="by_pertanyaan" placeholder="Cari berdasarkan pertanyaan" /><input 
				type="submit" class="btn btn-primary" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
					
				<?php echo form_open("superadmin/polling/simpan"); ?>
				
				<label for="pertanyaan">Pertanyaan</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="pertanyaan" name="pertanyaan" placeholder="Pertanyaan" value="<?php echo $pertanyaan; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				<div class="cleaner_h20"></div>
					
			</section>
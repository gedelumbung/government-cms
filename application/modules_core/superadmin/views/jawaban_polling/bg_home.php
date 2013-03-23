
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Jawaban Polling</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("superadmin/jawaban_polling/set"); ?>
				<input type="hidden" name="id_pertanyaan" value="<?php echo $id_pertanyaan; ?>" />
				<input type="search" class="span2" id="appendedInputButton" name="by_jawaban" placeholder="Cari berdasarkan pertanyaan" /><input 
				type="submit" class="btn btn-primary" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>

				<?php echo $data_retrieve; ?>
			</section>
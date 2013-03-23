
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Berita</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("superadmin/berita/set"); ?>
				<input type="search" class="span2" id="appendedInputButton" name="by_judul" placeholder="Cari berdasarkan judul" /><input 
				type="submit" class="btn btn-primary" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
					
				<?php echo form_open_multipart("superadmin/berita/simpan"); ?>
				
				<label for="judul">Judul</label>
				<div class="cleaner_h5"></div>
				<input type="search" id="judul" name="judul" style="width:90%" placeholder="Judul" value="<?php echo $judul; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="isi">Isi</label>
				<div class="cleaner_h5"></div>
				<textarea name="isi" id="alamat" cols="50" rows="6"><?php echo $isi; ?></textarea>
				<div class="cleaner_h10"></div>
				
				<label for="isi">Headline</label>
				<div class="cleaner_h5"></div>
				<?php $y=""; $n="";
				if($headline=="y"){$y='selected="selected"'; $n='';}
				else if($headline=="n"){$n='selected="selected"'; $y='';}
				?>
				<select name="headline">
					<option value="n" <?php echo $n; ?>>No</option>
					<option value="y" <?php echo $y; ?>>Yes</option>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="userfile">Pilih Gambar</label>
				<div class="cleaner_h5"></div>
				<input type="file" name="userfile" id="userfile" />
				<div class="cleaner_h5"></div>
				* File yang diperbolehkan hanya dalam format <strong>gif,jpg,png,jpeg</strong> resolusi file gambar <strong>3000PX x 3000PX</strong> dan ukuran maksimal file sebesar <strong>3 MB</strong>
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="gambar" value="<?php echo $gambar; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h20"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				
				<?php echo form_close(); ?>
				<div class="cleaner_h20"></div>
					
			</section>
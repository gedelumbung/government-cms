
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Kepegawaian</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("superadmin/kepegawaian/set"); ?>
				<input type="search" class="span2" id="appendedInputButton" name="by_nama" placeholder="Cari berdasarkan nama" /><input 
				type="submit" class="btn btn-primary" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
					
				<?php echo form_open("superadmin/kepegawaian/simpan"); ?>
				
				<label for="nama">Nama</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="nip">NIP</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="nip" name="nip" placeholder="NIP" value="<?php echo $nip; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="nama">Jabatan</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="jabatan" name="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="nama">Kontak</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="kontak" name="kontak" placeholder="Kontak" value="<?php echo $kontak; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="bidang">Bidang</label>
				<div class="cleaner_h5"></div>
				<select id="bidang" name="id_bidang">
					<?php 
					foreach($bidang->result_array() as $b)
					{
						if($b['id_super_bidang']==$id_bidang)
						{
					?>
						<option value="<?php echo $b['id_super_bidang']; ?>" selected="selected"><?php echo $b['bidang']; ?></option>
						<?php
						}
						else
						{
						?>
						<option value="<?php echo $b['id_super_bidang']; ?>"><?php echo $b['bidang']; ?></option>
						<?php
						}
					}
					?>
				</select>
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				<div class="cleaner_h20"></div>
					
			</section>

	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Pengawas Sekolah</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("superadmin/pengawas_sekolah/set"); ?>
				<input type="search" class="span2" id="appendedInputButton" name="by_nama" placeholder="Cari berdasarkan nama" /><input 
				type="submit" class="btn btn-primary" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
					
				<?php echo form_open("superadmin/pengawas_sekolah/simpan"); ?>
				
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
				
				<label for="unit_kerja">Unit Kerja</label>
				<div class="cleaner_h5"></div>
				<select id="unit_kerja" name="id_unit_kerja">
					<?php 
					foreach($unit_kerja->result_array() as $b)
					{
						if($b['id_super_unit_kerja']==$id_unit_kerja)
						{
					?>
						<option value="<?php echo $b['id_super_unit_kerja']; ?>" selected="selected"><?php echo $b['unit_kerja']; ?></option>
						<?php
						}
						else
						{
						?>
						<option value="<?php echo $b['id_super_unit_kerja']; ?>"><?php echo $b['unit_kerja']; ?></option>
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
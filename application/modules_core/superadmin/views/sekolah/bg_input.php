
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Pengumuman</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("superadmin/sekolah/set"); ?>
				<input type="search" class="span2" id="appendedInputButton" name="by_nama" placeholder="Cari berdasarkan nama" /><input 
				type="submit" class="btn btn-primary" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
					
				<?php echo form_open("superadmin/sekolah/simpan"); ?>
				
				<label for="n">Nama Sekolah</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="nama_sekolah" name="nama_sekolah" placeholder="Nama Sekolah" value="<?php echo $nama_sekolah; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="id_jenjang_pendidikan">Jenjang Pendidikan</label>
				<div class="cleaner_h5"></div>
				<select name="id_jenjang_pendidikan">
					<?php foreach($jenjang_pendidikan->result_array() as $dt_pd)
					{
						if($id_jenjang_pendidikan==$dt_pd["id_super_jenjang_pendidikan"])
						{
					?>
						<option value="<?php echo $dt_pd['id_super_jenjang_pendidikan']; ?>" selected="selected"><?php echo $dt_pd['pendidikan']; ?></option>
					<?php 
						}
						else
						{
					?>
						<option value="<?php echo $dt_pd['id_super_jenjang_pendidikan']; ?>"><?php echo $dt_pd['pendidikan']; ?></option>
					<?php } } ?>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="id_kecamatan">Kecamatan</label>
				<div class="cleaner_h5"></div>
				<select name="id_kecamatan">
					<?php foreach($kecamatan->result_array() as $dt_kd)
					{
						if($id_kecamatan==$dt_kd["id_super_kecamatan"])
						{
					?>
						<option value="<?php echo $dt_kd['id_super_kecamatan']; ?>" selected="selected"><?php echo $dt_kd['kecamatan']; ?></option>
					<?php 
						}
						else
						{
					?>
						<option value="<?php echo $dt_kd['id_super_kecamatan']; ?>"><?php echo $dt_kd['kecamatan']; ?></option>
					<?php } } ?>
				</select>
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				<div class="cleaner_h20"></div>
					
			</section>
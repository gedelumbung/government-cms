
<doctype html>
<html>
<head>
	<title><?php echo $_SESSION['site_title']; ?></title>
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/admin/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/admin/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/admin/css/style.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/main.js"></script>
	<link href="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/redactor/redactor.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/redactor/redactor.min.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript">
	$(document).ready( function()
		{	
				$('#alamat').redactor();
				$('#visi_misi').redactor();				
		});
	</script>
</head>
<body>
	<div class="navbar navbar-fixed-top m-header">
		<div class="navbar-inner m-inner">
		
			<div class="container-fluid">
				<a target="_blank" class="brand m-brand" href="<?php echo base_url(); ?>"><?php echo $_SESSION['site_title']; ?><h4><?php echo $_SESSION['site_quotes']; ?></h4></a>
		        
				<div class="nav-collapse collapse">
	
					<div class="btn-group pull-right">
				        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			          		<i class="icon-user"></i> <?php echo $this->session->userdata("nama_user_login"); ?>
			          		<span class="caret"></span>
				        </a>
				        <ul class="dropdown-menu">
			          		<li><a href="<?php echo base_url(); ?>superadmin/profil"><i class="icon-map-marker"></i> Profil User</a></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/password"><i class="icon-folder-open"></i> Password User</a></li>
	 		 				<li class="divider"></li>
			          		<li><a href="<?php echo base_url(); ?>auth/user_login/logout"><i class="icon-off"></i> Logout</a></li>
				        </ul>
			      	</div>
	
					<div class="btn-group pull-right">
				        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			          		<i class="icon-cog"></i> Konfigurasi
			          		<span class="caret"></span>
				        </a>
				        <ul class="dropdown-menu">
			          		<li><a href="<?php echo base_url(); ?>superadmin/link"><i class="icon-resize-full"></i> Link Terkait</a></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/kecamatan"><i class="icon-briefcase"></i> Kecamatan</a></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/bidang"><i class="icon-th-list"></i> Bidang</a></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/unit_kerja"><i class="icon-tasks"></i> Unit Kerja</a></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/jenjang_pendidikan"><i class="icon-signal"></i> Jenjang Pendidikan</a></li>
	 		 				<li class="divider"></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/user"><i class="icon-leaf"></i> Manajemen User</a></li>
							
	 		 				<li class="divider"></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/routing_pages"><i class="icon-refresh"></i> Routing Pages</a></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/sistem"><i class="icon-fire"></i> Sistem</a></li>
				        </ul>
			      	</div>
	
					<div class="btn-group pull-right">
				        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			          		<i class="icon-th"></i> UPTD
			          		<span class="caret"></span>
				        </a>
				        <ul class="dropdown-menu">
			          		<li><a href="<?php echo base_url(); ?>superadmin/user_uptd"><i class="icon-user"></i> User UPTD</a></li>
	 		 				<li class="divider"></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/artikel_uptd"><i class="icon-list"></i> Artikel UPTD</a></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/galeri_uptd"><i class="icon-picture"></i> Galeri UPTD</a></li>
				        </ul>
			      	</div>
	
					<div class="btn-group pull-right">
				        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			          		<i class="icon-star"></i> Pengawas
			          		<span class="caret"></span>
				        </a>
				        <ul class="dropdown-menu">
			          		<li><a href="<?php echo base_url(); ?>superadmin/user_pengawas"><i class="icon-user"></i> User Pengawas</a></li>
	 		 				<li class="divider"></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/pengawas_sekolah"><i class="icon-list"></i> Data Pegawai</a></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/artikel_pengawas"><i class="icon-play-circle"></i> Artikel Pengawas</a></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/agenda_pengawas"><i class="icon-print"></i> Agenda Pengawas</a></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/berita_pengawas"><i class="icon-share"></i> Berita Pengawas</a></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/pengumuman_pengawas"><i class="icon-ok circle"></i> Pengumuman Pengawas</a></li>
				        </ul>
			      	</div>
				
					<div class="btn-group pull-right">
							<a class="btn" href="<?php echo base_url(); ?>superadmin">
								<i class="icon-home"></i> Home
							</a>
					</div>
	          	</div>
			</div>
		</div>
	</div>
	<div class="m-top"></div>
	<aside class="sidebar">
		<ul class="nav nav-tabs nav-stacked">

			<li class="<?php echo $aktif_artikel_sekolah; ?>">
				<a href="<?php echo base_url(); ?>superadmin/artikel_sekolah">
				<?php if($_SESSION['count_artikel_sekolah']!=0){ ?>
					<span class="badge badge-important m-badge-notification"><?php echo $_SESSION['count_artikel_sekolah']; ?></span>
				<?php } ?>
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-artikel.png">
						</div>
						<div class="title">
							ARTIKEL SEKOLAH
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="<?php echo $aktif_galeri_sekolah; ?>">
				<a href="<?php echo base_url(); ?>superadmin/galeri_sekolah">
				<?php if($_SESSION['count_galeri_sekolah']!=0){ ?>
					<span class="badge badge-important m-badge-notification"><?php echo $_SESSION['count_galeri_sekolah']; ?></span>
				<?php } ?>
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-galerisekolah.png">
						</div>
						<div class="title">
							GALERI SEKOLAH
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="<?php echo $aktif_berita; ?>">
				<a href="<?php echo base_url(); ?>superadmin/berita">
				<?php if($_SESSION['count_berita']!=0){ ?>
					<span class="badge badge-important m-badge-notification"><?php echo $_SESSION['count_berita']; ?></span>
				<?php } ?>
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-berita.png">
						</div>
						<div class="title">
							BERITA DINAS
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="<?php echo $aktif_pengumuman; ?>">
				<a href="<?php echo base_url(); ?>superadmin/pengumuman">
				<?php if($_SESSION['count_pengumuman']!=0){ ?>
					<span class="badge badge-important m-badge-notification"><?php echo $_SESSION['count_pengumuman']; ?></span>
				<?php } ?>
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-pengumuman.png">
						</div>
						<div class="title">
							PENGUMUMAN
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="<?php echo $aktif_agenda; ?>">
				<a href="<?php echo base_url(); ?>superadmin/agenda">
				<?php if($_SESSION['count_agenda']!=0){ ?>
					<span class="badge badge-important m-badge-notification"><?php echo $_SESSION['count_agenda']; ?></span>
				<?php } ?>
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-agenda.png">
						</div>
						<div class="title">
							AGENDA DINAS
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="<?php echo $aktif_buku_tamu; ?>">
				<a href="<?php echo base_url(); ?>superadmin/buku_tamu">
				<?php if($_SESSION['count_buku_tamu']!=0){ ?>
					<span class="badge badge-important m-badge-notification"><?php echo $_SESSION['count_buku_tamu']; ?></span>
				<?php } ?>
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-bukutamu.png">
						</div>
						<div class="title">
							BUKU TAMU
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="<?php echo $aktif_list_download; ?>">
				<a href="<?php echo base_url(); ?>superadmin/list_download">
				<?php if($_SESSION['count_list_download']!=0){ ?>
					<span class="badge badge-important m-badge-notification"><?php echo $_SESSION['count_list_download']; ?></span>
				<?php } ?>
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-download.png">
						</div>
						<div class="title">
							LIST DOWNLOAD
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="">
				<a href="<?php echo base_url(); ?>superadmin/kepegawaian">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-bidang.png" width="20">
						</div>
						<div class="title">
							KEPEGAWAIAN
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="">
				<a href="<?php echo base_url(); ?>superadmin/sekolah">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-sekolah.png" width="25">
						</div>
						<div class="title">
							DATA SEKOLAH
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="">
				<a href="<?php echo base_url(); ?>superadmin/galeri_kegiatan">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-galeri.png" width="24">
						</div>
						<div class="title">
							GALERI KEGIATAN
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="">
				<a href="<?php echo base_url(); ?>superadmin/admin_dinas">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-dinas.png" height="20">
						</div>
						<div class="title">
							ADMIN DINAS
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="">
				<a href="<?php echo base_url(); ?>superadmin/operator">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-operator.png" height="20">
						</div>
						<div class="title">
							OPERATOR
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="">
				<a href="<?php echo base_url(); ?>superadmin/polling">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-poll.png" width="21">
						</div>
						<div class="title">
							POLLING
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="">
				<a href="#" id="btn-more">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-more.png">
						</div>
						<div class="title">
							MORE
						</div>
					</div>
				</a>

			</li>
	    </ul>
	</aside>
	<div class="m-sidebar-collapsed">
		<ul class="nav nav-pills">
			
		</ul>

		<div class="arrow-border">
			<div class="arrow-inner"></div>
		</div>
	</div>
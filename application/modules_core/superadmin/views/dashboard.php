
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
</head>
<body>
	<div class="navbar navbar-fixed-top m-header">
		<div class="navbar-inner m-inner">
		
			<div class="container-fluid">
				<a class="brand m-brand" href="./index.html"><?php echo $_SESSION['site_title']; ?><h4><?php echo $_SESSION['site_quotes']; ?></h4></a>
		        
				<div class="nav-collapse collapse">
	
					<div class="btn-group pull-right">
				        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			          		<i class="icon-user"></i> Thanh Dang
			          		<span class="caret"></span>
				        </a>
				        <ul class="dropdown-menu">
			          		<li><a href="#"><i class="icon-user"></i> Profile</a></li>
			          		<li><a href="#"><i class="icon-wrench"></i> Password</a></li>
	 		 				<li class="divider"></li>
			          		<li><a href="login.html"><i class="icon-off"></i> Logout</a></li>
				        </ul>
			      	</div>
				
					<div class="btn-group pull-right">
							<a class="btn" href="#">
								<i class="icon-cog"></i> Konfigurasi Sistem
							</a>
					</div>
				
					<div class="btn-group pull-right">
							<a class="btn" href="#">
								<i class="icon-home"></i> Beranda
							</a>
					</div>
	          	</div>
			</div>
		</div>
	</div>
	<div class="m-top"></div>
	<aside class="sidebar">
		<ul class="nav nav-tabs nav-stacked">

			<li class="">
				<a href="#more">
					<span class="badge badge-success m-badge-notification">5</span>
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

			<li class="">
				<a href="#more">
					<span class="badge badge-success m-badge-notification">5</span>
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

			<li>
				<a href="form.html">
					<span class="badge badge-success m-badge-notification">5</span>
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

			<li>
				<a href="order.html">
					<span class="badge badge-success m-badge-notification">5</span>
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

			<li class="">
				<a href="media.html">
					<span class="badge badge-success m-badge-notification">5</span>
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

			<li class="">
				<a href="help.html">
					<span class="badge badge-success m-badge-notification">5</span>
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

			<li class="">
				<a href="#more">
					<span class="badge badge-success m-badge-notification">5</span>
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
				<a href="help.html">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-galeri.png">
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
				<a href="help.html">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-dinas.png">
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
				<a href="help.html">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-operator.png">
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
				<a href="help.html">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-poll.png">
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
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Order</h1>
				</div>

				<table class="table table-striped table-condensed">
					<thead>
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>Date</th>
							<th class="tc">Total</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>004</td>
							<td>the-smashing-book-3-redesign-the-web.epub</td>
							<td>06:23 PM 2012-07-22</td>
							<td class="tc">19$</td>
							<td><span class="label label-success">pending</span></td>
							<td class="tr">
								<a href="#" class="btn" title="Setujui konten ini"><i class="icon-ok"></i></a>
								<a href="#" class="btn" title="Edit Konten"><i class="icon-edit"></i></a>
								<a href="#" class="btn" title="Hapus Konten" onClick="return confirm('Anda Yakin?');"><i class="icon-trash"></i></a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="6">
								<div class="pagination">
									<ul>
										<li><a href="#">&laquo;</a></li>
										<li><a href="#">1</a></li>
										<li class="active"><a href="#">2</a></li>
										<li class="disabled"><a href="#">...</a></li>
										<li><a href="#">6</a></li>
										<li><a href="#">7</a></li>
										<li><a href="#">&raquo;</a></li>
									</ul>
								</div>
							</td>
						</tr>
					</tfoot>
				</table>
			</section>e
		</div>
	</div>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $_SESSION['site_title']; ?></title>
<link href="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/css/style.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/css/ticker-style.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/css/menu.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/css/slider.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/css/breadcrumb.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/css/chosen.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script> 
<script language="javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/jquery.ticker.js"></script>
<script language="javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/site.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/jquery.jcarousel.min.js" ></script>
<script src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/redactor/jquery-1.7.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/skrip.js" ></script>
<script language="javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/menu.js"></script>
<link href="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/redactor/redactor.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/redactor/redactor.min.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
$(document).ready( function()
	{	
		$('#lofslidecontent45').lofJSidernews( { interval:4000,
												 easing:'easeInOutQuad',
												duration:1000,
												auto:true } );	
		
			$('#alamat').redactor();
			$('#visi_misi').redactor();				
	});
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/css/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript">
		$(document).ready(function() {
			$("a[rel=galeri]").fancybox({
				'transitionIn'		: 'fade',
				'transitionOut'		: 'fade',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});});
</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script>
	$(function() {
		$( "#datepicker" ).datepicker({dateFormat: 'dd/mm/yy'});
		$( "#tanggal_lahir" ).datepicker({dateFormat: 'mm/dd/yy'});
		$( "#tanggal_bertugas" ).datepicker({dateFormat: 'mm/dd/yy'});
	});
</script>
</head>

<body>
<div id="first-top-menu">
<div id="main-menu">
<div id="inner-main-menu">
	<div id="MainMenu"><div id="Menu">
	  <div class="suckertreemenu">
		<?php echo $menu_atas; ?>
		</div>
	</div>
	</div>
	</div>
</div>
	
	<div style="float:right; width:300px; padding-top:3px;">
	<form class="quick_search">
	<input type="text" placeholder="Form Pencarian....">
	<input type="submit" value="SEARCH" />
	</form>
	</div>
	<div class="cleaner_h0"></div>
</div>
<div class="cleaner_h50"></div>
<div class="cleaner_h50"></div>
<div class="cleaner_h20"></div>
<div class="cleaner_h1"></div>
<div class="cleaner_h1"></div>
<div class="cleaner_h1"></div>
<div class="cleaner_h1"></div>
<div id="main-menu">
<div id="inner-main-menu-bottom">
	<?php echo $menu_bawah; ?>
</div>
</div>

<div class="cleaner_h10"></div>
<div class="cleaner_h10"></div>
<div id="content">
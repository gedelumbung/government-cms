<?php
	if($_SESSION['site_slider']=="yes")
	{
?>
	<div id="slider-top">
	<div id="left-slider-top">
	<div style="padding-left:25px;"><img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/sambutan-title.png" /></div>
	<img src="<?php echo base_url(); ?>asset/images/<?php echo $_SESSION['site_kepala_dinas']; ?>" style="float:left; margin:0px 5px 0px 0px;" width="120" />
	<?php echo $_SESSION['site_sambutan']; ?>
	</div>
	<div id="right-slider-top">
	<div id="lofslidecontent45" class="lof-slidecontent"> 
	<div  class="preload"><div></div></div> 
	 <!-- MAIN CONTENT --> 
	<div class="lof-main-outer"> 
		<ul class="lof-main-wapper">
			<?php echo $dt_berita_slide_content; ?>
		</ul> 
		</div>          
		<div class="lof-navigator-outer"> 
		
		<ul class="lof-navigator"> 
			<?php echo $dt_berita_slide_navigator; ?>
		</div> 
	</div> 
	</div>
<div class="cleaner_h0"></div>
</div>
<div class="cleaner_h20"></div>
<?php
	}
?>
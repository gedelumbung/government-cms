<div id="footer-menu">
<div id="center-footer-menu">
<?php echo $menu_bawah; ?>
<?php echo $menu_atas; ?>
</div>
</div>

<div id="footer">
<div id="inner-footer">
<div id="sub-kategori">
	<h1>GALERI KEGIATAN TERBARU</h1>
	<?php echo $dt_galeri; ?>
</div>

<div id="sub-kategori">
	<h1>ARTIKEL SEKOLAH TERBARU</h1>
	<ul>
		<?php echo $dt_artikel_sekolah; ?>
	</ul>
</div>

</div>

<div class="cleaner_h20"></div>
<?php echo $_SESSION['site_footer']; ?>
<div class="cleaner_h40"></div>
</div>
</body>
</html>

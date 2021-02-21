</div>

</div>

<div id="footer">

	<div id="footer-content" class="clear">

		<div id="footer-content-left">

		<?php if (!$this->options->navPosition): ?>
			<nav id="nav-2">

			<?php $this->need('nav.php'); ?>

			</nav>
		<?php endif; ?>
		
            <p><?php $this->options->beian(); ?></p>

            <p>©<?php $this->options->title(); ?> | <span id="site_runtime"></span></p>

		</div>




	</div>



	<script src="https://blog.loli.top/usr/themes/po/JS/jquery.min.js"></script>

	<script src="https://blog.loli.top/usr/themes/po/JS/jquery.pjax.min.js"></script>

 	<script src="<?php $this->options->themeUrl('JS/X.js'); ?>"></script>
	
	<script src="<?php $this->options->themeUrl('JS/prism.js'); ?>"></script>

	<script src="<?php $this->options->themeUrl('JS/clipboard.min.js'); ?>"></script>

	<script src="<?php $this->options->themeUrl('JS/toastr.min.js'); ?>"></script>

	<script src="<?php $this->options->themeUrl('JS/jquery.fancybox.min.js'); ?>"></script>

    <script src="<?php $this->options->themeUrl('JS/nprogress.js'); ?>"></script>

	<?php $this->footer(); ?>



	<script>

		ajaxc();

		PreFancybox();

		show_site_runtime("<?php getBuildTime($this->options->builtTime);?>");

	</script>



</div>


<div id="m_top">

	<span><a href="#top"><i class="i gototop"></i></a></span>

</div>


</body>


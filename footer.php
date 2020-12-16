</div>

</div>

<div id="footer">

	<div id="footer-content" class="clear">

		<div id="footer-content-left">

			<nav id="nav-2">

				<a href="<?php Helper::options()->siteUrl()?>">首页</a>

	
                                <a href="<?php Helper::options()->siteUrl()?>bb.html">留言</a>

				<a href="<?php Helper::options()->siteUrl()?>archive.html">归档</a>

                                <a href="<?php Helper::options()->siteUrl()?>links.html">邻居</a>

				<a href="<?php Helper::options()->siteUrl()?>about.html">关于</a>

				<?php if (isset($this->options->plugins['activated']['ExSearch'])) : ?>

				<a class="search-form-input">搜索</a>

				<?php endif ?>

			</nav>

            <p><?php $this->options->beian(); ?></p>

            <p>©<?php $this->options->title(); ?> | <span id="site_runtime"></span></p>

		</div>




	</div>



	<script src="https://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>

	<script src="https://cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>

 	<script src="<?php $this->options->themeUrl('JS/X.js'); ?>"></script>

	<script src="<?php $this->options->themeUrl('JS/prism.js'); ?>"></script>

	<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

	<script src="https://cdn.bootcss.com/fancybox/3.5.6/jquery.fancybox.min.js"></script>

	<?php $this->footer(); ?>



	<script>

		ajaxc();

		PreFancybox();

		show_site_runtime("<?php getBuildTime($this->options->builtTime);?>");

	</script>



</div>





<?php if (isset($this->options->plugins['activated']['ExSearch'])) : ?>

	<div id="m_search">

		<span><a><i class="i m_search search-form-input"></i></a></span>

	</div>

<?php endif ?>





<div id="m_top">

	<span><a href="#top"><i class="i gototop"></i></a></span>

</div>



</body>


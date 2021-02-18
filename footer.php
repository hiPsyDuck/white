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


			</nav>

            <p><?php $this->options->beian(); ?></p>

            <p>©<?php $this->options->title(); ?> | <span id="site_runtime"></span></p>

		</div>




	</div>



	<script src="https://blog.loli.top/usr/themes/po/JS/jquery.min.js"></script>

	<script src="https://blog.loli.top/usr/themes/po/JS/jquery.pjax.min.js"></script>

 	<script src="<?php $this->options->themeUrl('JS/X.js'); ?>"></script>

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


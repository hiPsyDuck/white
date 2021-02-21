<html>

<head>

	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, width=device-width"/>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />


	<title><?php $this->archiveTitle(' &raquo; ', '', ' | '); ?><?php $this->options->title(); ?></title>



	<link rel="stylesheet" href="<?php $this->options->themeUrl('CSS/white.css'); ?>" rel="stylesheet" />

	<link rel="stylesheet" href="<?php $this->options->themeUrl('CSS/shortcode.white.css'); ?>" rel="stylesheet" />

	<link rel="stylesheet" href="<?php $this->options->themeUrl('CSS/OwO.min.css'); ?>" rel="stylesheet" />

	<link rel="stylesheet" href="<?php $this->options->themeUrl('CSS/prism.css'); ?>" rel="stylesheet" />

    <link rel="stylesheet" href="<?php $this->options->themeUrl('CSS/jquery.fancybox.min.css'); ?>" rel="stylesheet" />

    <link rel="stylesheet" href="<?php $this->options->themeUrl('CSS/toastr.min.css'); ?>" rel="stylesheet" />

    <link rel="stylesheet" href="<?php $this->options->themeUrl('CSS/nprogress.css'); ?>" rel="stylesheet" />

	<style>
		.article-item {

	    background: white;

	    padding: 30px 49px;

		}

		.article-item h2{

	    margin-bottom: 13px;

		}

		@media screen and (max-width: 768px) {

			.article-item {

		    padding: 25px 40px;

			}

			#pjax-container {
				margin: 0 auto;
			}

		}

		@media screen and (max-width: 1024px) {

			.article-item {

		    padding: 25px 25px;

			}

			#pjax-container {
				margin: 0 auto;
			}

		}

		html{

			background-color: <?php $this->options->bkcolor(); ?>;

		}

		html::before{

			  background-image: url(<?php $this->options->bkimg(); ?>);

		}

	
		<?php if ($this->options->pageShadow): ?>
			
			.pjax-container-shadow {
				box-shadow: 0 10px 20px 0 hsl(0deg 0% 70% / 86%);
			}
		
		<?php endif; ?>


		<?php if ($this->options->animateTime): ?>



		.opacity-show {

			animation: opacity-show <?php $this->options->animateTime(); ?>;

			-moz-animation: opacity-show <?php $this->options->animateTime(); ?>;

			/* Firefox*/

			-webkit-animation: opacity-show <?php $this->options->animateTime(); ?>;

			/* Safari and Chrome*/

			-o-animation: opacity-show <?php $this->options->animateTime(); ?>;

			/* Opera*/

		}

		.opacity-disappear {

			animation: opacity-disappear <?php $this->options->animateTime(); ?>;

			-moz-animation: opacity-disappear <?php $this->options->animateTime(); ?>;

			/* Firefox*/

			-webkit-animation: opacity-disappear <?php $this->options->animateTime(); ?>;

			/* Safari and Chrome*/

			-o-animation: opacity-disappear <?php $this->options->animateTime(); ?>;

			/* Opera*/

		}

		<?php else: ?>

		.opacity-show {

			animation: opacity-show 1s;

			-moz-animation: opacity-show 1s;

			/* Firefox*/

			-webkit-animation: opacity-show 1s;

			/* Safari and Chrome*/

			-o-animation: opacity-show 1s;

			/* Opera*/

		}

		.opacity-disappear {

			animation: opacity-disappear 1s;

			-moz-animation: opacity-disappear 1s;

			/* Firefox*/

			-webkit-animation: opacity-disappear 1s;

			/* Safari and Chrome*/

			-o-animation: opacity-disappear 1s;

			/* Opera*/

		}

		<?php endif; ?>



		<?php if ($this->options->titleColor): ?>

		#post-content-article h1,#post-content-article h2,#post-content-article h3,#post-content-article h4 {

			color: <?php $this->options->titleColor(); ?>;

			border-bottom: none;

		}

		#post-content-article h1:hover,#post-content-article h2:hover,#post-content-article h3:hover,#post-content-article h4:hover {

			letter-spacing: 0.2rem;

			border-bottom: none;

		}

		<?php else: ?>

		#post-content-article h1,#post-content-article h2,#post-content-article h3,#post-content-article h4 {

			color: #444;

		}



		<?php endif; ?>

	</style>



	<link rel="icon" type="image/png" href="<?php $this->options->favicon(); ?>">

	<link href="<?php $this->options->favicon(); ?>" rel="icon">

	<link rel='dns-prefetch' href='//s.w.org'>

	<link rel="apple-touch-icon-precomposed" href="<?php $this->options->favicon(); ?>">

	<?php $this->header(); ?>

</head>



<body ontouchstart>

	<!-- 头部/pjax -->
    <a id="top" style="position: absolute;top: 0"></a>
	<div id="pjax-container" class="pjax-container-shadow">

		<div id="header" <?php if ($this->options->navPosition): ?> style="padding-bottom: 10px" <?php endif; ?>>

			<div id="header-container">

				<div id="header-text">
                    <a href="<?php Helper::options()->siteUrl()?>">
                        <div id="header-title"><?php $this->options->title(); ?></div>
                    </a>
                        <span><?php $this->options->description() ?></span>

                </div>

                <a id="header-imgUrl" href="<?php Helper::options()->siteUrl()?>"><img id="header-avatar" src="<?php $this->options->favicon(); ?>"></a>

				<?php if ($this->options->navPosition): ?>
					<nav id="nav-top">

					<?php $this->need('nav.php'); ?>

					</nav>
				<?php endif; ?>




			</div>

		</div>



		<div id="M">


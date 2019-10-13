<!DOCTYPE html>
<html lang="ru">

<head>

  <meta charset="utf-8">

  <meta name="description" content="<?php bloginfo( 'description' ); ?>">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <link rel="icon" href="<?=get_template_directory_uri()?>/assets/images/favicon/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="<?=get_template_directory_uri()?>/assets/images/favicon/favicon.ico">
  <meta property="og:image" content="path/to/image.jpg">
  <meta name="theme-color" content="#000">
  
  <?php wp_head(); ?>

</head>

<body>

	<header id="header">
		<div class="container flex">
			<a href="<?php bloginfo( 'url' ); ?>" class="logoHeader flex">
				<img src="<?=get_template_directory_uri()?>/assets/images/shield-logo.png" alt="">
				<span class="titleHeader">Agents of</span>
				<span class="titleHeader2">S.H.I.E.L.D</span>
			</a>
			<div class="menuBlock">
				<?php wp_nav_menu( array(
					'theme_location'	=> 'top',
					'container'			=> null,
					'menu_class'		=> 'menuHeader flex',
					'menu_id'			=> ''
				)); ?>
			</div>
			<div class="searchBlock">
				<form id="search" action="">
					<input type="text" placeholder="Поиск">
					<i class="fa fa-search"></i>
				</form>
			</div>
		</div>
	</header>
	
	<div id="banner" style="background-image: url(<?=get_template_directory_uri()?>/assets/images/bg-shield.jpg)"></div>
	
	<div id="main" class="column">
		<?php if($_SERVER['REQUEST_URI'] !== '/'):$j=1;?>
		<div class="container headbar">
			<ul class="headbar-ul" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?=get_home_url()?>" rel="home" itemprop="item"><span itemprop="name">Агенты «Щ.И.Т.»</span></a><meta itemprop="position" content="<?=$j++?>" /></li>
				<?php/*
					$name = '';
					$c = get_query_var('cat');
					$c = get_the_category();
					$seasons = array(5,6,7,8,9,10);
					$tests = array(3070,3072,3073);
					$films = array(3556);
					if($c)
						$name = get_field('player_name', 'category_'.$c[0]->cat_ID);
					if($name || in_array($c[0]->cat_ID, $seasons)):
				?>
				<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span class="b-icon"></span><a href="http://shieldtv.ru/online" itemprop="item"><span itemprop="name">Все сезоны</span></a><meta itemprop="position" content="<?=$j++?>" /></li>
				<?php
					elseif(is_page() && in_array(get_the_ID(), $tests)):
				?>
					<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span class="b-icon"></span><a href="https://theflash.tv/testy" itemprop="item"><span itemprop="name">Все тесты</span></a><meta itemprop="position" content="<?=$j++?>" /></li>
				<?php
					endif;
					if(is_single() || is_page()):
						if($c):
				?>
					<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span class="b-icon"></span><a href="<?=get_category_link($c[0]->cat_ID)?>" itemprop="item"><span itemprop="name"><?php if($name):?><?=$name?><?php else:?><?=$c[0]->name;?><?php endif;?></span></a><meta itemprop="position" content="<?=$j?>" /></li>
				<?php endif;?>
			<?php endif;*/?></ul></div>
		<?php endif;?>
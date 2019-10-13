<?php
/*
* Template Name: Страница Карта сайта
*/
?>
<?php get_header(); ?>

	<div id="sliderBlock" class="container" itemscope="" itemtype="https://schema.org/TVSeries">
		<h1 itemprop="name"><?=get_the_title()?></h1>
	</div>
    <div id="page" class="container flex">
		<div id="content">
			<?php $ID = 0;if(have_posts()):?>
			<?php while(have_posts()):the_post();$ID = get_the_ID();?>
			<?php the_content();?>
			<?php endwhile;endif;?>
		</div>
		<?php get_sidebar();?>
    </div>

<?php get_footer();?>
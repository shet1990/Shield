<?php
/*
* Template Name: Страница музыка
*/
?>
<?php get_header(); ?>

	<div id="sliderBlock" class="container" itemscope="" itemtype="https://schema.org/TVSeries">
		<h1 itemprop="name"><?=get_the_title()?></h1>
	</div>
    <div id="page" class="container flex">
		<div id="content">
			<div class="description">
				<?=get_the_content()?>
			</div>
		</div>
		<?php get_sidebar();?>
    </div>

<?php get_footer();?>
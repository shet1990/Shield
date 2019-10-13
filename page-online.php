<?php
/*
* Template Name: Страница всех сезонов
*/
?>
<?php get_header(); ?>


	<div id="sliderBlock" class="container" itemscope="" itemtype="https://schema.org/TVSeries">
		<h1 itemprop="name"><?=get_the_title()?></h1>
	</div>
    <div id="page" class="container flex">
		<div id="content">
			<?php if(have_posts()):while(have_posts()):the_post();?>
			<div class="season-list" itemscope itemtype="http://schema.org/TVSeries">
				<?php
					$seasons = get_field("seasons", get_the_ID());
					if(count($seasons)):
				?>
					<ul>
						<?php
							foreach($seasons as $season):
								$desc = get_field('preview_text', 'category_'.$season->term_id);
								$link = get_category_link($season->term_id);
								$name = get_field('preview_name', 'category_'.$season->term_id);
								$date = get_field('date_publish', 'category_'.$season->term_id);
								$img_id = get_field('img', 'category_'.$season->term_id);
								$img = wp_get_attachment_image_src($img_id['ID'], 'cat-category');
						?>
							<li itemprop="containsSeason" itemscope itemtype="http://schema.org/TVSeason">
								<?php if($img[0]):?>
									<a href="<?=$link?>" class="season-img" rel="nofollow" title="Все серии Агентов ЩИТ: <?=str_replace("С","с",$season->name)?> онлайн" itemscope="" itemtype="https://schema.org/ImageObject">
										<span class="play"><i class="fas fa-play"></i></span>
										<img src="<?=$img[0]?>" width="<?=$img[1]?>" height="<?=$img[2]?>" alt="<?=$name?> сериала Флэш" itemprop="image" />
										<meta itemprop="width" content="<?=$img[1]?>" />
										<meta itemprop="height" content="<?=$img[2]?>" />
									</a>
								<?php endif;?>
								<div class="info">
									<div class="top">
										<a href="<?=$link?>" class="hov" title="Все серии Агентов ЩИТ: <?=str_replace("С","с",$season->name)?> онлайн" itemprop="url name"><?=$name?></a>
										<span class="count">Количество эпизодов: <?=$season->count?></span>
									</div>
									<p><?=$desc?></p>
									<meta itemprop="numberOfEpisodes" content="<?=$season->count?>" />
									<meta itemprop="datePublished" content="<?=$date?>" />
									<meta itemprop="description" content="<?=$desc?>" />
								</div>
							</li>
						<?php endforeach;?>
					</ul>
				<?php endif;?>
			</div>
			<?php endwhile;endif;?>
			<div class="descrBlock">
				<div class="descr-cont">
					<div class="descr">
						<h2>Краткое описание сериала</h2>
						<?php the_content();?>
					</div>
				</div>
			</div>
		</div>
		<?php get_sidebar();?>
    </div>

<?php get_footer();?>
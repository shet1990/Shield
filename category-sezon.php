    <div id="sliderBlock" class="container"  itemscope="" itemtype="https://schema.org/TVSeries">
		<?php
			$c = get_category(get_query_var('cat'), OBJECT);
			
		?>
		<h1 itemprop="name"><? $h1 = get_field('h1', 'category_'.$c->term_id);if($h1):?><?=$h1?><?else:?><?=$c->name?><?endif;?></h1>
    </div>
    <div id="page" class="container flex">
		<div id="content" itemprop="containsSeason" itemscope itemtype="http://schema.org/TVSeason">
			<?$datePublished = '';
			$series = new WP_Query(array(
				'cat' 				=>	$c->term_id,
				'posts_per_page' 	=>	100,
				'orderby'			=>	'date',
				'order'				=>	'ASC'
			));
			if($series->have_posts()):?>
			<ul class="seriesList">
				<?php while($series->have_posts()):$series->the_post();
					$id = get_the_ID();
					$l = get_the_permalink();
					$desc_series = get_the_excerpt();
					$img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'cat-series');
					
					if(!$img[0]){
						$img = wp_get_attachment_image_src(get_field("img", "category_".$c->term_id), 'cat-series');
					}

					if(!$datePublished){
						$datePublished = get_the_date("Y-m-d\TH:i:s+00:00");
					}
					
					$num = get_field('num', $id);
					$code_video = explode("'", get_field('code_1', $id));
				?>
					<li>
						<meta content="<?=$num?>" itemprop="episodeNumber" />
						<div itemprop="video" itemscope="" itemtype="https://schema.org/VideoObject">
							<meta itemprop="name" content="Агенты ЩИТ: <?=str_replace("Сезон","сезон",$c->name)?>, серия <?=$num?>" />
							<meta itemprop="url" content="<?=$code_video[1]?>" />
							<meta itemprop="duration" content="PT52M0S" />
							<meta itemprop="thumbnailUrl" content="<?=$img[0]?>" />
							<meta itemprop="isFamilyFriendly" content="true" />
							<meta itemprop="uploadDate" content="<?=get_the_date("Y-m-d\TH:i:s")?>" />
							<meta content="<?=$desc_series?>" itemprop="description" />
							<div itemprop="thumbnail" itemscope="" itemtype="https://schema.org/ImageObject">
								<meta itemprop="image" content="<?=$img[0]?>" />
								<meta itemprop="width" content="<?=$img[1]?>" />
								<meta itemprop="height" content="<?=$img[2]?>" />
							</div>
						</div>
						<div itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
							<meta itemprop="image" content="<?=$img[0]?>" />
							<meta itemprop="width" content="<?=$img[1]?>" />
							<meta itemprop="height" content="<?=$img[2]?>" />
						</div>
						<meta content="<?=$desc_series?>" itemprop="description" />
						<a href="<?=$l?>" class="img-series" rel="nofollow" title="Просмотр <?=$num?> серии онлайн" itemscope="" itemtype="https://schema.org/ImageObject">
							<span class="play"><i class="fa-play"></i></span>
							<img src="<?=$img[0]?>" width="<?=$img[1]?>" height="<?=$img[2]?>" alt="<?=get_field('name', $id)?>" title="<?=get_field('name', $id)?>" itemprop="image" >
						</a>
						<div class="bottom">
							<a href="<?=$l?>" class="title"  title="Перейти к просмотру <?=$num?>-й серии онлайн"><?=str_replace("Сезон ","",$c->name)?> сезон <?=$num?> серия</a>
							<a href="<?=$l?>" title="Смотреть <?=$num?> серию онлайн" class="name hov"><?=get_field('name', $id)?></a>
						</div>
					</li>
			<?php endwhile;?>
		</ul>
		<?php else:?>
			<p class="noList">К сожалению, серий этого сезона пока нет.</p>
		<?php endif;?>
		<?php if($c->description):?><div class="description"><?=$c->description?></div><?php endif;?>
		</div>
    </div>
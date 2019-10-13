	<div id="sliderBlock" class="container">
	</div>
    <div id="page" class="container flex" itemscope itemtype="http://schema.org/NewsArticle">
		<div id="content" itemprop="mainEntityOfPage">
		<?php $ID = 0;if(have_posts()):?>
			<?php while(have_posts()):the_post();$ID = get_the_ID();$title=get_the_title();$time=get_post_time();$thumbId = get_post_thumbnail_id();$date = get_the_date('d-m-Y');$title2 = get_field('title', $ID);?>
			<div class="newsPost">
				<div class="topPost" itemprop="headline">
				<?php $img = wp_get_attachment_image_src($thumbId, 'cat-series');$imgBig = wp_get_attachment_image_src($thumbId, 'original');?>
					<a href="<?=$imgBig[0	]?>" class="img-news image-popup-no-margins" rel="nofollow" itemscope="" itemtype="https://schema.org/ImageObject" itemprop="image">
						<img src="<?=$img[0]?>" alt="" width="<?=$img[1]?>" height="<?=$img[2]?>" itemprop="url image">
						<meta itemprop="width" content="<?=$img[1]?>" />
						<meta itemprop="height" content="<?=$img[2]?>" />
					</a>
					<div class="info-block">
						<h1 class="title" itemprop="name"><?=$title?></h1>
						<span class="date"><?=$date?></span>
						<?if($title2):?>
							<span class="dop-title"><?=$title2?></span>
						<?endif;?>
					</div>
				</div>
				<div class="descrBlock">
					<div class="descr"  itemprop="description">
						<?=get_the_content()?>
						<meta itemprop="author" content="ShieldTV.RU" />
						<meta itemprop="datePublished" content="<?=date('Y-m-d\TH:i:s-03:00',$time)?>" />
						<meta itemprop="dateModified" content="<?=get_the_modified_date('Y-m-d\TH:i:s-03:00')?>" />
						<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
							<meta itemprop="name" content="ShieldTV.RU">
							<meta itemprop="telephone" content="7777777"/>
							<meta itemprop="address" content="ShieldTV.RU/>
							<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
								<meta itemprop="url image" content="<?=get_template_directory_uri()?>/assets/images/favicon/favicon.ico" />
								<meta itemprop="width" content="400" />
								<meta itemprop="height" content="400" />
							</span>
						</div>
					</div>
				</div>
				<?php
					$prevNews = get_adjacent_post(true,'',true);
					$nextNews = get_adjacent_post(true,'',false);
					
					if($prevNews || $nextNews):
				?>
					<div class="bottomNav">
					<?php
						if($prevNews):
							$l = get_the_permalink($prevNews->ID);
					?>
						<a href="<?=$l?>" class="arrow prev" rel="prev" title="Читать предыдущую новость: <?=$prevNews->post_title?>">Предыдущая новость</a>
					<?php endif;?>
					<?php
						if($nextNews):
							$l = get_the_permalink($nextNews->ID);
					?>
						<a href="<?=$l?>" class="arrow next" rel="next" title="Читать следующую новость: <?=$nextNews->post_title?>">Следующая новость</a>
					<?php endif;?>
					</div>
				<?php endif;?>
			</div>
		<?endwhile;endif;?>
		<?php if(function_exists("related_posts")) related_posts();?>
		</div>
		<?php get_sidebar('news');?>
    </div>
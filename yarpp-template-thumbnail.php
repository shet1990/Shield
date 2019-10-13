<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
<?php
$imgSize = 'new_posts';

if(in_category(12))
	$imgSize = 'cat-actors';

if(have_posts()):?>
	<div class="yarppBlock">
		<!--noindex--><h3>Вам будет это интересно</h3><!--/noindex-->
		<ul class="relatedList">
			<?php while(have_posts()):the_post();if(has_post_thumbnail()):
					$img = wp_get_attachment_image_src(get_post_thumbnail_id(), $imgSize);
					$title = get_the_title();
					$l = get_the_permalink();
				?>
			<li itemscope itemtype="http://schema.org/ItemPage">
				<a href="<?=$l?>" rel="nofollow" title="Перейти на <?=$title?>" itemscope="" itemtype="https://schema.org/ImageObject">
					<img src="<?=$img[0]?>" width="<?=$img[1]?>" height="<?=$img[2]?>" alt="<?=$title?>" title="<?=$title?>" itemprop="image" />
					<meta itemprop="width" content="<?=$img[1]?>" />
					<meta itemprop="height" content="<?=$img[2]?>" />
				</a>
				<a href="<?=$l?>" class="hov" title="Перейти на <?=$title?>" itemprop="significantLink"><?=$title?></a>
			</li><?php endif;endwhile;?>
		</ul>
	</div>
<?php endif;?>

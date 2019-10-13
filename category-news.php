    <div id="sliderBlock" class="container">
		<?php
			$c = get_category(get_query_var('cat'), OBJECT);
		?>
		<h1><? $h1 = get_field('h1', 'category_'.$c->term_id);if($h1):?><?=$h1?><?else:?><?=$c->name?><?endif;?></h1>
    </div>
    <div id="page" class="container flex">
		<div id="content">
		<?php if(have_posts()):?>
			<?php while(have_posts()):the_post();$title=get_field('title');$name=get_the_title();$link=get_the_permalink();?>
			<ul class="newsList">
				<li>
					<?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'cat-news');?>
					<a href="<?=$link?>" rel="nofollow" class="img-news">
						<img src="<?=$img[0]?>" width="<?=$img[1]?>" height="<?=$img[2]?>" alt="<?=$name?>" title="<?=$name?>" />
					</a>
					<div class="info-block">
						<a href="<?=$link?>" class="hov"><?=$name?></a>
						<span class="dop-title"><?=$title?></span>
						<?the_excerpt();?>
						<div class="bottom-block">
							<a href="<?=$link?>" class="arrow next" title="Читать новость подробно" rel="nofollow">Читать подробнее</a>
							<span class="date"><?=get_the_date('d-m-Y')?></span>
						</div>
					</div>
				</li>
			</ul>
			<?php endwhile;?>
			<?php if (function_exists('wp_corenavi')) wp_corenavi();?>
		<?endif;?>
		<?php if($c->description):?><div class="description"><?=$c->description?></div><?php endif;?>
		</div>
		<?php get_sidebar('news');?>
    </div>
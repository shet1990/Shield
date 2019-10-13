    <div id="sliderBlock" class="container">
		<?php
			$c = get_category(get_query_var('cat'), OBJECT);
		?>
		<h1><? $h1 = get_field('h1', 'category_'.$c->term_id);if($h1):?><?=$h1?><?else:?><?=$c->name?><?endif;?></h1>
	</div>
    <div id="page" class="container flex">
		<div id="content">
		<?php if(have_posts()):?>
		<ul class="actorList">
			<?$args = array( 
				'cat'		=>	$c->term_id,
				'orderby'	=> 	'time',
				'order' 	=> 'ASC'
			);
			$query = new WP_Query( $args );
			while ($query->have_posts()):$query->the_post();?>
				<?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'cat-actors');?>
				<li style="background-image: url(<?=$img[0]?>)">
					<a href="<?=get_the_permalink()?>" class="main_foto" title="Полное описание актёра <?=get_the_title()?>">
						<div class="inf">
							<span class="actor"><?=get_the_title()?></span>
							<span class="heroes"><?php if($n = get_field('name_hero')):?><?=$n?><?php endif;?></span>
						</div>
					</a>
				</li>
			<?endwhile;wp_reset_postdata();?>
		</ul>
		<?endif;?>
		<?php if($c->description):?><div class="description"><?=$c->description?></div><?php endif;?>
		</div>
    </div>
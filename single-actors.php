   <div id="sliderBlock" class="container dop-title"  itemscope itemtype="http://schema.org/Person">
		<?php if(have_posts()):?>
			<?php while(have_posts()):the_post(); $title = get_the_title();?>
			<h1><?=$title?></h1><span class="name-hero">(<?=get_field('name_hero')?>)</span>
	</div>
    <div id="page" class="container flex">
		<div id="content">
			<div class="actorTop">
				<div class="gallery">
					<?php
						$imgList = array();
						$img_max = 8;
						$img_index = 1;
						
						while($img_index <= $img_max){
							$temp = get_field("img_".$img_index);
							$imgItemthumb = wp_get_attachment_image_src($temp['id'], 'big_fotorama');
							if($temp)
								array_push($imgList, $imgItemthumb);
							$img_index++;
						}
						
						if(count($imgList)):
					?>
						<div class="fotorama" data-nav="thumbs" data-thumbwidth="90" data-thumbheight="70" data-thumbborderwidth="4" data-thumbmargin="10" itemscope="" itemtype="https://schema.org/ImageObject">
							<?php foreach($imgList as $key => $imgItem):?>
							<??>
								<img src="<?=$imgItem[0]?>" alt="Подборка фото к биографии актера <?=$t?>: фото №<?=$key+1?>" title="Подборка фото к биографии актера <?=$t?>: фото №<?=$key+1?>" itemprop="image">
							<?php endforeach;?>
						</div>
					<?endif;?>
				</div>
					<?php
						$date = get_field('date');
						$place = get_field('place');
						$rost = get_field('rost');
						$jobs = get_field('jobs');
						$genre = get_field('genre');
						
						if($date || $place || $rost || $jobs || $genre):
					?>
				<div class="additionalBlock">
					<div class="title">
						<span>О актёре</span>
					</div>
					<div class="addit-content">
						<ul class="addit">
						<?php if($date):?>
							<li>
								<span class="t">Дата рождения</span>
								<span><?=$date?></span>
								<meta itemprop="birthDate" content="<?=$date?>" />
							</li>
						<?endif;?>
						<?php if($place):?>
							<li>
								<span class="t" itemprop="birthPlace">Место рождения</span>
								<span><?=$place?></span>
							</li>
						<?endif;?>
						<?php if($rost):?>
							<li>
								<span class="t">Рост</span>
								<span><?=$rost?></span>
							</li>
						<?endif;?>
						<?php if($jobs):?>
							<li>
								<span class="t" itemprop="jobTitle">Карьера</span>
								<span><?=$jobs?></span>
							</li>
						<?endif;?>
						<?php if($genre):?>
							<li>
								<span class="t">Жанр</span>
								<span><?=$genre?></span>
							</li>
						<?endif;?>
						</ul>
					</div>
				</div>
				<?endif;?>
			</div>
			<div class="descr" itemprop="description">
				<?php the_content();?>
			</div>
			<?endwhile;endif;?>
			<?php //if(function_exists("related_posts")) related_posts();?>
		</div>
		<?php get_sidebar();?>
    </div>
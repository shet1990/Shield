	<div id="sideBar" itemscope itemtype="http://schema.org/WPSideBar">
		<?php
			$NEWS = new WP_Query(array(
				'cat' 				=> 	array(11),
				'orderby' 			=> 	'time',
				'order'				=>	'DESC',
				'posts_per_page'	=>	4
			));
			
			if($NEWS->have_posts()):
		?>
        <div class="news-block">
			<!--noindex--><h3>Последние новости</h3><!--/noindex-->
			<ul>
				<?php
					while($NEWS->have_posts()):
						$NEWS->the_post();
						$link = get_the_permalink();
						$title = get_the_title();
						$img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'pop_post2');
				?>
					<li>
					<?php if($img[0]):?>
						<a href="<?=$link?>" class="news-img" title="Читайте прямо сейчас" rel="nofollow" itemscope="" itemtype="https://schema.org/ImageObject">
							<img src="<?=$img[0]?>" width="<?=$img[1]?>" height="<?=$img[2]?>" alt="<?=$title?>" itemprop="image">
							<meta itemprop="width" content="<?=$img[1]?>" />
							<meta itemprop="height" content="<?=$img[2]?>" />
						</a>
						<a href="<?=$link?>" class="hov" title="Читать новость: <?=$t?>"><?=$title?></a>
					<?php endif;?>
					</li>
				<?php endwhile;?>
			</ul>
		</div>
		<?php wp_reset_query();endif;?>
		
		<?php if(is_front_page()):?>
			<?php if(have_posts()):?>
				<?php while(have_posts()):the_post();// О сериале
					$janr = get_field('janr');
					$rezis = get_field('rezis');
					$produs = get_field('produs');
					$scenar = get_field('scenar');
					$premier_world = get_field('premier_world');
					$premier_rf = get_field('premier_rf');
					$country = get_field('country');
					$count_sezon = get_field('count_sezon');
					$time_series = get_field('time_series');
					$age = get_field('age');
					$count_series = get_field('count_series');
					$actors = get_field('actors');
				?>
				<div class="additionalBlock">
					<div class="title">
						<span>О телесериале</span>
					</div>
					<div class="addit-content">
						<ul class="addit">
						<?if($janr):?>
							<li>
								<span class="t">Жанр</span>
								<span><?=$janr?></span>
							</li>
						<?endif;?>
						<?if($rezis):?>
							<li>
								<span class="t">Режиссер</span>
								<span><?=$rezis?></span>
							</li>
						<?endif;?>
						<?if($scenar):?>
							<li>
								<span class="t">Сценарист</span>
								<span><?=$scenar?></span>
							</li>
						<?endif;?>
						<?if($produs):?>
							<li>
								<span class="t">Продюсер</span>
								<span><?=$produs?></span>
							</li>
						<?endif;?>
						<?if($premier_world):?>
							<li>
								<span class="t">Премьера (мир)</span>
								<span><?=$premier_world?></span>
							</li>
						<?endif;?>
						<?if($premier_rf):?>
							<li>
								<span class="t">Премьера (РФ)</span>
								<span><?=$premier_rf?></span>
							</li>
						<?endif;?>
						<?if($country):?>
							<li>
								<span class="t">Страна</span>
								<span><?=$country?></span>
							</li>
						<?endif;?>
						<?if($count_sezon):?>
							<li>
								<span class="t">Количество сезонов</span>
								<span><?=$count_sezon?></span>
							</li>
						<?endif;?>
						<?if($count_series):?>
							<li>
								<span class="t">Количество серий</span>
								<span><?=$count_series?></span>
							</li>
						<?endif;?>
						<?if($time_series):?>
							<li>
								<span class="t">Длительность серии</span>
								<span><?=$time_series?></span>
							</li>
						<?endif;?>
						<?if($age):?>
							<li>
								<span class="t">Возраст</span>
								<span><?=$age?></span>
							</li>
						<?endif;?>
						<?php if(count($actors)):?>
							<li><span class="t">В ролях</span>
								<ul class="actor-menu">
								<?php foreach($actors as $act):$t_act=get_the_title($act->ID);?>
									<li>
										<a href="<?=get_the_permalink($act->ID)?>" class="hov" title="Полное описание актёра <?=$t_act?>"><?=$t_act?></a>
									</li>
								<?php endforeach;?>
								</ul>
							</li>
						<?endif;?>
						</ul>
					</div>
				</div>
		<?php endwhile;endif;endif;?>
		
		<?php if(function_exists('the_ratings')):?>
			<div class="ratingSidebar">
				<!--noindex--><div class="title">Рейтинг Агентов «Щ.И.Т.»</div><!--/noindex-->
				<?php the_ratings();?>
			</div>
		<?php endif;?>
		
	</div>

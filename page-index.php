<?php
/*
* Template Name: Шаблон главной страницы
*/
?>
<?php get_header(); ?>

    <div id="sliderBlock" class="container">
		<h1><?=get_the_title();?></h1>
		<div class="slider-block">
		<?php
			$DB = new WP_Query(array(
				'cat' 				=> 	array(5,6,7,8,9,10),
				'orderby' 			=> 	'time',
				'order'				=>	'DESC',
				'posts_per_page'	=>	1
			));
			
			$DB->the_post();
			$l= get_the_permalink();
			$t = get_the_title();
			$d = explode('-', get_the_date('Y-m-d'));
			$i = wp_get_attachment_image_src(get_post_thumbnail_id(), 'player_img');
		?>
			<div class="slider-link" style="background-image: url(<?=$i[0]?>)">
				<a href="<?=$l?>" title="Смотреть Агенты ЩИТ <?=$t?>">
					<div class="flex"><i class="fas fa-play"></i></div>
				</a>
			</div>
			<div class="slider-container flex">
				<ul>
					<?php $cats = get_categories(array(
						'orderby'      	=> 	'name',
						'order'        	=> 	'ASC',
						'hide_empty'   	=> 	0,
						'taxonomy'     	=> 	'category',
						'include'		=>	'5,6,7,8,9,10'
					));
					foreach($cats as $cat):
						$link = get_category_link($cat->cat_ID);
						$name = get_field('preview_name', 'category_'.$cat->cat_ID);
						$img_id = get_field('img', 'category_'.$cat->term_id);
						$img = wp_get_attachment_image_src($img_id['ID'], 'player_img_catq');
						$desc = get_field('preview_text', 'category_'.$cat->cat_ID);
					?>
					<li style="background-image: url(<?=$img[0]?>)">
						<a href="<?=$link?>" title="Смотреть <?=$name?> в хорошем качестве" itemscope="" itemtype="https://schema.org/ImageObject"></a>
						<span><?=$cat->name?></span>
						<div class="flex"><i class="fa-play"></i></div>
					</li>
					<?endforeach;?>
				</ul>
			</div>
			<div class="slider-info">
				<a href="<?=$l?>" rel="nofollow" title="Смотреть <?=$t?> в хорошем качестве">Агенты Щ.И.Т. <?=$t?></a>
			</div>
			<div class="slider-date flex">
				<i class="fas fa-calendar-alt"></i>
				<span><?=$d[2]?>.<?=$d[1]?>.<?=$d[0]?></span>
			</div>
		</div>
    </div>
    <div id="page" class="container flex">
		<div id="content">
			<h2>Популярные серии</h2>
			<div class="actual-series flex">
			  <ul>
				<li>
				  <a href="#" class="img"><img src="<?=get_template_directory_uri()?>/assets/images/series-img-1.jpg" width="190" height="140" alt=""></a>
				  <a href="#" class="hov">3 сезон 8 серия</a>
				</li>
				<li>
				  <a href="#" class="img"><img src="<?=get_template_directory_uri()?>/assets/images/series-img-2.jpg" width="190" height="140" alt=""></a>
				  <a href="#" class="hov">5 сезон 3 серия</a>
				</li>
				<li>
				  <a href="#" class="img"><img src="<?=get_template_directory_uri()?>/assets/images/series-img-3.jpg" width="190" height="140" alt=""></a>
				  <a href="#" class="hov">5 сезон 22 серия</a>
				</li>
				<li>
				  <a href="#" class="img"><img src="<?=get_template_directory_uri()?>/assets/images/series-img-4.jpg" width="190" height="140" alt=""></a>
				  <a href="#" class="hov">4 сезон 17 серия</a>
				</li>
			  </ul>
			</div>
			<div class="descrBlock">
				<h2>О чем сериал Агенты «Щ.И.Т.»?</h2>
				<div class="descr">
				  <a href="#" class="img left">
					<img src="<?=get_template_directory_uri()?>/assets/images/sezon-1.jpg" width="210" height="290" alt="">
					<span class="inf">
					  <span class="actor">Кларк Грегг</span>
					  <span class="heroes">Фил Колсон</span>
					</span>
				  </a>
				  <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Алфавит вопрос собрал по всей? Семантика родного лучше встретил. Его до маленький от всех жизни букв образ текста он, выйти себя курсивных!</p>
				  <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Моей курсивных агентство, проектах свою обеспечивает даже запятой, подзаголовок раз назад большого от всех безорфографичный переписали журчит не дал. Гор, свой.</p>
				  <p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Эта инициал семантика обеспечивает моей коварных себя ее запятой семь правилами грустный рукописи дал наш рот выйти, решила текста подпоясал.</p>
				  <a href="#" class="img right">
					<img src="<?=get_template_directory_uri()?>/assets/images/sezon-1.jpg" width="210" height="290" alt="">
					<span class="inf">
					  <span class="actor">Кларк Грегг</span>
					  <span class="heroes">Фил Колсон</span>
					</span>
				   </a>
				  <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Алфавит вопрос собрал по всей? Семантика родного лучше встретил. Его до маленький от всех жизни букв образ текста он, выйти себя курсивных!</p>
				  <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Моей курсивных агентство, проектах свою обеспечивает даже запятой, подзаголовок раз назад большого от всех безорфографичный переписали журчит не дал. Гор, свой.</p>
				  <p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Эта инициал семантика обеспечивает моей коварных себя ее запятой семь правилами грустный рукописи дал наш рот выйти, решила текста подпоясал.</p>
				  <a href="#" class="img left">
					<img src="<?=get_template_directory_uri()?>/assets/images/sezon-1.jpg" width="210" height="290" alt="">
					<span class="inf">
					  <span class="actor">Кларк Грегг</span>
					  <span class="heroes">Фил Колсон</span>
					</span>
				  </a>
				  <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Алфавит вопрос собрал по всей? Семантика родного лучше встретил. Его до маленький от всех жизни букв образ текста он, выйти себя курсивных!</p>
				  <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Моей курсивных агентство, проектах свою обеспечивает даже запятой, подзаголовок раз назад большого от всех безорфографичный переписали журчит не дал. Гор, свой.</p>
				  <p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Эта инициал семантика обеспечивает моей коварных себя ее запятой семь правилами грустный рукописи дал наш рот выйти, решила текста подпоясал.</p>
				  <a href="#" class="img right">
					<img src="<?=get_template_directory_uri()?>/assets/images/sezon-1.jpg" width="210" height="290" alt="">
					<span class="inf">
					  <span class="actor">Кларк Грегг</span>
					  <span class="heroes">Фил Колсон</span>
					</span>
				  </a>
				  <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Алфавит вопрос собрал по всей? Семантика родного лучше встретил. Его до маленький от всех жизни букв образ текста он, выйти себя курсивных!</p>
				  <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Моей курсивных агентство, проектах свою обеспечивает даже запятой, подзаголовок раз назад большого от всех безорфографичный переписали журчит не дал. Гор, свой.</p>
				  <p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Эта инициал семантика обеспечивает моей коварных себя ее запятой семь правилами грустный рукописи дал наш рот выйти, решила текста подпоясал.</p>
				</div>
			  </div>
		</div>
		<?php get_sidebar();?>
    </div>

<?php get_footer();?>
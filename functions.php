<?php 

add_action('wp_enqueue_scripts', 'style_theme');
add_action( 'wp_footer', 'style_theme' );
add_action( 'wp_footer', 'script_theme' );
add_action( 'after_setup_theme', 'my_menu');
add_action( 'widgets_init', 'my_sidebar');

add_filter( 'excerpt_length', function(){
	return 37;
});
add_filter('excerpt_more', function($more) {
	return ' ...';
});
add_filter( 'deprecated_function_trigger_error', '__return_false' );

function my_sidebar(){
	register_sidebar( array(
		'name'          => 'Левый сайдбар',
		'id'            => 'left_sidebar',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="widget" class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
	) );
	register_sidebar( array(
		'name'          => 'Верхний сайдбар',
		'id'            => 'top_sidebar',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="widgets" class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
	) );
}

function my_menu(){
	register_nav_menu( 'top', 'Верхнее меню');
	register_nav_menu( 'bottom', 'Меню футера');
	add_theme_support( 'title-tag' );
}

function style_theme() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'min', get_template_directory_uri() . '/assets/css/libs.min.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.min.css' );
}

function script_theme() {
	wp_enqueue_script( 'min', get_template_directory_uri() . '/assets/js/scripts.min.js' );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/common.js' );
}

add_theme_support('post-thumbnails');
if(function_exists('add_image_size')){
	add_image_size('miniatur',190,190,true);
	add_image_size('cat-actors',207,290,true);
	add_image_size('cat-news',270,200,true);
	add_image_size('pop_post2',256,170,true);
	add_image_size('player_img',1140,420,true);
	add_image_size('cat-series',265,160,true);
	add_image_size('img-slider',190,140,true);
	add_image_size('big_fotorama',560,420,true);
	add_image_size('new_posts',190,120,true);
	add_image_size('series_preview',267,180,true);
	
	
	add_image_size('season_block',170,225,true);
	add_image_size('pop_post',240,152,true);
	add_image_size('cat-category',190,279,true);
	add_image_size('actors-yarpp',190,240,true);
	add_image_size('in-cat-actors',315,210,true);
	add_image_size('actor-imgList',100,100,true);
	add_image_size('film_poster',205,290,true);
}

function wp_corenavi() {
  global $wp_query;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
  $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
  $a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
  $a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"

  if ($max > 1) echo '<div class="b-navigation">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
  echo $pages.str_replace('/page/1','',paginate_links($a));
  if ($max > 1) echo '</div>';
}

<?php get_header();?>
<?php if(in_category(12)):?>
	<?php get_template_part('single', 'actors');?>
<?php elseif(in_category(11)):?>
	<?php get_template_part('single', 'news');?>
<?php else:?>
	<?php get_template_part('single', 'series');?>
<?php endif;?>
<?php get_footer();?>

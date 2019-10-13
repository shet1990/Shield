<?php get_header();?>
<?php if(is_category(12)):?>
	<?php get_template_part('category', 'actors');?>
<?php elseif(is_category(11)):?>
	<?php get_template_part('category', 'news');?>
<?php else:?>
	<?php get_template_part('category', 'sezon');?>
<?php endif;?>
<?php get_footer();?>
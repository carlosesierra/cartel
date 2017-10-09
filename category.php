<?php get_header();?>
<?php get_sidebar();?>
<div class="wrapp">
<div class="container blog">
  <?php 
	 if (have_posts() ) :  
		while (have_posts() ) :the_post(); ?>
			<section>
        <article>
          <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="thumb-img">
            <?php the_post_thumbnail('large'); ?>
            <header><?php the_title(); ?></header>
            </a>
      </article>
    	</section>
    <?php endwhile;
  endif;
?>
</div>
<?php get_footer();?>
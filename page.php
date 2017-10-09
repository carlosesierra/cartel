<?php get_header();?>
<?php get_sidebar();?>
<div class="wrapp">
<div class="container">
  <?php 
  	if (have_posts() ) :  
  		while (have_posts() ) :the_post(); ?>
  			<section>
          <article>
          <header><?php the_title(); ?></header>
          <div class="thumbnail-img"><?php the_post_thumbnail('large'); ?></div>
          <?php the_content(); ?>
      	  </article>
        </section>
      <?php endwhile;
    endif;
  ?>
</div></div>
<?php get_footer();?>
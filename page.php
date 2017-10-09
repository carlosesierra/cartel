<?php get_header();?>
<?php get_sidebar();?>
<div class="wrapp">
<div class="container">
  <?php 
  	if (have_posts() ) :  
  		while (have_posts() ) :the_post(); ?>
  			<section>
          <div class="cont">
          <h1 class="title"><?php the_title(); ?></h1>
          <div class="thumbnail-img"><?php the_post_thumbnail('large'); ?></div>
          <article><?php the_content(); ?></article>
      	  </div>
        </section>
      <?php endwhile;
    endif;
  ?>
</div></div>
<?php get_footer();?>